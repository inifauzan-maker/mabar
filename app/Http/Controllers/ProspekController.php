<?php

namespace App\Http\Controllers;

use App\Models\Kampanye;
use App\Models\Prospek;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProspekController extends Controller
{
    public function index(Request $request): View
    {
        $query = Prospek::query()->with('assignedTo', 'campaign')
            ->when($request->filled('search'), function ($query) use ($request) {
                $term = '%'.$request->search.'%';

                $query->where(function ($query) use ($term) {
                    $query->where('name', 'like', $term)
                        ->orWhere('phone', 'like', $term)
                        ->orWhere('school_name', 'like', $term)
                        ->orWhere('city', 'like', $term);
                });
            })
            ->when($request->filled('stage'), fn ($query) => $query->where('stage', $request->stage))
            ->when($request->filled('source'), fn ($query) => $query->where('source', $request->source))
            ->when($request->filled('assigned_to'), fn ($query) => $query->where('assigned_to', $request->assigned_to))
            ->latest();

        $prospects = $query->get();

        $stats = [
            'total' => Prospek::count(),
            'new' => Prospek::where('stage', 'new')->count(),
            'qualified' => Prospek::where('stage', 'qualified')->count(),
            'closed' => Prospek::where('stage', 'closed')->count(),
        ];

        $users = User::orderBy('name')->get();
        $campaigns = Kampanye::orderBy('name')->get();

        return view('prospek.index', compact('prospects', 'users', 'campaigns', 'stats'));
    }

    public function show(Prospek $prospek): View
    {
        $prospek->load('assignedTo', 'campaign');

        return view('prospek.show', compact('prospek'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'phone' => ['nullable', 'string', 'max:20'],
            'city' => ['nullable', 'string', 'max:100'],
            'school_name' => ['nullable', 'string', 'max:150'],
            'class_level' => ['nullable', 'string', 'max:50'],
            'source' => ['nullable', 'string', 'max:100'],
            'stage' => ['required', 'string', 'max:50'],
            'assigned_to' => ['nullable', 'exists:users,id'],
            'campaign_id' => ['nullable', 'exists:campaigns,id'],
            'notes' => ['nullable', 'string'],
        ]);

        Prospek::create($validated);

        return redirect()->route('prospek')->with('success', 'Lead prospek berhasil ditambahkan.');
    }

    public function updateStatus(Request $request, Prospek $prospek): RedirectResponse
    {
        $validated = $request->validate([
            'stage' => ['required', 'string', 'max:50'],
        ]);

        $prospek->update([
            'stage' => $validated['stage'],
        ]);

        return redirect()->route('prospek.show', $prospek)->with('success', 'Status prospek berhasil diperbarui.');
    }
}
