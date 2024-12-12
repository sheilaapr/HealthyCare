<?php
// Menghubungkan ke database
include('config.php');

// Menghapus data log kesehatan
if (isset($_POST['hapus_log'])) {
    $id_log = $_POST['id_log'];

    // Menghapus data log kesehatan
    $sql = "DELETE FROM log_kesehatan WHERE id_log = '$id_log'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Log kesehatan berhasil dihapus.'); window.location='log_kesehatan.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Mengambil semua data log kesehatan
$sql = "SELECT * FROM log_kesehatan";
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
          <a class="nav-link" href="resep.php"><i class="fas fa-file-prescription me-2"></i> Resep Obat</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pembayaran.php"><i class="fas fa-credit-card me-2"></i> Pembayaran</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="apotek.php"><i class="fas fa-store me-2"></i> Apotek</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="log_kesehatan.php"><i class="fas fa-heartbeat me-2"></i> Log Kesehatan</a>
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
    <h1>Pengelolaan Log Kesehatan</h1>
    <!-- Tombol Tambah Log Kesehatan -->
    <a href="tambah_log_kesehatan.php" class="btn btn-success mb-3">Tambah Log Kesehatan</a>

    <!-- Tabel Data Log Kesehatan -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Log</th>
                <th>ID Pengguna</th>
                <th>Tanggal Log</th>
                <th>Parameter</th>
                <th>Nilai</th>
                <th>Catatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_log']; ?></td>
                <td><?php echo $row['id_user']; ?></td>
                <td><?php echo $row['tgl_log']; ?></td>
                <td><?php echo $row['parameter']; ?></td>
                <td><?php echo $row['nilai']; ?></td>
                <td><?php echo $row['catatan']; ?></td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="edit_log_kesehatan.php?id_log=<?php echo $row['id_log']; ?>" class="btn btn-warning">Edit</a>
                    <!-- Tombol Hapus -->
                    <form action="log_kesehatan.php" method="POST" class="d-inline">
                        <input type="hidden" name="id_log" value="<?php echo $row['id_log']; ?>">
                        <button type="submit" name="hapus_log" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
