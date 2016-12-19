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
			$order_id = $_POST['order_id'];
			$id = $_POST['id'];
			//$sql = "DELETE FROM tbl_orders INNER JOIN tbl_products WHERE tbl_orders.order_id = '$order_id' AND tbl_products.title = $title";
			$sql = "DELETE FROM tbl_orders WHERE order_id = '$order_id' AND id = '$id'";
			$sql = mysql_query($sql);
			if(isset($_SESSION['admin']))
			{
				header('location:admin-orders.php');
			}
			else
			{
				header('location:orders.php');
			}
		}
?>