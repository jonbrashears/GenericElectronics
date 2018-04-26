<?php include 'employeenav.php';?>
<body>
		<?php if (!isset($_SESSION['user_id'])){
			include 'employeelogin.php'; ?>
		
		<?php }else { ?>
		<?php $sql = "SELECT electronic.electronic_id, electronic.title, electronic.price, electronic.quantity, manufacturer_name FROM electronic, manufacturer, manufacturer_electronic WHERE electronic.electronic_id = manufacturer_electronic.electronic_id AND manufacturer.manufacturer_id = manufacturer_electronic.manufacturer_id" ;

			  $result = $conn->query($sql);

			  if ($result->num_rows > 0) {

			  while($row = $result->fetch_assoc()) {
		?>
			<div class="genre-row"> 
				<p><?php echo $row["electronic_id"] . " " . $row["manufacturer_name"] . " " . $row["price"] . " " . $row["quantity"]?>
		
			<?php
					}	

				} 
			else {

			echo "We have no books for sale!.";
			} ?>
		<?php } ?>
		
		
</body>
<?php include 'footer.php'?>