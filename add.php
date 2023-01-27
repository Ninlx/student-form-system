<?php

include_once("connections/connection.php");
$con = connection();

if(isset($_POST['submit'])){

    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $age = $_POST['age'];
    $bday = $_POST['birth_day'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $contact_num = $_POST['contact_num'];
    $address = $_POST['address'];

    $sql = "INSERT INTO `people_list`(`first_name`, `last_name`, `age`, `birth_day`, `gender`, `email`, `contact_num`, `address`) VALUES ('$fname', '$lname', '$age', '$bday', '$gender', '$email', '$contact_num', '$address')";
    $con->query($sql) or die ($con->error);

    echo header("LOCATION: index.php");
    }
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

  <div class="add-container">
    <a href="index.php">Home</a>
    <form class="add-form" action="" method="post">
      <label>First Name</label>
      <input type="text" name="first_name" id="first_name">
      <label>Last Name</label>
      <input type="text" name="last_name" id="last_name">
      <label>Age</label>
      <input type="number" name="age" id="age">
      <label>Birthday</label>
      <input type="date" name="birth_day" id="birth_day">
      <label>Gender</label>
      <select name="gender" id="gender">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Lesbian">Lesbian</option>
        <option value="Gay">Gay</option>
      </select>
      <label>Email</label>
      <input type="text" name="email" id="email">
      <label>Contact #</label>
      <input type="number" name="contact_num" id="contact_num">
      <label>Address</label>
      <input type="text" name="address" id="address">
      <div class="submit-container">
        <input type="submit" name="submit" value="Submit Form">
      </div>
    </form>
  </div>
</body>

</html>