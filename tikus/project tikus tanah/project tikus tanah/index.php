<?php
    include "connection/connection.php";

    session_start();

    if (!isset($_SESSION['admin'])) {
        header("Location: login.php");
    }

    if (isset($_POST['logout'])) {
        session_destroy();
        header("Location: login.php");
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
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="./image/logo-tikus.png">
    <style>
        html,body{
            cursor: grab;
        }
        html:active,body:active{
            cursor:  grabbing;
        }
        .btn-top {
            display: flex;
            justify-content: space-between;
            padding: 10px 10px 50px 10px;
        }

        .btn-top img {
            width: 50px;
            height: 50px;
            border-radius: 5px;
        }

        .btn-top img:nth-child(4) {
            height: 500px;
        }
    </style>
</head>
<body style="background-size: cover; background-color: #ffa12c;">
    <form action="index.php" method="post" style="display: none;">
        <button id="logoutbtn" type="submit" name="logout">Logout</button>
    </form>

    <div class="btn-top">
        <div>
            <div onclick="music();" style="cursor: pointer; display: inline-block;">
                <img src="./image/mute sound.png" id="off">
                <img src="./image/on-sound.png" id="on" style="display: none;">
            </div>
            <a href="history.php">
                <img src="./image/history.png">
            </a>
        </div>
        <a class="signout" onclick="document.querySelector('#logoutbtn').click();" style="cursor: pointer; background-color: white; display: flex; justify-content: center; align-items: center; width: 120px; font-family: 'Press Start 2P'; border-radius: 5px;">
            Logout
        </a>
    </div>

    <!-- <div class="logout">
        <a onclick="document.querySelector('#logoutbtn').click();" style="cursor: pointer;">
            <img src="./image/logout2.png" >
        </a>
    </div> -->
    <h1 style="font-family: 'Press Start 2P'; text-align: center; font-size: 50px;">MOLE MOULERS</h1>
    <h2 class="papan-skor" style="font-family: 'Press Start 2P'; text-align: center; font-size: 50px;">0</h2>
    
    <button  type="button" class="mulai" onclick="mulai()" >Play</button>

    <div class="container">
        <div class="tanah">
            <div class="tikus"></div>
        </div>
        <div class="tanah">
            <div class="tikus"></div>
        </div>
        <div class="tanah">
            <div class="tikus"></div>
        </div>
        <div class="tanah">
            <div class="tikus"></div>
        </div>
        <div class="tanah">
            <div class="tikus"></div>
        </div>
        <div class="tanah">
            <div class="tikus"></div>
        </div>
    </div>
    <audio src="audio/pou.mp3" id="backsong"></audio>
    <audio src="audio/Pop.mp3" id="pop"></audio>

    <script src="./js/script.js"></script>


</body>

</html>