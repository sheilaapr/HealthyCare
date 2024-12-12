<?php
// Menghubungkan ke database
include('config.php');

// Menambah data log kesehatan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah_log'])) {
    $id_user = $_POST['id_user'];
    $tgl_log = $_POST['tgl_log'];
    $parameter = $_POST['parameter'];
    $nilai = $_POST['nilai'];
    $catatan = $_POST['catatan'];

    // Insert data ke tabel log_kesehatan
    $sql = "INSERT INTO log_kesehatan (id_user, tgl_log, parameter, nilai, catatan) 
            VALUES ('$id_user', '$tgl_log', '$parameter', '$nilai', '$catatan')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Log kesehatan berhasil ditambahkan.'); window.location='log_kesehatan.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
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

<!-- Form untuk Menambah Log Kesehatan -->
<div class="container my-5">
    <h1>Tambah Data Log Kesehatan</h1>
    <form action="tambah_log_kesehatan.php" method="POST">
        <div class="mb-3">
            <label for="id_user" class="form-label">ID Pengguna</label>
            <input type="number" class="form-control" name="id_user" required>
        </div>
        <div class="mb-3">
            <label for="tgl_log" class="form-label">Tanggal Log</label>
            <input type="date" class="form-control" name="tgl_log" required>
        </div>
        <div class="mb-3">
            <label for="parameter" class="form-label">Parameter</label>
            <input type="text" class="form-control" name="parameter" required>
        </div>
        <div class="mb-3">
            <label for="nilai" class="form-label">Nilai</label>
            <input type="text" class="form-control" name="nilai" required>
        </div>
        <div class="mb-3">
            <label for="catatan" class="form-label">Catatan</label>
            <textarea class="form-control" name="catatan" rows="3"></textarea>
        </div>
        <button type="submit" name="tambah_log" class="btn btn-success">Tambah Log Kesehatan</button>
        <a href="log_kesehatan.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
