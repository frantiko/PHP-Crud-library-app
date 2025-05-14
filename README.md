# PHP-Crud-library-app

1. Pendahuluan
Aplikasi ini merupakan sistem CRUD sederhana bertema perpustakaan yang dikembangkan menggunakan PHP native dan MySQLi. Pengguna dapat menambahkan, melihat, mengedit, dan menghapus data buku melalui antarmuka web yang sederhana dan fungsional.

2. Style MySQLi yang Digunakan
Aplikasi ini menggunakan MySQLi gaya Object-Oriented dengan Prepared Statements. Alasan pemilihan gaya ini antara lain:

      Struktur kode lebih rapi dan terorganisir.

      Keamanan lebih baik terhadap serangan SQL Injection.

      Pengelolaan koneksi dan query lebih efisien dan terstruktur.

3. Struktur Database

   Nama Database: perpustakaan ||
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
      
      🔹 Tampilan Awal

      Menampilkan daftar semua buku dari database dalam bentuk tabel.
      
      Menyediakan form input di bagian atas untuk menambah atau mengedit data buku.
      
      🔹 Tambah Buku (Create)

      Pengguna mengisi form dengan data: kode_buku, judul, pengarang, dan penerbit.
      
      Setelah tombol Simpan ditekan, data dikirim dan disimpan ke database menggunakan prepared statement.
      
      🔹 Lihat Buku (Read)

      Semua data dari tabel buku ditampilkan dalam tabel HTML.
      
      Setiap entri memiliki tombol Edit dan Delete di kolom aksi.
      
      🔹 Edit Buku (Update)

      Pengguna dapat mengklik tombol Edit untuk memuat data ke dalam form.
      
      Setelah melakukan perubahan, data disimpan kembali ke database menggunakan perintah UPDATE dengan prepared statement.
      
      🔹 Hapus Buku (Delete)

      Tombol Delete digunakan untuk menghapus data buku dari database.
      
      Sebelum penghapusan, sistem meminta konfirmasi pengguna.
      
      Penghapusan dilakukan dengan query DELETE menggunakan prepared statement.
      
      🔹 Validasi dan Feedback

      Aplikasi menampilkan notifikasi sukses atau gagal setelah setiap aksi (tambah, edit, hapus).
      
      Setelah tindakan selesai, pengguna diarahkan kembali ke halaman utama melalui refresh otomatis

    
    
