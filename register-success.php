<link href="CSS/style.css" rel="stylesheet" type="text/css" />
<div id="container-wholepage">
	<?php
    include 'header.php';
    ?>
	<div id="gradient-2">
    	<div id="text"><br /><br /><br />
        	<div id="text-centre">
				register success
                <?php echo $_SESSION['register-fail']; ?>
        	</div>
        </div>
	</div>
</div>
</body>
</html>