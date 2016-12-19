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
				
					// connect to the database server
					$DServer = mysql_connect("mysql2.000webhost.com", "a9309716_tumini", "tumini5") or die("cannot connect");
					// select the database from the server
					$DBase = mysql_select_db("a9309716_tafe", $DServer) or die("not working");
					$SQL = mysql_query("SELECT * from tbl_users");
					while($row = mysql_fetch_array($SQL))
					{
						echo '<div id="edit" style="width:400px;"><form action="admin-user.php" method="post"><input type="hidden" id="user_id" name="user_id" value="'.$row['user_id'].'" />Username: <input type="text" id="user-name" name="user-name" value="'.$row['username'].'" /><br />User Level: <input type="text" id="user_level" name="user_level" value="'.$row['User_level'].'" /><br />First name: <input type="text" id="fname" name="fname" value="'.$row['first_name'].'" /><br />Last name: <input type="text" id="lname" name="lname" value="'.$row['last_name'].'" /><br />Mobile number: <input type="text" id="mobile" name="mobile"value="'.$row['mobile_number'].'" /><br />Home phone: <input type="text" id="phone" name="phone" value="'.$row['Phone_number'].'" /><br />Email: <input type="text" id="email" name="email" value="'.$row['email'].'" /><br />Address: <input type="text" id="address" name="address" value="'.$row['address'].'" /><br /><input type="submit" value="Edit" style="float:right;" /></form><form action="users-delete.php" method="post"><input id="user_id" name="user_id" type="hidden" value="'.$_SESSION['user-id'].'" /><input type="submit" value="Delete" style="float:right;" /></form></div><br />';	
					}
				
				?>
   		</div>
	</div>
</div>
</body>
</html>