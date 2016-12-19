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
				<table><tr><td><form action="quote-add.php" method="post">Add a new Quote <input type="text" id="quote" name="quote" style="border-radius:10px;"  /><input type="submit" value="Add Quote" /></form></td></tr></table>
                
          		<?php
				// connect to the database server
				$DServer = mysql_connect("mysql2.000webhost.com", "a9309716_tumini", "tumini5") or die("cannot connect");
				// select the database from the server
				$DBase = mysql_select_db("a9309716_tafe", $DServer) or die("not working");
				$sql = "SELECT * FROM Quotes";
				$sql = mysql_query($sql);
				echo "<table width='600' border='0' cellpadding='5'>";
				echo "<tr>";
				echo "<td>Quote Id</td>";
				echo "<td>Quote</td>";
				echo "</tr>";
				while ($row = mysql_fetch_array($sql))
				{
					echo "<tr>";
					echo "<td>".$row['qoute_id']."</td>";
					echo "<td>".$row['qoute']."</td>";
					echo "<td><form action='quotes-delete.php' method='post' style='display:inline;'><input type='hidden' id='qoute_id' name='qoute_id' value='".$row['qoute_id']."' /><input type='submit' value='Delete' /></form></td>";
					echo "</tr>";
				}
				?>
   		</div>
	</div>
</div>
</body>
</html>