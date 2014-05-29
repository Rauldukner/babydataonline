<?php
session_start();
$con=mysqli_connect("kevindunnedesignscom.ipagemysql.com","raulduke","sinead89","babydata");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security
//$uname = mysqli_real_escape_string($con, $_POST['uname']);
$endstime = mysqli_real_escape_string($con, $_GET['endstime']);
$endsdate = mysqli_real_escape_string($con, $_GET['endsdate']);


$sql = 'UPDATE sleep SET endstime=\'$endstime\', endsdate=\'$endsdate\' ORDER BY id DESC LIMIT 1';

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
header("location:index2.php");

mysqli_close($con);

die();
?>
