<?php
// Koneksi ke database
include('config.php');

// Proses hapus riwayat pembelian
if (isset($_GET['hapus_pembelian'])) {
    $id_transaksi = $_GET['hapus_pembelian'];
    $query_hapus_pembelian = "DELETE FROM riwayat_pembelian WHERE id_transaksi = '$id_transaksi'";
    $conn->query($query_hapus_pembelian);
}

// Proses hapus riwayat aktivitas
if (isset($_GET['hapus_aktivitas'])) {
    $id_aktivitas = $_GET['hapus_aktivitas'];
    $query_hapus_aktivitas = "DELETE FROM riwayat_aktivitas WHERE id_aktivitas = '$id_aktivitas'";
    $conn->query($query_hapus_aktivitas);
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
    <!-- Riwayat Pembelian -->
    <h2>Riwayat Pembelian</h2>
    <a href="tambah_riwayat.php?type=pembelian" class="btn btn-primary mb-3">Tambah Riwayat Pembelian</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>ID Pengguna</th>
                <th>ID Obat</th>
                <th>Tanggal Pembelian</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query_pembelian = "SELECT * FROM riwayat_pembelian";
            $result_pembelian = $conn->query($query_pembelian);
            while ($row = $result_pembelian->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $row['id_transaksi']; ?></td>
                    <td><?php echo $row['id_user']; ?></td>
                    <td><?php echo $row['id_obat']; ?></td>
                    <td><?php echo $row['tgl_pembelian']; ?></td>
                    <td><?php echo $row['jumlah']; ?></td>
                    <td><?php echo $row['total_harga']; ?></td>
                    <td>
                        <a href="edit_riwayat.php?type=pembelian&id=<?php echo $row['id_transaksi']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="riwayat.php?hapus_pembelian=<?php echo $row['id_transaksi']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Riwayat Aktivitas -->
    <h2 class="mt-5">Riwayat Aktivitas</h2>
    <a href="tambah_riwayat.php?type=aktivitas" class="btn btn-primary mb-3">Tambah Riwayat Aktivitas</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID Aktivitas</th>
                <th>ID Pengguna</th>
                <th>ID Dokter</th>
                <th>ID Obat</th>
                <th>ID Apotek</th>
                <th>Tanggal Aktivitas</th>
                <th>Jenis Aktivitas</th>
                <th>Deskripsi Aktivitas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query_aktivitas = "SELECT * FROM riwayat_aktivitas";
            $result_aktivitas = $conn->query($query_aktivitas);
            while ($row = $result_aktivitas->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $row['id_aktivitas']; ?></td>
                    <td><?php echo $row['id_user']; ?></td>
                    <td><?php echo $row['id_dokter']; ?></td>
                    <td><?php echo $row['id_obat']; ?></td>
                    <td><?php echo $row['id_apotek']; ?></td>
                    <td><?php echo $row['tanggal_aktivitas']; ?></td>
                    <td><?php echo $row['jenis_aktivitas']; ?></td>
                    <td><?php echo $row['deskripsi_aktivitas']; ?></td>
                    <td>
                        <a href="edit_riwayat.php?type=aktivitas&id=<?php echo $row['id_aktivitas']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="riwayat.php?hapus_aktivitas=<?php echo $row['id_aktivitas']; ?>" class="btn btn-danger btn-sm mt-2" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
