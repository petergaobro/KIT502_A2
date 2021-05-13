<?php include('customer_server.php') ?>
<!DOCTYPE html>
<html>

<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/home.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./css/footer.css">
	<link rel="shortcut icon" type="image" href="../img/logo/Photo.png">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>

<body>
	<!---------------part 1-------------------->
	<div class="covid_div">
		<aside class="covid_notice">
			<a class="covid_news" href="https://www.australia.gov.au/">
				<span class="covid_words">Get the latest on our COVID-19 response</span>
			</a>
		</aside>
	</div>
	<nav class="nav_bar">
		<div class="logo">
			<img src="../img/logo/Photo.png" alt="">
		</div>
		<div class="nav_links">
			<ul class="list_nav">
				<li><a class="active_nav" href="../home.php">Home</a></li>
				<li><a class="active_nav" href="../customer/booking.php">Book</a></li>
				<li><a class="active_nav" href="#">Customer</a>
					<!-- sub user bar -->
					<div class="sub_user">
						<ul>
							<li><a href="../customer/customer_login.php">Login</a></li>
							<li><a href="../customer/review.php">Review</a></li>
						</ul>
					</div>
				</li>
				<li><a href="../admin/admin_login.php"><button id="do_admin_login" type="button" class="btn btn-dark" onclick="do_admin_login()">Admin</button></a></li>
			</ul>
		</div>
	</nav>
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
	<!-- seperate line part -->
	<div class="seperate_line"></div>
	<!--------------footer_part------------------->
	<div class="contact_us">
		<div class="contact_word">
			<h1>Contact us</h1>
			<p>
				<strong>Address</strong>
				<br>Churchill Ave
				<br>Hobart TAS 7005
			</p>
			<p>
				<strong>Phone</strong>
				<br>+61362262999
			</p>
		</div>
		<div class="google_map">
			<p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2922.5404210451375!2d147.32365931566832!3d-42.9036422497168!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xaa6ddf5a09db9cc9%3A0xf03c94eb451f680!2sUniversity%20of%20Tasmania!5e0!3m2!1sen!2sau!4v1620016679034!5m2!1sen!2sau" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe></p>
		</div>
	</div>
	<div class="social_main">
		<div class="social_container">
			<li>
				<a href="https://www.facebook.com/UniversityofTasmania/"><img src="../img/footer_social/fb.png" alt=""></a>
			</li>
		</div>
		<div class="social_container">
			<li>
				<a href="https://www.instagram.com/universityoftasmania/?hl=en"><img src="../img/footer_social/ins.png" alt=""></a>
			</li>
		</div>
		<div class="social_container">
			<li>
				<a href="https://twitter.com/UTAS_?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"><img src="../img/footer_social/twitter.webp" alt=""></a>
			</li>
		</div>
		<div class="social_container">
			<li>
				<a href="https://www.youtube.com/channel/UCnSDAnLD6JDC7C5ZVaKbC2g"><img src="../img/footer_social/youtube.jpeg" alt=""></a>
			</li>
		</div>
	</div>
	<footer>
		<p>Copyright &copy; , KIT_502 Assignment_2</p>
	</footer>
</body>
</html>