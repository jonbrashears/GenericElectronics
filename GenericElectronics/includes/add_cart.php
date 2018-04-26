<?php

	include'db_login.php';
	if(isset($_POST["add_to_cart"]))
		{
			$user_id = mysqli_real_escape_string($conn,$_POST["customer_id"]);
			$product_id = mysqli_real_escape_string($conn,$_POST["product_id"]);
			$quantity = mysqli_real_escape_string($conn,$_POST["quantity"]);
			
			$sql = "INSERT into cart (user_id, electronic_id, quantity) VALUES ('$user_id', '$product_id', '$quantity')";
		
		
		if(!mysqli_query($conn,$sql))
			{
				header("Location: ../shoppingcart.php?add_to_cart=fail");
				exit();
			}	
			else
			{
				header("Location: ../shoppingcart.php?add_to_cart=success");
				exit();
			}
		}