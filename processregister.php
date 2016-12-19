<?php 
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>
<?php
	// connect to the database server
	$DServer = mysql_connect("mysql2.000webhost.com", "a9309716_tumini", "tumini5") or die("connect connect");
	// select the database from the server
	$DBase = mysql_select_db("a9309716_tafe", $DServer) or die("not working");
	$user = $_POST['register-user'];
	$pass = $_POST['register-pass'];
	$fname = $_POST['register-fname'];
	$lname = $_POST['register-lname'];
	$mobile = $_POST['register-mobile#'];
	$phone = $_POST['register-phone#'];
	$email = $_POST['register-email'];
	$address = $_POST['register-address'];
	mysql_real_escape_string($user);
	stripslashes($user);
	mysql_real_escape_string($pass);
	stripslashes($pass);
	mysql_real_escape_string($fname);
	stripslashes($fname);
	mysql_real_escape_string($lname);
	stripslashes($lname);
	mysql_real_escape_string($mobile);
	stripslashes($mobile);
	mysql_real_escape_string($phone);
	stripslashes($phone);
	mysql_real_escape_string($email);
	stripslashes($email);
	mysql_real_escape_string($address);
	stripslashes($address);
	$pass = sha1($pass);
	$user_check = "SELECT `username` from tbl_users where username = '$user'";
	$result2 = mysql_query($user_check);
	$result3 = mysql_fetch_assoc($result2);
	if ($user == $result3['username'])
	{
		$_SESSION['fail'] = 'fail';
		header("location:register.php");
		die('kill');
	}
	$sql = "INSERT INTO tbl_users (username, password, first_name, last_name, mobile_number, phone_number, email, address) values ('$user', '$pass', '$fname' , '$lname' , '$mobile' , '$phone' , '$email' , '$address')";
	mysql_query($sql);
	unset($_SESSION['fail']);
	header('location:register-success.php');
	
?>
<body>
</body>
</html>