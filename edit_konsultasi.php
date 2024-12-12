<?php
// Menghubungkan ke database
include('config.php');

// Mengambil data konsultasi berdasarkan ID
if (isset($_GET['id_konsultasi'])) {
    $id_konsultasi = $_GET['id_konsultasi'];
    $sql = "SELECT * FROM konsultasi WHERE id_konsultasi = '$id_konsultasi'";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
}

// Proses edit data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $id_dokter = $_POST['id_dokter'];
    $id_user = $_POST['id_user'];
    $tgl_konsultasi = $_POST['tgl_konsultasi'];
    $jenis_konsultasi = $_POST['jenis_konsultasi'];
    $status = $_POST['status'];

    $sql_update = "UPDATE konsultasi 
                   SET id_dokter = '$id_dokter', id_user = '$id_user', tgl_konsultasi = '$tgl_konsultasi', 
                       jenis_konsultasi = '$jenis_konsultasi', status = '$status' 
                   WHERE id_konsultasi = '$id_konsultasi'";

    if ($conn->query($sql_update) === TRUE) {
        echo "<script>alert('Data konsultasi berhasil diperbarui.'); window.location='konsultasi.php';</script>";
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
          <a class="nav-link active" href="konsultasi.php"><i class="fas fa-comments me-2"></i> Konsultasi</a>
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
        <h1>Edit Data Konsultasi</h1>

        <!-- Form untuk mengedit data konsultasi -->
        <form action="edit_konsultasi.php?id_konsultasi=<?php echo $data['id_konsultasi']; ?>" method="POST">
            <div class="mb-3">
                <label for="id_dokter" class="form-label">ID Dokter</label>
                <input type="number" name="id_dokter" class="form-control" id="id_dokter" value="<?php echo $data['id_dokter']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="id_user" class="form-label">ID User</label>
                <input type="number" name="id_user" class="form-control" id="id_user" value="<?php echo $data['id_user']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="tgl_konsultasi" class="form-label">Tanggal Konsultasi</label>
                <input type="date" name="tgl_konsultasi" class="form-control" id="tgl_konsultasi" value="<?php echo $data['tgl_konsultasi']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="jenis_konsultasi" class="form-label">Jenis Konsultasi</label>
                <select name="jenis_konsultasi" class="form-select" id="jenis_konsultasi" required>
                    <option value="Chat" <?php echo $data['jenis_konsultasi'] == 'Chat' ? 'selected' : ''; ?>>Chat</option>
                    <option value="Video" <?php echo $data['jenis_konsultasi'] == 'Video' ? 'selected' : ''; ?>>Video</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-select" id="status" required>
                    <option value="Pending" <?php echo $data['status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                    <option value="Selesai" <?php echo $data['status'] == 'Selesai' ? 'selected' : ''; ?>>Selesai</option>
                    <option value="Dibatalkan" <?php echo $data['status'] == 'Dibatalkan' ? 'selected' : ''; ?>>Dibatalkan</option>
                </select>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Perbarui Konsultasi</button>
            <a href="konsultasi.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
