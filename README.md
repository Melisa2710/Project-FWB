judul : Sistem Pemesanan Makanan

Nama : Melisa
Nim  : D0223302


Framework Web Based
2025

Aplikasi ini memungkinkan pengguna melakukan pemesanan makanan secara online. Sistem dibagi menjadi beberapa role pengguna dengan akses dan fitur yang berbeda. Data disimpan dalam basis data dengan relasi antar tabel seperti users, menus, dan orders. Sistem ini mendukung tiga jenis role pengguna:

- **Admin**
Admin memiliki akses penuh terhadap sistem dan bertanggung jawab atas pengelolaan data, menu, dan pemantauan transaksi.

- **Akses & Fitur**:
  - **Mengelola Data User (users)**:
     - **Tambah, edit, hapus pengguna**.
     - **Menentukan peran (role): admin, chef, customer**.
  - **Mengelola Menu Makanan (menus)**:
     - **Tambah, ubah, dan hapus menu makanan**.
     - **Tentukan nama, deskripsi, dan harga makanan**.
  - **Melihat & Mengelola Semua Pesanan (orders)**:
     - **Pantau semua pesanan dari semua user**.
     - **Lihat status pesanan (pending, diproses, selesai).**
  - **Melihat Status Pembayaran (payments)**:
     - **Periksa apakah pembayaran telah dilakukan**.
     - **Lihat metode pembayaran dan statusnya**.
  - **Melihat dan Mengelola Pengiriman (deliveries)**:
     - **Atur status pengiriman (dikirim, selesai)**.
     - **Update data kurir dan pelacakan**.
  - **Melihat Feedback (feedback)**:
     - **Tinjau ulasan dan rating dari pelanggan**.
     - **Gunakan untuk evaluasi kualitas makanan dan pelayanan**.

- **Chef**
Chef berperan dalam proses produksi makanan.

- **Akses & Fitur**:
  - **Melihat Daftar Pesanan (orders)**:
     - **Lihat pesanan yang harus diproses**.
     - **Detail makanan yang dipesan**.
  - **Update Status Pesanan**:
     - **Ubah status dari pending ke diproses, lalu selesai**.
  - **Fokus pada Proses Produksi**:
     - **Tidak dapat mengakses manajemen pengguna, pembayaran, atau feedback**.

- **Customer**
Customer adalah pengguna akhir yang memesan makanan melalui aplikasi.

- **Akses & Fitur**:
  - **Melihat Daftar Menu (menus)**:
     - **Telusuri makanan berdasarkan nama, deskripsi, dan harga**.
  - **Melakukan Pemesanan (orders)**:
     - **Pesan makanan dari daftar menu**.
     - **Tentukan jumlah dan lihat estimasi biaya**.
  - **Melihat Status Pesanan (orders)**:
     - **Pantau apakah pesanan sedang diproses atau sudah selesai**.
  - **Melakukan Pembayaran (payments)**:
     - **Bayar pesanan melalui metode yang disediakan**.
     - **Lihat status pembayaran (paid, pending, failed)**.
  - **Melacak Pengiriman (deliveries)**:
     - **Cek status pengiriman dan nomor resi jika tersedia**.
  - **Memberi Feedback/Ulasan (feedback)**:
     - **Beri rating dan komentar setelah menerima pesanan**.
     - **Ulasan disimpan dan dapat dilihat admin**.




Fitur Utama Aplikasi Pemesanan Makanan:
Aplikasi ini dirancang untuk memfasilitasi proses pemesanan makanan secara daring, baik untuk pelanggan, chef, maupun admin. Sistem ini memanfaatkan manajemen peran dan autentikasi untuk memastikan akses fitur sesuai tanggung jawab masing-masing pengguna.

## Fitur Utama
1. Autentikasi Pengguna
Pengguna dapat mendaftar, masuk, dan mengelola akun mereka.
Setiap pengguna memiliki peran (role): customer, chef, atau admin.
- Login & Registrasi aman.
- Halaman profil pengguna.
- Hak akses disesuaikan dengan peran masing-masing.

2. Pemesanan Makanan oleh Customer
- Customer (pelanggan) memiliki akses untuk:
- Melihat daftar menu makanan.
- Melakukan pemesanan makanan (tabel: orders).
- Melihat status pesanan (misal: pending, diproses, selesai dari tabel orders).
- Mengisi umpan balik (tabel: feedback) setelah makanan diterima.
- Melakukan pembayaran dan melihat status pembayaran (tabel: payments).
- Melacak status pengiriman makanan (tabel: deliveries).

