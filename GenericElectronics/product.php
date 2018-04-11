<?php include 'navigation.php';?>
<?php $id = $_GET['id'];
	  $sql = "SELECT electronic.electronic_id,title,price, short_description, electronic_pic, quantity, manufacturer.manufacturer_name FROM electronic, manufacturer, manufacturer_electronic WHERE electronic.electronic_id='$id' AND manufacturer_electronic.electronic_id = '$id' AND manufacturer.manufacturer_id = manufacturer_electronic.manufacturer_id";
	  $result = $conn->query($sql);
	  $row = $result->fetch_assoc();
?>

<body>

<div class="container">
<div class="container-jb">    
  <div class="row-jb">
     <div class ="left-main">
		<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row["electronic_pic"]).'" width="500" height="390"/>';?>
	 </div>
	 <div class ="right-main">
		<h2><?php echo $row["title"]?></h2>
		<a href="manufacturer.php?manufacturer=<?php echo $row["manufacturer_name"] ?>"> <?php echo $row["manufacturer_name"]?> </a>
		<p><?php echo $row["short_description"]?></p>
		<p><?php echo "$" . $row["price"]?></p>
		<?php if($row["quantity"] <= 0)
		{ ?>
			<p>OUT OF STOCK</p>
		<?php }
		else {
			// redirects user to login page when "Add to cart" is 
			// clicked if they're not logged in already
			if (isset($_SESSION['user_id'])){
			$filename = "add_to_cart.php?id=" .$row['electronic_id'];
			}else{
			$filename = "login.php";}?>
			<a href=<?php echo $filename ?> class = "btn btn-basic jbbutton">Add to cart </a>
		<?php }?>
	 </div>
   </div>
</div>
</div>

<?php include 'footer.php';?>
</body>
</html>
