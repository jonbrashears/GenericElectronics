<!DOCTYPE html>
<html lang="en">
<?php
include('employeenav.php');
include ('footer.php'); 
?>


<body>
			<form method="POST" action="includes/employeepass_chg.php">
			<input type="password" name="old" placeholder="Old Password"></br>
			<input type="password" name="new1" placeholder="Retype New Password"></br>
			<input type="password" name="new2" placeholder="Retype New Password"></br>
			<button type="submit" name="addy_chg">Change Password</button>	
</body>