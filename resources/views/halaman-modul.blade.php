@extends('tata-letak')
@section('judul', $modul['judul'])
@section('konten')
<div class="mb-7"><span class="mb-3 inline-flex rounded-md border border-amber-200 bg-amber-50 px-2.5 py-1 text-[11px] font-medium text-amber-700">Segera hadir</span><h1 class="text-2xl font-semibold tracking-tight text-slate-900 sm:text-3xl">{{ $modul['judul'] }}</h1><p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500">{{ $modul['deskripsi'] }}</p></div>
<div class="mb-6 grid gap-4 md:grid-cols-3">@foreach($modul['fitur'] as $fitur)<div class="panel flex items-center gap-3 p-5"><span class="kotak-ikon blue"><x-ikon :nama="$modul['ikon']"/></span><div><h2 class="text-sm font-medium text-slate-700">{{ $fitur }}</h2><p class="mt-1 text-[11px] text-slate-400">Dalam rencana pengembangan</p></div></div>@endforeach</div>
<section class="panel overflow-hidden">
    <div class="flex items-center justify-between gap-3 border-b border-slate-100 px-5 py-4"><h2 class="font-semibold text-slate-800">Ruang {{ $modul['ringkas'] }}</h2><span class="text-[11px] text-slate-400">Pratinjau modul</span></div>
    <div class="hidden grid-cols-4 gap-4 border-b border-slate-100 bg-slate-50/80 px-6 py-3 text-xs font-medium text-slate-500 sm:grid" aria-hidden="true">@foreach($modul['kolom'] as $kolom)<span>{{ $kolom }}</span>@endforeach</div>
    <div class="flex min-h-96 flex-col items-center justify-center px-6 py-14 text-center"><span class="mb-6 flex size-20 items-center justify-center rounded-3xl border border-blue-100 bg-blue-50 text-blue-500"><x-ikon :nama="$modul['ikon']" class="size-9"/></span><h2 class="text-xl font-semibold text-slate-800">Ruang {{ $modul['ringkas'] }} sedang disiapkan</h2><p class="mt-3 max-w-md text-sm leading-6 text-slate-500">Halaman ini masih berupa placeholder. Fitur pengelolaan dan penyimpanan data akan ditambahkan pada tahap berikutnya.</p><a href="{{ route('dasbor') }}" class="tombol-utama mt-7">Kembali ke dasbor <x-ikon nama="panah" class="size-4"/></a></div>
</section>
@endsection
