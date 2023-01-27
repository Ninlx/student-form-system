<?php
include_once("connections/connection.php");
$con = connection();
$id = $_GET['ID'];

$sql = "SELECT * FROM people_list WHERE id = '$id'";
$students = $con->query($sql) or die ($con->error);
$row = $students->fetch_assoc();

if(isset($_POST['submit'])){
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $age = $_POST['age'];
    $bday = $_POST['birth_day'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $contact_num = $_POST['contact_num'];
    $address = $_POST['address'];
    $sql = "UPDATE people_list SET first_name = '$fname', last_name = '$lname', age = '$age', birth_day = '$bday', email = '$email', address = '$address', contact_num = '$contact_num', gender = '$gender' WHERE id = '$id'";
    $con->query($sql) or die ($con->error);
    echo header("LOCATION: details.php?ID=".$id);
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
  <a href="index.php">Home</a>
  <form action="" method="post">
    <label>First Name</label>
    <input type="text" name="first_name" id="first_name" value="<?php echo $row['first_name'];?>">
    <label>Last Name</label>
    <input type="text" name="last_name" id="last_name" value="<?php echo $row['last_name'];?>">
    <label>Age</label>
    <input type="number" name="age" id="age" value="<?php echo $row['age'];?>">
    <label>Birthday</label>
    <input type="date" name="birth_day" id="birth_day" value="<?php echo $row['birth_day'];?>">
    <label>Gender</label>
    <select name="gender" id="gender">
      <option value="Male" <?php echo ( $row['gender'] == "Male")? 'selected' : ''; ?>>Male</option>
      <option value="Female" <?php echo ( $row['gender'] == "Female")? 'selected' : ''; ?>>Female</option>
      <option value="Lesbian" <?php echo ( $row['gender'] == "Lesbian")? 'selected' : ''; ?>>Lesbian</option>
      <option value="Gay" <?php echo ( $row['gender'] == "Gay")? 'selected' : ''; ?>>Gay</option>
    </select>
    <label>Email</label>
    <input type="text" name="email" id="email" value="<?php echo $row['email'];?>">
    <label>Contact #</label>
    <input type="number" name="contact_num" id="contact_num" value="<?php echo $row['contact_num'];?>">
    <label>Address</label>
    <input type="text" name="address" id="address" value="<?php echo $row['address'];?>">
    <input type="submit" name="submit" value="Update">
  </form>
</body>

</html>