<?php

// connect to the database server
		$DServer = mysql_connect("mysql2.000webhost.com", "a9309716_tumini", "tumini5") or die("cannot connect");
		// select the database from the server
		$DBase = mysql_select_db("a9309716_tafe", $DServer) or die("not working");
		
		$SQL = mysql_query("SELECT * from tbl_products");
		
		while($row = mysql_fetch_array($SQL))
		{
			//echo '<div class="products"><h2>'. $row['title'] .' </h2><a class="add" href="shopping-cart.php?action=add&id='.$row['id'].'" >Add</a>'. $row['price'] .'<br>'. $row['description'] .'</div>';*/
			
			if(isset($_SESSION['login']))
			{
				echo '<div class="products"><h2>'. $row['title'] .' </h2><a class="add" href="shopping-cart.php?action=add&id='.$row['id'].'" >Add</a>'. $row['price'] .'<br>'. $row['description'] .'</div>';
			}
			else
			{
				echo '<div class="products"><h2>'. $row['title'] .' </h2>'. $row['price'] .'<br>'. $row['description'] .'</div>';
			}
		}
?>