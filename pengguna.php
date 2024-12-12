<?php
// Menghubungkan ke database
include('config.php');

// Menambah pengguna
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah_pengguna'])) {
    $nama_user = $_POST['nama_user'];
    $no_hp = $_POST['no_hp'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $riwayat = $_POST['riwayat'];
    $alergi_obat = $_POST['alergi_obat'];

    $sql = "INSERT INTO pengguna (nama_user, no_hp, tgl_lahir, riwayat, alergi_obat) 
            VALUES ('$nama_user', '$no_hp', '$tgl_lahir', '$riwayat', '$alergi_obat')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Pengguna berhasil ditambahkan.'); window.location='pengguna.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Mengedit pengguna
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_pengguna'])) {
    $id_user = $_POST['id_user'];
    $nama_user = $_POST['nama_user'];
    $no_hp = $_POST['no_hp'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $riwayat = $_POST['riwayat'];
    $alergi_obat = $_POST['alergi_obat'];

    $sql = "UPDATE pengguna SET nama_user='$nama_user', no_hp='$no_hp', tgl_lahir='$tgl_lahir', riwayat='$riwayat', alergi_obat='$alergi_obat' 
            WHERE id_user='$id_user'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data pengguna berhasil diperbarui.'); window.location='pengguna.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Menghapus pengguna
if (isset($_POST['hapus_pengguna'])) {
    $id_user = $_POST['id_user'];

    $sql = "DELETE FROM pengguna WHERE id_user = '$id_user'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Pengguna berhasil dihapus.'); window.location='pengguna.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Mengambil data pengguna
$sql = "SELECT * FROM pengguna";
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
          <a class="nav-link" href="log_kesehatan.php"><i class="fas fa-heartbeat me-2"></i> Log Kesehatan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="pengguna.php"><i class="fas fa-users me-2"></i> Pengguna</a>
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
        <h1>Pengelolaan Pengguna</h1>

        <!-- Form untuk Menambah Pengguna -->
        <form action="pengguna.php" method="POST" class="mb-3">
            <div class="mb-3">
                <input type="text" class="form-control" name="nama_user" placeholder="Nama Lengkap" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="no_hp" placeholder="Nomor HP" required>
            </div>
            <div class="mb-3">
                <input type="date" class="form-control" name="tgl_lahir" required>
            </div>
            <div class="mb-3">
                <textarea class="form-control" name="riwayat" placeholder="Riwayat Penyakit" required></textarea>
            </div>
            <div class="mb-3">
                <textarea class="form-control" name="alergi_obat" placeholder="Alergi Obat" required></textarea>
            </div>
            <button type="submit" name="tambah_pengguna" class="btn btn-success">Tambah Pengguna</button>
        </form>

        <!-- Tabel Data Pengguna -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Pengguna</th>
                    <th>Nama Lengkap</th>
                    <th>Nomor HP</th>
                    <th>Tanggal Lahir</th>
                    <th>Riwayat Penyakit</th>
                    <th>Alergi Obat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id_user']; ?></td>
                    <td><?php echo $row['nama_user']; ?></td>
                    <td><?php echo $row['no_hp']; ?></td>
                    <td><?php echo $row['tgl_lahir']; ?></td>
                    <td><?php echo $row['riwayat']; ?></td>
                    <td><?php echo $row['alergi_obat']; ?></td>
                    <td>
                        <!-- Tombol Edit -->
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['id_user']; ?>">Edit</button>
                        
                        <!-- Tombol Hapus -->
                        <form action="pengguna.php" method="POST" class="d-inline">
                            <input type="hidden" name="id_user" value="<?php echo $row['id_user']; ?>">
                            <button type="submit" name="hapus_pengguna" class="btn btn-danger">Hapus</button>
                        </form>

                        <!-- Modal Edit Pengguna -->
                        <div class="modal fade" id="editModal<?php echo $row['id_user']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Edit Pengguna</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="pengguna.php" method="POST">
                                            <input type="hidden" name="id_user" value="<?php echo $row['id_user']; ?>">
                                            <div class="mb-3">
                                                <input type="text" class="form-control" name="nama_user" value="<?php echo $row['nama_user']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" name="no_hp" value="<?php echo $row['no_hp']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <input type="date" class="form-control" name="tgl_lahir" value="<?php echo $row['tgl_lahir']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <textarea class="form-control" name="riwayat" required><?php echo $row['riwayat']; ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <textarea class="form-control" name="alergi_obat" required><?php echo $row['alergi_obat']; ?></textarea>
                                            </div>
                                            <button type="submit" name="edit_pengguna" class="btn btn-primary">Simpan Perubahan</button>
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
