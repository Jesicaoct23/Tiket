<?php
include 'db.php';

$movieId = isset($_GET['movie_id']) ? (int)$_GET['movie_id'] : 0;

if ($movieId > 0) {
    $sql = "SELECT * FROM movies WHERE movie_id = :movie_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':movie_id' => $movieId]);
    $movie = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($movie) {
        echo "<h1>" . htmlspecialchars($movie['title']) . "</h1>";
        echo "<p>" . htmlspecialchars($movie['description']) . "</p>";
        echo "<p>Release Date: " . htmlspecialchars($movie['release_date']) . "</p>";
        echo "<p>Duration: " . htmlspecialchars($movie['duration']) . " minutes</p>";
        echo "<img src='" . htmlspecialchars($movie['poster_image']) . "' alt='Poster' style='max-width: 300px;'>";
    } else {
        echo "Movie not found.";
    }
} else {
    echo "Invalid movie ID.";
}
?>
