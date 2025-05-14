# PHP-Crud-library-app

Baik disini saya akan mencoba membuat app crud dengan tema perpustakaan dengan basic php menggunakan mysqli.
1. Pendahuluan
Aplikasi ini adalah sistem CRUD sederhana bertema perpustakaan, dikembangkan menggunakan PHP (native) dan MySQLi (Object-Oriented). Aplikasi ini memungkinkan pengguna untuk menambahkan, melihat, mengedit, dan menghapus data buku secara efisien melalui antarmuka berbasis web.

2. Style MySQLi yang Digunakan
Aplikasi ini menggunakan MySQLi gaya Object-Oriented dengan dukungan Prepared Statements. Pemilihan style ini didasarkan pada:

Struktur kode yang lebih rapi dan modular.

Keamanan lebih baik, terutama untuk mencegah SQL Injection.

Pengelolaan koneksi dan eksekusi query yang lebih efisien.

3. Struktur Database
Nama Database: perpustakaan
Nama Tabel: buku

| Kolom       | Tipe Data    | Keterangan                  |
| ----------- | ------------ | --------------------------- |
| `id`        | INT          | Primary Key, Auto Increment |
| `kode_buku` | VARCHAR(25)  | Kode unik buku              |
| `judul`     | VARCHAR(255) | Judul buku                  |
| `pengarang` | VARCHAR(255) | Nama pengarang buku         |
| `penerbit`  | VARCHAR(255) | Nama penerbit buku          |


Struktur ini mendukung identifikasi buku secara unik serta penyimpanan metadata dasar tentang setiap buku.

4. Alur Kerja Aplikasi
Tampilan Awal
Menampilkan daftar semua buku dalam bentuk tabel.

Menyediakan form input untuk menambah atau mengedit data buku.

Tambah Buku (Create)
Pengguna mengisi form: kode_buku, judul, pengarang, dan penerbit.

Setelah menekan tombol Simpan, data dikirim ke database menggunakan prepared statement.

Lihat Buku (Read)
Semua data dari tabel buku ditampilkan dalam tabel HTML.

Kolom aksi menyediakan tombol Edit dan Delete untuk setiap entri.

Edit Buku (Update)
Tombol Edit akan memuat data ke form.

Setelah diubah, data disimpan kembali ke database dengan query UPDATE.

Hapus Buku (Delete)
Tombol Delete akan menghapus data dari database setelah konfirmasi pengguna.

Menggunakan query DELETE dengan prepared statement.

Validasi dan Feedback
Aplikasi memberikan notifikasi sukses atau gagal setelah setiap operasi.

Setelah tindakan, pengguna diarahkan kembali ke halaman utama dengan refresh otomatis.
