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
          <a class="nav-link active" href="index.php"><i class="fas fa-home me-2"></i> Beranda</a>
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

<!-- Hero Section with Animation -->
<div class="container text-center my-5">
    <h1 class="display-4 animate__animated animate__fadeIn">Health Care</h1>
    <p class="lead animate__animated animate__fadeIn animate__delay-1s">Layanan kesehatan terbaik untuk Anda dan keluarga.</p>
    <!-- Menambahkan gambar animasi -->
    <img src="https://cdn.dribbble.com/users/3419046/screenshots/9149627/farm-800x600.gif" alt="Health Care Animation" class="img-fluid mt-4" width="250" height="100">
</div>

<!-- Button Navigation ke Halaman Lain -->
<div class="container text-center my-5">
    <h3 class="mb-4">Akses Fitur Lainnya</h3>
    <div class="row">
        <div class="col-md-4 mb-4">
            <a href="doctor.php" class="btn btn-success btn-lg w-100">
                <i class="fas fa-user-md me-2"></i> Daftar Dokter
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="obat.php" class="btn btn-info btn-lg w-100">
                <i class="fas fa-pills me-2"></i> Daftar Obat
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="konsultasi.php" class="btn btn-warning btn-lg w-100">
                <i class="fas fa-comments me-2"></i> Konsultasi
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-4">
            <a href="resep.php" class="btn btn-primary btn-lg w-100">
                <i class="fas fa-file-prescription me-2"></i> Resep Obat
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="pembayaran.php" class="btn btn-dark btn-lg w-100">
                <i class="fas fa-credit-card me-2"></i> Pembayaran
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="apotek.php" class="btn btn-secondary btn-lg w-100">
                <i class="fas fa-store me-2"></i> Data Apotek
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-4">
            <a href="log_kesehatan.php" class="btn btn-danger btn-lg w-100">
                <i class="fas fa-heartbeat me-2"></i> Log Kesehatan
            </a>
        </div>
    
    <!-- Tombol Akses Pengguna -->
    <div class="col-md-4 mb-4">
        <a href="pengguna.php" class="btn btn-info btn-lg w-100">
            <i class="fas fa-users me-2"></i> Pengguna
        </a>
    </div>
    <!-- Tombol Akses Aktivitas -->
    <div class="col-md-4 mb-4">
        <a href="Riwayat.php" class="btn btn-success btn-lg w-100">
            <i class="fas fa-tasks me-2"></i> Riwayat
        </a>
    </div>
    </div>
</div>


<!-- About Section -->
<div class="container text-center my-5">
    <h2>Tentang Kami</h2>
    <p class="lead">Health Care memberikan informasi terkini tentang dokter, obat, resep, dan layanan kesehatan lainnya untuk membantu Anda menjaga kesehatan.</p>
</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
    <p>&copy; Kelompok 4 Praktikum Basis Data</p>
</footer>

<!-- Menambahkan Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
