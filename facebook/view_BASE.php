<?php
session_start();

// Start a default connection to the database.

// Get the Message ID from the URL's mid

// Run a fancy SQL statement similar to this...
//$SQL = "SELECT tblMessages.*, tblUsers.userFullName from tblMessages INNER JOIN tblUsers on tblMessages.messageFrom = tblUsers.userID WHERE tblMessages.messageID = $messageid";

// Run the query and store the result into a varialbe called $data

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

<!-- WEBSITE CONTENT FROM HERE -->

<div id="container">
  <div id="title"></div>
  <div id="content"> 
  
  	<h2>Message: %MESSAGETITLE%</h2>
  	<h2>From: %MESSAGEPOSTER%</h2>
  	<p><?php echo nl2br(stripslashes($DATA['messageContent']));?><br />
  	  <br />
    </p>
  </div>
</div>
</body>
</html>
