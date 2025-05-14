<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "perpustakaan";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Tidak bisa terkoneksi ke database: " . mysqli_connect_error());
}

$kode_buku = $judul = $pengarang = $penerbit = "";
$sukses = $error = "";

$op = isset($_GET['op']) ? $_GET['op'] : "";

if ($op == 'delete') {
    $id = $_GET['id'];
    $stmt = mysqli_prepare($koneksi, "DELETE FROM buku WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    if (mysqli_stmt_execute($stmt)) {
        $sukses = "Berhasil hapus data";
    } else {
        $error = "Gagal melakukan delete data";
    }
    mysqli_stmt_close($stmt);
}

if ($op == 'edit') {
    $id = $_GET['id'];
    $stmt = mysqli_prepare($koneksi, "SELECT * FROM buku WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $r1 = mysqli_fetch_array($result);
    if ($r1) {
        $kode_buku = $r1['kode_buku'];
        $judul = $r1['judul'];
        $pengarang = $r1['pengarang'];
        $penerbit = $r1['penerbit'];
    } else {
        $error = "Data tidak ditemukan";
    }
    mysqli_stmt_close($stmt);
}

if (isset($_POST['simpan'])) {
    $kode_buku = $_POST['kode_buku'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];

    if ($kode_buku && $judul && $pengarang && $penerbit) {
        if ($op == 'edit') {
            $stmt = mysqli_prepare($koneksi, "UPDATE buku SET kode_buku = ?, judul = ?, pengarang = ?, penerbit = ? WHERE id = ?");
            mysqli_stmt_bind_param($stmt, "ssssi", $kode_buku, $judul, $pengarang, $penerbit, $id);
            if (mysqli_stmt_execute($stmt)) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error = "Data gagal diupdate";
            }
            mysqli_stmt_close($stmt);
        } else {
            $stmt = mysqli_prepare($koneksi, "INSERT INTO buku (kode_buku, judul, pengarang, penerbit) VALUES (?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "ssss", $kode_buku, $judul, $pengarang, $penerbit);
            if (mysqli_stmt_execute($stmt)) {
                $sukses = "Berhasil memasukkan data baru";
            } else {
                $error = "Gagal memasukkan data";
            }
            mysqli_stmt_close($stmt);
        }
    } else {
        $error = "Silakan masukkan semua data";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Buku Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        body {
            background-color: #f4f7fa;
        }

        .container {
            margin-top: 30px;
        }

        .card {
            margin-bottom: 20px;
        }

        .btn-custom {
            background-color: #6c757d;
            color: white;
        }

        .btn-custom:hover {
            background-color: #5a6268;
            color: white;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .form-control {
            border-radius: 0.5rem;
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- Card for Create/Edit -->
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4>Create / Edit Buku</h4>
            </div>
            <div class="card-body">
                <?php if ($error) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error; ?>
                    </div>
                <?php } ?>
                <?php if ($sukses) { ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses; ?>
                    </div>
                <?php } ?>

                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="kode_buku" class="form-label">Kode Buku</label>
                        <input type="text" class="form-control" id="kode_buku" name="kode_buku" value="<?php echo $kode_buku; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Buku</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $judul; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="pengarang" class="form-label">Pengarang</label>
                        <input type="text" class="form-control" id="pengarang" name="pengarang" value="<?php echo $pengarang; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?php echo $penerbit; ?>" required>
                    </div>
                    <button type="submit" name="simpan" class="btn btn-primary">Simpan Data</button>
                </form>
            </div>
        </div>

        <!-- Card for Data Display -->
        <div class="card">
            <div class="card-header bg-success text-white">
                <h4>Data Buku</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode Buku</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Pengarang</th>
                            <th scope="col">Penerbit</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM buku ORDER BY id DESC";
                        $result = mysqli_query($koneksi, $sql);
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $no++; ?></th>
                                <td><?php echo $row['kode_buku']; ?></td>
                                <td><?php echo $row['judul']; ?></td>
                                <td><?php echo $row['pengarang']; ?></td>
                                <td><?php echo $row['penerbit']; ?></td>
                                <td>
                                    <a href="index.php?op=edit&id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="index.php?op=delete&id=<?php echo $row['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
