<?php include "log_request.php"; ?>
<?php include "connect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Database</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Movie Search</h1>
        
        <form action="genre.php" method="GET">
            <label>Genre</label>
            <select name="genre">
                <?php
                $stmt = $pdo->query("SELECT title FROM genre");
                while ($row = $stmt->fetch()) {
                    echo "<option value='{$row['title']}'>{$row['title']}</option>";
                }
                ?>
            </select>
            <button type="submit">Submit</button>
        </form>

        <form action="actor.php" method="GET">
            <label>Actor</label>
            <select name="actor">
                <?php
                $stmt = $pdo->query("SELECT name FROM actor");
                while ($row = $stmt->fetch()) {
                    echo "<option value='{$row['name']}'>{$row['name']}</option>";
                }
                ?>
            </select>
            <button type="submit">Submit</button>
        </form>

        <form action="date.php" method="GET">
            <label>Start Date</label>
            <input type="date" name="start_date">
            <label>End Date</label>
            <input type="date" name="end_date">
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
