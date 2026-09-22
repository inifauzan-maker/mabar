# To-do Aplikasi Marketing

Diperbarui: 2026-09-15. Acuan status utama: [TASKLIST.md](TASKLIST.md).

## Perencanaan selesai

- [x] TODO-001 / TASK-001: Siapkan dokumen dasar kerja AI.
- [x] TODO-002 / TASK-002: Catat lima modul dan arahan visual dari pengguna.
- [x] TODO-003 / TASK-002: Catat aturan nama file aplikasi berbahasa Indonesia.
- [x] TODO-004 / TASK-003: Susun urutan implementasi beserta kriteria selesai.

## 1. Fondasi dan keputusan rancangan — TASK-004

- [ ] Audit struktur Laravel, frontend, autentikasi, database, dan komponen yang sudah tersedia.
- [ ] Lengkapi REQUIREMENTS.md berdasarkan lingkup pada tasklist sebelum implementasi.
- [ ] Tetapkan pendekatan gaya Ant Design: warna primer biru, permukaan netral, kartu ringkasan, tabel rapi, badge status, filter, formulir, dan hierarki tipografi.
- [ ] Tentukan stack UI berdasarkan proyek yang ada dan catat dependensi tambahan bila diperlukan.
- [ ] Tetapkan matriks izin administrator, manajer, dan staf serta batas akses per penanggung jawab.
- [ ] Tetapkan status kampanye, tahapan prospek, status konten, serta aturan perpindahannya.
- [ ] Tetapkan mata uang, zona waktu, definisi konversi, dan aturan filter periode dashboard.

## 2. Kerangka antarmuka — TASK-005

- [x] Siapkan halaman Dasbor, Kampanye, Prospek, Media Sosial, Aset Digital, dan Konten sebagai placeholder.
- [x] Buat navigasi samping desktop, menu drawer pada ponsel, header, judul halaman, dan breadcrumb.
- [ ] Buat komponen tombol, input, pilihan, kartu statistik, tabel, pagination, badge, dialog, dan notifikasi.
- [ ] Tentukan pola tabel pada ponsel: ringkasan kartu atau scroll lokal dengan tindakan tetap mudah dijangkau.
- [ ] Siapkan kondisi kosong, pemuatan bila relevan, kesalahan, dan konfirmasi tindakan.

## 3. Akses dan data — TASK-006, TASK-007

- [ ] Siapkan masuk, keluar, proteksi sesi, dan pemeriksaan izin di server.
- [ ] Rancang tabel pengguna/peran, kampanye, prospek, tindak lanjut, akun sosial, metrik sosial, aset, konten, dan relasinya.
- [ ] Tetapkan validasi, indeks, foreign key, aturan arsip/hapus, dan pencatatan pembuat/pengubah.
- [ ] Siapkan data contoh pengembangan yang jelas terpisah dari data produksi.

## 4. Ads/Kampanye — TASK-008

- [ ] Buat daftar, pencarian, filter kanal/status/periode, dan pagination kampanye.
- [ ] Buat formulir nama, tujuan, kanal iklan, periode, anggaran, realisasi, status, dan penanggung jawab.
- [ ] Buat detail kampanye dengan prospek dan konten terkait.
- [ ] Validasi tanggal akhir, nominal nonnegatif, serta perubahan status; sediakan arsip kampanye.

## 5. Leads/Prospek — TASK-009

- [ ] Buat daftar prospek dan filter sumber, kampanye, tahap, serta penanggung jawab.
- [ ] Buat formulir nama, kontak, perusahaan opsional, sumber, dan kampanye opsional.
- [ ] Tentukan deteksi duplikasi email/nomor telepon dan pesan penanganannya.
- [ ] Buat detail dengan catatan aktivitas dan jadwal tindak lanjut.
- [ ] Kelola tahap prospek dan catat waktu perubahan untuk perhitungan konversi.

## 6. Aset Digital — TASK-010

