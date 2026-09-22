<a href="{{ route('dasbor') }}" class="mb-10 flex items-center gap-3 px-3" aria-label="Mabar Marketing — Dasbor">
    <span class="flex size-10 items-center justify-center rounded-xl bg-blue-600 text-xl font-bold text-white shadow-sm">m<span class="text-blue-200">.</span></span>
    <span class="text-xl font-bold tracking-tight text-slate-900">mabar<span class="block text-[10px] font-medium tracking-[.22em] text-slate-400">MARKETING SPACE</span></span>
</a>
<p class="mb-3 px-4 text-[10px] font-semibold tracking-[.16em] text-slate-400">RUANG KERJA</p>
<nav aria-label="Menu utama" class="flex flex-col gap-1.5">
    <a href="{{ route('dasbor') }}" @class(['tautan-menu', 'aktif' => request()->routeIs('dasbor')]) @if(request()->routeIs('dasbor')) aria-current="page" @endif><x-ikon nama="dasbor"/>Dasbor</a>
    <div class="mx-4 my-3 border-t border-slate-100"></div>
    <p class="mb-2 px-4 text-[10px] font-semibold tracking-[.16em] text-slate-400">MANAJEMEN MARKETING</p>
    @foreach(config('modul') as $nama => $item)
        <a href="{{ route($nama) }}" @class(['tautan-menu', 'aktif' => request()->routeIs($nama)]) @if(request()->routeIs($nama)) aria-current="page" @endif><x-ikon :nama="$item['ikon']"/><span>{{ $item['ringkas'] }}</span></a>
    @endforeach
</nav>
<div class="mt-auto pt-10">
    <div class="rounded-xl border border-blue-100 bg-blue-50/60 p-4">
        <span class="mb-2 block text-xs font-semibold text-blue-700">Ruang untuk ide besar.</span>
        <p class="text-xs leading-5 text-slate-500">Semua aktivitas marketing, dalam satu tempat.</p>
        <span class="mt-4 inline-flex items-center gap-1.5 text-[10px] font-medium text-slate-500"><span class="size-1.5 rounded-full bg-amber-400"></span> Versi pratinjau</span>
    </div>
    <div class="mt-5 flex items-center gap-3 border-t border-slate-100 px-2 pt-5"><span class="flex size-9 items-center justify-center rounded-full bg-slate-100 text-xs font-semibold text-slate-600">MK</span><div><p class="text-xs font-semibold">Tim Marketing</p><p class="mt-0.5 text-[10px] text-slate-400">Ruang kerja pratinjau</p></div></div>
</div>
