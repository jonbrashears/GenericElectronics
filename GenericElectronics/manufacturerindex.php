<?php include 'navigation.php';?>

<body>
<?php

$sql = "SELECT * FROM manufacturer" ;

$result = $conn->query($sql); ?>

<div class="container fb-jb">
	<div class = "panel panel-primary">
		<h1> List of Manufacturers: </h1>
	</div>
</div>

<?php
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) { ?>
	
		
	<div class="genre-container">
	<div class="genre-item">
	<p>
	<a href="manufacturer.php?manufacturer=<?php echo $row["manufacturer_name"] ?>"> <?php echo $row["manufacturer_name"] ?> </a>
	</p>
	</div>
	</div>
<?php
	}	

} 
 else {

	echo "No authors found";
} ?>

</br>
</br>	

<?php include 'footer.php';?>
</body>
</html>