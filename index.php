<?php

if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['Userlog'])){
    echo "<div class='message'>Welcome ".$_SESSION['Userlog'].'</div>';
}else{
    echo "<div class='message'>Welcome human</div>";
}

include_once("connections/connection.php");
$con = connection();

$sql = "SELECT * FROM people_list ORDER BY id DESC";
$students = $con->query($sql) or die ($con->error);
$row = $students->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Form System</title>
  <link rel="stylesheet" href="css/app.css">
  <script src="js/app.js"></script>

</head>

<body>
  <header class="header">
    <div class="heading">
      <h1>barangay form</h1>
    </div>
    <p class="paragraph"><small>if u are sinior and u forgot u are bullshit</small></p>
    <div class="index-input-form">
      <form action="result.php" method="get">
        <input type="text" name="search" id="seach">
        <button type="submit">Search</button>
      </form>
    </div>
    <div class="index-anchor">
      <div class="index-userlog">
        <?php
                if(isset($_SESSION['Userlog'])){
                ?>
        <a href="logout.php">Logout</a>
        <?php }else{ ?>
        <a href="login.php">Login</a>
        <?php }
                ?>
      </div>
      <div class="index-a">
        <a href="add.php">Add</a>
      </div>
    </div>
  </header>
  <table class="table-content">
    <thead>
      <tr>
        <th></th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Age</th>
        <th>Birthday</th>
        <th>Gender</th>
        <th>Email Address</th>
        <th>Contact #</th>
        <th>Complete Current Address</th>
      </tr>
    </thead>
    <tbody>
      <?php do{ ?>
      <tr>
        <td> <a class="view-a" href="details.php?ID=<?php echo $row['id'];?>">view</a></td>
        <td width="125"> <?php echo $row['first_name']; ?> </td>
        <td width="120"> <?php echo $row['last_name']; ?> </td>
        <td> <?php echo $row['age']; ?> </td>
        <td width="110"> <?php echo $row['birth_day']; ?> </td>
        <td> <?php echo $row['gender']; ?> </td>
        <td> <?php echo $row['email'] ?> </td>
        <td> <?php echo $row['contact_num']; ?></td>
        <td> <?php echo $row['address'] ?></td>
      </tr>
      <?php }while($row = $students->fetch_assoc()); ?>
    </tbody>
  </table>
</body>

</html>