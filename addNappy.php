<?php
 session_start();
$con=mysqli_connect("kevindunnedesignscom.ipagemysql.com","raulduke","sinead89","babydata");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security
$ntype = mysqli_real_escape_string($con, $_GET['ntype']);
$ntime = mysqli_real_escape_string($con, $_GET['ntime']);
$ndate = mysqli_real_escape_string($con, $_GET['ndate']);
$observations = mysqli_real_escape_string($con, $_GET['observations']);

$sql="INSERT INTO nappy (ntype, ntime, ndate, observations)
VALUES ('$ntype', '$ntime', '$ndate', '$observations')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}

header("location:index2.php");

mysqli_close($con);

die();
?>
