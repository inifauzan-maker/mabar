# Tasklist Aplikasi Marketing

Diperbarui: 2026-09-15. Tahap saat ini: kerangka antarmuka dan navigasi placeholder sudah diimplementasikan.

## Arahan pengguna

- Aplikasi mengelola Ads/Kampanye, Leads, Media Sosial, Digital Asset, dan Konten.
- Dashboard menggunakan gaya visual Ant Design, responsif dan mobile friendly.
- Nama file aplikasi yang dibuat menggunakan bahasa Indonesia.
- Arahan lanjutan: implementasikan dashboard dan menu sidebar dengan halaman placeholder terlebih dahulu.

## Asumsi rancangan awal

- Pengguna utama adalah tim marketing. Peran awal yang diusulkan: administrator, manajer marketing, dan staf.
- MVP menggunakan pengelolaan data internal/manual. Sinkronisasi platform iklan, publikasi otomatis media sosial, serta metrik langsung dari platform menjadi tahap lanjutan setelah kebutuhan akses API ditentukan.
- Gaya Ant Design menjadi acuan tampilan. Pemakaian pustaka Ant Design atau pendekatan lain ditentukan setelah audit frontend; belum ada persetujuan penambahan dependensi.
- Angka dashboard berasal dari data tersimpan. Data contoh untuk pengembangan diberi label dan tidak dianggap data bisnis nyata.

## Daftar pekerjaan

Status: `backlog`, `ready`, `in_progress`, `blocked`, `done`. Prioritas: P1 tinggi, P2 normal, P3 rendah.

| ID | Pekerjaan | Prioritas | Status | Kriteria selesai | Dependensi |
| --- | --- | --- | --- | --- | --- |
| TASK-001 | Menyiapkan dokumen kerja AI | P2 | done | Dokumen dasar tersedia di `.agents` | - |
| TASK-002 | Mencatat lingkup aplikasi Marketing | P1 | done | Lima modul, gaya visual, responsivitas, dan penamaan dicatat; asumsi dibedakan dari arahan | - |
| TASK-003 | Menyusun tasklist dan to-do aplikasi | P1 | done | Tahapan, dependensi, checklist, dan kriteria selesai tersedia | TASK-002 |
| TASK-004 | Memeriksa fondasi proyek dan menetapkan rancangan | P1 | ready | Stack, skema data, peran, status bisnis, dan definisi metrik terdokumentasi | TASK-003 |
| TASK-005 | Menyiapkan sistem visual dan kerangka halaman | P1 | in_progress | Navigasi, header, komponen dasar, dan tata letak desktop/mobile konsisten dengan gaya Ant Design | TASK-004 |
| TASK-006 | Menyiapkan autentikasi dan hak akses | P1 | backlog | Pengguna dapat masuk/keluar; akses data dan tindakan diperiksa di server sesuai peran | TASK-004 |
| TASK-007 | Menyiapkan skema dan relasi data marketing | P1 | backlog | Relasi kampanye, prospek, akun sosial, aset, konten, dan pengguna tervalidasi; migrasi dapat diuji pada database pengujian | TASK-004 |
| TASK-008 | Membangun manajemen Ads/Kampanye | P1 | backlog | Buat, lihat, ubah, arsipkan kampanye; kelola kanal, periode, tujuan, anggaran, realisasi, status, dan penanggung jawab | TASK-005, TASK-006, TASK-007 |
| TASK-009 | Membangun manajemen Leads/Prospek | P1 | backlog | Kelola prospek, sumber/kampanye, penanggung jawab, tahap, catatan, dan jadwal tindak lanjut; duplikasi ditangani | TASK-008 |
| TASK-010 | Membangun pustaka Aset Digital | P1 | backlog | Unggah, cari, filter, pratinjau, unduh sesuai izin; tipe/ukuran file dibatasi dan pemakaian aset terlacak | TASK-005, TASK-006, TASK-007 |
| TASK-011 | Membangun manajemen Media Sosial | P2 | backlog | Kelola profil akun/kanal dan catatan metrik bertanggal; hubungan dengan konten tersedia tanpa mengklaim koneksi API aktif | TASK-005, TASK-006, TASK-007 |
| TASK-012 | Membangun manajemen Konten dan kalender | P1 | backlog | Kelola ide, draf, tinjauan, persetujuan, jadwal, serta penandaan terbit manual; tautkan kampanye, akun, dan aset | TASK-008, TASK-010, TASK-011 |
| TASK-013 | Membangun dashboard ringkasan marketing | P1 | backlog | Filter tanggal konsisten; kartu KPI, tren, ringkasan kampanye, tahapan prospek, konten mendatang, dan tindak lanjut bersumber dari data nyata | TASK-009, TASK-012 |
| TASK-014 | Menyempurnakan responsivitas dan aksesibilitas | P1 | backlog | Semua halaman utama dapat dipakai pada lebar 360, 390, 768, 1024, dan 1440 px; navigasi keyboard dan label form diperiksa | TASK-013 |
| TASK-015 | Memverifikasi alur bisnis dan kesiapan MVP | P1 | backlog | Tes relevan dan build berhasil; alur lintas modul terverifikasi; issue dan dokumentasi diperbarui | TASK-014 |
| TASK-016 | Merencanakan integrasi platform eksternal | P3 | backlog | Provider, izin API, batas penggunaan, biaya, sinkronisasi, dan mekanisme kegagalan ditentukan sebelum implementasi | TASK-015 |

