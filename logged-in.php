<link href="CSS/style.css" rel="stylesheet" type="text/css" />
<div id="container-wholepage">
	<?php
    include 'header.php';
    ?>
	<div id="gradient-2">
    	<div id="text"><br /><br /><br />
        	<div id="text-centre">
                <?php
				if(isset($_SESSION['login']))
				{
					echo('Logged in');
				}
				else
				{
					header('location:index.php');
				}
				?>
        	</div>
        </div>
	</div>
</div>
</body>
</html>