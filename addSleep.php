<?php
session_start();
$con=mysqli_connect("kevindunnedesignscom.ipagemysql.com","raulduke","sinead89","babydata");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security
//$uname = mysqli_real_escape_string($con, $_POST['uname']);
$stime = mysqli_real_escape_string($con, $_GET['stime']);
$sdate = mysqli_real_escape_string($con, $_GET['sdate']);


$sql="INSERT INTO sleep (stime, sdate)
VALUES ('$stime', '$sdate')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
eheader("location:index2.php");

mysqli_close($con);

die();
?>
