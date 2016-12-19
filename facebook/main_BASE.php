<?php
session_start();
$Users_array = array();
require_once 'src/facebook.php'; //include the facebook php sdk
$facebook = new Facebook(array(
        'appId'  => '130581383801659',    //app id
        'secret' => '72e14164826093ba51d5318fa6da6a46', // app secret
));

// Start a default connection to the database.
// USE MYSQLI IF YOU CAN!

	$DATABASE = new mysqli();
	$DATABASE->connect("mysql2.000webhost.com" , "a9309716_tumini", "tumini5" , "a9309716_tafe");


// Use a session to determine if we need to strike facebook with a data request, or just remember the one we recently did.
if($_SESSION['logon'] == false)
{
	$user = $facebook->getUser(); 
	if ($user) 
	{ // check if current user is authenticated
		try 
		{
			// Proceed knowing you have a logged in user who's authenticated.
			$user_profile = $facebook->api('/me');  //get current user's profile information using open graph
			$_SESSION['user_profile'] = $user_profile;
			$_SESSION['logon'] = true;
			
			// populate the current database if required.
			//
			$userID = $user_profile['id'];
			$userEmail = $user_profile['email'];
			$userFullName = $user_profile['name'];
			
			$SQL = "INSERT INTO tblUsers VALUES('$userID' , '$userFullName' , '$userEmail')";
			$DATABASE->query($SQL);
			
			// Check if we NEED to actually write to the database..
			if ($RESULT->num_rows < 1)
			{
				// Code here to write to the database.
			}
			else
			{
				//die("dont need to insert");	
			}
		}
		catch(Exception $e)
		{
				die($e);	 
		}
	}
	else
	{
		die("Facebook not found.");
	}
}
else
{
	// Create $user_profile from the session.	
}

// To check to see what user_profile has IN IT...
// print_r($user_profile);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
<style type="text/css">
body, html {
	margin: 0px;
	padding: 0px;
}
#container {
	width: 960px;
	margin: auto;
}
#title {
	width: 940px;
	height: 100px;
 background-image:;
	margin: 10px;
	background-image: url(images/title.jpg);
	box-shadow: 0px 0px 10px #000;
}
#content {
	width: 940px;
	margin: 10px;
	box-shadow: 0px 0px 10px #000;
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 12px;
}
#content p {
	margin: 10px;
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 12px;
}
#content img {
	float: left;
	margin: 10px;
	margin-top: 0px;
}
#content h2 {
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 14px;
	margin: 10px;
}
#facebooklogin {
	clear: both;
	margin: 10px auto;
	width: 305px;
	height: 100px;
	background-image: url(images/FBLOGIN.jpg);
	cursor: pointer;
}
</style>
</head>

<body>
<div id="fb-root"></div>
<script type="text/javascript">
//<![CDATA[

// FACEBOOK PLUGIN - ON SDK LOAD - CONFIGURING FACEBOOK SDK AS A FACEBOOK APPLICATION:
// CONTENT MODIFIED AS PER USE
window.fbAsyncInit = function() {
   FB.init({
     appId      : '130581383801659', // App ID
     channelURL : '', // Channel File, not required so leave empty
     status     : true, // check login status
     cookie     : true, // enable cookies to allow the server to access the session
     oauth      : true, // enable OAuth 2.0
     xfbml      : false  // parse XFBML
   });
};


// logs the user in the application and facebook
// FACEBOOK LOGIN FUNCTION TO BE APPLIED ON EVENT, SUCH AS ONCLICK FOR A BUTTON OR HYPERLINK
// CONTENT MODIFIED AS PER USE
function login(){
FB.getLoginStatus(function(r){ //check if user already authorized the app
     if(r.status === 'connected'){
		    // Location to go to if user logged in via facebook
            window.location.href = 'main.php';
     }else{
        FB.login(function(response) { // opens the login dialog
                if(response.authResponse) { // check if user authorized the app
              //if (response.perms) {
				  // Location to go to if user logged in and authorized the application
                    window.location.href = 'main.php';
            } else {
			  // Location to go to if user did not log into facebook.	
              // user is not logged in
            }
     },{scope:'email'}); //permission required by the app
 }
});
}

// Load the SDK Asynchronously
// CONTENT NOT MODIFIED - DIRECTY OFF FACEBOOK SDK REFERENCE
(function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));
//]]>
</script> 
<!-- WEBSITE CONTENT FROM HERE -->

<div id="container">
  <div id="title"></div>
  <div id="content"> 
  
  	<h2>Welcome, %YOURNAMEFROMFACEBOOK%</h2>
    <?php
		// Count the number of messages you have to yourself...
		// Display something similar to: 
		
	?>
    <p>You have %COUNTOFMAILS% Messages.</p>
    <table width="920" border="1" align="center" cellpadding="5" cellspacing="0">
      <tr>
        <td width="48"><strong>MID</strong></td>
        <td width="681"><strong>Message Title</strong></td>
        <td width="157"><strong>From</strong></td>
        <td width="44"><strong>Action</strong></td>
      </tr>
    <?php
	// if message count is > 0, fetch_assoc all the messages and display them in a while statement...
	if ($MessageCount > 0)
	{
		//while loop of fetch assoc here..
		//{
	?>	  
      <tr>
        <td>%MID%</td>
        <td><a href="view.php?mid=EXAMPLEMID">%MESSAGETITLE%</a></td>
        <td>%POSTER%</td>
        <td><a href="sendemail.php?action=delete&mid=EXAMPLEMID">Delete</a></td>
      </tr>
    <?php
		//}
	}
	?>
    
    </table>
    
    <h2>Send someone a message!</h2>
    
    <form id="form1" name="form1" method="post" action="sendemail.php?action=send&sid=YOURUSERID">
      <table width="500" border="1" align="center" cellpadding="5" cellspacing="0">
        <tr>
          <td width="189">Message Title</td>
          <td width="745"><label for="MessageTitle"></label>
          <input type="text" name="MessageTitle" id="MessageTitle" style="width: 95%;" /></td>
        </tr>
        <tr>
          <td>Message To</td>
          <td><label for="MessageTo"></label>
            <select name="MessageTo" id="MessageTo" style="width: 100%;">
          	<?php 
			
			// Select every users name out of the table users..
			
			// Run a while loop on the result to achieve the following..
			//{
				?>	
              <option value="%TARGETID%">%TARGETNAME%</option>
          <?php
			//}
			?>
          
          </select></td>
        </tr>
        
        
        
        
        
        <tr>
          <td>Message Content</td>
          <td><label for="MessageContent"></label>
          <textarea name="MessageContent" id="MessageContent" cols="45" rows="5" style="width: 95%"></textarea></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right"><input type="submit" name="MessageSend" id="MessageSend" value="Submit" /></td>
        </tr>
      </table>
    </form>
    <br /><br />
  </div>
</div>
</body>
</html>
