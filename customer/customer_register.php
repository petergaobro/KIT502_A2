<?php include('customer_server.php') ?>
<!DOCTYPE html>
<html>

<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->
	<link rel="stylesheet" type="text/css" href="../css/footer.css">
	<!-- <link rel="shortcut icon" type="image" href="../img/logo/Photo.png"> -->
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"> -->
</head>

<body>
	<!---------------part 1-------------------->
	<div class="header">
		<h2>Register</h2>
	</div>
	<form method="post" action="customer_register.php">
		<?php include('../errors.php'); ?>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="c_username" value="<?php echo $c_username; ?>">
		</div>
		<div class="input-group">
			<label>First Name</label>
			<input type="text" name="c_first_name" value="<?php echo $c_first_name; ?>">
		</div>
		<div class="input-group">
			<label>Last Name</label>
			<input type="text" name="c_last_name" value="<?php echo $c_last_name; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="c_email" value="<?php echo $c_email; ?>">
		</div>
		<div class="input-group">
			<label>Mobile</label>
			<input type="text" name="c_mobile" value="<?php echo $c_mobile; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="c_password" name="password_c1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="c_password" name="password_c2">
		</div>
		<div class="input-group">
			<label>Address</label>
			<input type="text" name="c_address" value="<?php echo $c_address; ?>">
		</div>
		<div class="input-group">
			<label>Country</label>
			<select class="c_country" name="c_country" value="<?php echo $c_country; ?>"><br>
				<option selected value=""></option>
				<option value="China">China</option>
				<option value="Australia">Australia</option>
				<option value="America">America</option>
				<option value="Africa">Africa</option>
				<option value="Japan">Japan</option>
				<option value="South Korea">South Korea</option>
			</select><br>
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_customer">Register</button>
		</div>
		<p>
			Already a member? <a href="customer_login.php">Sign in</a>
		</p>
	</form>
	<footer>
		<p>Copyright &copy; , KIT_502 Assignment_2</p>
	</footer>
</body>
</html>