<?php include 'navigation.php';?>
<?php $id = $_GET['category'];
	  $sql = "SELECT * FROM electronic WHERE electronic_id IN (SELECT electronic_id FROM category_electronic WHERE category_id IN(SELECT category_id FROM categories WHERE category_name = '$id'))";
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