<?php include "log_request.php"; ?>
<?php include "connect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies by Date</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Movies from <?php echo $_GET['start_date']; ?> to <?php echo $_GET['end_date']; ?></h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Country</th>
                <th>Director</th>
            </tr>
            <?php
            $stmt = $pdo->prepare("
                SELECT name, date, country, director 
                FROM film 
                WHERE date BETWEEN :start_date AND :end_date
            ");
            $stmt->execute([
                'start_date' => $_GET['start_date'],
                'end_date' => $_GET['end_date']
            ]);
            while ($row = $stmt->fetch()) {
                echo "<tr><td>{$row['name']}</td><td>{$row['date']}</td><td>{$row['country']}</td><td>{$row['director']}</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
