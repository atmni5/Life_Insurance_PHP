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
 <script type="text/javascript">
  function update_pass()
  {
	  newpass = document.getElementById('new-pass').value
	  newpasslength = document.getElementById('new-pass').length
	  checkpass = document.getElementById('check-pass').value
	  passold = document.getElementById('old-pass').length
	  if (document.getElementById('new-pass').value.length < 8)
	  {
		    alert('New password is not long enough.')
			return false  
	  }
	  else
	  {
		  if (newpass == checkpass)
		  {
				return true
		  }
		  else
		  {
			alert('Passwords are not the same')
			return false
		  }
	  }
  }
  function user_edit()
  {
  document.getElementsByName('edit').innerHTML = '<input id="username-edit" type="text" value="'+ <?php $_SESSION['user']; ?> +'"/> <input id="edit-user" type="button" value="update" />'
  }
  function pass_edit()
  {
	document.getElementById('pass-holder').style.minHeight = '120px'
	document.getElementById('pass-edit').innerHTML = '<form onsubmit="return update_pass()" method="post" action="user-edit-password.php"  >Old password: <input type="text" id="old-pass" name="old-pass" style="float:right; margin-top:7px;" /><br />New password: <input type="text" id="new-pass" name="new-pass" style="float:right; margin-top:7px;" /><br />Re-enter password:<input type="text" id="check-pass" style="float:right; margin-top:7px;" /><br /><input type="submit" style="float:right;" value="update" /></form>'  
  }
  </script> 
  
	<div id="gradient-2">
        <div id="text">
			<div style="width:940px; float:left;"></div>
        		<br />
                <a href="user-edit.php"><div class="user-links" style="z-index:-1; text-indent:5px;">Account edit</div></a>
                <a href="orders.php"><div class="user-links" style="z-index:-2; margin-left:-15px; text-indent:20px;">Order's</div></a>
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
					$sql = "SELECT tbl_orders.order_id, tbl_products.title, tbl_products.price, tbl_orders.amount, tbl_orders.order_date, tbl_orders.id from tbl_orders INNER JOIN tbl_products ON tbl_orders.id = tbl_products.id WHERE tbl_orders.user_id = '".$_SESSION['user_id']."' ORDER BY tbl_orders.order_date ASC";
					$sql = mysql_query($sql);
					//$sql = mysql_fetch_array($sql);
					$id_order = $sql['id'];
					echo "<table width='600' border='0' cellpadding='5'>";
					echo "<tr>";
					echo "<td>Order Id</td>";
					echo "<td>Title</td>";
					echo "<td>Price per item</td>";
					echo "<td>Amount</td>";
					echo "</tr>";
					while ($row = mysql_fetch_array($sql))
					{
						echo "<tr>";
						echo "<td>".$row['order_id']."</td>";
						echo "<td>".$row['title']."</td>";
						echo "<td>".$row['price']."</td>";
						echo "<td>".$row['amount']."</td>";
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