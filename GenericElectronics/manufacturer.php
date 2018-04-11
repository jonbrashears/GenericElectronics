<?php include 'navigation.php';?>
<?php $id =  $_GET['manufacturer'];;
	  $sql = "SELECT electronic_id, title, price, short_description, electronic_pic FROM electronic WHERE electronic_id IN (SELECT electronic_id FROM manufacturer_electronic WHERE manufacturer_id IN(SELECT manufacturer_id FROM manufacturer WHERE manufacturer_name = '$id'))";
	  $result = $conn->query($sql);
?>
<body>
<?php
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
?>		
<div class="container container-genre-main">
	<div class="genre-row">
		<div class="genre-left">
			<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row["electronic_pic"]).'" width="133" height="200">'?>
		</div>
		<div class="genre-right">
			<h2><?php echo $row["title"]?></h2>
			<p class="more" title="Read More"><?php echo $row["short_description"] ?></p>
			<p>Price: $<?php echo $row["price"]?></p>
			<a href=<?php echo 'product.php?id=' . $row['electronic_id'] ?> class = "btn btn-basic jbbutton">View Product </a>
		</div>
	</div>
</div>
	<?php 	}
}
else {
	?>
	<h2> No Results </h2>
<?php }  ?>
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