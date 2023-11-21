<?php
    include "connection/connection.php";
    session_start();

    if (!isset($_SESSION['admin'])) {
        header("Location: login.php");
    }

    if (isset($_POST['gameover'])) {
        $name = $_SESSION['admin']['username'];
        $score = $_POST['score'];

        $sql = "INSERT INTO score VALUES ('$name', $score, NULL)";
        $result = $conn->query($sql);

        if ($result) {
            header("Location: history.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOLE MOULERS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="icon" href="./image/logo-tikus.png">
    <style>
        * { 
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #ffa12c;
            font-family: "Press Start 2P";
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100vh;
        }

        input {
            display: none;
        }

        h3 {
            font-size: 2rem;
        }

        h2 {
            font-size: 3rem; 
        }

        .desc {
            text-align: center;
            padding: 80px 0;
        }

        .btn {
            text-decoration: none;
            font-family: "Press Start 2P";
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: black;
            background-color: white;
            padding: 10px;
            border-radius: 10px;
        }

        .btn-group {
            display: flex;
            justify-content: space-around;
        }

        form {
            background: rgba(0, 0, 0, 0.47);
            padding: 50px;
            border-radius: 20px;
        }
    </style>
</head>
<body>
    <form action="score.php" method="post">
        <h3>TIME OUT</h3>
        <div class="desc">
            <p>SCORE</p>
            <h2 style="margin: 20px 0;"><?= $_GET['score']; ?></h2>
            <input type="text" name="score" value="<?= $_GET['score']; ?>">
        </div>
        <div class="btn-group">
            <a class="btn" href="index.php">BACK</a>
            <button class="btn" type="submit" name="gameover">NEXT</button>
        </div>
    </form>
</body>
</html>