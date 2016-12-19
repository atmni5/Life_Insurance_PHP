<?php
	session_start();
	// connect to the database server
	$DServer = mysql_connect("mysql2.000webhost.com", "a9309716_tumini", "tumini5") or die("cannot connect");
	// select the database from the server
	$DBase = mysql_select_db("a9309716_tafe", $DServer) or die("not working");
	$oldpass = $_POST['old-pass'];
	$oldpass = sha1($oldpass);
	$newpass = $_POST['new-pass'];
	$newpass = sha1($newpass);
	$SQL = "SELECT password from `tbl_users` where username = '".$_SESSION['user']."'";
	$SQLcheck = mysql_query($SQL) or die('$SQL fail');
	$oldpasscheck = mysql_fetch_array($SQLcheck);
	if($oldpasscheck['password'] == $oldpass)
	{
		$SQLpass = "UPDATE `tbl_users` SET password='".$newpass."' WHERE username = '".$_SESSION['user']."'";
		mysql_query($SQLpass);
		$_SESSION['user-edit'] = 'pass';
		
	}
	else
	{
		echo 'Old pass wrong';
		$_SESSION['user-edit'] = 'fail';
	}
	
	header('location:user-edit.php');
?>