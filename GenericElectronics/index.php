<?php include 'navigation.php';?>
<body>

<div class="container fb-jb">
	<div class = "panel panel-primary">
		<h1>Featured Products</h1>
		</div>
	</div>

<div class="container">    
  <div class="row">
    <div class="col-sm-4">
	<?php $id = 1;
	  $sql = "SELECT electronic_pic FROM electronic WHERE electronic_id='$id'";
	  $result = $conn->query($sql);
	  $row = $result->fetch_assoc();
	?>
      <a href="product.php?id=<?php echo $id ?>"> <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row["electronic_pic"]).'" width="160" height="240"/>';?> </a>
    </div>
    <div class="col-sm-4"> 
      <?php $id = 2;
	  $sql = "SELECT electronic_pic FROM electronic WHERE electronic_id='$id'";
	  $result = $conn->query($sql);
	  $row = $result->fetch_assoc();
	?>
      <a href="product.php?id=<?php echo $id ?>"> <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row["electronic_pic"]).'" width="160" height="240"/>';?> </a>
    </div>
    <div class="col-sm-4"> 
      <?php $id = 3;
	  $sql = "SELECT electronic_pic FROM electronic WHERE electronic_id='$id'";
	  $result = $conn->query($sql);
	  $row = $result->fetch_assoc();
	?>
      <a href="product.php?id=<?php echo $id ?>"> <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row["electronic_pic"]).'" width="160" height="240"/>';?> </a>
    </div>
  </div>
  
</div>

</br>

<?php include 'footer.php';?>

</body>
</html>
