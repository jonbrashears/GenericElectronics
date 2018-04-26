	<p style="font-size:20px; margin: 0px 8px;font-family: 'Arial';">Login to Continue </p></br>
			<form method="POST" action="includes/employeelogin_inc.php">
			<input type="text" name="username" placeholder="Username" minlength="5" maxlength="20"></br>
			<input type="password" name="password" placeholder="Password" minlength= "8"></br>
			<button type="submit" name="login">Log In</button>
			
			<div class="errMsgBlank"><?php if(isset($_SESSION['msg'])) echo $_SESSION['msg']; unset($_SESSION['msg']); ?><div>
		</form>
	<?php if (isset($_SESSION['msg'])) {unset($_SESSION['msg']);} ?>