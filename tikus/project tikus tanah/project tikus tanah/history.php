<?php
    session_start();
    include "connection/connection.php";

    if (!isset($_SESSION['admin'])) {
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOLE MOULERS</title>
    <link rel="stylesheet" href="history.css">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .screen {
            width: 100%;
            height: 100vh;
            background-color: #FFA12C;
        }

        .screen-top {
            padding-top: 20px;
            padding-left: 20px;
        }

        .title {
            padding: 20px 0;
        }

        .title h3 {
            text-align: center;
            font-family: 'Press Start 2P';
            font-size: 2rem;
        }

        .section {
            padding: 0 80px;
        }

        .history {
            background: rgba(0, 0, 0, 0.47);
            border-radius: 106px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
            padding: 60px 80px;
        }

        .user:nth-child(1) {
            grid-row: 1 / span 1;
            grid-column: 1 / span 1;
        }

        .user:nth-child(2) {
            grid-row: 2 / span 1;
            grid-column: 1 / span 1;
        }

        .user:nth-child(3) {
            grid-row: 3 / span 1;
            grid-column: 1 / span 1;
        }

        .user:nth-child(4) {
            grid-row: 4 / span 1;
            grid-column: 1 / span 1;
        }
        
        .user:nth-child(5) {
            grid-row: 5 / span 1;
            grid-column: 1 / span 1;
        }

        .user:nth-child(6) {
            grid-row: 1 / span 1;
            grid-column: 2 / span 1;
        }

        .user:nth-child(7) {
            grid-row: 2 / span 1;
            grid-column: 2 / span 1;
        }

        .user:nth-child(8) {
            grid-row: 3 / span 1;
            grid-column: 2 / span 1;
        }

        .user:nth-child(9) {
            grid-row: 4 / span 1;
            grid-column: 2 / span 1;
        }

        .user:nth-child(10) {
            grid-row: 5 / span 1;
            grid-column: 2 / span 1;
        }
        
        .user {
            display: flex;
            background-color: white;
            font-family: 'Press Start 2P';
            border-radius: 51.50px;
        }

        .score {
            background-color: black;
            padding: 15px;
            border-radius: 51.50px 10px 10px 51.50px;
            width: 100px;
            color: white;
            font-size: 1.8rem;
            text-align: center;
        }

        .time {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 20px;
        }

        @media (max-width: 768px) {
            .history {
                display: block;
            }

            .section {
                padding: 20px;
            }

            .history {
                padding: 40px;
            }

            .user {
                margin: 20px 0;
            }
        }
    </style>
</head>
<body>
    <div class="screen">
        <div class="screen-top">
            <a class="btn-top" href="index.php">
                <img src="./image/back.png" alt="back">
            </a>
        </div>

        <div class="title">
            <h3>HISTORY SCORE</h3>
        </div>

        <div class="section">
            <div class="history">
                <?php 
                    date_default_timezone_set('Asia/Jakarta');
                    $username = $_SESSION['admin']['username'];
                    $sql = "SELECT * FROM `score` WHERE username='$username' ORDER BY `timestamp` DESC LIMIT 10";
                    $result = $conn->query($sql);
                    $waktu_sekarang = time();
                    // $timestamp = $data['timestamp'];
                    

                    
                    while($row = $result->fetch_array()) {
                        $timestamp_unix = strtotime($row['timestamp']);
                        
                        $selisih_detik = $waktu_sekarang - $timestamp_unix;
                        

                        if ($selisih_detik < 60) {
                            $teks_waktu = $selisih_detik . " sec" . ($selisih_detik > 1 ? "s" : "") . " ago";
                        } elseif ($selisih_detik < 3600) {
                            $menit = floor($selisih_detik / 60);
                            $teks_waktu = $menit . " min" . ($menit > 1 ? "s" : "") . " ago";
                        } elseif ($selisih_detik < 86400) {
                            $jam = floor($selisih_detik / 3600);
                            $teks_waktu = $jam . " hour" . ($jam > 1 ? "s" : "") . " ago";
                        } elseif ($selisih_detik < 2592000) {
                            $hari = floor($selisih_detik / 86400);
                            $teks_waktu = $hari . " day" . ($hari > 1 ? "s" : "") . " ago";
                        } elseif ($selisih_detik < 31536000) {
                            $bulan = floor($selisih_detik / 2592000);
                            $teks_waktu = $bulan . " month" . ($bulan > 1 ? "s" : "") . " ago";
                        } else {
                            $tahun = floor($selisih_detik / 31536000);
                            $teks_waktu = $tahun . " year" . ($tahun > 1 ? "s" : "") . " ago";
                        }

                        $tanggal = date('d-m-Y', strtotime($row['timestamp']));

                        echo "<div class='user'>
                        <div class='score'>
                            <h4>$row[score]</h4>
                        </div>
                        <div class='time'>
                            <p>$teks_waktu $tanggal</p>
                        </div>
                    </div>";
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- <div style="width: 100%; height: 100%; position: relative; background: #FFA12C; padding-top: 50%;">
        <div style="width: 61px; height: 48px; left: 101px; top: 12px; position: absolute">
            <img src="./image/back.png" alt="">
            <div style="width: 61px; height: 48px; left: 0px; top: 0px; position: absolute; background: #D9D9D9; border-radius: 10px"></div>
            <div style="width: 35px; height: 35px; left: 13px; top: 6px; position: absolute; background: black"></div>
        </div>
        <div style="left: 381px; top: 53px; position: absolute; color: black; font-size: 65px; font-family: 'Press Start 2P'; font-weight: 400; word-wrap: break-word">HISTORY SCORE</div>
        <div style="width: 1213px; height: 764px; left: 211px; top: 176px; position: absolute; background: rgba(0, 0, 0, 0.47); border-radius: 106px"></div>
        <div style="width: 467px; height: 103px; left: 280px; top: 248px; position: absolute">
            <div style="width: 467px; height: 103px; left: 0px; top: 0px; position: absolute; background: #D9D9D9; border-radius: 51.50px"></div>
            <div style="width: 185px; height: 103px; left: 0px; top: 0px; position: absolute; background: black; border-top-left-radius: 50.50px; border-top-right-radius: 10.50px; border-bottom-right-radius: 10.50px; border-bottom-left-radius: 50.50px"></div>
            <div style="left: 28px; top: 19px; position: absolute; color: white; font-size: 65px; font-family: 'Press Start 2P'; font-weight: 400; word-wrap: break-word">40</div>
            <div style="left: 197px; top: 39px; position: absolute; color: black; font-size: 24px; font-family: 'Press Start 2P'; font-weight: 400; word-wrap: break-word">10 min ago</div>
        </div>
        <div style="width: 467px; height: 103px; left: 280px; top: 364px; position: absolute">
            <div style="width: 467px; height: 103px; left: 0px; top: 0px; position: absolute; background: #D9D9D9; border-radius: 51.50px"></div>
            <div style="width: 185px; height: 103px; left: 0px; top: 0px; position: absolute; background: black; border-top-left-radius: 50.50px; border-top-right-radius: 10.50px; border-bottom-right-radius: 10.50px; border-bottom-left-radius: 50.50px"></div>
            <div style="left: 28px; top: 19px; position: absolute; color: white; font-size: 65px; font-family: 'Press Start 2P'; font-weight: 400; word-wrap: break-word">30</div>
            <div style="left: 197px; top: 39px; position: absolute; color: black; font-size: 24px; font-family:'Press Start 2P'; font-weight: 400; word-wrap: break-word">30 min ago</div>
        </div>
        <div style="width: 467px; height: 103px; left: 280px; top: 480px; position: absolute">
            <div style="width: 467px; height: 103px; left: 0px; top: 0px; position: absolute; background: #D9D9D9; border-radius: 51.50px"></div>
            <div style="width: 185px; height: 103px; left: 0px; top: 0px; position: absolute; background: black; border-top-left-radius: 50.50px; border-top-right-radius: 10.50px; border-bottom-right-radius: 10.50px; border-bottom-left-radius: 50.50px"></div>
            <div style="left: 28px; top: 19px; position: absolute; color: white; font-size: 65px; font-family: 'Press Start 2P'; font-weight: 400; word-wrap: break-word">34</div>
            <div style="left: 197px; top: 39px; position: absolute; color: black; font-size: 24px; font-family: 'Press Start 2P'; font-weight: 400; word-wrap: break-word">1 day ago</div>
        </div>
        <div style="width: 467px; height: 103px; left: 289px; top: 712px; position: absolute">
            <div style="width: 467px; height: 103px; left: 0px; top: 0px; position: absolute; background: #D9D9D9; border-radius: 51.50px"></div>
            <div style="width: 185px; height: 103px; left: 0px; top: 0px; position: absolute; background: black; border-top-left-radius: 50.50px; border-top-right-radius: 10.50px; border-bottom-right-radius: 10.50px; border-bottom-left-radius: 50.50px"></div>
            <div style="left: 28px; top: 19px; position: absolute; color: white; font-size: 65px; font-family: 'Press Start 2P'; font-weight: 400; word-wrap: break-word">40</div>
            <div style="left: 197px; top: 39px; position: absolute; color: black; font-size: 24px; font-family: 'Press Start 2P'; font-weight: 400; word-wrap: break-word">3 day ago</div>
        </div>
        <div style="width: 467px; height: 103px; left: 280px; top: 596px; position: absolute">
            <div style="width: 467px; height: 103px; left: 0px; top: 0px; position: absolute; background: #D9D9D9; border-radius: 51.50px"></div>
            <div style="width: 185px; height: 103px; left: 0px; top: 0px; position: absolute; background: black; border-top-left-radius: 50.50px; border-top-right-radius: 10.50px; border-bottom-right-radius: 10.50px; border-bottom-left-radius: 50.50px"></div>
            <div style="left: 28px; top: 19px; position: absolute; color: white; font-size: 65px; font-family: 'Press Start 2P'; font-weight: 400; word-wrap: break-word">32</div>
            <div style="left: 197px; top: 39px; position: absolute; color: black; font-size: 24px; font-family: 'Press Start 2P'; font-weight: 400; word-wrap: break-word">3 day ago</div>
        </div>
        <div style="width: 467px; height: 103px; left: 829px; top: 248px; position: absolute">
            <div style="width: 467px; height: 103px; left: 0px; top: 0px; position: absolute; background: #D9D9D9; border-radius: 51.50px"></div>
            <div style="width: 185px; height: 103px; left: 0px; top: 0px; position: absolute; background: black; border-top-left-radius: 50.50px; border-top-right-radius: 10.50px; border-bottom-right-radius: 10.50px; border-bottom-left-radius: 50.50px"></div>
            <div style="left: 28px; top: 19px; position: absolute; color: white; font-size: 65px; font-family: 'Press Start 2P'; font-weight: 400; word-wrap: break-word">28</div>
            <div style="left: 197px; top: 39px; position: absolute; color: black; font-size: 24px; font-family: 'Press Start 2P'; font-weight: 400; word-wrap: break-word">4 day ago</div>
        </div>
        <div style="width: 467px; height: 103px; left: 829px; top: 364px; position: absolute">
            <div style="width: 467px; height: 103px; left: 0px; top: 0px; position: absolute; background: #D9D9D9; border-radius: 51.50px"></div>
            <div style="width: 185px; height: 103px; left: 0px; top: 0px; position: absolute; background: black; border-top-left-radius: 50.50px; border-top-right-radius: 10.50px; border-bottom-right-radius: 10.50px; border-bottom-left-radius: 50.50px"></div>
            <div style="left: 28px; top: 19px; position: absolute; color: white; font-size: 65px; font-family: 'Press Start 2P'; font-weight: 400; word-wrap: break-word">33</div>
            <div style="left: 197px; top: 39px; position: absolute; color: black; font-size: 24px; font-family: 'Press Start 2P'; font-weight: 400; word-wrap: break-word">4 day ago</div>
        </div>
        <div style="width: 467px; height: 103px; left: 829px; top: 480px; position: absolute;  ">
            <div style="width: 467px; height: 103px; left: 0px; top: 0px; position: absolute; background: #D9D9D9; border-radius: 51.50px"></div>
            <div style="width: 185px; height: 103px; left: 0px; top: 0px; position: absolute; background: black; border-top-left-radius: 50.50px; border-top-right-radius: 10.50px; border-bottom-right-radius: 10.50px; border-bottom-left-radius: 50.50px"></div>
            <div style="left: 28px; top: 19px; position: absolute; color: white; font-size: 65px; font-family: 'Press Start 2P'; font-weight: 400; word-wrap: break-word">35</div>
            <div style="left: 197px; top: 39px; position: absolute; color: black; font-size: 24px; font-family: 'Press Start 2P'; font-weight: 400; word-wrap: break-word">4 day ago</div>
        </div>
        <div style="width: 467px; height: 103px; left: 829px; top: 596px; position: absolute">
            <div style="width: 467px; height: 103px; left: 0px; top: 0px; position: absolute; background: #D9D9D9; border-radius: 51.50px"></div>
            <div style="width: 185px; height: 103px; left: 0px; top: 0px; position: absolute; background: black; border-top-left-radius: 50.50px; border-top-right-radius: 10.50px; border-bottom-right-radius: 10.50px; border-bottom-left-radius: 50.50px"></div>
            <div style="left: 28px; top: 19px; position: absolute; color: white; font-size: 65px; font-family: 'Press Start 2P'; font-weight: 400; word-wrap: break-word">32</div>
            <div style="left: 197px; top: 39px; position: absolute; color: black; font-size: 24px; font-family: 'Press Start 2P'; font-weight: 400; word-wrap: break-word">5 day ago</div>
        </div>
        <div style="width: 467px; height: 103px; left: 840px; top: 712px; position: absolute">
            <div style="width: 467px; height: 103px; left: 0px; top: 0px; position: absolute; background: #D9D9D9; border-radius: 51.50px"></div>
            <div style="width: 185px; height: 103px; left: 0px; top: 0px; position: absolute; background: black; border-top-left-radius: 50.50px; border-top-right-radius: 10.50px; border-bottom-right-radius: 10.50px; border-bottom-left-radius: 50.50px"></div>
            <div style="left: 28px; top: 19px; position: absolute; color: white; font-size: 65px; font-family:'Press Start 2P'; font-weight: 400; word-wrap: break-word">37</div>
            <div style="left: 197px; top: 39px; position: absolute; color: black; font-size: 24px; font-family: 'Press Start 2P'; font-weight: 400; word-wrap: break-word">5 day ago</div>
        </div>
    </div> -->
</body>
</html>