# PHP-Crud-library-app

Baik disini saya akan mencoba membuat app crud dengan tema perpustakaan dengan basic php menggunakan mysqli.

1. Style MySQLi yang Digunakan
Aplikasi ini menggunakan MySQLi dengan gaya Object-Oriented, yang dipadukan dengan prepared statements. Pendekatan ini meningkatkan keamanan aplikasi, terutama dalam mencegah serangan SQL Injection. Gaya ini juga memudahkan pengelolaan koneksi dan query karena bersifat lebih terstruktur dibanding gaya prosedural.

2. Struktur Database
Nama database: perpustakaan

Tabel: buku

Nama Kolom	Tipe Data	Keterangan
id	INT	Primary Key, Auto Increment
kode_buku	VARCHAR(25)	Kode unik untuk setiap buku
judul	VARCHAR(255)	Judul buku
pengarang	VARCHAR(255)	Nama pengarang buku
penerbit	VARCHAR(255)	Nama penerbit buku

Struktur ini dirancang agar data buku dapat disimpan dengan informasi lengkap dan dapat diidentifikasi secara unik.

3. Alur Kerja Aplikasi
Tampilan Awal

Menampilkan daftar buku dari database dalam bentuk tabel.

Menyediakan form input untuk menambah atau mengedit buku.

Tambah Buku (Create)

Pengguna mengisi form data buku dan menekan tombol simpan.

Data yang dimasukkan akan disimpan ke dalam database.

Lihat Buku (Read)

Tabel di halaman utama menampilkan semua data buku yang tersedia.

Tersedia tombol Edit dan Delete untuk setiap baris data.

Edit Buku (Update)

Saat tombol Edit diklik, data buku dimuat ke dalam form.

Pengguna dapat mengubah dan menyimpan data yang diperbarui.

Hapus Buku (Delete)

Tombol Delete akan menghapus data buku yang dipilih setelah konfirmasi.

Data dihapus dari database secara permanen.

Validasi dan Feedback

Aplikasi menampilkan pesan notifikasi (sukses atau error) berdasarkan aksi pengguna.

Setelah aksi selesai, pengguna diarahkan kembali ke halaman utama.
