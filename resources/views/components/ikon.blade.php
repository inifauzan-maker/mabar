@props(['nama' => 'dasbor'])
<svg {{ $attributes->merge(['class' => 'size-5 shrink-0']) }} viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.65" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
    @switch($nama)
        @case('dasbor') <rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/> @break
        @case('kampanye') <path d="m4 10 13-5v14L4 14zM4 10H2v4h2m3 1 1 5h3l-1-4m10-7 2-1m-2 8 2 1"/> @break
        @case('prospek') <circle cx="9" cy="8" r="3"/><path d="M3 21v-3a6 6 0 0 1 12 0v3m2-17a3 3 0 0 1 0 6m1 4a5 5 0 0 1 3 4v3"/> @break
        @case('sosial') <circle cx="6" cy="12" r="3"/><circle cx="18" cy="5" r="3"/><circle cx="18" cy="19" r="3"/><path d="m9 10 6-4m-6 8 6 4"/> @break
        @case('aset') <path d="M3 7V5a2 2 0 0 1 2-2h5l3 3h6a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><path d="m7 17 3-4 3 3 2-2 3 3"/> @break
        @case('konten') <rect x="4" y="3" width="16" height="18" rx="2"/><path d="M8 7h8M8 11h8m-8 4h5"/> @break
        @case('panah') <path d="M5 12h14m-5-5 5 5-5 5"/> @break
        @case('menu') <path d="M4 6h16M4 12h16M4 18h16"/> @break
        @case('tutup') <path d="m6 6 12 12M6 18 18 6"/> @break
        @case('kalender') <rect x="3" y="5" width="18" height="16" rx="2"/><path d="M7 3v4m10-4v4M3 11h18m-13 4h2m4 0h2"/> @break
        @case('grafik') <path d="M4 3v17h17M8 15l4-5 4 3 5-7"/> @break
        @case('info') <circle cx="12" cy="12" r="9"/><path d="M12 11v6m0-10v.1"/> @break
        @case('dompet') <rect x="3" y="5" width="18" height="15" rx="2"/><path d="M3 8h18m0 4h-6v5h6m-3-2.5h.1"/> @break
    @endswitch
</svg>
