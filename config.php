<?php
// Konfigurasi untuk koneksi ke database
$host = "localhost";       // Ganti dengan host database Anda
$username = "root";        // Ganti dengan username database Anda
$password = "";            // Ganti dengan password database Anda
$database = "health_care"; // Nama database yang Anda buat

// Membuat koneksi ke database
$conn = new mysqli($host, $username, $password, $database);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
