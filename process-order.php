<?php

	// connect to the database server
	$DServer = mysql_connect("mysql2.000webhost.com", "a9309716_tumini", "tumini5") or die("cannot connect");
	// select the database from the server
	$DBase = mysql_select_db("a9309716_tafe", $DServer) or die("not working");
	session_start();
	$myorders = $_SESSION['mylistarray'];
	$numofitemsinline = 2;
	$myordercount = sizeof($myorders);
	$numorderlines = $myordercount/2;
	$arraypos = 0;
	$order_id = rand();
	for ($i=0;$i<$numorderlines;$i++)
	{
		$sql = "INSERT INTO `tbl_orders` (order_id, user_id, amount, id) VALUES ('".$order_id."','".$_SESSION['user_id']."','".$myorders[$i+0+$arraypos]."','".$myorders[$i+1+$arraypos]."')";
		mysql_query($sql) or die('mysql error '.mysql_error());
		$arraypos = $arraypos+1;
	}
	header('location:orders.php');
?>