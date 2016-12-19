<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=242801165863211";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<link href="../CSS/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	background-color: #000;
}
</style>
<div id="container-wholepage">
	<?php
    require_once("../header.php");
    ?>
  
	<div id="gradient-2">
        <div id="text">
        <?php
require_once 'src/facebook.php'; //include the facebook php sdk
$facebook = new Facebook(array(
        'appId'  => '242801165863211',    //app id
        'secret' => '9be382c1a02d68535ece176c4f80e076', // app secret
));
$user = $facebook->getUser(); 
if ($user) 
{ // check if current user is authenticated
    try 
	{
        // Proceed knowing you have a logged in user who's authenticated.
        $user_profile = $facebook->api('/me');  //get current user's profile information using open graph
    }
         catch(Exception $e){}
}

// Here is where the awesome stuff happens.
echo 'Welcome ';
print_r($user_profile['name']);
echo '<br />';
?>
<div class="fb-comments" data-href="http://mywebsite5595.net78.net/facebook/fbconnect1.php" data-width="470" data-num-posts="5"></div>

<?php
print_r($user_profile);
?>

    </div>
	</div>
</div>
</body>
</html>
