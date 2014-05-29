<?php
 session_start();
$con=mysqli_connect("kevindunnedesignscom.ipagemysql.com","raulduke","sinead89","babydata");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security
$mstype = mysqli_real_escape_string($con, $_POST['mstype']);

$msdate = mysqli_real_escape_string($con, $_POST['msdate']);
//$uname = mysqli_real_escape_string($con, $_GET['uname']);

$sql="INSERT INTO milestones (mstype, msdate)
VALUES ('$mstype','$msdate')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}

header("location:index2.php");

mysqli_close($con);

die();
?>
