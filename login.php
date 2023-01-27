<?php

if(!isset($_SESSION)){
    session_start();
}

include_once("connections/connection.php");
$con = connection();

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users_list WHERE username = '$username' AND password = '$password'";
    $user = $con->query($sql) or die ($con->error);
    $row = $user->fetch_assoc();
    $total = $user->num_rows;

    if($total > 0){
        $_SESSION['Userlog'] = $row['username'];
        $_SESSION['Access'] = $row['access'];
        echo header("LOCATION: index.php");
    }else{
        echo "<div class='message'>no user found</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <title>Student Form System</title>
  <link rel="stylesheet" href="css/app.css">
  <script src="js/app.js"></script>
</head>

<body>
  <div class="wrapper">
    <div class="login-back">
      <a href="index.php">Home</a>
    </div>
    <div class="heading">
      <h1>login page</h1>
    </div>
    <form action="" method="post">
      <div class="login-form">
        <label for="username"><i class="fas fa-user"></i> Username</label>
        <input type="text" name="username" id="username" autocomplete="off" required>
      </div>
      <div class="login-form">
        <label for="password"><i class="fa-solid fa-fingerprint"></i> Password</label>
        <input type="password" name="password" id="password" autocomplete="off" required>
      </div>
      <button type="submit" name="login" class="login-btn">login</button>
    </form>
  </div>
</body>

</html>