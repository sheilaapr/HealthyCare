<?php
// Menghubungkan ke database
include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah_pembayaran'])) {
    $nama_metode = $_POST['nama_metode'];
    $biaya_transaksi = $_POST['biaya_transaksi'];
    $deskripsi = $_POST['deskripsi'];
    $status = $_POST['status_aktif'];
    $waktu_proses = $_POST['waktu_proses'];

    if(empty($nama_metode)) {
        echo "<script>alert('Nama metode pembayaran tidak boleh kosong');</script>";
        exit();
    }

    $sql = "INSERT INTO metode_pembayaran (nama_metode, biaya_transaksi, deskripsi, status_aktif, waktu_proses)
    VALUES ('$nama_metode', '$biaya_transaksi', '$deskripsi', '$status_aktif', '$waktu_proses')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Metode pembayaran berhasil ditambahkan.'); window.location='pembayaran.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}


// Mengedit data pembayaran
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_pembayaran'])) {
    $id_pembayaran = $_POST['id_pembayaran'];
    $nama_metode = $_POST['nama_metode'];
    $biaya_transaksi = $_POST['biaya_transaksi'];
    $deskripsi = $_POST['deskripsi'];
    $status = $_POST['status_aktif'];
    $waktu_proses = $_POST['waktu_proses'];

    // Validasi input untuk memastikan data tidak kosong
    if (empty($nama_metode) || empty($biaya_transaksi) || empty($deskripsi) || empty($status) || empty($waktu_proses)) {
        echo "<script>alert('Semua kolom harus diisi.'); window.location='pembayaran.php';</script>";
        exit();
    }

    // Query untuk mengupdate data
    $sql = "UPDATE metode_pembayaran SET 
            nama_metode='$nama_metode', 
            biaya_transaksi='$biaya_transaksi', 
            deskripsi='$deskripsi', 
            status_aktif='$status', 
            waktu_proses='$waktu_proses' 
            WHERE id_pembayaran='$id_pembayaran'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data pembayaran berhasil diperbarui.'); window.location='pembayaran.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}


