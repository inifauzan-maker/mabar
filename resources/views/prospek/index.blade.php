@extends('tata-letak')

@section('judul', 'Input Lead / Prospek')

@section('konten')
    <div class="mb-7 flex flex-wrap items-start justify-between gap-4">
        <div>
            <p class="mb-2 text-xs font-medium uppercase tracking-[.2em] text-blue-600">Prospek</p>
            <h1 class="text-2xl font-semibold tracking-tight text-slate-900 sm:text-3xl">Input Lead / Prospek</h1>
            <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500">
                Kelola lead baru dengan struktur yang mirip dengan alur input dari sumber SIVMI CRM.
            </p>
        </div>

        <a href="{{ route('dasbor') }}" class="tombol-sekunder">
            Kembali ke dasbor
            <x-ikon nama="panah" class="size-4" />
        </a>
    </div>

    @if (session('success'))
        <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid gap-5 xl:grid-cols-[1.3fr_0.7fr]">
        <section class="panel p-5 sm:p-6">
            <div class="mb-5 flex items-center justify-between gap-3 border-b border-slate-100 pb-4">
                <div>
                    <h2 class="text-lg font-semibold text-slate-800">Data calon siswa</h2>
                    <p class="text-xs text-slate-500">Informasi utama untuk menghubungi dan mengenali calon siswa.</p>
                </div>
                <span class="rounded-full bg-blue-50 px-2.5 py-1 text-[11px] font-medium text-blue-600">Lead baru</span>
            </div>

            <form method="POST" action="{{ route('prospek.store') }}" class="space-y-5">
                @csrf

                <div class="grid gap-4 md:grid-cols-2">
                    <label class="block">
                        <span class="mb-2 block text-sm font-medium text-slate-700">Nama lengkap</span>
                        <input type="text" name="name" value="{{ old('name') }}" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100" placeholder="Contoh: Rizky Putra" required>
                        @error('name')
                            <span class="mt-1 block text-xs text-red-600">{{ $message }}</span>
                        @enderror
                    </label>

                    <label class="block">
                        <span class="mb-2 block text-sm font-medium text-slate-700">Nomor WhatsApp</span>
                        <input type="tel" name="phone" value="{{ old('phone') }}" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100" placeholder="08xxxxxxxxxx">
                        @error('phone')
                            <span class="mt-1 block text-xs text-red-600">{{ $message }}</span>
                        @enderror
                    </label>

                    <label class="block">
                        <span class="mb-2 block text-sm font-medium text-slate-700">Kota asal</span>
                        <input type="text" name="city" value="{{ old('city') }}" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100" placeholder="Contoh: Bandung">
                    </label>

                    <label class="block">
                        <span class="mb-2 block text-sm font-medium text-slate-700">Kelas sekolah saat ini</span>
                        <select name="class_level" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                            <option value="">Pilih kelas</option>
                            <option value="X" {{ old('class_level') === 'X' ? 'selected' : '' }}>X</option>
                            <option value="XI" {{ old('class_level') === 'XI' ? 'selected' : '' }}>XI</option>
                            <option value="XII" {{ old('class_level') === 'XII' ? 'selected' : '' }}>XII</option>
                            <option value="Mahasiswa" {{ old('class_level') === 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                            <option value="Umum" {{ old('class_level') === 'Umum' ? 'selected' : '' }}>Umum</option>
                        </select>
                    </label>

                    <label class="block md:col-span-2">
                        <span class="mb-2 block text-sm font-medium text-slate-700">Nama sekolah</span>
                        <input type="text" name="school_name" value="{{ old('school_name') }}" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100" placeholder="Contoh: SMAN 1 Bandung">
                    </label>
                </div>

                <div class="grid gap-4 md:grid-cols-2">
                    <label class="block">
                        <span class="mb-2 block text-sm font-medium text-slate-700">Sumber lead</span>
                        <select name="source" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                            <option value="">Pilih sumber</option>
                            <option value="Instagram" {{ old('source') === 'Instagram' ? 'selected' : '' }}>Instagram</option>
                            <option value="WhatsApp" {{ old('source') === 'WhatsApp' ? 'selected' : '' }}>WhatsApp</option>
                            <option value="Website" {{ old('source') === 'Website' ? 'selected' : '' }}>Website</option>
                            <option value="Referral" {{ old('source') === 'Referral' ? 'selected' : '' }}>Referral</option>
                            <option value="Lainnya" {{ old('source') === 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </label>

                    <label class="block">
                        <span class="mb-2 block text-sm font-medium text-slate-700">Tahap</span>
                        <select name="stage" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100" required>
                            <option value="new" {{ old('stage', 'new') === 'new' ? 'selected' : '' }}>Baru</option>
                            <option value="contacted" {{ old('stage') === 'contacted' ? 'selected' : '' }}>Dihubungi</option>
                            <option value="qualified" {{ old('stage') === 'qualified' ? 'selected' : '' }}>Qualified</option>
                            <option value="proposal" {{ old('stage') === 'proposal' ? 'selected' : '' }}>Proposal</option>
                            <option value="closed" {{ old('stage') === 'closed' ? 'selected' : '' }}>Closed</option>
                        </select>
                    </label>

                    <label class="block">
                        <span class="mb-2 block text-sm font-medium text-slate-700">Penanggung jawab</span>
                        <select name="assigned_to" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                            <option value="">Pilih PIC</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('assigned_to') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </label>

                    <label class="block">
                        <span class="mb-2 block text-sm font-medium text-slate-700">Kampanye</span>
                        <select name="campaign_id" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                            <option value="">Pilih kampanye</option>
                            @foreach($campaigns as $campaign)
                                <option value="{{ $campaign->id }}" {{ old('campaign_id') == $campaign->id ? 'selected' : '' }}>{{ $campaign->name }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>

                <label class="block">
                    <span class="mb-2 block text-sm font-medium text-slate-700">Catatan</span>
                    <textarea name="notes" rows="4" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100" placeholder="Tambahkan catatan follow-up, kebutuhan, atau kebutuhan khusus...">{{ old('notes') }}</textarea>
                </label>

                <div class="flex flex-wrap items-center justify-end gap-3 pt-2">
                    <button type="reset" class="tombol-sekunder">Reset</button>
                    <button type="submit" class="tombol-utama">Simpan lead</button>
                </div>
            </form>
        </section>

        <aside class="panel p-5 sm:p-6">
            <div class="mb-4 flex items-center justify-between">
                <h2 class="text-lg font-semibold text-slate-800">Ringkasan</h2>
                <span class="rounded-full bg-slate-100 px-2 py-1 text-[10px] font-medium text-slate-600">{{ $prospects->count() }} lead</span>
            </div>

            <ul class="space-y-3 text-sm text-slate-600">
                <li class="rounded-xl border border-slate-100 bg-slate-50 px-3 py-2">Lead baru dapat ditangani langsung oleh PIC marketing.</li>
                <li class="rounded-xl border border-slate-100 bg-slate-50 px-3 py-2">Tahapan bisa dipandu dari baru → dikontak → qualified → closed.</li>
                <li class="rounded-xl border border-slate-100 bg-slate-50 px-3 py-2">Kampanye dan penanggung jawab dapat dipetakan untuk tracking lebih rapi.</li>
            </ul>
        </aside>
    </div>

    <section class="panel mt-7 overflow-hidden">
        <div class="flex items-center justify-between gap-3 border-b border-slate-100 px-5 py-4">
            <div>
                <h2 class="text-lg font-semibold text-slate-800">Daftar prospek</h2>
                <p class="text-xs text-slate-500">Lead yang sudah masuk ke sistem</p>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-left text-sm">
                <thead class="bg-slate-50 text-xs uppercase tracking-[.08em] text-slate-500">
                    <tr>
                        <th class="px-5 py-3">Nama</th>
                        <th class="px-5 py-3">Sumber</th>
                        <th class="px-5 py-3">PIC</th>
                        <th class="px-5 py-3">Tahap</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($prospects as $prospek)
                        <tr class="hover:bg-slate-50/60">
                            <td class="px-5 py-3">
                                <div class="font-medium text-slate-800">{{ $prospek->name }}</div>
                                <div class="text-xs text-slate-500">{{ $prospek->phone ?? 'Belum ada nomor WA' }}</div>
                            </td>
                            <td class="px-5 py-3 text-slate-600">{{ $prospek->source ?? '-' }}</td>
                            <td class="px-5 py-3 text-slate-600">{{ $prospek->assignedTo?->name ?? '-' }}</td>
                            <td class="px-5 py-3">
                                <span class="rounded-full bg-blue-50 px-2.5 py-1 text-[11px] font-medium text-blue-700">{{ ucfirst($prospek->stage ?? 'new') }}</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-5 py-10 text-center text-sm text-slate-500">
                                Belum ada lead yang tersimpan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
