<?php include('booking_server.php');
// include('confirm_f.php');
// session_start();

if (!isset($_SESSION['c_username'])) {
	$_SESSION['msg'] = "You must log in first";
	header('location: customer_login.php');
}
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['c_username']);
	header("location: customer_login.php");
}
?>


<!-- KIT 502 Group 3 last edit 26/03/2021 -->
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">

	<title>KIT_502_web_dev</title>
	<!-- <link rel="stylesheet" type="text/css" href="../css/style.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="../css/popup_window.css"> -->
	<link rel="stylesheet" type="text/css" href="../css/footer.css">
	<!-- <link rel="stylesheet" type="text/css" href="../css/popup_window.css"> -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/booking.css">
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>

<body>
	<!---------------part 1-------------------->
	<div class="covid_div">
		<aside class="covid_notice">
			<a class="covid_news" href=" ">
				<span class="covid_words">Get the latest on our COVID-19 response</span>
			</a>
		</aside>
	</div>


	<nav class="nav_bar">
		<div class="logo">
			<p>UTas</p>
			<p>Accommodation</p>
		</div>
		<!-- <a href="#" class="toggle_btn">
			<span class="bar"></span>
			<span class="bar"></span>
			<span class="bar"></span>
		</a> -->
		<div class="nav_links">
			<ul class="list_nav">
				<li><a class="active_nav" href="../home.php">Home</a></li>
				<!-- <li><a class="active_nav" href="./booking.php">Book</a ></li> -->
				<li><a class="active_nav" href="#">Customer</a>
					<div class="sub_user">
						<ul>
							<li><a href="./customer_login.php">Logout</a></li>
							<li><a href="./review.php">Review</a></li>
							<!-- <li><a href="customer_login.php?logout='1'">logout</a></li> -->
						</ul>
					</div>
				</li>
				<li><a href="../html/login_admin.html"><button id="do_admin_login" type="button" class="btn btn-dark" onclick="do_admin_login()">Admin</button></a></li>
			</ul>
		</div>
		<div class="log_msg">
			<!-- notification message -->
			<?php if (isset($_SESSION['success'])) : ?>
				<div class="error success">
					<h3>
						<?php
						echo $_SESSION['success'];
						unset($_SESSION['success']);
						?>
					</h3>
				</div>
			<?php endif ?>

			<!-- logged in user information -->
			<?php if (isset($_SESSION['c_username'])) : ?>
				<div class="user_log_suc">
					<p>Welcome <strong><?php echo $_SESSION['c_username']; ?></strong></p>
					<p> <a class="active_nav" href="customer_login.php?logout='1'">logout</a> </p>
				</div>

			<?php endif ?>
		</div>
		<!-- <script src="../js/toggle_bar.js" defer></script> -->
	</nav>

	<div class="Booking_form">


		<?php include('../db_conn.php');
		$sql = "SELECT * FROM house WHERE 1 ";
		$Location = "";
		$b_checkin = "";
		$b_checkout = "";
		$b_guest = "";
		// $connection = mysqli_connect('localhost', 'root', '', 'testdb');

		// city
		if (isset($_POST['Location']) && !empty($_POST['Location'])) {
			$Location = $_POST['Location'];
			$sql .= "AND house_city LIKE '%$Location%' ";
		}
		// check in date
		if (isset($_POST['b_checkin']) && !empty($_POST['b_checkin'])) {
			$b_checkin = $_POST['b_checkin'];
			$sql .= "AND house_checkin <= '$b_checkin'";
			// $sql = "SELECT * FROM `house` WHERE `b_checkin` BETWEEN 
			// house_checkin('$house_checkin','%d-%m-%Y') AND house_checkout('$house_checkout','%d-%m-%Y')";



			// $sql .= "AND house_checkout >= '%$b_checkin%'";
			// $sql .= 'house_checkin BETWEEN "' . $_POST["b_checkin"] . '" AND "' . $_POST["b_checkout"] . '" AND ';
		}
		// check out date
		if (isset($_POST['b_checkout']) && !empty($_POST['b_checkout'])) {
			$b_checkout = $_POST['b_checkout'];
			$sql .= "AND house_checkout >= '$b_checkout'";
			// $sql .= 'house_checkout BETWEEN "' . $_POST["start_date"] . '" AND "' . $_POST["end_date"] . '" AND ';
		}
		// guest
		if (isset($_POST['b_guest']) && !empty($_POST['b_guest'])) {
			$b_guest = $_POST['b_guest'];
			$sql .= "AND house_guest LIKE '%$b_guest%' ";
		}
		echo $sql;
		$result = mysqli_query($db, $sql);
		?>
		<form class="Bk_form_tab" method="post" action="login_book.php">
			<?php if (isset($_GET['error'])) { ?>
				<div class="alert alert-danger" role="alert">
					<?php echo $_GET['error']; ?>
				</div>
			<?php } ?>

			<div class="Bk_op_tab">
				<i class="fa fa-calendar" aria-hidden="true"></i>

				<select id="input-group" name="Location" placeholder="House city" value="<?php echo $Location; ?>">
					<option value="">City</option>
					<option value="Sydney">Sydney</option>
					<option value="Newcastle">Newcastle</option>
					<option value="Wollongong">Wollongong</option>
					<option value="Bendigo">Bendigo</option>
					<option value="Brisbane">Brisbane</option>
					<option value="Gold Coast">Gold Coast</option>
					<option value="Adelaide">Adelaide</option>
					<option value="Hobart">Hobart</option>
					<option value="Melbourne">Melbourne</option>
					<option value="Perth">Perth</option>
				</select>
			</div>
			<div class="Bk_tab">
				<!-- <label>Check In:</label> -->
				<input type="text" class='form-control' placeholder="check in date" id="checkin" name="b_checkin" value="<?php echo $b_checkin; ?>">
			</div>
			<div class="Bk_tab">
				<input type="text" class='form-control' placeholder="check out date" id="checkout" name="b_checkout" value="<?php echo $b_checkout; ?>">
			</div>
			<div class="Bk_tab">
				<!-- <label for="guest">Number of Guests</label> -->
				<input type="number" class='form-control' placeholder="Select guest" min="1" id="b_guest" name="b_guest" value="<?php echo $b_guest; ?>">
			</div>


			<div class="Bk_tab">
				<input type="submit" class="Search_btn" value="Search" name="search_client">
			</div>
		</form>
	</div>

	<div class="Room_type" id="Room_type">
		<table class="Room_bk">
			<?php while ($row = mysqli_fetch_object($result)) { ?>
				<tr>
					<td>
						<div class="img_room">
							<?php echo $row->house_image ?>
						</div>
					</td>


					<td>
						<h3>City</h3>
						<?php echo $row->house_city ?>
					</td>
					<td>
						<h3>Check in date</h3>
						<?php echo $row->house_checkin ?>
					</td>
					<td>
						<h3>Check out date</h3>
						<?php echo $row->house_checkout ?>
					</td>

					<td>
						<h3>Guest</h3>
						<?php echo $row->house_guest ?>
					</td>
					<td>
						<strong id="strong">Price</strong>
						<?php echo $row->house_price ?>
						<!-- <button type="button" class="Book_btn">book now</button> -->

						<a  name="book_now" href="./confirm_booking.php?Checkin=<?php echo $b_checkin ?> & Checkout=<?php echo $b_checkout ?> & Guest=<?php echo $b_guest ?> & Price=<?php echo $row->house_price ?>"><input type="submit"></a>


					</td>
				</tr>
			<?php } ?>
		</table>
	</div>
	<!-- js files -->
	<!-- <script src="../js/home.js"></script> -->
	<!-- <script src="../js/admin_pop.js"></script> -->
	<!-- <script src="../js/booking2.js"></script> -->
	<!-- <script src="../js/popup_window.js"></script> -->
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="../js/booking.js"></script>
	<footer>
		<p>Copyright &copy; , KIT_502 Assignment_2</p>
	</footer>
</body>

</html>