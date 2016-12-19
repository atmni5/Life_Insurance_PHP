<?php
session_start();
?>
<script type="text/javascript">
function reloadPage()
{
	location.reload()
}
</script>

	 <div id="yolo" style=" margin:auto; text-align:center;">
    <div style="margin:auto; text-align:center;">
    
    <?php
	if(isset($_SESSION['login']))
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
			$name = $_POST['username'];
			$pword = $_POST['password'];
			stripslashes($name);
			mysql_real_escape_string($name);
			stripslashes($password);
			mysql_real_escape_string($password);
			$pword = sha1($pword);
			$SQL = "select * from tbl_users where username = '$name' and password = '$pword'";
		$Result = mysql_query($SQL) or die("query error");
		
		//mysql_close($DBase)
		if (mysql_num_rows($Result) > 0)
		{
			// Found the account
			$_SESSION['login'] = 'login';
			//die();
			$sql2 = "SELECT `User_level` FROM tbl_users where username = '$name' and password = '$pword'";
			$check_admin = mysql_query($sql2) or die("level check fail");
			$result_admin = mysql_fetch_assoc($check_admin);
			if ($result_admin['User_level'] == 5)
			{
				$_SESSION['admin'] = 'admin';	
			}
			$Result = mysql_fetch_array($Result);
			$id = $Result['user_id'];
			$_SESSION['user_id'] = $id;
			$sql3 = "select `username` from tbl_users where username = '$name'";
			$user_set = mysql_query($sql3);
			$Uname = mysql_fetch_assoc($user_set);
			$_SESSION['user'] = $Uname['username'];
			header('location:index.php');
			echo("results found");
		}
		else
		{
		echo ("no User found");	
		}
	}
	

	?>
</div>
</div>