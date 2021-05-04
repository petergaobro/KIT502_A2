<?php include('create_admin_f.php') ?>
<!DOCTYPE html>
<html>

<head>
	<title>System manager create administrator</title>
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>

<body>
	<div class="header">
		<h2>Create administrator</h2>
	</div>

	<form method="post" action="create_admin.php">
		<?php include('../../errors.php'); ?>
		<div class="input-group">
			<label>Are you registering as a system manager or host?</label>
			<select class="type_user" name="type_user" value="<?php echo $type_user; ?>"><br>
				<option selected value=""></option>
				<option value="System manager">System manager</option>
				<option value="Host">Host</option>
			</select><br>
		</div>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>

		<div class="input-group">
			<label>First Name</label>
			<input type="text" name="first_name" value="<?php echo $first_name; ?>">
		</div>

		<div class="input-group">
			<label>Last Name</label>
			<input type="text" name="last_name" value="<?php echo $last_name; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>

		<div class="input-group">
			<label>Mobile</label>
			<input type="text" name="mobile" value="<?php echo $mobile; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<label>Address</label>
			<input type="text" name="address" value="<?php echo $address; ?>">
		</div>
		<div class="input-group">
			<label>Country</label>
			<select class="country" name="country" value="<?php echo $country; ?>"><br>
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
			<label>ABN</label>
			<input type="text" name="abn" value="<?php echo $abn; ?>">
		</div>

		<div class="input-group">
			<button type="submit" class="btn" name="create_admin_ad">Register</button>
		</div>
	</form>
</body>

</html>