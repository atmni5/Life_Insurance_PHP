<?php
	session_start();
	if(!isset($_SESSION['login']))
	{
		session_destroy();
		header('location:index.php');
	}
	else
	{
		// connect to the database server
		$DServer = mysql_connect("mysql2.000webhost.com", "a9309716_tumini", "tumini5") or die("cannot connect");
		// select the database from the server
		$DBase = mysql_select_db("a9309716_tafe", $DServer) or die("not working");
		$user_id = $_POST['user_id'];
		$user_name = $_POST['user-name'];
		$user_level = $_POST['user_level'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$mobile = $_POST['mobile'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		mysql_query("UPDATE tbl_users SET username='$user_name',User_level='$user_level',first_name='$fname',last_name='$lname',mobile_number='$mobile',Phone_number='$phone',email='$email',address='$address' WHERE user_id = '$user_id'");
		header('location:users-admin.php');
	}
?>