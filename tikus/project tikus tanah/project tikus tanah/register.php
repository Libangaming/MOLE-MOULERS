<?php 
$koneksi=mysqli_connect("localhost","root","","molemoulers");
if (isset($_POST["login"])) {
  $username=$_POST["username"];
  $password=$_POST["password"];

  $query="INSERT INTO register VALUES ('','$username','$password')";
  $result = mysqli_query($koneksi,$query);

  if ($result) {
    echo "<meta http-equiv='refresh' content='1;url=login.php'>";
  }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MOLE MOULERS</title>
  <link rel="stylesheet" href="register.css">
  <link rel="icon" href="./image/logo-tikus.png">
</head>
<body>
    <div class="container1">
      <div class="login">
        <form action="" method="post">
          <h1>REGISTER</h1>
          <hr>
          <p>MOLE MOULERS</p>
          <label for="">Username</label>
          <input type="text" placeholder="Username" required name="username">

          <label for="">Password</label>
          <input type="password"
          placeholder="Password" required name="password">

          <label for="">Confirm Password</label>
          <input type="password" required 
          placeholder="confirm Password">
          <input type="submit" value="register" class="button" name="login">
          <p>
            <a href="./login.php">Have an account?</a>
          </p>
        </form>
      </div>
      <div class="right">
        <img src="./image/tanah+tikus.png" alt="">
      </div>
    </div>
  
</body>
</html>