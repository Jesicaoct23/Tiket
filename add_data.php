<?php
include 'db.php';

// Contoh data untuk cinemas
$cinemaName = 'Cineplex 21';
$cinemaLocation = 'Jakarta, Indonesia';

// Menambahkan data ke tabel cinemas
$sql = "INSERT INTO cinemas (name, location) VALUES (:name, :location)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':name' => $cinemaName,
    ':location' => $cinemaLocation
]);

// Contoh data untuk movies
$movieTitle = 'Inception';
$movieDescription = 'A mind-bending thriller about dream infiltration.';
$movieReleaseDate = '2010-07-16';
$movieDuration = 148;
$moviePoster = 'path_to_poster.jpg';

// Menambahkan data ke tabel movies
$sql = "INSERT INTO movies (title, description, release_date, duration, poster_image) VALUES (:title, :description, :release_date, :duration, :poster_image)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':title' => $movieTitle,
    ':description' => $movieDescription,
    ':release_date' => $movieReleaseDate,
    ':duration' => $movieDuration,
    ':poster_image' => $moviePoster
]);

echo "Data berhasil ditambahkan!";
?>
