<?php include "log_request.php"; ?>
<?php include "connect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies by Actor</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Movies starring <?php echo htmlspecialchars($_GET['actor']); ?></h2>
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
                JOIN film_actor fa ON f.ID_FILM = fa.FID_Film
                JOIN actor a ON fa.FID_Actor = a.ID_Actor
                WHERE a.name = :actor
            ");
            $stmt->execute(['actor' => $_GET['actor']]);
            while ($row = $stmt->fetch()) {
                echo "<tr><td>{$row['name']}</td><td>{$row['date']}</td><td>{$row['country']}</td><td>{$row['director']}</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
