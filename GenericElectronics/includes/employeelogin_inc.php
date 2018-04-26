<?php

session_start();

if (isset($_POST['login']))
{
	include 'dbconnect.php';
	
	$uid = mysqli_real_escape_string($conn, $_POST["username"]);
	$pwd = mysqli_real_escape_string($conn, $_POST["password"]);
	
	 
	if (empty($uid) == true || empty($pwd) == true)
	{
		$_SESSION['msg'] ='<br /><font style="Arial" color="#FF0000">Please enter a username and password. </font>';
		header("Location: ../employee.php?login=empty");
		exit();
	}
	else
	{
		$sql = "SELECT * FROM employee WHERE employee_username='$uid'";
		$result = mysqli_query($conn,$sql);
		$rCheck = mysqli_num_rows($result);
		
		if ($rCheck < 1)
		{
			
			$_SESSION['msg'] = '<br /><font style="Arial" color="#FF0000">Invalid username and/or password. </font>';
			include('employee.php');
			header("Location: ../employee.php?login=error");
			exit();
		}
		else
		{
			include 'pwhashS_inc.php';
			$row = mysqli_fetch_assoc($result);
			
			$pwHash = habadasher($pwd, $row['salt']);
			
			if ($pwHash == $row['password'])
			{
				unset ($_SESSION['msg']);
				header("Location: ../employee.php?login=yes");
					$_SESSION['user_id'] = $row['employee_username'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['first_name'] = $row['first_name'];
					$_SESSION['last_name'] = $row['last_name'];
					$_SESSION['address'] = $row['address'];
					$_SESSION['city'] = $row['city'];
					$_SESSION['state'] = $row['state'];
					$_SESSION['zip'] = $row['zipcode'];
				exit();
			}
			else
			{
				$_SESSION['msg'] = '<br /><font style="Arial" color="#FF0000">Invalid username and/or password. </font>';
				header("Location: ../employee.php?login=error");
				exit();
			}
			
		}
	}
	
}

else 
	header("Location: ../employee.php?employeelogin=error");
	exit();

?>