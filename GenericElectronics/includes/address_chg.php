<?php

if(isset($_POST['addy_chg']))
{
	include 'dbconnect.php';
	session_start();

	$newAdd = mysqli_real_escape_string($conn, $_POST["address"]);
	$newCity = mysqli_real_escape_string($conn, $_POST["city"]);
	$newState = mysqli_real_escape_string($conn, $_POST["state"]);
	$newZip = mysqli_real_escape_string($conn, $_POST["zip"]);
	$uid= $_SESSION['user_id'];
	
	if (empty ($newAdd) && empty($newCity) && empty($newState) && empty($newZip))
	{
		header("Location: ../address_edit.php?all_empty");
		exit();
	}
	else
	{
		if (!preg_match('/^[a-zA-Z]{2}$/',$newState))
			{
				header("Location: ../address_edit.php?invalid_state");
				exit();
			}
		if (!preg_match('/^[0-9]{5}$/',$newZip) && !empty($newZip))
			{
				header("Location: ../address_edit.php?invalid_zip");
				exit();
			}
		if (empty($newAdd))
		{
			$newAdd = $_SESSION['address'];
		}
		if (empty($newCity))
		{
			$newCity = $_SESSION['city'];
		}
		if (empty($newState))
		{
			$newState = $_SESSION['state'];
		}
		if (empty($newZip))
		{
			$newZip= $_SESSION['zip'];
		}
		
		$sql="UPDATE customers SET address='$newAdd', city='$newCity', state='$newState', zipcode='$newZip' WHERE user_id ='$uid'";
		
		if(!mysqli_query($conn,$sql))
		{
			header("Location: ../address_edit.php?update_add=fail");
			exit();
		}	
		else
		{
				$_SESSION['address'] = $newAdd;
				$_SESSION['city']= $newCity;
				$_SESSION['state']=$newState;
				$_SESSION['zip']=$newZip;
				header("Location: ../profile.php?update_add=success");
				exit();
		}
	}
}
?>