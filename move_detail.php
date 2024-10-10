<?php
include 'db.php';

// Mengambil data film berdasarkan ID
$movie_id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM movies WHERE movie_id = :id");
$stmt->execute([':id' => $movie_id]);
$movie = $stmt->fetch(PDO::FETCH_ASSOC);

// Mengambil data bioskop yang menayangkan film ini
$showsStmt = $pdo->prepare("SELECT * FROM shows WHERE movie_id = :id");
$showsStmt->execute([':id' => $movie_id]);
$shows = $showsStmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($movie['title']); ?> - Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }
        .movie-detail {
            display: flex;
            flex-wrap: wrap;
        }
        .movie-detail img {
            width: 300px;
            height: auto;
            border-radius: 5px;
        }
        .movie-info {
            margin-left: 20px;
        }
        .movie-info h1 {
            margin-top: 0;
        }
        .show-times {
            margin-top: 20px;
        }
        .show-times table {
            width: 100%;
            border-collapse: collapse;
        }
        .show-times th, .show-times td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        .show-times th {
            background-color: #333;
            color: #fff;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="movie-detail">
        <img src="<?php echo htmlspecialchars($movie['poster_image']); ?>" alt="<?php echo htmlspecialchars($movie['title']); ?>">
        <div class="movie-info">
            <h1><?php echo htmlspecialchars($movie['title']); ?></h1>
            <p><?php echo htmlspecialchars($movie['description']); ?></p>
            <p><strong>Release Date:</strong> <?php echo htmlspecialchars($movie['release_date']); ?></p>
            <p><strong>Duration:</strong> <?php echo htmlspecialchars($movie['duration']); ?> minutes</p>
        </div>
    </div>

    <div class="show-times">
        <h2>Showtimes</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Event Name</th>
                    <th>Show Time</th>
                    <th>Available Seats</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($shows as $show): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($show['show_id']); ?></td>
                        <td><?php echo htmlspecialchars($show['event_name']); ?></td>
                        <td><?php echo htmlspecialchars($show['show_time']); ?></td>
                        <td><?php echo htmlspecialchars($show['available_seats']); ?></td>
                        <td><a href="book_ticket.php?show_id=<?php echo htmlspecialchars($show['show_id']); ?>" class="button">Book Now</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
