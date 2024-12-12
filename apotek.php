<?php
// Menghubungkan ke database
include('config.php');

// Menambah data apotek
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah_apotek'])) {
    $nama_apotek = $_POST['nama_apotek'];
    $lokasi = $_POST['lokasi'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $jam_operasional = $_POST['jam_operasional'];
    $rating = $_POST['rating'];

    $sql = "INSERT INTO apotek (nama_apotek, lokasi, nomor_telepon, jam_operasional, rating)
            VALUES ('$nama_apotek', '$lokasi', '$nomor_telepon', '$jam_operasional', '$rating')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Apotek berhasil ditambahkan.'); window.location='apotek.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Mengedit data apotek
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_apotek'])) {
    $id_apotek = $_POST['id_apotek'];
    $nama_apotek = $_POST['nama_apotek'];
    $lokasi = $_POST['lokasi'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $jam_operasional = $_POST['jam_operasional'];
    $rating = $_POST['rating'];

    $sql = "UPDATE apotek SET nama_apotek='$nama_apotek', lokasi='$lokasi', nomor_telepon='$nomor_telepon', jam_operasional='$jam_operasional', rating='$rating' WHERE id_apotek='$id_apotek'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data apotek berhasil diperbarui.'); window.location='apotek.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Menghapus data apotek
if (isset($_POST['hapus_apotek'])) {
    $id_apotek = $_POST['id_apotek'];

    // Periksa apakah ada transaksi pembelian yang terkait dengan apotek ini
    $check_sql = "SELECT * FROM riwayat_pembelian WHERE id_transaksi = '$id_apotek'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        echo "<script>alert('Tidak dapat menghapus apotek ini karena ada transaksi yang terkait.'); window.location='apotek.php';</script>";
    } else {
        $sql = "DELETE FROM apotek WHERE id_apotek = '$id_apotek'";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Apotek berhasil dihapus.'); window.location='apotek.php';</script>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

// Mengambil semua data apotek
$sql = "SELECT * FROM apotek";
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
          <a class="nav-link active" href="apotek.php"><i class="fas fa-store me-2"></i> Apotek</a>
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
    <h1>Pengelolaan Data Apotek</h1>

    <!-- Form untuk Menambah Apotek -->
    <form action="apotek.php" method="POST" class="mb-3">
        <div class="row">
            <div class="col-md-3">
                <input type="text" class="form-control" name="nama_apotek" placeholder="Nama Apotek" required>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="lokasi" placeholder="Lokasi" required>
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control" name="nomor_telepon" placeholder="Nomor Telepon" required>
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control" name="jam_operasional" placeholder="Jam Operasional" required>
            </div>
            <div class="col-md-1">
                <input type="number" class="form-control" name="rating" placeholder="Rating" step="0.1" min="0" max="5" required>
            </div>
            <div class="col-md-1">
                <button type="submit" name="tambah_apotek" class="btn btn-success">Tambah</button>
            </div>
        </div>
    </form>

    <!-- Tabel Data Apotek -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Apotek</th>
                <th>Nama Apotek</th>
                <th>Lokasi</th>
                <th>Nomor Telepon</th>
                <th>Jam Operasional</th>
                <th>Rating</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_apotek']; ?></td>
                <td><?php echo $row['nama_apotek']; ?></td>
                <td><?php echo $row['lokasi']; ?></td>
                <td><?php echo $row['nomor_telepon']; ?></td>
                <td><?php echo $row['jam_operasional']; ?></td>
                <td><?php echo $row['rating']; ?></td>
                <td>
                    <!-- Tombol Edit -->
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['id_apotek']; ?>">Edit</button>
                    
                    <!-- Tombol Hapus -->
                    <form action="apotek.php" method="POST" class="d-inline">
                        <input type="hidden" name="id_apotek" value="<?php echo $row['id_apotek']; ?>">
                        <button type="submit" name="hapus_apotek" class="btn btn-danger">Hapus</button>
                    </form>

                    <!-- Modal Edit Apotek -->
                    <div class="modal fade" id="editModal<?php echo $row['id_apotek']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit Data Apotek</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="apotek.php" method="POST">
                                        <input type="hidden" name="id_apotek" value="<?php echo $row['id_apotek']; ?>">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="nama_apotek" value="<?php echo $row['nama_apotek']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="lokasi" value="<?php echo $row['lokasi']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="nomor_telepon" value="<?php echo $row['nomor_telepon']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="jam_operasional" value="<?php echo $row['jam_operasional']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <input type="number" class="form-control" name="rating" step="0.1" min="0" max="5" required>
                                        </div>
                                        <button type="submit" name="edit_apotek" class="btn btn-success">Simpan Perubahan</button>
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

<!-- Menambahkan Bootstrap dan JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
