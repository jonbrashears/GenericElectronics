<?php include 'employeenav.php';?>
<body>
		<?php 
		if (!isset($_SESSION['user_id'])){
			include 'employeelogin.php'; ?>
		
		<?php }else {?>
		
		<?php }?>
		
		
</body>
<?php include 'footer.php'?>
