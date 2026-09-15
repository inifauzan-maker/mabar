<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#1677ff">
    <title>@yield('judul', 'Dasbor') · Mabar Marketing</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f5f7fa] font-sans text-sm text-slate-700 antialiased">
    <a class="lewati-konten" href="#konten-utama">Lewati ke konten</a>
    <aside class="fixed inset-y-0 left-0 z-20 hidden w-60 flex-col border-r border-slate-200/80 bg-white px-4 py-7 lg:flex">@include('bagian.navigasi')</aside>
    <dialog id="menu-ponsel" aria-label="Navigasi marketing" class="menu-ponsel">
        <button type="button" id="tutup-menu" class="tombol-ikon absolute right-3 top-3" aria-label="Tutup menu"><x-ikon nama="tutup"/></button>
        <div class="flex min-h-full flex-col px-4 py-7">@include('bagian.navigasi')</div>
    </dialog>
    <div class="min-h-screen lg:pl-60">
        <header class="flex min-h-18 items-center justify-between gap-3 border-b border-slate-200/80 bg-white px-4 sm:px-8">
            <div class="flex min-w-0 items-center gap-3"><button id="buka-menu" type="button" class="tombol-ikon lg:hidden" aria-label="Buka menu" aria-controls="menu-ponsel" aria-expanded="false"><x-ikon nama="menu"/></button><span class="hidden text-slate-400 sm:inline">Ruang kerja</span><span class="hidden text-slate-300 sm:inline">/</span><span class="truncate font-medium text-slate-800">@yield('judul', 'Dasbor')</span></div>
            <span class="inline-flex shrink-0 items-center gap-2 rounded-full border border-blue-100 bg-blue-50 px-3 py-1.5 text-[11px] font-medium text-blue-700"><span class="size-1.5 rounded-full bg-blue-500"></span>Pratinjau</span>
        </header>
        <main id="konten-utama" tabindex="-1" class="mx-auto max-w-[1600px] px-4 py-7 outline-none sm:px-8 sm:py-8">@yield('konten')</main>
        <footer class="mx-4 flex flex-wrap justify-between gap-2 border-t border-slate-200 py-5 text-[11px] text-slate-400 sm:mx-8"><span>Mabar Marketing · Ruang kerja untuk bertumbuh</span><span>Kerangka aplikasi · v0.1</span></footer>
    </div>
</body>
</html>
