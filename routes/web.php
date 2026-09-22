<?php

use App\Enums\UserRole;
use App\Http\Controllers\ProspekController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dasbor');
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', fn () => view('auth.login'))->name('login');

    Route::post('/login', function (Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    });
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', function (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    })->name('logout');

    Route::get('/dashboard', fn () => view('dasbor'))->name('dashboard');

    foreach ([
        'direksi' => UserRole::DIREKSI,
        'marketing' => UserRole::MARKETING,
        'keuangan' => UserRole::KEUANGAN,
        'administrasi' => UserRole::ADMINISTRASI,
        'kurikulum' => UserRole::KURIKULUM,
        'staff' => UserRole::STAFF,
        'guest' => UserRole::GUEST,
        'cso' => UserRole::CSO,
        'superadmin' => UserRole::SUPERADMIN,
    ] as $slug => $role) {
        Route::get('/'.$slug, fn () => view('dasbor'))->middleware('role:'.$role->value)->name($slug);
    }

    Route::view('/dasbor', 'dasbor')->name('dasbor');
    Route::get('/prospek', [ProspekController::class, 'index'])->name('prospek');
    Route::post('/prospek', [ProspekController::class, 'store'])->name('prospek.store');

    foreach (config('modul') as $nama => $modul) {
        if ($nama === 'prospek') {
            continue;
        }

        Route::middleware(['auth'])->group(function () use ($nama, $modul) {
            Route::view('/'.$nama, 'halaman-modul', ['modul' => $modul])->name($nama);
        });
    }
});
