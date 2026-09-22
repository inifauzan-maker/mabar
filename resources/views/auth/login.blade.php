<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login · Mabar</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f3f4f6] antialiased">
    <div class="flex min-h-screen items-center justify-center px-4 py-12">
        <div class="w-full max-w-[520px] rounded-[22px] border border-slate-200 bg-white p-7 shadow-[0_10px_30px_rgba(15,23,42,0.06)] sm:p-8">
            <div class="mb-7 text-center">
                <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-xl bg-blue-600 text-3xl font-bold text-white">M</div>
                <h1 class="text-4xl font-semibold tracking-[-0.04em] text-slate-900">Masuk ke Mabar</h1>
                <p class="mt-3 text-base text-slate-500">Gunakan akun Anda untuk masuk ke dashboard.</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="mb-2 block text-[17px] font-medium text-slate-700">Email</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        class="w-full rounded-xl border {{ $errors->has('email') ? 'border-red-500' : 'border-blue-500' }} bg-white px-4 py-3 text-base text-slate-800 shadow-sm outline-none transition focus:border-blue-600 focus:ring-2 focus:ring-blue-100"
                    >
                    @error('email')
                        <p class="mt-2 text-sm font-medium text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="mb-2 block text-[17px] font-medium text-slate-700">Password</label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-base text-slate-800 shadow-sm outline-none transition focus:border-blue-600 focus:ring-2 focus:ring-blue-100"
                    >
                </div>

                <div class="flex items-center justify-between gap-3 pt-1 text-sm text-slate-600">
                    <label class="inline-flex items-center gap-3">
                        <input type="checkbox" name="remember" value="1" class="h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                        <span>Ingat saya</span>
                    </label>
                    <a href="#" class="font-medium text-blue-600 hover:text-blue-700">Lupa password?</a>
                </div>

                <button type="submit" class="w-full rounded-xl bg-blue-600 px-4 py-3 text-lg font-semibold text-white shadow-[0_8px_18px_rgba(37,99,235,0.25)] transition hover:bg-blue-700">Masuk</button>
            </form>

            <div class="mt-6 rounded-xl border border-slate-200 bg-slate-50 p-4 text-sm text-slate-600">
                <p class="font-medium text-slate-700">Akun contoh:</p>
                <div class="mt-2">Superadmin: superadmin@example.com / password</div>
                <div class="mt-1">Marketing: marketing@example.com / password</div>
            </div>
        </div>
    </div>
</body>
</html>
