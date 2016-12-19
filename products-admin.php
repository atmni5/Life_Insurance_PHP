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
		$SQL = "SELECT * FROM tbl_products";
		$SQL = mysql_query($SQL);
		$divid = 0;
		while($row = mysql_fetch_array($SQL))
		{
			//print_r($row);
			
			$divid = $divid + 1;
			echo '<div id="edit-'.$divid.'" style="width:400px;"><form method="post" action="product-edit.php"><input id="product-id" name="product-id" type="hidden" value="'.$row['id'].'"/>Title: <input id="title" name="title" value="'.$row['title'].'" style="width:150px;"/><br>Price: <input id="price" name="price" value="'.$row['price'].'" style="width:30px;"/><br>Description:<br><textarea id="description" name="description" style="width:400px; height:200px; overflow-x:hidden; overflow-y:scroll; resize:none;">'.$row['description'].'</textarea><input type="submit" value="Edit" style="float:right;"/></form><form action="product-delete.php" method="post" style="display:inline"><input id="product-id" name="product-id" type="hidden" value="'.$row['id'].'"/><input type="submit" value="Delete" style="float:right;"/></form></div><br>';
		}
	}
?>