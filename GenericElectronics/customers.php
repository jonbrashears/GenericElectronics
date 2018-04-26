<?php include 'employeenav.php';?>
<body>
		<?php if (!isset($_SESSION['user_id'])){
			include 'employeelogin.php'; ?>
		
		<?php }else { ?>
			<form method="POST" action="customer_query.php">
			<input type="text" name="username" placeholder="Customer Username"></br>
			<button type="submit" name="cust_query">User Search</button>

			  
		<?php } ?>
		
		
</body>
<?php include 'footer.php'?>