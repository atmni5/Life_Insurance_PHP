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
		mysql_query("INSERT INTO tbl_products (title, price, description) VALUES ('$title', '$price', '$description')");
		header('location:add-product.php');
	}
?>