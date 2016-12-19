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
		$title = $_POST['title'];
		$price = $_POST['price'];
		$description = $_POST['description'];
		$product_id = $_POST['product-id'];
		mysql_query("UPDATE tbl_products SET title='$title',price='$price',description='$description' WHERE id='$product_id'");
	}
	header('location:admin-edit.php');
?>