<?php
// Konfigurasi database
$host = 'localhost'; // Ganti dengan hostname database Anda jika berbeda
$dbname = 'ticketing_system'; // Nama database yang Anda buat
$username = 'root'; // Ganti dengan username database Anda
$password = ''; // Ganti dengan password database Anda

try {
    // Membuat koneksi ke database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Mengatur mode error PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Menampilkan pesan jika koneksi berhasil
    echo "Koneksi berhasil!";
} catch (PDOException $e) {
    // Menampilkan pesan error jika koneksi gagal
    echo "Koneksi gagal: " . $e->getMessage();
}
?>