3. Manajemen Pesanan oleh Chef
- Chef hanya berfokus pada produksi makanan, tidak mengelola pengguna atau menu.
- Melihat daftar pesanan masuk (tabel orders).
- Mengubah status pesanan (misalnya dari diproses ke selesai).
- Melihat detail menu yang dipesan.

4. Manajemen Menu oleh Admin
- Admin memiliki akses penuh ke manajemen menu makanan (tabel: menus):
- Membuat, memperbarui, dan menghapus menu.
- Menentukan nama makanan, harga, dan deskripsi.
- Menyusun tampilan daftar menu agar selalu relevan.

5. Manajemen Pembayaran oleh Customer & Admin
- Sistem mencatat dan mengelola data pembayaran (tabel: payments):
- Customer dapat melakukan pembayaran setelah memesan.
- Admin dapat melihat dan mengelola status pembayaran (pending, paid, failed).

6. Manajemen Pengiriman oleh Admin
- Pengiriman makanan dicatat pada tabel deliveries.
- Admin mengelola alamat pengiriman, status pengiriman, dan info kurir.
- Customer dapat melihat status pengiriman seperti: processing, shipped, delivered.

7. Feedback atau Umpan Balik oleh Customer
- Customer dapat memberikan rating dan komentar setelah pesanan selesai (tabel: feedback):
- Feedback dikaitkan ke menu makanan dan pesanan.
- Admin dapat melihat semua feedback untuk keperluan evaluasi kualitas layanan dan makanan.

8. Role Management
- **Customer**:
- Lihat menu.
- Pesan makanan.
- Lihat status pesanan.
- Lakukan pembayaran & beri feedback.

- **Chef**:
- Lihat pesanan.
- Update status pesanan.
- Tidak bisa akses manajemen pengguna/menu.

