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
    public function index(): View
    {
        $prospects = Prospek::with('assignedTo', 'campaign')
            ->latest()
            ->get();

        $users = User::orderBy('name')->get();
        $campaigns = Kampanye::orderBy('name')->get();

        return view('prospek.index', compact('prospects', 'users', 'campaigns'));
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
}
