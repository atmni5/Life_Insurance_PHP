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
  
	<div id="gradient-2">
        <div id="text">
			<div style="width:940px; float:left;"></div>
        		<br />
                <a href="admin-edit.php"><div class="user-links" style="z-index:-1; text-indent:5px;">Products edit</div></a>
                <a href="add-product.php"><div class="user-links" style="z-index:-2; margin-left:-15px; text-indent:20px;">Product add</div></a>
                <a href="users-admin.php"><div class="user-links" style="z-index:-2; margin-left:-15px; text-indent:20px;">Users edit</div></a>
                <a href="admin-orders.php"><div class="user-links" style="z-index:-2; margin-left:-15px; text-indent:20px;">Orders</div></a>
                <a href="quote.php"><div class="user-links" style="z-index:-2; margin-left:-15px; text-indent:20px;">Qoute</div></a>
                <div style="width:100%; height:29px;"></div>
                <hr/>
			<?php
				require_once("products-admin.php");
			?>
   		</div>
	</div>
</div>
</body>
</html>