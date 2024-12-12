<?php
// Menghubungkan ke database
include('config.php');

// Menambahkan data resep obat
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah_resep'])) {
    $id_dokter = $_POST['id_dokter'];
    $id_user = $_POST['id_user'];
    $daftar_obat = $_POST['daftar_obat'];
    $catatan_dokter = $_POST['catatan_dokter'];
    $tgl_resep = $_POST['tgl_resep'];

    $sql = "INSERT INTO resep_obat (id_dokter, id_user, daftar_obat, catatan_dokter, tgl_resep) 
            VALUES ('$id_dokter', '$id_user', '$daftar_obat', '$catatan_dokter', '$tgl_resep')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data resep obat berhasil ditambahkan.'); window.location='resep.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Mengedit data resep obat
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_resep'])) {
    $id_resep = $_POST['id_resep'];
    $id_dokter = $_POST['id_dokter'];
    $id_user = $_POST['id_user'];
    $daftar_obat = $_POST['daftar_obat'];
    $catatan_dokter = $_POST['catatan_dokter'];
    $tgl_resep = $_POST['tgl_resep'];

    $sql = "UPDATE resep_obat SET id_dokter='$id_dokter', id_user='$id_user', daftar_obat='$daftar_obat', catatan_dokter='$catatan_dokter', tgl_resep='$tgl_resep' WHERE id_resep='$id_resep'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data resep obat berhasil diperbarui.'); window.location='resep.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Menghapus data resep obat
if (isset($_POST['hapus_resep'])) {
    $id_resep = $_POST['id_resep'];

    // Periksa apakah ada transaksi yang terkait dengan resep ini
    $check_sql = "SELECT * FROM resep_obat WHERE id_resep = '$id_resep'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        echo "<script>alert('Tidak dapat menghapus resep ini karena ada transaksi yang terkait.'); window.location='resep.php';</script>";
    } else {
        $sql = "DELETE FROM resep_obat WHERE id_resep = '$id_resep'";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Data resep obat berhasil dihapus.'); window.location='resep.php';</script>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

// Mengambil semua data resep obat
$sql = "SELECT * FROM resep_obat";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Care - Sistem Kesehatan</title>
    <!-- Menambahkan Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> <!-- Optional: Custom CSS -->
    <!-- Menambahkan Font Awesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Menambahkan animasi dengan Animate.css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <!-- Menambahkan Logo pada Navbar -->
    <a class="navbar-brand" href="#">
      <!-- Gambar Logo (ganti dengan logo Anda) -->
      <img src="https://cdn-icons-png.flaticon.com/128/2382/2382533.png" alt="Health Care Logo" class="d-inline-block align-text-top" width="40" height="40">
      Health Care
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php"><i class="fas fa-home me-2"></i> Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="doctor.php"><i class="fas fa-user-md me-2"></i> Dokter</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="obat.php"><i class="fas fa-pills me-2"></i> Obat</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="konsultasi.php"><i class="fas fa-comments me-2"></i> Konsultasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="resep.php"><i class="fas fa-file-prescription me-2"></i> Resep Obat</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pembayaran.php"><i class="fas fa-credit-card me-2"></i> Pembayaran</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="apotek.php"><i class="fas fa-store me-2"></i> Apotek</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="log_kesehatan.php"><i class="fas fa-heartbeat me-2"></i> Log Kesehatan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pengguna.php"><i class="fas fa-users me-2"></i> Pengguna</a>
        </li>
        <!-- Menu Aktivitas -->
        <li class="nav-item">
          <a class="nav-link" href="riwayat.php"><i class="fas fa-tasks me-2"></i> Riwayat</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <div class="container my-5">
        <h1>Pengelolaan Data Resep Obat</h1>
        
        <!-- Form untuk Menambah Resep Obat -->
        <form action="resep.php" method="POST" class="mb-3">
            <div class="row">
                <div class="col-md-3">
                    <input type="number" class="form-control" name="id_dokter" placeholder="ID Dokter" required>
                </div>
                <div class="col-md-3">
                    <input type="number" class="form-control" name="id_user" placeholder="ID User" required>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="daftar_obat" placeholder="Daftar Obat" required>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="catatan_dokter" placeholder="Catatan">
                </div>
                <div class="col-md-2 mt-3">
                    <input type="date" class="form-control" name="tgl_resep" required>
                </div>
                <div class="col-md-1 mt-3">
                    <button type="submit" name="tambah_resep" class="btn btn-success">Tambah</button>
                </div>
            </div>
        </form>

        <!-- Tabel Data Resep Obat -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Resep</th>
                    <th>ID Dokter</th>
                    <th>ID Pengguna</th>
                    <th>Daftar Obat</th>
                    <th>Catatan</th>
                    <th>Tanggal Resep</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id_resep']; ?></td>
                    <td><?php echo $row['id_dokter']; ?></td>
                    <td><?php echo $row['id_user']; ?></td>
                    <td><?php echo $row['daftar_obat']; ?></td>
                    <td><?php echo $row['catatan_dokter']; ?></td>
                    <td><?php echo $row['tgl_resep']; ?></td>
                    <td>
                        <!-- Tombol Edit -->
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['id_resep']; ?>">Edit</button>
                        
                        <!-- Tombol Hapus -->
                        <form action="resep.php" method="POST" class="d-inline">
                            <input type="hidden" name="id_resep" value="<?php echo $row['id_resep']; ?>">
                            <button type="submit" name="hapus_resep" class="btn btn-danger">Hapus</button>
                        </form>

                        <!-- Modal Edit Resep -->
                        <div class="modal fade" id="editModal<?php echo $row['id_resep']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Edit Resep Obat</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="resep .php" method="POST">
                                            <input type="hidden" name="id_resep" value="<?php echo $row['id_resep']; ?>">
                                            <div class="mb-3">
                                                <input type="number" class="form-control" name="id_dokter" value="<?php echo $row['id_dokter']; ?>" placeholder="ID Dokter" required>
                                            </div>
                                            <div class="mb-3">
                                                <input type="number" class="form-control" name="id_user" value="<?php echo $row['id_user']; ?>" placeholder="ID User" required>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" name="daftar_obat" value="<?php echo $row['daftar_obat']; ?>" placeholder="Daftar Obat" required>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" name="catatan_dokter" value="<?php echo $row['catatan_dokter']; ?>" placeholder="Catatan">
                                            </div>
                                            <div class="mb-3">
                                                <input type="date" class="form-control" name="tgl_resep" value="<?php echo $row['tgl_resep']; ?>" required>
                                            </div>
                                            <button type="submit" name="edit_resep" class="btn btn-primary">Perbarui Resep</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
