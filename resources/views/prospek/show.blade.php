@extends('tata-letak')

@section('judul', 'Detail Prospek')

@section('konten')
    <div class="mb-7 flex flex-wrap items-start justify-between gap-4">
        <div>
            <p class="mb-2 text-xs font-medium uppercase tracking-[.2em] text-blue-600">Prospek</p>
            <h1 class="text-2xl font-semibold tracking-tight text-slate-900 sm:text-3xl">Detail Prospek</h1>
            <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500">Pantau status, penanggung jawab, dan catatan follow-up lead ini.</p>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('prospek') }}" class="tombol-sekunder">Kembali ke daftar</a>
        </div>
    </div>

    @if (session('success'))
        <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid gap-5 xl:grid-cols-[1.2fr_0.8fr]">
        <section class="panel p-5 sm:p-6">
            <div class="mb-5 flex flex-wrap items-center justify-between gap-3 border-b border-slate-100 pb-4">
                <div>
                    <h2 class="text-xl font-semibold text-slate-800">{{ $prospek->name }}</h2>
                    <p class="mt-1 text-sm text-slate-500">{{ $prospek->phone ?? 'Nomor WA belum diisi' }}</p>
                </div>
                <span class="rounded-full bg-blue-50 px-3 py-1.5 text-[11px] font-semibold uppercase tracking-[.12em] text-blue-700">
                    {{ match ($prospek->stage ?? 'new') {
                        'new' => 'Baru',
                        'contacted' => 'Dihubungi',
                        'qualified' => 'Qualified',
                        'proposal' => 'Proposal',
                        'closed' => 'Closed',
                        default => ucfirst($prospek->stage ?? 'new'),
                    } }}
                </span>
            </div>

            <div class="grid gap-4 md:grid-cols-2">
                <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                    <div class="text-[11px] font-medium uppercase tracking-[.12em] text-slate-400">Kota asal</div>
                    <div class="mt-2 text-sm font-medium text-slate-700">{{ $prospek->city ?? '-' }}</div>
                </div>
                <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                    <div class="text-[11px] font-medium uppercase tracking-[.12em] text-slate-400">Sekolah</div>
                    <div class="mt-2 text-sm font-medium text-slate-700">{{ $prospek->school_name ?? '-' }}</div>
                </div>
                <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                    <div class="text-[11px] font-medium uppercase tracking-[.12em] text-slate-400">Kelas</div>
                    <div class="mt-2 text-sm font-medium text-slate-700">{{ $prospek->class_level ?? '-' }}</div>
                </div>
                <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                    <div class="text-[11px] font-medium uppercase tracking-[.12em] text-slate-400">Sumber</div>
                    <div class="mt-2 text-sm font-medium text-slate-700">{{ $prospek->source ?? '-' }}</div>
                </div>
                <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                    <div class="text-[11px] font-medium uppercase tracking-[.12em] text-slate-400">Penanggung jawab</div>
                    <div class="mt-2 text-sm font-medium text-slate-700">{{ $prospek->assignedTo?->name ?? '-' }}</div>
                </div>
                <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                    <div class="text-[11px] font-medium uppercase tracking-[.12em] text-slate-400">Kampanye</div>
                    <div class="mt-2 text-sm font-medium text-slate-700">{{ $prospek->campaign?->name ?? '-' }}</div>
                </div>
            </div>

            <div class="mt-5 rounded-xl border border-slate-200 bg-white p-4">
                <div class="mb-2 text-[11px] font-medium uppercase tracking-[.12em] text-slate-400">Catatan</div>
                <p class="text-sm leading-6 text-slate-600">
                    {{ $prospek->notes ?: 'Belum ada catatan follow-up.' }}
                </p>
            </div>
        </section>

        <aside class="panel p-5 sm:p-6">
            <h2 class="text-lg font-semibold text-slate-800">Perbarui status</h2>
            <p class="mt-1 text-xs text-slate-500">Ubah tahapan lead sesuai perkembangan follow-up.</p>

            <form method="POST" action="{{ route('prospek.status', $prospek) }}" class="mt-5 space-y-4">
                @csrf

                <label class="block">
                    <span class="mb-2 block text-sm font-medium text-slate-700">Tahap saat ini</span>
                    <select name="stage" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                        <option value="new" {{ $prospek->stage === 'new' ? 'selected' : '' }}>Baru</option>
                        <option value="contacted" {{ $prospek->stage === 'contacted' ? 'selected' : '' }}>Dihubungi</option>
                        <option value="qualified" {{ $prospek->stage === 'qualified' ? 'selected' : '' }}>Qualified</option>
                        <option value="proposal" {{ $prospek->stage === 'proposal' ? 'selected' : '' }}>Proposal</option>
                        <option value="closed" {{ $prospek->stage === 'closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                </label>

                <button type="submit" class="tombol-utama w-full">Simpan status</button>
            </form>
        </aside>
    </div>
@endsection
