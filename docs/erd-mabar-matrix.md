# Matriks ERD Mabar Marketing

## 1. Entitas dan atribut utama

| Entitas | Primary Key | Foreign Key | Atribut penting | Keterangan |
|---|---|---|---|---|
| users | id | - | name, email, password, role | Pengguna aplikasi, termasuk Direksi, Marketing, Keuangan, dll. |
| campaigns | id | created_by -> users.id | name, channel, budget, status | Kampanye pemasaran yang dijalankan. |
| prospects | id | assigned_to -> users.id, campaign_id -> campaigns.id | name, source, stage | Lead/prospek yang sedang ditindaklanjuti. |
| social_accounts | id | owner_id -> users.id | name, platform, status | Akun media sosial brand/perusahaan. |
| digital_assets | id | owner_id -> users.id | name, file_type, category | Aset digital seperti gambar, video, desain. |
| contents | id | created_by -> users.id, campaign_id -> campaigns.id, social_account_id -> social_accounts.id | title, channel, schedule, status | Konten yang akan dipublikasikan. |
| roles | id | - | name, slug | Master role sistem. |
| users_roles | id | user_id -> users.id, role_id -> roles.id | - | Hubungan many-to-many antara user dan role. |

## 2. Matriks relasi

| Entitas A | Relasi | Entitas B | Kardinalitas | Penjelasan |
|---|---|---|---|---|
| users | membuat | campaigns | 1:N | Satu user bisa membuat banyak kampanye. |
| users | mengelola | prospects | 1:N | Satu user bisa ditugaskan banyak prospek. |
| campaigns | memiliki | prospects | 1:N | Satu kampanye bisa memiliki banyak prospek. |
| users | memiliki | social_accounts | 1:N | Satu user bisa punya banyak akun sosial. |
| users | memiliki | digital_assets | 1:N | Satu user bisa punya banyak aset digital. |
| users | membuat | contents | 1:N | Satu user bisa membuat banyak konten. |
| campaigns | berhubungan dengan | contents | 1:N | Satu kampanye dapat mendukung banyak konten. |
| social_accounts | menampung | contents | 1:N | Satu akun sosial bisa memiliki banyak konten. |
| users | punya | roles | N:M | Melalui tabel users_roles. |
| roles | dipegang oleh | users | N:M | Melalui tabel users_roles. |

## 3. Ringkasan konsep bisnis

- User dapat memiliki satu atau banyak peran sesuai kebutuhan organisasi.
- Kampanye dipimpin oleh user tertentu dan dapat menghasilkan banyak prospek.
- Prospek dapat terhubung dengan campaign tertentu dan ditugaskan ke user.
- Konten dibuat berdasarkan campaign dan dapat dikaitkan ke media sosial tertentu.
- Aset digital dikelola oleh owner user untuk menunjang kampanye dan konten.

## 4. Catatan implementasi

Untuk Laravel, struktur paling praktis adalah:

- `users` untuk akun login.
- `roles` untuk master role.
- `users_roles` untuk menghubungkan user dan role.
- `campaigns`, `prospects`, `social_accounts`, `digital_assets`, `contents` sebagai entitas bisnis utama.

Jika dibutuhkan, file ERD ini dapat dikembangkan ke diagram yang lebih detail dengan tabel `approvals`, `tasks`, `comments`, atau `notifications`.
