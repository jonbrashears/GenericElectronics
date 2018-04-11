<!DOCTYPE html>
<html lang="en">
<?php
include('navigation.php');
include ('footer.php'); 
?>

<body>

	<div name="profile_box">
		<div name="username"><?php echo $_SESSION['user_id'] ?><br></div>
			<div name="prim">
			<form action="edit_email.php">Primary E-mail  <button type="submit" name="edit_1">Edit</button>
			</form>
		</div>
		
		<?php echo $_SESSION['email'] ?><br>
		<div name="prim">
			<form action="address_edit.php">Primary Address  <button type="submit" name="edit_2">Edit</button>
			</form>
		</div>
		Address: <?php echo $_SESSION['address'] ?><br>
		City: <?php echo $_SESSION['city'] ?><br>
		State: <?php echo $_SESSION['state'] ?><br>
		ZIP code: <?php echo $_SESSION['zip'] ?><br>

		
</div>
<form action="pass_edit.php"><button type="submit" name="password_ch">Change Password</button></form>
</body>