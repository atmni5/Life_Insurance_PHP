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
		$quote_id = $_POST['qoute_id'];
		$sql = "DELETE FROM Quotes WHERE qoute_id = '$quote_id'";
		$sql = mysql_query($sql);
		header('location:quote.php');
	}