# Issues

Catat masalah berdasarkan hasil pengamatan. Jangan menandai dugaan sebagai bug terkonfirmasi.

| ID | Ringkasan | Prioritas | Status | Dampak |
| --- | --- | --- | --- | --- |
| ISSUE-001 | Installer Boost gagal membuat direktori skill Codex di `.agents/skills` | P2 | closed | Sinkronisasi ulang berhasil; kelima skill Codex tersedia |

## ISSUE-001

- Tanggal: 2026-09-15
- Lingkungan: Windows, PHP 8.5.7, Laravel Boost 2.9.0.
- Perintah: `php artisan boost:install --no-interaction`.
- Aktual: installer melaporkan `Failed to create directory` untuk `.agents/skills/infer-conventions`.
- Harapan: skill Codex tersalin ke `.agents/skills`.
- Penyebab: belum dipastikan; perlu memeriksa izin tulis.
- Penyelesaian: setelah folder `.agents` tersedia, `php artisan boost:install --skills --no-interaction` berhasil. Kelima file SKILL.md telah diverifikasi tersedia di `.agents/skills`.

## Template issue

- ID: ISSUE-xxx
- Judul:
- Status: open / investigating / blocked / resolved / closed
- Prioritas: P0 / P1 / P2 / P3
- Task terkait:
- Lingkungan dan versi:
- Langkah reproduksi:
  1. ...
- Hasil yang diharapkan:
- Hasil aktual:
- Bukti / log tanpa rahasia:
- Dampak:
- Penyebab terkonfirmasi:
- Solusi / workaround:
- Verifikasi setelah perbaikan:
- Penanggung jawab:

Gunakan `resolved` setelah perbaikan tersedia dan `closed` setelah hasilnya diverifikasi.


## ISSUE-002 — Database lokal belum tersedia

- Status: open; pratinjau memiliki workaround.
- Dampak awal: sesi berbasis database menyebabkan HTTP 500.
- Workaround: `.env` memakai `SESSION_DRIVER=file`; enam halaman telah diverifikasi HTTP 200.
- Tindak lanjut: siapkan database dan migrasi pada tahap data; evaluasi kembali driver sesi saat autentikasi diimplementasikan.

## ISSUE-003 — Pemeriksaan visual browser tertunda

- Status: open.
- Bukti: runtime browser berhenti saat inisialisasi pada dua percobaan.
- Dampak: tampilan dan interaksi drawer belum diverifikasi langsung pada viewport desktop/mobile.
- Verifikasi yang tersedia: kompilasi Blade, build frontend, dua tes bawaan, dan HTTP 200 untuk seluruh menu.