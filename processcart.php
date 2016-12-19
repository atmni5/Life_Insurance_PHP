<div style="margin-left:50px;">
<?php 

if($_SESSION['cart']) { //if the cart isn't empty
//show the cart

    echo "<div style=\"border:#000 ridge 5px; padding:3px; width:500px;\">"; //format the cart using a HTML table
	$myitems;
    //iterate through the cart, the $product_id is the key and $quantity is the value
    foreach($_SESSION['cart'] as $product_id => $quantity) { 

        //get the name, description and price from the database - this will depend on your database implementation.
        //use sprintf to make sure that $product_id is inserted into the query as a number - to prevent SQL injection
        $sql = sprintf("SELECT title, description, price, id FROM tbl_products WHERE id = %d;", $product_id); 

        $result = mysql_query($sql);

        //Only display the row if there is a product (though there should always be as we have already checked)
        if(mysql_num_rows($result) > 0) {

            list($name, $description, $price, $id) = mysql_fetch_row($result);

            $line_cost = $price * $quantity; //work out the line cost
            $total = $total + $line_cost; //add to the total cost

            echo "<div>";
            //show this information in table cells
            echo "<div align='left'>$name<div style=\"text-align:right;\">$quantity <a href=\"$_SERVER[PHP_SELF]?action=remove&id=$product_id\">X</a></div></div>";
            //along with a 'remove' link next to the quantity - which links to this page, but with an action of remove, and the id of the current product
            echo "<div style=\"text-align:right\">\$$line_cost</div>";
			echo '<hr>';
            echo "</div>";
			$myitems[] = $quantity;
			$myitems[] = $id;
			//add total cost to the database
			
			}

    }
	print_r($myitems);
	$_SESSION['mylistarray'] = $myitems;
    //show the total
    echo "<div>";
    echo "<div style=\"text-align:right; column-span:3;\">Total</div>";
    echo "<div style=\"text-align:right;\">\$$total</div>";
    echo "</div>";

    //show the empty cart link - which links to this page, but with an action of empty. A simple bit of javascript in the onlick event of the link asks the user for confirmation
    echo "<div>";
    echo "<div style=\"text-align:right; column-span:3;\"><a href=\"$_SERVER[PHP_SELF]?action=empty\" onclick=\"return confirm('Are you sure?');\">Empty Cart</a></div>";
    echo "</div>"; 
    echo "</div>";
	echo "<a href='process-order.php'><input type='button' value='order' /></a>";
	
	

}else{
//otherwise tell the user they have no items in their cart
    if(isset($_SESSION['login']))
	{
		echo "You have no items in your shopping cart.";
	}
	else
	{
		echo '<div style="width:480px; height:350px; margin-left:10px; background-color:#FFF;"><div style="margin:auto; text-align:center;"><h3>Login to start shopping.</h3><br /><img src="Images/shopping_cart_no.png" style="margin:auto;" /></div></div>';
	}
	

} 
?>
</div>