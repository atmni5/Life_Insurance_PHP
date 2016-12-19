<link href="CSS/style.css" rel="stylesheet" type="text/css" />
<div id="container-wholepage">
	<?php
    include 'header.php';
    ?>
    <script type="text/javascript">
    function validate_email()
	{
		var str = document.getElementById('email').value
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if (filter.test(str))
		{
			document.getElementById('email_val').innerHTML = ' '
			window.emailtest = 'pass'
		}
		else
		{
			document.getElementById('email_val').innerHTML = 'Invalid email.'
			window.emailtest = 'fail'
		}
	}
	
	function validate_email(email)
{
	if (document.getElementById('register-email').length < 7 || document.getElementById('register-email').indexOf("@") == -1 || document.getElementById('register-email').indexOf(".") == -1)
	{
			return false
	}
	return true
}

function testkey(key)
{
	key = key.keyCode
	
	if (key >= 48 && key <= 57)
	{
		return false
	}
	else
	{
		return true
	}
	
	
}

function testkeynum(key)
{
	key = key.keyCode
	if (key >= 48 && key <= 57)
	{
		return true	
	}
	else
	{
		return false	
	}
}

window.emailtest = 'fail'
window.phonetest = 'fail'
function validate_form()
{
	if (document.getElementById('register-user').value.length < 5 || document.getElementById('register-user').value.length > 10)
	{
		alert ("Username need to be 5-10 letters long")
		return false	
	}
	
	if (document.getElementById('register-fname').value.length < 1)
	{
		alert ("Missing First Name")
		return false
		
	}
	
	if (document.getElementById('register-lname').value.length < 1)
	{
		alert ("Missing last name")
		return false
	}
	
	if (document.getElementById('register-address').value.length < 7)
	{
		alert ("Enter a valid address")
		return false
	}
	
	if (document.getElementById('register-pass').value.length < 6 && document.getElementById('register-pass').value.length > 16)
	{
		alert ("password need to be more then 6-16")
		return false	
	}
	
	if (document.getElementById('register-pass').value != document.getElementById('register-passcheck').value)
	{
		alert ("Password's are not the same")
		return false
	}
	
	if (document.getElementById('register-phone#').value.length > 7 && validate_email(document.getElementById('register-email').value) == true)
	{
		window.phonetest = 'true'
		window.emailtest = 'true'
	}
	else
	{
			alert("Enter a valid contacts")
			return false
	}
	
	
	/*if (window.phonetest == 'fail' && window.emailtest == 'fail')
	{
		alert("enter a contact")
		return false	
	}
	
	if (confirm("Please check all your details and confirm submission") == false)
	{
		alert("Cancelling form")
		return false
	}
	*/
	return true
	
}
</script>

	<div id="gradient-2">
    	<div id="text">
        <?php
		if (isset($_SESSION['fail']))
		{
			echo '<li style="color:#F00">Username has been taken. Please choose another.</li>'; 
		}
		?>
        	<div id="text-centre">
              <form  method="post" id="registration-form" onsubmit="return validate_form()" action="processregister.php">
                  <fieldset>
                      <legend style="text-align:left;">Registration:</legend>
                      <table width="350" border="0" cellpadding="5">
                      <tr>
                        <td width="122"  id="register-table-1">Username</td>
                        <td width="170" id="registration-table-2"><input type="text" id="register-user" name="register-user" /></td>
                        <td width="20">&nbsp;</td>
                      </tr>
                      <tr>
                        <td id="register-table-1">Password</td>
                        <td id="registration-table-2"><input type="password" id="register-pass" name="register-pass" /></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td id="register-table-1">Retype Password</td>
                        <td id="registration-table-2"><input type="password" id="register-passcheck" /></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td id="register-table-1">First Name</td>
                        <td id="registration-table-2"><input type="text" id="register-fname" name="register-fname" onkeypress="return testkey(event)" /></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td id="register-table-1">Last Name</td>
                        <td id="registration-table-2"><input type="text" id="register-lname" name="register-lname" onkeypress="return testkey(event)" /></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td id="register-table-1">Mobile Phone</td>
                        <td id="registration-table-2"><input type="text" id="register-mobile#" name="register-mobile#" onkeypress="return testkeynum(event)"/></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td id="register-table-1">Home Phone</td>
                        <td id="registration-table-2"><input type="text" id="register-phone#" name="register-phone#" onkeypress="return testkeynum(event)" /></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td id="register-table-1">Email Address</td>
                        <td id="registration-table-2"><input type="text" id="register-email" name="register-email" /></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td id="register-table-1">Home Address</td>
                        <td id="registration-table-2"><input type="text" id="register-address" name="register-address" /></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td id="register-table-1">
                      	<td id="registration-table-2"><input type="submit" style="float:right"/></td>
                        <td></td>
                      </tr>
                    </table>
                
                </fieldset>
            </form>
       	  </div>
    	</div>
	</div>
</div>
</body>
</html>