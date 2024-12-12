<?php
// Menghubungkan ke database
include('config.php');

// Menghapus data obat
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hapus_obat'])) {
    $id_obat = $_POST['id_obat'];
    $sql = "DELETE FROM obat WHERE id_obat='$id_obat'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Obat berhasil dihapus.'); window.location='obat.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Mengambil data obat
$query = "SELECT * FROM obat";
$result = $conn->query($query);
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
          <a class="nav-link active" href="obat.php"><i class="fas fa-pills me-2"></i> Obat</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="konsultasi.php"><i class="fas fa-comments me-2"></i> Konsultasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="resep.php"><i class="fas fa-file-prescription me-2"></i> Resep Obat</a>
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
        <h1>Data Obat</h1>

        <!-- Button Tambah Obat -->
        <a href="tambah_obat.php" class="btn btn-primary mb-3">Tambah Obat</a>

        <!-- Tabel Data Obat -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Obat</th>
                    <th>Nama Obat</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Deskripsi</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($obat = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $obat['id_obat']; ?></td>
                        <td><?php echo $obat['nama_obat']; ?></td>
                        <td><?php echo $obat['harga']; ?></td>
                        <td><?php echo $obat['stok']; ?></td>
                        <td><?php echo $obat['deskripsi_obat']; ?></td>
                        <td><?php echo $obat['kategori']; ?></td>
                        <td>
                            <!-- Tombol Edit -->
                            <a href="edit_obat.php?id_obat=<?php echo $obat['id_obat']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <!-- Tombol Hapus -->
                            <form action="obat.php" method="POST" style="display:inline;">
                                <input type="hidden" name="id_obat" value="<?php echo $obat['id_obat']; ?>">
                                <button type="submit" name="hapus_obat" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