## Penamaan file berbahasa Indonesia

- Contoh halaman: `dasbor.blade.php`, `kampanye/daftar.blade.php`, `prospek/detail.blade.php`, `aset-digital/unggah.blade.php`, `media-sosial/daftar.blade.php`, `konten/kalender.blade.php`.
- Contoh kelas/domain: `Kampanye.php`, `Prospek.php`, `AsetDigital.php`, `AkunMediaSosial.php`, `Konten.php`, `PengendaliKampanye.php`.
- Contoh komponen: `kartu-statistik.blade.php`, `navigasi-samping.blade.php`, `filter-periode.blade.php`.
- Contoh pengujian: `PengujianKampanye.php`; penemuan pengujian harus mengikuti konfigurasi test runner.
- Pertahankan nama file wajib framework/tooling, seperti `composer.json`, `package.json`, dan `web.php`. Nama file harus sesuai nama kelas dan autoload bila berlaku.
- Contoh Blade berlaku jika hasil audit memilih Blade; jika stack lain dipilih, pertahankan nama domain Indonesia dengan ekstensi yang sesuai.

## Kriteria selesai bersama

- CRUD menyimpan data, memvalidasi input, menampilkan kesalahan dengan jelas, dan memeriksa izin di server.
- Daftar memiliki pencarian, filter, pagination, kondisi kosong, dan penanganan kegagalan.
- Pengarsipan/penghapusan memperhatikan relasi dan meminta konfirmasi pada tindakan destruktif.
- Antarmuka berbahasa Indonesia, tanggal/mata uang konsisten, dan nyaman dipakai pada layar kecil.
- Hasil verifikasi dicatat; status `done` hanya diberikan setelah kriteria terkait terpenuhi.

## Hasil tahap placeholder

- Selesai: layout Blade, dashboard tanpa data fiktif, sidebar enam menu, lima halaman placeholder, serta drawer navigasi ponsel berbasis dialog.
- Stack tahap ini: Blade, Tailwind yang sudah terpasang, dan JavaScript biasa. Gaya visual mengikuti arahan Ant Design.
- Data modul terpusat di `config/modul.php`; belum ada CRUD, autentikasi, atau integrasi platform.
- Pemeriksaan: build Vite berhasil, dua tes bawaan lulus, enam halaman memberikan HTTP 200, dan template Blade berhasil dikompilasi.
- Pemeriksaan visual/interaksi browser belum selesai karena runtime browser gagal dimulai; TASK-014 tetap backlog.
- Sesi lokal menggunakan file karena database lokal yang dikonfigurasi belum tersedia. Konfigurasi koneksi database tidak diubah.
- TASK-005 tetap in_progress karena komponen formulir/tabel interaktif dan pemeriksaan visual penuh belum masuk tahap ini.