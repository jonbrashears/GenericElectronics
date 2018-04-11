<?php include 'navigation.php';?>

<body>


<?php

$sql = "SELECT electronic.electronic_id, electronic.title, electronic.electronic_pic,  electronic.short_description, electronic.price, manufacturer_name FROM electronic, manufacturer, manufacturer_electronic WHERE electronic.electronic_id = manufacturer_electronic.electronic_id AND manufacturer.manufacturer_id = manufacturer_electronic.manufacturer_id" ;

$result = $conn->query($sql);

if ($result->num_rows > 0) {

	while($row = $result->fetch_assoc()) {
		
	
	?>
	<div class="container container-genre-main">
	<div class="genre-row">
		<div class="genre-left">
			<a href="product.php?id=<?php echo $row["electronic_id"] ?>"> <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row["electronic_pic"]).'" width="133" height="200"/>';?> </a>
		</div>
		<div class="genre-right">
		<h2> <?php echo $row["title"];  ?> </h2>
		<p> <?php echo $row["manufacturer_name"]; ?></p>
		<p class="more" title="Read More"><?php echo $row["short_description"] ?></p>
		<p>Price: $<?php echo $row["price"] ?> </p>
		<a href="product.php?id= <?php  echo $row["electronic_id"]; ?>" class = "btn btn-basic jbbutton">View Product </a>
		</div>
	</div>
</div>

	<?php
	}	

} 
 else {

	echo "We have no books for sale!.";
} ?>

</br>
</br>	

<?php include 'footer.php';?>
<script>
$('.more').css({height:'20px', overflow:'hidden'});
$('.more').on('click', function() {
    var $this = $(this);
    if ($this.data('open')) {
        $this.animate({height:'20px'});
        $this.data('open', 0);

    }
    else {
        $this.animate({height:'100%'});
        $this.data('open', 1);
    }
});
</script>
</body>
</html>