<?php

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['Userlog'])){
    echo "Welcome ".$_SESSION['Userlog'];
}else{
    echo "Welcome";
}

include_once("connections/connection.php");
$con = connection();

$search = $_GET['search'];
$sql = "SELECT * FROM people_list WHERE first_name LIKE '%$search%' || last_name LIKE '%$search%' ORDER BY id DESC";
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
  <h1>BARANGAY FORM</h1>
  <p><small>if u are sinior and u forgot u are bullshit</small></p>
  <br>
  <br>
  <form action="result.php" method="get">
    <input type="text" name="search" id="seach" recquired>
    <button type="submit">search</button>
  </form>
  <?php
        if(isset($_SESSION['Userlog'])){
        ?>
  <a href="logout.php">Logout</a>
  <?php }else{ ?>
  <a href="login.php">Login</a>
  <?php }
        ?>
  <a href="index.php">Home</a>
  <a href="add.php">Add</a>
  <table>
    <thead>
      <tr>
        <th></th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Age</th>
        <th>Birthday</th>
        <th>Gender</th>
        <th>Email</th>
        <th>Contact #</th>
        <th>Address</th>
      </tr>
    </thead>
    <tbody>
      <?php do{ ?>
      <tr>
        <td width="70"><a href="details.php?ID=<?php echo $row['id'];?>">view</a></td>
        <td width="120"> <?php echo $row['first_name']; ?> </td>
        <td width="120"> <?php echo $row['last_name']; ?> </td>
        <td width="30"> <?php echo $row['age']; ?> </td>
        <td width="120"> <?php echo $row['birth_day']; ?> </td>
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