- **Admin**:
- Kelola semua menu, pesanan, pengiriman, pembayaran, dan pengguna.
- Lihat semua feedback.


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tabel Database</title>
  <style>
    table {
      border-collapse: collapse;
      margin-bottom: 40px;
      width: 100%;
    }
    th, td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
    caption {
      font-weight: bold;
      font-size: 1.2em;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>

  <!-- Tabel Users -->
  <table>
    <caption>Users</caption>
    <thead>
      <tr>
        <th>Field</th>
        <th>Deskripsi</th>
      </tr>
    </thead>
    <tbody>
      <tr><td>id</td><td>Primary key (auto increment).</td></tr>
      <tr><td>name</td><td>Nama lengkap pengguna.</td></tr>
      <tr><td>email</td><td>Alamat email pengguna (unik).</td></tr>
      <tr><td>password</td><td>Kata sandi (terenkripsi).</td></tr>
      <tr><td>role</td><td>Peran pengguna: <code>admin</code>, <code>chef</code>, atau <code>customer</code>.</td></tr>
      <tr><td>created_at</td><td>Waktu saat data dibuat.</td></tr>
      <tr><td>updated_at</td><td>Waktu saat data diperbarui.</td></tr>
    </tbody>
  </table>

  <!-- Tabel Menus -->
  <table>
    <caption>Menus</caption>
    <thead>
      <tr>
        <th>Field</th>
        <th>Deskripsi</th>
      </tr>
    </thead>
    <tbody>
      <tr><td>id</td><td>Primary key.</td></tr>
      <tr><td>nama_makanan</td><td>Nama dari makanan.</td></tr>
      <tr><td>harga</td><td>Harga dari makanan tersebut.</td></tr>
      <tr><td>deskripsi</td><td>Deskripsi singkat tentang makanan.</td></tr>
      <tr><td>created_at</td><td>Timestamp data dibuat.</td></tr>
      <tr><td>updated_at</td><td>Timestamp data diperbarui.</td></tr>
    </tbody>
  </table>

  <!-- Tabel Orders -->
  <table>
    <caption>Orders</caption>
    <thead>
      <tr>
        <th>Field</th>
        <th>Deskripsi</th>
      </tr>
    </thead>
    <tbody>
      <tr><td>id</td><td>Primary key.</td></tr>
      <tr><td>user_id</td><td>Foreign key dari tabel <code>users</code>. Menunjukkan siapa yang memesan.</td></tr>
      <tr><td>menu_id</td><td>Foreign key dari tabel <code>menus</code>. Menunjukkan makanan apa yang dipesan.</td></tr>
      <tr><td>status</td><td>Status pesanan: <code>pending</code>, <code>processing</code>, <code>completed</code>, <code>cancelled</code>, dll.</td></tr>
      <tr><td>created_at</td><td>Waktu saat pesanan dibuat.</td></tr>
      <tr><td>updated_at</td><td>Waktu saat pesanan diperbarui.</td></tr>
    </tbody>
  </table>

 <!--Tabel payments -->
  <table>
  <caption>Payments</caption>
    <thead>
      <tr>
        <th>Field</th>
        <th>Deskripsi</th>
      </tr>
    </thead>
    <tbody>
      <tr><td>id</td><td>ID unik untuk setiap data pembayaran</td></tr>
      <tr><td>id_pesanan</td><td>ID dari pesanan yang dibayar (relasi ke orders)</td></tr>
      <tr><td>metode_pembayaran</td><td>Metode pembayaran yang digunakan (misal: transfer, e-wallet)</td></tr>
      <tr><td>jumlah</td><td>Jumlah uang yang dibayarkan</td></tr>
      <tr><td>status</td><td>Status pembayaran (pending, paid, failed)</td></tr>
      <tr><td>tanggal_pembayaran</td><td>Tanggal dan waktu pembayaran</td></tr>
      <tr><td>dibuat_pada</td><td>Tanggal data dibuat (created_at)</td></tr>
      <tr><td>diperbarui_pada</td><td>Tanggal data diperbarui (updated_at)</td></tr>
    </tbody>
  </table>

  <!--Tabel: deliveries'-->
  <table>
  <caption>deliveries</caption>
    <thead>
      <tr>
        <th>Field</th>
        <th>Deskripsi</th>
      </tr>
    </thead>
    <tbody>
      <tr><td>id</td><td>ID unik untuk setiap pengiriman</td></tr>
      <tr><td>id_pesanan</td><td>ID pesanan yang dikirim (relasi ke orders)</td></tr>
      <tr><td>status_pengiriman</td><td>Status pengiriman (processing, shipped, delivered)</td></tr>
      <tr><td>waktu_pengiriman</td><td>Waktu pengiriman dilakukan</td></tr>
      <tr><td>alamat</td><td>Alamat tujuan pengiriman</td></tr>
      <tr><td>kurir</td><td>Nama kurir atau jasa pengantar</td></tr>
      <tr><td>kode_pelacakan</td><td>Kode pelacakan pengiriman</td></tr>
      <tr><td>dibuat_pada</td><td>Tanggal data dibuat (created_at)</td></tr>
      <tr><td>diperbarui_pada</td><td>Tanggal data diperbarui (updated_at)</td></tr>
    </tbody>
  </table>

  <!--Tabel: Umpan Balik-->
  <table>
  <caption>feedback</caption>
    <thead>
      <tr>
        <th>Field</th>
        <th>Deskripsi</th>
      </tr>
    </thead>
    <tbody>
      <tr><td>id</td><td>ID unik untuk setiap umpan balik</td></tr>
      <tr><td>id_pengguna</td><td>ID pengguna yang memberikan umpan balik (relasi ke users)</td></tr>
      <tr><td>id_menu</td><td>ID menu makanan yang dinilai (relasi ke menus)</td></tr>
      <tr><td>id_pesanan</td><td>ID pesanan terkait (opsional, relasi ke orders)</td></tr>
      <tr><td>penilaian</td><td>Rating dari pengguna (1–5)</td></tr>
      <tr><td>komentar</td><td>Isi komentar dari pengguna</td></tr>
      <tr><td>dibuat_pada</td><td>Tanggal data dibuat (created_at)</td></tr>
      <tr><td>diperbarui_pada</td><td>Tanggal data diperbarui (updated_at)</td></tr>
    </tbody>
  </table>

</body>
</html>


Relasi Antar Tabel Sistem Pemesanan Makanan
1. users → orders: One-to-Many 
   Setiap pengguna dengan peran customer dapat membuat banyak pesanan.
2. orders → menus: Many-to-One
   Setiap pesanan hanya merujuk ke satu menu makanan, tetapi satu menu bisa dipesan berkali-kali oleh banyak user.
3. orders → payments: One-to-One
   Setiap pesanan memiliki satu informasi pembayaran.
4. orders → deliveries: One-to-One
   Setiap pesanan memiliki satu data pengiriman.
5. orders → feedback: One-to-Many (opsional)
   Satu pesanan bisa memiliki satu atau lebih feedback (misalnya untuk tiap menu jika multi-menu per order). Jika hanya satu menu per order, maka tetap bisa dianggap One-to-One.
6. users → feedback: One-to-Many
   Seorang user bisa memberikan banyak feedback atas pesanan atau makanan.
7. menus → feedback: One-to-Many
   Satu menu bisa menerima banyak ulasan dari berbagai user.


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
