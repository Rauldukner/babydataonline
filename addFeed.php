<?php
session_start();
$con=mysqli_connect("kevindunnedesignscom.ipagemysql.com","raulduke","sinead89","babydata");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security
$feedtype = mysqli_real_escape_string($con, $_POST['feedtype']);
$feedtime = mysqli_real_escape_string($con, $_POST['feedtime']);
$feeddate = mysqli_real_escape_string($con, $_POST['feeddate']);

$sql="INSERT INTO feeds (feedtime, feeddate, feedtype)
VALUES ('$feedtime', '$feeddate', '$feedtype')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
header("location:index2.php");


mysqli_close($con);

die();

?>
