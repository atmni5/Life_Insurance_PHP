<?php
session_start();
?>
<?php
// connect to the database server
		$DServer = mysql_connect("mysql2.000webhost.com", "a9309716_tumini", "tumini5") or die("cannot connect");
		// select the database from the server
		$DBase = mysql_select_db("a9309716_tafe", $DServer) or die("not working");
		
$product_id = $_GET['id']; //the product id from the URL 
$action = $_GET['action']; //the action from the URL 

//if there is an product_id and that product_id doesn't exist display an error message
/*if($product_id && !productExists($product_id)) {
    die("Error. Product Doesn't Exist");
}*/

switch($action) { //decide what to do 

    case "add":
        $_SESSION['cart'][$product_id]++; //add one to the quantity of the product with id $product_id 
    break;

    case "remove":
        $_SESSION['cart'][$product_id]--; //remove one from the quantity of the product with id $product_id 
        if($_SESSION['cart'][$product_id] == 0) unset($_SESSION['cart'][$product_id]); //if the quantity is zero, remove it completely (using the 'unset' function) - otherwise is will show zero, then -1, -2 etc when the user keeps removing items. 
    break;

    case "empty":
        unset($_SESSION['cart']); //unset the whole cart, i.e. empty the cart. 
    break;

}

?>
<?php

	// connect to the database server
	$DServer = mysql_connect("mysql2.000webhost.com", "a9309716_tumini", "tumini5") or die("cannot connect");
	// select the database from the server
	$DBase = mysql_select_db("a9309716_tafe", $DServer) or die("not working");
	$sql = "SELECT * FROM Quotes";
	$sql = mysql_query($sql);
	while ($row = mysql_fetch_array($sql))
	{
		$quotes[] = $row['qoute'];
	}
	srand ((double) microtime() * 1000000);
  	$random_number = rand(0,count($quotes)-1);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Yolo Life Insurance</title>
<link href="CSS/style.css" rel="stylesheet" type="text/css" />
</head>
<script src="pic-slider.php"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
function userclear()
{
	var user = document.getElementById("username").value
	if (user == 'Username')
	{
		document.getElementById('username').value = ''
	}	
}
function userfill()
{
	var user = document.getElementById("username").value
	if (user == '')
	{
		document.getElementById('username').value = 'Username'
	}	
}
function passclear()
{
	var pass = document.getElementById("password").value
	if (pass == 'Password')
	{
		document.getElementById('password').type = 'password'
		document.getElementById('password').value = ''
	}
}
function passfill()
{
	var pass = document.getElementById("password").value
	if (pass == '')
	{
		document.getElementById('password').type = 'text'
		document.getElementById('password').value = 'Password'
	}
}
function buttongodown()
{
	document.getElementById('login-register').style.backgroundColor = '#B5B5B5'
}
function buttongoup()
{
	document.getElementById('login-register').style.backgroundColor = '#FFF'
}
function logout()
{
	window.location.href = 'processlogin.php';	
}
</script>
<body>

<div id="gradient">
    
   
   <div id="login">
   <div id="facebook"><iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fmywebsite5595.net78.net%2FWeb%2Fheader.php&amp;send=false&amp;layout=button_count&amp;width=300&amp;show_faces=false&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:21px;" allowTransparency="true"></iframe></div>
   <?php 
	if(isset($_SESSION['login']))
	{
	echo '<a id="login-2" onclick="logout()">logout</a>';
	}
	else
	{
	echo '<form action="processlogin.php" method="post">Login<input type="text" id="username" name="username" value="Username" onclick="userclear()" onblur="userfill()" onfocus="userclear()" />
    <input type="text" id="password" name="password" value="Password" onclick="passclear()" onblur="passfill()" onfocus="passclear()" />
    <input type="submit" id="login-register" value="Go" onmousedown="buttongodown()" onmouseup="buttongoup()" style="background-color:#FFF;"/></form>';	
	}
	//error_reporting(0);
	mysql_real_escape_string;
	?>
     </div>
     
	<div id="push"></div>
	<div id="container-logo"><div>
	<a id="logo" href="index.php"><img src="Images/Logo.png" /></a>

	<a id="shopping-cart" href="shopping-cart.php"><img src="Images/shopping_cart.png" style="float:left; margin-top:7px; margin-left:7px; padding-right:20px;" />
	
	
	<?php 
	$items = sizeof($_SESSION['cart']);
	echo $items;
	?>
     Item
	</a><br />
	<p style="color:#FFF; display:inline">Quotes: "<?php echo ($quotes[$random_number]); ?>"</p>
	</div>
	<div id="container-links">
		<a class="links" href="index.php">Index</a>
		<a class="links" href="packages.php">Plans/products</a>
		<a class="links" href="faq.php">FAQ</a>
		<?php	
		if (isset($_SESSION['login']))
			{
				if (!isset($_SESSION['admin']))
				{
					echo '<a class="links" href="user-edit.php">User Settings</a>';
				}
				else
				{
					echo '<a class="links" href="admin-edit.php">Admin</a>';
				}
			}
			
			if (!isset($_SESSION['login']))
			{
				echo '<a class="links" href="register.php">Register</a>';
			}	
		?>
		<a class="links" href="contact-us.php">Contact Us</a>
	</div>
	</div>
</div>
