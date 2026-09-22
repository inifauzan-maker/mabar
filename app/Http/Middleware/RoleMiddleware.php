<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string ...$roles): mixed
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        $userRole = $request->user()->role;
        $currentRole = $userRole instanceof UserRole
            ? $userRole->value
            : $userRole;

        if ($request->user()->isSuperAdmin()) {
            return $next($request);
        }

        $allowedRoles = array_map(fn (string $role) => strtolower($role), $roles);

        if (! in_array($currentRole, $allowedRoles, true)) {
            abort(403, 'Anda tidak memiliki hak akses untuk halaman ini.');
        }

        return $next($request);
    }
}
