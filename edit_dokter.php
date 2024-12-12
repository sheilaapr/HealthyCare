<?php
// Menghubungkan ke database
include('config.php');

// Ambil ID dokter dari URL
if (isset($_GET['id_dokter'])) {
    $id_dokter = $_GET['id_dokter'];
    $query = "SELECT * FROM dokter WHERE id_dokter='$id_dokter'";
    $result = $conn->query($query);
    $dokter = $result->fetch_assoc();
}

// Proses update data dokter
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $spesialisasi = $_POST['spesialisasi'];
    $jadwal_konsul = $_POST['jadwal_konsul'];
    $rating = $_POST['rating'];
    $harga_konsultasi = $_POST['harga_konsultasi'];

    // Update data dokter
    $update_query = "UPDATE dokter SET nama_dokter='$nama', spesialisasi='$spesialisasi', jadwal_konsul='$jadwal_konsul', rating='$rating', harga_konsultasi='$harga_konsultasi' WHERE id_dokter='$id_dokter'";
    if ($conn->query($update_query) === TRUE) {
        echo "<script>alert('Data dokter berhasil diperbarui.'); window.location='doctor.php';</script>";
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
          <a class="nav-link active" href="doctor.php"><i class="fas fa-user-md me-2"></i> Dokter</a>
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

    <div class="container my-5">
        <h1>Edit Data Dokter</h1>
        <form action="edit_dokter.php?id_dokter=<?php echo $id_dokter; ?>" method="POST">
            <div class="form-group">
                <label for="nama">Nama Dokter</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $dokter['nama_dokter']; ?>" required>
            </div>
            <div class="form-group">
                <label for="spesialisasi">Spesialisasi</label>
                <input type="text" name="spesialisasi" class="form-control" value="<?php echo $dokter['spesialisasi']; ?>" required>
            </div>
            <div class="form-group">
                <label for="jadwal_konsul">Jadwal Konsultasi</label>
                <input type="text" name="jadwal_konsul" class="form-control" value="<?php echo $dokter['jadwal_konsul']; ?>" required>
            </div>
            <div class="mb-3">
    <label for="rating" class="form-label">Rating Dokter</label>
    <input type="number" name="rating" class="form-control" id="rating" step="0.1" min="0" max="5" required>
</div>

            <div class="form-group">
                <label for="harga_konsultasi">Harga Konsultasi</label>
                <input type="number" name="harga_konsultasi" class="form-control" value="<?php echo $dokter['harga_konsultasi']; ?>" required>
            </div>
            <button type="submit" class="btn mt-4 btn-success">Update</button>
            <a href="doctor.php" class="btn mt-4 btn-secondary">Kembali</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
