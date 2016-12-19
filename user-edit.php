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
	document.getElementById('pass-edit').innerHTML = '<form onsubmit="return update_pass()" method="post" action="user-edit-password.php"  >Old password: <input type="password" id="old-pass" name="old-pass" style="float:right; margin-top:7px;" /><br />New password: <input type="password" id="new-pass" name="new-pass" style="float:right; margin-top:7px;" /><br />Re-enter password:<input type="password" id="check-pass" style="float:right; margin-top:7px;" /><br /><input type="submit" style="float:right;" value="update" /></form>'  
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
                <div id="user-edit">
                <?php
					if($_SESSION['user-edit'] == 'pass')
					{
						echo 'Password successfully updated';	
					}
					if($_SESSION['user-edit'] == 'fail')
					{
						echo 'Old password was entered wrong';	
					}
					unset($_SESSION['user-edit'])
				?>
                </div><br /><br />
        		<div class="edit">
       	 			Username <div class="edit2"><?php echo $_SESSION['user']; ?></div>
    			</div>
                <div class="edit" id="pass-holder">
        			Password <div class="edit2" id="pass-edit"><input type="button" value="edit password" onclick="pass_edit()" style="margin-top:7px;"/></form></div>
        		</div>
   			</div>
		</div>
	</div>
</body>
</html>

