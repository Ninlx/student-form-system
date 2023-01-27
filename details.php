<?php

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['Access']) && $_SESSION['Access'] == "administrator" || $_SESSION['Access'] == "admin"){
    echo "<div class='message'>Welcome ".$_SESSION['Userlog'].'</div>';
}else{
    echo header("Location: index.php");
}

include_once("connections/connection.php");
$con = connection();

$id = $_GET['ID'];
$sql = "SELECT * FROM people_list WHERE id = '$id'";
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
  <br>
  <br>
  <form action="delete.php" method="post">
    <a href="index.php">Home</a>
    <!-- an access whereas autorize to manage edit and delete the details -->
    <?php if(isset($_SESSION['Access']) && $_SESSION['Access'] == "administrator" || $_SESSION['Access'] == "admin" || $_SESSION['Access'] = "employee" ){ ?>
    <a href="edit.php?ID=<?php echo $row['id'];?>">Edit</a>
    <button type="submit" name="delete">Delete</button>
    <?php }?>
    <input type="hidden" name="ID" value="<?php echo $row['id'];?>">
  </form>
  <br>
  <h2><?php echo $row['first_name'];?> <?php echo $row['last_name'];?></h2>
  <h2><?php echo $row['birth_day'];?></h2>
  <h2><?php echo $row['age']?></h2>
  <h2><?php echo $row['gender'] ?></h2>
  <h2><?php echo $row['email'] ?></h2>
  <h2><?php echo $row['contact_num'] ?></h2>
  <h2><?php echo $row['address'] ?></h2>
</body>

</html>