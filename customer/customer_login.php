<?php include('customer_server.php') ?>
<!DOCTYPE html>
<html>

<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
	<div class="header">
		<h2>Customer login</h2>
	</div>

	<form method="post" action="customer_login.php">
		<?php include('../errors.php'); ?>
		<div class="mb-3">
			<label for="c_username" class="form-label">User name</label>
			<input type="text" class="form-control" name="c_username" id="c_username">
		</div>
		<div class="mb-3">
			<label for="c_password" class="form-label">Password</label>
			<input type="c_password" name="c_password" class="form-control" id="c_password">
		</div>
		<div class="input-group">
			<!-- <button type="submit" class="btn" name="login_user">Login</button> -->
			<button type="submit" class="btn btn-primary" name="login_customer">LOGIN</button>
		</div>
		<p>
			Not yet a member? <a href="customer_register.php">Sign up</a>
		</p>
	</form>
</body>

</html>