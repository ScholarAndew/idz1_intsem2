<?php include "log_request.php"; ?>
<?php include "connect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies by Genre</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Movies in Genre: <?php echo htmlspecialchars($_GET['genre']); ?></h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Country</th>
                <th>Director</th>
            </tr>
            <?php
            $stmt = $pdo->prepare("
                SELECT f.name, f.date, f.country, f.director 
                FROM film f
                JOIN film_genre fg ON f.ID_FILM = fg.FID_Film
                JOIN genre g ON fg.FID_Genre = g.ID_Genre
                WHERE g.title = :genre
            ");
            $stmt->execute(['genre' => $_GET['genre']]);
            while ($row = $stmt->fetch()) {
                echo "<tr><td>{$row['name']}</td><td>{$row['date']}</td><td>{$row['country']}</td><td>{$row['director']}</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
