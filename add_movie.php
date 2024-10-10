<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $releaseDate = $_POST['release_date'];
    $duration = $_POST['duration'];
    $posterImage = $_POST['poster_image']; // You may want to handle file uploads differently

    $sql = "INSERT INTO movies (title, description, release_date, duration, poster_image) VALUES (:title, :description, :release_date, :duration, :poster_image)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':title' => $title,
        ':description' => $description,
        ':release_date' => $releaseDate,
        ':duration' => $duration,
        ':poster_image' => $posterImage
    ]);

    echo "Movie berhasil ditambahkan!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Movie</title>
    <style>
        /* Tambahkan CSS Anda di sini */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Add New Movie</h1>
    <form method="POST">
        <input type="text" name="title" placeholder="Movie Title" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <input type="date" name="release_date" placeholder="Release Date" required>
        <input type="number" name="duration" placeholder="Duration (minutes)" required>
        <input type="text" name="poster_image" placeholder="Poster Image URL" required>
        <button type="submit">Add Movie</button>
    </form>
</body>
</html>
