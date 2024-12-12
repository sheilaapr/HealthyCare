<?php
// Koneksi ke database
include('config.php');

// Proses Tambah Riwayat Pembelian
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_pembelian'])) {
    $id_user = $_POST['id_user'];
    $id_obat = $_POST['id_obat'];
    $tgl_pembelian = $_POST['tgl_pembelian'];
    $jumlah = $_POST['jumlah'];

    // Mengambil harga obat berdasarkan id_obat dari tabel obat
    $query_harga = "SELECT harga FROM obat WHERE id_obat = '$id_obat'";
    $result_harga = $conn->query($query_harga);
    if ($result_harga->num_rows > 0) {
        $harga_obat = $result_harga->fetch_assoc()['harga'];
        // Menghitung total harga
        $total_harga = $harga_obat * $jumlah;

        // Insert data ke tabel riwayat_pembelian
        $query_insert = "INSERT INTO riwayat_pembelian (id_user, id_obat, tgl_pembelian, jumlah, total_harga) 
                         VALUES ('$id_user', '$id_obat', '$tgl_pembelian', '$jumlah', '$total_harga')";
        $conn->query($query_insert);

        // Redirect ke halaman riwayat setelah berhasil menambah data
        header("Location: riwayat.php");
    } else {
        echo "Obat tidak ditemukan.";
    }
}

// Proses Tambah Riwayat Aktivitas
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_aktivitas'])) {
    $id_user = $_POST['id_user'];
    $id_dokter = $_POST['id_dokter'];
    $id_obat = $_POST['id_obat'];
    $id_apotek = $_POST['id_apotek'];
    $tanggal_aktivitas = $_POST['tanggal_aktivitas'];
    $jenis_aktivitas = $_POST['jenis_aktivitas'];
    $deskripsi_aktivitas = $_POST['deskripsi_aktivitas'];

    // Insert data ke tabel riwayat_aktivitas
    $query_insert = "INSERT INTO riwayat_aktivitas (id_user, id_dokter, id_obat, id_apotek, tanggal_aktivitas, jenis_aktivitas, deskripsi_aktivitas) 
                     VALUES ('$id_user', '$id_dokter', '$id_obat', '$id_apotek', '$tanggal_aktivitas', '$jenis_aktivitas', '$deskripsi_aktivitas')";
    $conn->query($query_insert);

    // Redirect ke halaman riwayat setelah berhasil menambah data
    header("Location: riwayat.php");
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
          <a class="nav-link" href="log_kesehatan.php"><i class="fas fa-heartbeat me-2"></i> Log Kesehatan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pengguna.php"><i class="fas fa-users me-2"></i> Pengguna</a>
        </li>
        <!-- Menu Aktivitas -->
        <li class="nav-item">
          <a class="nav-link active" href="riwayat.php"><i class="fas fa-tasks me-2"></i> Riwayat</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5">
    <h2>Tambah Riwayat Pembelian</h2>

    <!-- Form untuk Riwayat Pembelian -->
    <form method="POST">
        <div class="mb-3">
            <label for="id_user" class="form-label">ID Pengguna</label>
            <input type="text" class="form-control" name="id_user" required>
        </div>
        <div class="mb-3">
            <label for="id_obat" class="form-label">ID Obat</label>
            <input type="text" class="form-control" name="id_obat" required>
        </div>
        <div class="mb-3">
            <label for="tgl_pembelian" class="form-label">Tanggal Pembelian</label>
            <input type="date" class="form-control" name="tgl_pembelian" required>
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" name="jumlah" required>
        </div>
        <button type="submit" name="submit_pembelian" class="btn btn-success">Tambah Pembelian</button>
    </form>

    <hr>

    <h2>Tambah Riwayat Aktivitas</h2>

    <!-- Form untuk Riwayat Aktivitas -->
    <form method="POST">
        <div class="mb-3">
            <label for="id_user" class="form-label">ID Pengguna</label>
            <input type="text" class="form-control" name="id_user" required>
        </div>
        <div class="mb-3">
            <label for="id_dokter" class="form-label">ID Dokter</label>
            <input type="text" class="form-control" name="id_dokter" required>
        </div>
        <div class="mb-3">
            <label for="id_obat" class="form-label">ID Obat</label>
            <input type="text" class="form-control" name="id_obat" required>
        </div>
        <div class="mb-3">
            <label for="id_apotek" class="form-label">ID Apotek</label>
            <input type="text" class="form-control" name="id_apotek" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_aktivitas" class="form-label">Tanggal Aktivitas</label>
            <input type="date" class="form-control" name="tanggal_aktivitas" required>
        </div>
        <div class="mb-3">
            <label for="jenis_aktivitas" class="form-label">Jenis Aktivitas</label>
            <input type="text" class="form-control" name="jenis_aktivitas" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi_aktivitas" class="form-label">Deskripsi Aktivitas</label>
            <textarea class="form-control" name="deskripsi_aktivitas" required></textarea>
        </div>
        <button type="submit" name="submit_aktivitas" class="btn btn-info">Tambah Aktivitas</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>