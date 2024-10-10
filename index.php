<?php
include 'db.php';

// Mendapatkan tanggal saat ini
$currentDate = date('Y-m-d');

// Mengambil data film untuk masing-masing kategori
$availableNowStmt = $pdo->prepare("SELECT * FROM movies WHERE release_date <= :currentDate");
$availableNowStmt->execute([':currentDate' => $currentDate]);
$availableNow = $availableNowStmt->fetchAll(PDO::FETCH_ASSOC);

$upcomingStmt = $pdo->prepare("SELECT * FROM movies WHERE release_date > :currentDate");
$upcomingStmt->execute([':currentDate' => $currentDate]);
$upcoming = $upcomingStmt->fetchAll(PDO::FETCH_ASSOC);

$pastStmt = $pdo->prepare("SELECT * FROM movies WHERE release_date < :currentDate");
$pastStmt->execute([':currentDate' => $currentDate]);
$past = $pastStmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Ticket Booking System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
            margin: 0;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .category {
            margin-bottom: 40px;
        }
        .category h2 {
            background: #007bff;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin: 0;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 20px;
        }
        .movie {
            width: calc(25% - 20px);
            background: #fff;
            padding: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .movie img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .movie h3 {
            font-size: 18px;
            margin: 10px 0;
        }
        .movie a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .movie a:hover {
            background-color: #0056b3;
        }
        @media (max-width: 1200px) {
            .movie {
                width: calc(33.333% - 20px);
            }
        }
        @media (max-width: 900px) {
            .movie {
                width: calc(50% - 20px);
            }
        }
        @media (max-width: 600px) {
            .movie {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <h1>Welcome to the Cinema Booking System</h1>

    <!-- Available Now -->
    <div class="category">
        <h2>Available Now</h2>
        <div class="container">
            <?php foreach ($availableNow as $movie): ?>
                <div class="movie">
                    <img src="<?php echo htmlspecialchars($movie['poster_image']); ?>" alt="<?php echo htmlspecialchars($movie['title']); ?>">
                    <h3><?php echo htmlspecialchars($movie['title']); ?></h3>
                    <a href="movie_detail.php?id=<?php echo htmlspecialchars($movie['movie_id']); ?>">View Details</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Upcoming -->
    <div class="category">
        <h2>Upcoming</h2>
        <div class="container">
            <?php foreach ($upcoming as $movie): ?>
                <div class="movie">
                    <img src="<?php echo htmlspecialchars($movie['poster_image']); ?>" alt="<?php echo htmlspecialchars($movie['title']); ?>">
                    <h3><?php echo htmlspecialchars($movie['title']); ?></h3>
                    <a href="movie_detail.php?id=<?php echo htmlspecialchars($movie['movie_id']); ?>">View Details</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Past -->
    <div class="category">
        <h2>Past</h2>
        <div class="container">
            <?php foreach ($past as $movie): ?>
                <div class="movie">
                    <img src="<?php echo htmlspecialchars($movie['poster_image']); ?>" alt="<?php echo htmlspecialchars($movie['title']); ?>">
                    <h3><?php echo htmlspecialchars($movie['title']); ?></h3>
                    <a href="movie_detail.php?id=<?php echo htmlspecialchars($movie['movie_id']); ?>">View Details</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
