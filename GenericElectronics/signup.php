<?php
include 'navigation.php';
include 'footer.php';
?>

<!DOCTYPE HTML>

<html>

<style>

	
	input[type=text], input[type=password]
	{
	font-family: "Arial";
    width: 25%;
    padding: 5px;	
	margin: 8px 8px;
    display: inline-block;
    border: 2px;
    background: #f1f1f1;
	}
	
	input[name="state"]
	{
		width: 5%
	}

	input[name="zip"]
	{
		width: 15%
	}
	
	input[name="city"]
	{
		width: 15%
	}
	
	button[type="submit"]
	{
	font-family: "Arial";	
	background-color: Black;
    color: white;
    padding: 14px 20px;
    margin: 8px 8px;
    border: none;
    cursor: pointer;
    width: 10%;
    opacity: 0.9;	
	}
</style>


	<body>
			
				 
			
	
			<p style="font-size:20px; margin: 0px 8px;font-family: 'Arial';">Sign Up For Generic Electronics! </p></br>
				<form method="POST" action="includes/signup_inc.php">
				<input type="text" placeholder="Enter Username (Between 5 and 20 characters)" name="username" minlength="5" maxlength="20" required>
				</br>
				<input type="password" placeholder="Enter Password (8 characters)" name="password" minlength="8" required>
				</br>
				<input type="password" placeholder="Enter Password Again" name="password2" minlength="8" required>
				</br>
				
				<input type="text" placeholder="Enter E-mail" name="email" required>
				</br>
				
				<input type="text" placeholder="Address" name="address" required>
				</br>
				
				<input type="text" placeholder="City" name="city" required>
				</br>
				
				<input type="text" placeholder="State" name="state" maxlength="2" minlength="2" required>
				</br>
				
				<input type="text" placeholder="ZIP Code" name="zip" maxlength="5" minlength="5" required>
				</br>
				
				<button type="submit" name="signup">Sign Up</button>	

		</form>
	
	</body>
</html>