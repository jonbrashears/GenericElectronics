<?php

include'dbconnect.php';

if (isset($_POST['signup']))
{	
	$uid = mysqli_real_escape_string($conn,$_POST["username"]);
	$upwd = mysqli_real_escape_string($conn,$_POST["password"]);
	$pwd2 = mysqli_real_escape_string($conn, $_POST["password2"]);
	$first = mysqli_real_escape_string($conn, $_POST["first"]);
	$last = mysqli_real_escape_string($conn, $_POST["last"]);
	$uemail = mysqli_real_escape_string($conn,$_POST["email"]);
	$address = mysqli_real_escape_string($conn,$_POST["address"]);
	$city = mysqli_real_escape_string($conn,$_POST["city"]);
	$state = mysqli_real_escape_string($conn,$_POST["state"]);
	$zip = mysqli_real_escape_string($conn,$_POST["zip"]);

	// Error checking for empty fields. Since we are using HTML to check for this, they shouldnt be empty, but... 
	if (empty($uid) ||empty($upwd) ||empty($uemail) ||empty($address) ||empty($city) ||empty($state) || empty($zip) || empty($first) || empty($last))
	{
	header("Location: ../employeesignup.php?login=empty");
	exit();
		
	}
	elseif($upwd != $pwd2)
	{
		header("Location: ../employeesignup.php?login=badPwd2");
		exit();
	}
	else
	if(!filter_var($uemail,FILTER_VALIDATE_EMAIL))
	{
		header("Location: ../employeesignup.php?login=invalid2");
		exit();
	}
	elseif (strlen($upwd) < 8)
	{
		header("Location: ../employeesignup.php?login=Pass2Short");
		exit();
	}
	else
	{
		$sql = "SELECT * FROM customers WHERE user_id ='$uid'";
		$result = mysqli_query($conn, $sql);
		$rCheck = mysqli_num_rows($result);
		
		if ($rCheck > 0)
		{
			header("Location: ../employeesignup.php?login=error1");
			exit();
		}
		else
		{
			if (!preg_match('/^[0-9]{5}$/',$zip))
			{
				header("Location: ../employeesignup.php?login=error");
				exit();
			}
			// This is our function for hashing in a seperate file because we use it on several pages. 
			include 'pwhashS_inc.php'; 
			$salt = openssl_random_pseudo_bytes(40, $cstrong); 
			$saltPW = habadasher($upwd, $salt);
			
			// Our SQL statement for inserting into table. 
			$sql = "INSERT INTO employee (employee_username, password, email, first_name, last_name, address, city, state, zipcode, salt) VALUES ('$uid', '$saltPW', '$uemail', '$first', '$last', '$address', '$city', '$state', '$zip' ,'$salt')";
			
			if(!mysqli_query($conn,$sql))
			{
				header("Location: ../employeesignup.php?signup=fail");
				exit();
			}	
			else
			{
				header("Location: ../employeesignup.php?signup=success");
				exit();
			
			}
		}
	}

	{
	header("Location: ../employeesignup.php?login=error");
	exit();
	}
}
else 
	header("Location: ../employeesignup.php");
	exit();

?>