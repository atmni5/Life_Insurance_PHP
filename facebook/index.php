<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<div id="fb-root"></div>
<script type="text/javascript">
//<![CDATA[

// FACEBOOK PLUGIN - ON SDK LOAD - CONFIGURING FACEBOOK SDK AS A FACEBOOK APPLICATION:
// CONTENT MODIFIED AS PER USE
window.fbAsyncInit = function() {
   FB.init({
     appId      : '242801165863211', // App ID
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
            window.location.href = 'fbconnect.php';
     }else{
        FB.login(function(response) { // opens the login dialog
                if(response.authResponse) { // check if user authorized the app
              //if (response.perms) {
				  // Location to go to if user logged in and authorized the application
                    window.location.href = 'fbconnect.php';
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




	<div onclick="login();">Facebook Login</div>



</body>
</html>
