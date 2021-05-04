<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
	<div class="header">
		<h2>Login</h2>
	</div>

	<form method="post" action="login.php">
		<?php include('errors.php'); ?>
		<!-- <div class="input-group">
			<label>Username</label>
			<input type="text" name="username">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div> -->

		<div class="mb-3">
			<label for="username" class="form-label">User name</label>
			<input type="text" class="form-control" name="username" id="username">
		</div>
		<div class="mb-3">
			<label for="password" class="form-label">Password</label>
			<input type="password" name="password" class="form-control" id="password">
		</div>


		<!-- select type user -->
		<div class="mb-1">
			<label class="form-label">Select User Type:</label>
		</div>
		<select class="form-select mb-3" name="role" aria-label="Default select example">
			<option selected value=""></option>
			<option value="system manager">System manager</option>
			<option value="host">host</option>
		</select>

		<div class="input-group">
			<!-- <button type="submit" class="btn" name="login_user">Login</button> -->
			<button type="submit" class="btn btn-primary" name="login_user">LOGIN</button>
		</div>
		<p>
			Not yet a member? <a href="admin_register.php">Sign up</a>
		</p>
	</form>
</body>

</html>