<?php include 'employeenav.php';
	   include 'footer.php';?>

<?php if(isset($_POST['cust_query']))
{
	include 'includes/dbconnect.php';

	
	$username= mysqli_real_escape_string($conn, $_POST["username"]);
	
	$sql = "SELECT * FROM customers WHERE user_id = '$username'";
	
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()){
	echo $row["user_id"] . " " . $row["email"] . " " . $row["address"] . " " . $row["city"]. " " . $row["state"]. " " . $row["zipcode"];
	}
}
else
{
	echo "No results";
} ?>