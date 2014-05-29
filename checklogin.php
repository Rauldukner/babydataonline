<?php 

ob_start();

$host="kevindunnedesignscom.ipagemysql.com"; // Host name 
$username="raulduke"; // Mysql username 
$password="sinead89"; // Mysql password 
$db_name="babydata"; // Database name 
$tbl_name="profile"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Define $myusername and $mypassword 
$uname=$_POST['uname']; 
$pword=$_POST['pword']; 

// To protect MySQL injection (more detail about MySQL injection)
$uname = stripslashes($uname);
$pword = stripslashes($pword);
$uname = mysql_real_escape_string($uname);
$pword = mysql_real_escape_string($pword);
$sql="SELECT * FROM $tbl_name WHERE uname='$uname' and pword='$pword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
	session_start();
$_SESSION['uname'] = $uname;
$_SESSION['pword'] = $pword; 
session_write_close();
header("location:index2.php");
exit;
}
else {
header("location:index.php");
}
ob_end_flush();

?>