// Menghapus data pembayaran
if (isset($_POST['hapus_metode_pembayaran'])) {
    $id_pembayaran = $_POST['id_pembayaran'];

    // Periksa apakah ada transaksi yang terkait dengan metode pembayaran ini
    $check_sql = "SELECT * FROM riwayat_pembelian WHERE id_transaksi = '$id_pembayaran'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        echo "<script>alert('Tidak dapat menghapus metode pembayaran ini karena ada transaksi yang terkait.'); window.location='pembayaran.php';</script>";
    } else {
        $sql = "DELETE FROM metode_pembayaran WHERE id_pembayaran = '$id_pembayaran'";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Metode pembayaran berhasil dihapus.'); window.location='pembayaran.php';</script>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

// Mengambil semua data pembayaran
$sql = "SELECT * FROM metode_pembayaran";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Care - Sistem Kesehatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> <!-- Optional: Custom CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
          <a class="nav-link active" href="pembayaran.php"><i class="fas fa-credit-card me-2"></i> Pembayaran</a>
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

<!-- Form untuk Menambah Pembayaran -->
<div class="container my-5">
    <h1>Pengelolaan Data Pembayaran</h1>

    <form action="pembayaran.php" method="POST" class="mb-3">
        <div class="row">
            <div class="col-md-3">
            <select class="form-control" name="nama_metode" required>
    <option value="E-Wallet">E-Wallet</option>
    <option value="M-Banking">M-Banking</option>
    <option value="Cash">Cash</option>
    <option value="Virtual Account">Virtual Account</option>
</select>

            </div>
            <div class="col-md-3">
                <input type="number" class="form-control" name="biaya_transaksi" placeholder="Biaya Transaksi" required>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi" required>
            </div>
            <div class="col-md-2">
                <select class="form-control" name="status_aktif" required>
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
            </div>
            <div class="col-md-2 mt-4">
                <select class="form-control" name="waktu_proses" required>
                    <option value="Instan">Instan</option>
                    <option value="Saat Pengiriman">Saat Pengiriman</option>
                </select>
            </div>
            <div class="col-md-1 mt-4">
                <button type="submit" name="tambah_pembayaran" class="btn btn-success">Tambah</button>
            </div>
        </div>
    </form>

    <!-- Tabel Data Pembayaran -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Pembayaran</th>
                <th>Metode Pembayaran</th>
                <th>Biaya Transaksi</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Waktu Proses</th> <!-- Menambahkan kolom waktu proses -->
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id_pembayaran']; ?></td>
            <td><?php echo $row['nama_metode']; ?></td>
            <td><?php echo $row['biaya_transaksi']; ?></td>
            <td><?php echo $row['deskripsi']; ?></td>
            <td><?php echo $row['status_aktif']; ?></td>
            <td><?php echo $row['waktu_proses']; ?></td>
            <td>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['id_pembayaran']; ?>">Edit</button>

                    <form action="pembayaran.php" method="POST" class="d-inline">
                        <input type="hidden" name="id_pembayaran" value="<?php echo $row['id_pembayaran']; ?>">
                        <button type="submit" name="hapus_metode_pembayaran" class="btn btn-danger">Hapus</button>
                    </form>

                    <!-- Modal Edit Pembayaran -->
<div class="modal fade" id="editModal<?php echo $row['id_pembayaran']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Metode Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form untuk Edit Data Pembayaran -->
                <form action="pembayaran.php" method="POST">
                    <input type="hidden" name="id_pembayaran" value="<?php echo $row['id_pembayaran']; ?>">

                    <!-- Metode Pembayaran -->
                    <div class="mb-3">
                        <select class="form-control" name="nama_metode" required>
                            <option value="E-Wallet" <?php echo $row['nama_metode'] == 'E-Wallet' ? 'selected' : ''; ?>>E-Wallet</option>
                            <option value="M-Banking" <?php echo $row['nama_metode'] == 'M-Banking' ? 'selected' : ''; ?>>M-Banking</option>
                            <option value="Cash" <?php echo $row['nama_metode'] == 'Cash' ? 'selected' : ''; ?>>Cash</option>
                            <option value="Virtual Account" <?php echo $row['nama_metode'] == 'Virtual Account' ? 'selected' : ''; ?>>Virtual Account</option>
                        </select>
                    </div>

                    <!-- Biaya Transaksi -->
                    <div class="mb-3">
                        <input type="number" class="form-control" name="biaya_transaksi" value="<?php echo $row['biaya_transaksi']; ?>" placeholder="Biaya Transaksi" required>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-3">
                        <input type="text" class="form-control" name="deskripsi" value="<?php echo $row['deskripsi']; ?>" placeholder="Deskripsi" required>
                    </div>

                    <!-- Status Aktif -->
                    <div class="mb-3">
                        <select class="form-control" name="status_aktif" required>
                            <option value="Aktif" <?php echo $row['status_aktif'] == 'Aktif' ? 'selected' : ''; ?>>Aktif</option>
                            <option value="Tidak Aktif" <?php echo $row['status_aktif'] == 'Tidak Aktif' ? 'selected' : ''; ?>>Tidak Aktif</option>
                        </select>
                    </div>

                    <!-- Waktu Proses -->
                    <div class="mb-3">
                        <select class="form-control" name="waktu_proses" required>
                            <option value="Instan" <?php echo $row['waktu_proses'] == 'Instan' ? 'selected' : ''; ?>>Instan</option>
                            <option value="Saat Pengiriman" <?php echo $row['waktu_proses'] == 'Saat Pengiriman' ? 'selected' : ''; ?>>Saat Pengiriman</option>
                        </select>
                    </div>

                    <button type="submit" name="edit_pembayaran" class="btn btn-success">Simpan Perubahan</button>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
