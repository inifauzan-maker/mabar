<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login · Mabar</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 antialiased">
    <div class="flex min-h-screen items-center justify-center px-4 py-12">
        <div class="w-full max-w-md rounded-2xl border border-slate-200 bg-white p-8 shadow-lg shadow-slate-200/40">
            <div class="mb-7 text-center">
                <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-xl bg-blue-600 text-xl font-bold text-white">M</div>
                <h1 class="text-2xl font-semibold text-slate-900">Masuk ke Mabar</h1>
                <p class="mt-2 text-sm text-slate-500">Gunakan akun Anda untuk masuk ke dashboard.</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="mb-2 block text-sm font-medium text-slate-700">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full rounded-xl border border-slate-300 bg-slate-50 px-3 py-2.5 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200">
                    @error('email')
                        <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="mb-2 block text-sm font-medium text-slate-700">Password</label>
                    <input id="password" type="password" name="password" required class="w-full rounded-xl border border-slate-300 bg-slate-50 px-3 py-2.5 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200">
                </div>

                <div class="flex items-center justify-between gap-3 text-sm">
                    <label class="inline-flex items-center gap-2 text-slate-600">
                        <input type="checkbox" name="remember" value="1" class="h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                        Ingat saya
                    </label>
                    <a href="#" class="text-blue-600 hover:text-blue-800">Lupa password?</a>
                </div>

                <button type="submit" class="w-full rounded-xl bg-blue-600 px-4 py-3 text-sm font-semibold text-white transition hover:bg-blue-700">Masuk</button>
            </form>

            <div class="mt-6 rounded-xl bg-slate-50 p-4 text-xs text-slate-600">
                <p class="font-medium text-slate-700">Akun contoh:</p>
                <ul class="mt-2 space-y-1">
                    <li>Superadmin: superadmin@example.com / password</li>
                    <li>Marketing: marketing@example.com / password</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
