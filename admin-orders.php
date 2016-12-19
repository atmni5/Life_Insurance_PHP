<link href="CSS/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	background-color: #000;
}
</style>
<div id="container-wholepage">
	<?php
    require_once("header.php");
    ?>
  
	<div id="gradient-2">
        <div id="text">
			<div style="width:940px; float:left;"></div>
        		<br />
                <a href="admin-edit.php"><div class="user-links" style="z-index:-1; text-indent:5px;">Products edit</div></a>
                <a href="add-product.php"><div class="user-links" style="z-index:-2; margin-left:-15px; text-indent:20px;">Product add</div></a>
                <a href="users-admin.php"><div class="user-links" style="z-index:-2; margin-left:-15px; text-indent:20px;">Users edit</div></a>
                <a href="admin-orders.php"><div class="user-links" style="z-index:-2; margin-left:-15px; text-indent:20px;">Orders</div></a>
                <a href="quote.php"><div class="user-links" style="z-index:-2; margin-left:-15px; text-indent:20px;">Qoute</div></a>
                <div style="width:100%; height:29px;"></div>
                <hr/>
				
                <?php
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
					$sql = "SELECT tbl_orders.order_id, tbl_products.title, tbl_products.price, tbl_orders.amount, tbl_orders.order_date, tbl_orders.id, tbl_orders.user_id from tbl_orders INNER JOIN tbl_products ON tbl_orders.id = tbl_products.id ORDER BY tbl_orders.order_date ASC";
					$sql = mysql_query($sql);
					//$sql = mysql_fetch_array($sql);
					$id_order = $sql['id'];
					echo "<table width='600' border='0' cellpadding='5'>";
					echo "<tr>";
					echo "<td>Order Id</td>";
					echo "<td>Title</td>";
					echo "<td>Price per item</td>";
					echo "<td>Amount</td>";
					echo "<td>User id</td>";
					echo "</tr>";
					while ($row = mysql_fetch_array($sql))
					{
						echo "<tr>";
						echo "<td>".$row['order_id']."</td>";
						echo "<td>".$row['title']."</td>";
						echo "<td>".$row['price']."</td>";
						echo "<td>".$row['amount']."</td>";
						echo "<td>".$row['user_id']."</td>";
						echo "<td><form action='order-delete.php' method='post' style='display:inline;'><input id='order_id' name='order_id' type='hidden' value='".$row['order_id']."' /><input id='id' name='id' type='hidden' value='".$row['id']."' /><input type='submit' value='Delete' /></form></td>";
						echo "</tr>";
					}
					echo '</table>';	
				}
				?>
   		</div>
	</div>
</div>
</body>
</html>