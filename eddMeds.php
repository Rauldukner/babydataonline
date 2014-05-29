<?php
session_start();
$con=mysqli_connect("kevindunnedesignscom.ipagemysql.com","raulduke","sinead89","babydata");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security
$medtype = mysqli_real_escape_string($con, $_POST['medtype']);

$meddate = mysqli_real_escape_string($con, $_POST['meddate']);
$medtime = mysqli_real_escape_string($con, $_POST['medtime']);
$mednotes = mysqli_real_escape_string($con, $_POST['mednotes']);
//$uname = mysqli_real_escape_string($con, $_GET['uname']);

$sql="INSERT INTO medication (medtype, meddate, medtime, mednotes)
VALUES ('$medtype','$meddate', '$medtime', '$mednotes')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}

header("location:index2.php");

mysqli_close($con);

die();
?>
