<?php
// Menghubungkan ke database
include('config.php');

// Ambil ID obat dari URL
if (isset($_GET['id_obat'])) {
    $id_obat = $_GET['id_obat'];
    $query = "SELECT * FROM obat WHERE id_obat='$id_obat'";
    $result = $conn->query($query);
    $obat = $result->fetch_assoc();
}

// Proses update data obat
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];
    $kategori = $_POST['kategori'];

    // Update data obat
    $update_query = "UPDATE obat SET nama_obat='$nama', harga='$harga', stok='$stok', deskripsi_obat='$deskripsi', kategori='$kategori' WHERE id_obat='$id_obat'";
    if ($conn->query($update_query) === TRUE) {
        echo "<script>alert('Data obat berhasil diperbarui.'); window.location='obat.php';</script>";
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
        <h1>Edit Data Obat</h1>
        <form action="edit_obat.php?id_obat=<?php echo $id_obat; ?>" method="POST">
            <div class="form-group">
                <label for="nama">Nama Obat</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $obat['nama_obat']; ?>" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" name="harga" class="form-control" value="<?php echo $obat['harga']; ?>" required>
            </div>
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" name="stok" class="form-control" value="<?php echo $obat['stok']; ?>" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" required><?php echo $obat['deskripsi_obat']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select name="kategori" class="form-control" required>
                    <option value="Analgesik" <?php echo ($obat['kategori'] == 'Analgesik') ? 'selected' : ''; ?>>Analgesik</option>
                    <option value="Antibiotik" <?php echo ($obat['kategori'] == 'Antibiotik') ? 'selected' : ''; ?>>Antibiotik</option>
                    <option value="Antihistamin" <?php echo ($obat['kategori'] == 'Antihistamin') ? 'selected' : ''; ?>>Antihistamin</option>
                    <option value="Gastrointestinal" <?php echo ($obat['kategori'] == 'Gastrointestinal') ? 'selected' : ''; ?>>Gastrointestinal</option>
                    <option value="Antidiabetes" <?php echo ($obat['kategori'] == 'Antidiabetes') ? 'selected' : ''; ?>>Antidiabetes</option>
                    <option value="Antihipertensi" <?php echo ($obat['kategori'] == 'Antihipertensi') ? 'selected' : ''; ?>>Antihipertensi</option>
                    <option value="Respiratori" <?php echo ($obat['kategori'] == 'Respiratori') ? 'selected' : ''; ?>>Respiratori</option>
                    <option value="Kortikosteroid" <?php echo ($obat['kategori'] == 'Kortikosteroid') ? 'selected' : ''; ?>>Kortikosteroid</option>
                    <option value="Diuretik" <?php echo ($obat['kategori'] == 'Diuretik') ? 'selected' : ''; ?>>Diuretik</option>
                </select>
            </div>
            <button type="submit" class="btn mt-4 btn-success">Update</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</
