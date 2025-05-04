judul : Sistem Pemesanan Makanan


Nama : Melisa
Nim  : D0223302


Framework Web Based
2025

Aplikasi ini memungkinkan pengguna melakukan pemesanan makanan secara online. Sistem dibagi menjadi beberapa role pengguna dengan akses dan fitur yang berbeda. Data disimpan dalam basis data dengan relasi antar tabel seperti users, menus, dan orders. Sistem ini mendukung tiga jenis role pengguna:

- **Admin**: Mengelola data user (tambah/edit/hapus), Mengelola daftar menu makanan, dan Melihat semua pesanan dari customer.
- **Chef**: Melihat pesanan yang masuk, Mengupdate status pesanan (misalnya: diproses, selesai), dan Fokus pada pengelolaan proses memasak.
- **Customer**: Melihat daftar menu, Memesan makanan dari daftar menu, dan Melihat status pesanan yang mereka buat.

Fitur Utama Aplikasi Pemesanan Makanan:
Aplikasi ini dirancang untuk memfasilitasi proses pemesanan makanan secara daring, baik untuk pelanggan, chef, maupun admin. Sistem ini memanfaatkan manajemen peran dan autentikasi untuk memastikan akses fitur sesuai tanggung jawab masing-masing pengguna.

## Fitur Utama
- **Autentikasi Pengguna**: Pengguna dapat mendaftar, masuk, dan mengelola akun mereka. Sistem ini memastikan bahwa setiap pengguna memiliki akses sesuai dengan peran yang dimilikinya, yaitu sebagai customer, chef, atau admin.
- **Pemesanan Makanan oleh Pelanggan**: pelanggan dapat Melihat daftar menu makanan,Melakukan pemesanan makanan secara langsung, dan Melihat status dari pesanan mereka (misal: menunggu, diproses, selesai).
- **Manajemen Pesanan oleh Chef**: chef dapat Melihat daftar pesanan yang masuk, Mengubah status pesanan (misalnya dari diproses menjadi selesai), dan Fokus hanya pada proses produksi makanan, tidak pada manajemen menu atau pengguna.
- **Manajemen Menu oleh Admin**: Admin dapat Membuat, memperbarui, dan menghapus menu makanan, Menentukan nama makanan, harga, dan deskripsi singkat, dan Menjamin menu yang ditampilkan selalu up-to-date dan sesuai kebutuhan pelanggan.
- **Role Management**: 
Customer: Akses untuk melihat menu dan memesan makanan.
Chef: Akses untuk melihat pesanan dan memperbarui status
Admin: Akses penuh untuk mengelola menu, pengguna, dan melihat semua pesanan.

1. Users 
| Field        | Deskripsi                                         |
| ------------ | ------------------------------------------------- |
| `id`         | Primary key (auto increment).                     |
| `name`       | Nama lengkap pengguna.                            |
| `email`      | Alamat email pengguna (unik).                     |
| `password`   | Kata sandi (terenkripsi).                         |
| `role`       | Peran pengguna: `admin`, `chef`, atau `customer`. |
| `created_at` | Waktu saat data dibuat.                           |
| `updated_at` | Waktu saat data diperbarui.                       |


2. menus
| Field          | Deskripsi                          |
| -------------- | ---------------------------------- |
| `id`           | Primary key.                       |
| `nama_makanan` | Nama dari makanan.                 |
| `harga`        | Harga dari makanan tersebut.       |
| `deskripsi`    | Deskripsi singkat tentang makanan. |
| `created_at`   | Timestamp data dibuat.             |
| `updated_at`   | Timestamp data diperbarui.         |


3. orders
| Field        | Deskripsi                                                               |
| ------------ | ----------------------------------------------------------------------- |
| `id`         | Primary key.                                                            |
| `user_id`    | Foreign key dari tabel `users`. Menunjukkan siapa yang memesan.         |
| `menu_id`    | Foreign key dari tabel `menus`. Menunjukkan makanan apa yang dipesan.   |
| `status`     | Status pesanan: `pending`, `processing`, `completed`, `cancelled`, dll. |
| `created_at` | Waktu saat pesanan dibuat.                                              |
| `updated_at` | Waktu saat pesanan diperbarui.                                          |


Relasi Antar Tabel Sistem Pemesanan Makanan
1. users → orders: One-to-Many 
   Setiap pengguna dengan peran customer dapat membuat banyak pesanan.
2. orders → menus: Many-to-One
   Setiap pesanan hanya merujuk ke satu menu makanan, tetapi satu menu bisa dipesan berkali-kali oleh banyak user.
3. users → menus (khusus chef): One-to-Many
   Chef dapat bertanggung jawab mengelola atau memasak banyak menu (opsional jika sistem melibatkan menu khusus per chef).
4. users → roles: Many-to-One
   Setiap user memiliki satu peran (admin, chef, atau customer), tetapi satu role bisa dimiliki oleh banyak user.
5. orders → statuses (opsional): Many-to-One
   Setiap pesanan memiliki satu status (misalnya: pending, processed, completed), tetapi satu status bisa dimiliki oleh banyak order.


- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).



### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development/)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
