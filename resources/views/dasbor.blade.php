@extends('tata-letak')
@section('judul', 'Dasbor')
@section('konten')
<div class="mb-7 flex flex-wrap items-start justify-between gap-4">
    <div><p class="mb-2 text-xs font-medium text-blue-600">SELAMAT DATANG DI MABAR</p><h1 class="text-2xl font-semibold tracking-tight text-slate-900 sm:text-3xl">Marketing yang lebih terarah.</h1><p class="mt-2 text-sm leading-6 text-slate-500">Satu ruang untuk kampanye, relasi, dan cerita brand Anda.</p></div>
    <a class="tombol-sekunder" href="#modul-marketing">Jelajahi modul <x-ikon nama="panah" class="size-4"/></a>
</div>
<div class="mb-7 flex items-start gap-3 rounded-lg border border-blue-100 bg-blue-50/70 px-4 py-3 text-xs leading-5 text-blue-800"><x-ikon nama="info" class="mt-0.5 size-4"/><p><strong class="font-semibold">Ruang kerja sedang disiapkan.</strong> Jelajahi menu untuk melihat kerangka setiap modul. Data dan fitur pengelolaan akan tersedia pada tahap berikutnya.</p></div>
<div class="mb-7 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
    @foreach([['Kampanye aktif', 'kampanye', 'blue'], ['Prospek baru', 'prospek', 'violet'], ['Belanja iklan', 'dompet', 'emerald'], ['Konten terjadwal', 'kalender', 'orange']] as [$label, $ikon, $warna])
        <section class="panel p-5"><div class="flex items-center justify-between gap-3"><h2 class="text-xs font-medium text-slate-500">{{ $label }}</h2><span class="kotak-ikon {{ $warna }}"><x-ikon :nama="$ikon" class="size-4"/></span></div><p class="my-3 text-3xl font-semibold text-slate-300" aria-label="Data belum tersedia">—</p><p class="text-[11px] text-slate-400">Menunggu data pertama</p></section>
    @endforeach
</div>
<div class="mb-8 grid gap-5 xl:grid-cols-[1.65fr_1fr]">
    <section class="panel flex min-h-72 flex-col"><div class="flex flex-wrap items-center justify-between gap-2 border-b border-slate-100 px-5 py-4"><h2 class="font-semibold text-slate-800">Ringkasan performa</h2><span class="text-[11px] text-slate-400">Kampanye & prospek</span></div><div class="flex flex-1 flex-col items-center justify-center px-5 py-9 text-center"><span class="mb-4 flex size-14 items-center justify-center rounded-2xl border border-slate-100 bg-slate-50 text-blue-400"><x-ikon nama="grafik" class="size-7"/></span><h3 class="text-sm font-medium text-slate-700">Cerita pertumbuhan Anda dimulai di sini</h3><p class="mt-2 max-w-xs text-xs leading-5 text-slate-400">Grafik performa akan tampil setelah data kampanye dan prospek tersedia.</p></div></section>
    <section class="panel"><div class="flex items-center justify-between border-b border-slate-100 px-5 py-4"><h2 class="font-semibold text-slate-800">Agenda konten</h2><x-ikon nama="kalender" class="size-4 text-slate-400"/></div><div class="flex flex-col items-center px-5 py-8 text-center"><div class="mb-4 grid grid-cols-3 gap-1.5" aria-hidden="true">@for($i = 0; $i < 9; $i++)<span @class(['size-5 rounded', 'bg-blue-100' => $i === 4, 'bg-slate-100' => $i !== 4])></span>@endfor</div><h3 class="text-sm font-medium">Belum ada agenda</h3><p class="mt-2 text-xs text-slate-400">Rencana publikasi Anda akan muncul di sini.</p><a href="{{ route('konten') }}" class="mt-3 inline-flex min-h-11 items-center gap-2 text-xs font-medium text-blue-600 hover:text-blue-800">Lihat ruang konten <x-ikon nama="panah" class="size-3.5"/></a></div></section>
</div>
<section id="modul-marketing" class="scroll-mt-5">
    <div class="mb-4 flex flex-wrap items-center justify-between gap-2"><div><h2 class="text-base font-semibold text-slate-900">Ruang marketing Anda</h2><p class="mt-1 text-xs text-slate-500">Semua yang Anda perlukan, terhubung dalam satu tempat.</p></div><span class="text-xs text-slate-400">5 modul tersedia untuk dijelajahi</span></div>
    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
        @foreach(config('modul') as $nama => $modul)
            <a href="{{ route($nama) }}" class="panel group flex flex-col p-5 transition hover:border-blue-200 hover:shadow-sm"><div class="mb-4 flex items-center justify-between"><span class="kotak-ikon blue"><x-ikon :nama="$modul['ikon']"/></span><span class="rounded bg-slate-100 px-2 py-1 text-[10px] text-slate-500">Segera hadir</span></div><h3 class="font-semibold text-slate-800">{{ $modul['judul'] }}</h3><p class="mt-2 flex-1 text-xs leading-5 text-slate-500">{{ $modul['deskripsi'] }}</p><span class="mt-5 inline-flex items-center gap-2 text-xs font-medium text-blue-600">Jelajahi modul <x-ikon nama="panah" class="size-4 transition group-hover:translate-x-1"/></span></a>
        @endforeach
        <div class="flex flex-col justify-center rounded-xl border border-dashed border-slate-300 bg-slate-50/50 p-6"><span class="mb-3 text-xl text-blue-400" aria-hidden="true">✦</span><h3 class="font-medium text-slate-700">Lebih rapi. Lebih fokus.</h3><p class="mt-2 text-xs leading-6 text-slate-500">Kurangi perpindahan alat.<br>Berikan lebih banyak ruang untuk ide.</p></div>
    </div>
</section>
@endsection
