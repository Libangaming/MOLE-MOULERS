<?php
session_start();
$koneksi = new mysqli("localhost","root","","molemoulers");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MOLE MOULERS</title>
  <link rel="stylesheet" href="login.css">
  <link rel="icon" href="./image/logo-tikus.png">
</head>
<body>
    <div class="container1">
      <div class="login">
        <form action="login.php" method="POST">
          <h1>Login</h1>
          <hr>
          <p>MOLE MOULERS</p>
          <label for="">Username</label>
          <input type="text" placeholder="Username" name="user" required>
          <label for="">Password</label>
          <input type="password"
          placeholder="Password" name="pass" required>
          <input type="submit" value="login" name="login" class="button">
          <p>
            <a href="register.php">Lupa Password</a>
          </p>
        </form>
        <?php 
          if (isset($_POST['login'])) {
            // $username = $_POST['user'];
            // $password = $_POST['pass'];


            // $sql = "SELECT * FROM login WHERE username='$username' AND password='$password'";

            // $result = $koneksi->query($sql);

            // if ($result->num_rows > 0) {
            //   $row = $result->fetch_assoc();

            //   if ($password == $row['password']) {
            //     $_SESSION['admin'] = $ambil->fetch_assoc();
            //     echo "<meta http-equiv='refresh' content='1;url=index.php'>";
            //   } else {
            //     echo "<meta http-equiv='refresh' content='1;url=login.php'>";
            //   }
            // }

            $ambil = $koneksi->query("SELECT * FROM register WHERE username='$_POST[user]'
            AND password='$_POST[pass]'");
            $yangcocok =$ambil->num_rows;
            if ($yangcocok==0) 
            {
            
              // echo "<div class='alert alert-danger'>Login Gagal</div>";
              echo "<meta http-equiv='refresh' content='1;url=login.php'>";
            }
            else {
              $_SESSION['admin'] = $ambil->fetch_assoc();
              echo "<meta http-equiv='refresh' content='1;url=index.php'>";
              // echo "<div class='alert alert-info'>Login Berhasil</div>";  
              // $_SESSION['username'] = $
              
            }
          }
          ?>
      </div>
      <div class="right">
        <img src="./image/tanah+tikus.png" alt="">
      </div>
    </div>
  
</body>
</html>