- [ ] Buat unggahan dengan batas ukuran, tipe file, dan pemeriksaan izin.
- [ ] Catat nama, kategori, tag, deskripsi, pemilik, dan metadata file.
- [ ] Buat tampilan grid/daftar, pencarian, filter, pratinjau, dan unduh terlindungi.
- [ ] Tautkan aset ke konten/kampanye; cegah penghapusan yang merusak referensi aktif.

## 7. Media Sosial — TASK-011

- [ ] Kelola nama akun, platform, tautan profil, penanggung jawab, dan status.
- [ ] Catat metrik manual bertanggal seperti pengikut, jangkauan, dan interaksi, dengan sumber jelas.
- [ ] Buat detail akun berisi ringkasan metrik dan konten terkait.
- [ ] Tampilkan keterangan bahwa koneksi platform dan sinkronisasi otomatis belum diaktifkan.

## 8. Konten — TASK-012

- [ ] Buat daftar konten dengan filter kanal, status, kampanye, dan penanggung jawab.
- [ ] Buat editor judul, ringkasan/caption, jenis konten, aset, akun tujuan, dan jadwal.
- [ ] Terapkan alur ide, draf, tinjauan, disetujui, dijadwalkan, dan terbit dengan izin yang sesuai.
- [ ] Buat kalender serta tampilan agenda pada ponsel.
- [ ] Sediakan penandaan terbit manual dan tautan publikasi; status dijadwalkan tidak mengirim posting otomatis.

## 9. Dashboard — TASK-013

- [ ] Buat filter periode yang memengaruhi seluruh widget terkait secara konsisten.
- [ ] Tampilkan jumlah kampanye aktif, belanja iklan, prospek baru, tingkat konversi, dan konten terjadwal.
- [ ] Definisikan tingkat konversi beserta pembilang, penyebut, dan periode; tangani penyebut nol.
- [ ] Buat grafik tren prospek/belanja, ringkasan kampanye, dan distribusi tahapan prospek.
- [ ] Tampilkan jadwal konten berikutnya dan tindak lanjut prospek yang jatuh tempo.
- [ ] Pastikan kartu/grafik dapat ditelusuri ke daftar terkait dan tidak menampilkan angka fiktif saat data kosong.

## 10. Responsivitas dan verifikasi — TASK-014, TASK-015

- [ ] Periksa halaman utama pada lebar 360, 390, 768, 1024, dan 1440 px.
- [ ] Pastikan tidak ada scroll horizontal halaman; scroll tabel hanya di dalam wadahnya bila diperlukan.
- [ ] Periksa form, drawer, dialog, kalender, dan grafik pada ponsel; target sentuh utama minimal 44 x 44 px.
- [ ] Periksa label, kontras, fokus terlihat, navigasi keyboard, dan pesan kesalahan.
- [ ] Uji izin, CRUD, validasi, unggahan, relasi data, perubahan status, dan perhitungan KPI.
- [ ] Uji alur kampanye → prospek → tindak lanjut serta aset → konten → jadwal → penandaan terbit.
- [ ] Jalankan tes yang relevan dan build frontend; catat hasil dan keterbatasan yang ditemukan.
- [ ] Perbarui TASKLIST.md, TODO.md, dan ISSUES.md sesuai hasil aktual.

## Tahap lanjutan — TASK-016

- [ ] Tentukan kebutuhan integrasi Meta Ads, Google Ads, atau platform sosial berdasarkan pilihan pengguna.
- [ ] Rancang autentikasi provider, izin, sinkronisasi, pemetaan metrik, retry, dan pencegahan duplikasi.
- [ ] Evaluasi publikasi otomatis, impor/ekspor, notifikasi, dan laporan lanjutan sesuai prioritas berikutnya.

## Catatan serah terima

- Selesai: dashboard awal, navigasi, dan lima halaman placeholder.
- Implementasi aplikasi: kerangka UI tersedia; fitur bisnis belum dimulai.
- Langkah berikutnya: pemeriksaan visual desktop/mobile, lalu menyelesaikan keputusan TASK-004 sebelum implementasi fitur bisnis.
- Stack placeholder: Blade dan Tailwind. Matriks peran, definisi metrik, dan provider integrasi masih terbuka.
