<?php 
include "./system_CRUD/read.php";
// include "./CRUD/update_cust.php";
session_start();

if (!isset($_SESSION['username'])) {
	$_SESSION['msg'] = "You must log in first";
	header('location: admin_login.php');
}
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header("location: admin_login.php");
}

?>
<!-- KIT 502 
Group 3 last edit 26/03/2021 -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- link to font style  -->
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<link rel="stylesheet" href="../css/dashboard.css" />
	<link rel="stylesheet" href="../css/system_CRUD.css" />
	<title>UTas system manager dashboard</title>
</head>

<body>
	<div class="db_sider">
		<div class="db_brand">
			<h2><span class="las la-hotel"></span>Utas Hotel</h2>
		</div>
		<!-- sider bar - blue  -->
		<div class="sider_bar_menu">
			<ul>
				<!-- nav bar in dashboard -->
				<li>
					<a class="active_fun" onclick="user_tab()"><span class="las la-users"></span>
						<span>Users</span></a>
				</li>
				<li>
					<a class="active_fun" onclick="order_tab()"><span class="las la-shopping-bag"></span>
						<span>Orders</span></a>
				</li>
				<li>
					<a class="active_fun" onclick="review_tab()"><span class="las la-list-alt"></span>
						<span>Reviews</span></a>
				</li>
				<li>
					<a class="active_fun" onclick="q_n_a_tab()"><span class="las la-question-circle"></span>
						<span>Q&A</span></a>
				</li>

				<li>
					<a href="admin_login.php?logout='1'" class="active_fun"><span class="las la-hotel"></span>
						<span>Logout</span></a>
				</li>
			</ul>
		</div>
	</div>
	<!-- main_container -->
	<div class="main_container">
		<header>
			<h2>
				<label for="">
					<span class="las la-bars"></span>
				</label> Dashboard
			</h2>

			<div class="user_bar">
				<img src="../img/dashboard/user_icon.webp" alt="">
				<div>
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
					<?php if (isset($_SESSION['username'])) : ?>
						<h3>Welcome <?php echo $_SESSION['username']; ?></h3>


					<?php endif ?>
					<h6>System manager</h6>
				</div>
			</div>
		</header>
		<main>
			<!-- dashboard content -->
			<div class="dash_card_container">
				<ul>
					<li class="active_card">
						<a onclick="user_tab()">
							<div class="dash_card">
								<div>
									<h1>10</h1>
									<span>Users</span>
								</div>
								<div>
									<span class="las la-users"></span>
								</div>
							</div>
						</a>
					</li>
					<li class="active_card">
						<a onclick="order_tab()">
							<div class="dash_card">
								<div>
									<h1>10</h1>
									<span>Orders</span>
								</div>
								<div>
									<span class="las la-shopping-bag"></span>
								</div>
							</div>
						</a>
					</li>
					<li class="active_card">
						<a onclick="review_tab()">
							<div class="dash_card">
								<div>
									<h1>10</h1>
									<span>Reviews</span>
								</div>
								<div>
									<span class="las la-list-alt"></span>
								</div>
							</div>
						</a>
					</li>
					<li class="active_card">
						<a onclick="q_n_a_tab()">
							<div class="dash_card">
								<div>
									<h1>Question?</h1>
									<span>Q&A</span>
								</div>
								<div>
									<span class="las la-question-circle"></span>
								</div>
							</div>
						</a>
					</li>
				</ul>
			</div>
			<!--------------------------user card---------------------------->
			<div class="tab" id="user_content">

				<!-- create and edit customers' details in the table -->
				<div class="container">
					<div class="box_customer">
						<h4 class="display-4 text-center">Customer</h4><br>
						<?php if (isset($_GET['success'])) { ?>
							<div class="alert alert-success" role="alert">
								<?php echo $_GET['success']; ?>
							</div>
						<?php } ?>
						<?php if (mysqli_num_rows($result)) { ?>
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col">Order.NO</th>
										<th scope="col">ID.NO</th>
										<th scope="col">Username</th>
										<th scope="col">First name</th>
										<th scope="col">Last name</th>
										<th scope="col">Email</th>
										<th scope="col">Mobile</th>
										<th scope="col">Address</th>
										<th scope="col">Country</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 0;
									while ($rows = mysqli_fetch_assoc($result)) {
										$i++;
									?>
										<tr>
											<th scope="row"><?= $i ?></th>
											<th scope="row"><?= $rows['id'] ?></th>
											<td><?= $rows['c_username'] ?></td>
											<td><?= $rows['c_first_name'] ?></td>
											<td><?= $rows['c_last_name'] ?></td>
											<td><?php echo $rows['c_email']; ?></td>
											<td><?php echo $rows['c_mobile']; ?></td>
											<td><?php echo $rows['c_address']; ?></td>
											<td><?php echo $rows['c_country']; ?></td>
											<td><a href="./system_CRUD/update_cust.php?id=<?= $rows['id'] ?>" class="btn btn-success">Update</a>

												<a href="./system_CRUD/delete_cust.php?id=<?= $rows['id'] ?>" class="btn btn-danger">Delete</a>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						<?php } ?>
						<div class="link-right">
							<a href="./system_CRUD/create_cust.php" class="link-primary">Create</a>
						</div>
					</div>

					<!-- admin user -->
					<div class="box_admin">
						<h4 class="display-4 text-center">Admin user</h4><br>
						<?php if (isset($_GET['success'])) { ?>
							<div class="alert alert-success" role="alert">
								<?php echo $_GET['success']; ?>
							</div>
						<?php } ?>
						<?php if (mysqli_num_rows($result_admin)) { ?>
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col">Order.NO</th>
										<th scope="col">ID.NO</th>
										<th scope="col">Type user</th>
										<th scope="col">Username</th>
										<th scope="col">First name</th>
										<th scope="col">Last name</th>
										<th scope="col">Email</th>
										<th scope="col">Mobile</th>
										<th scope="col">Address</th>
										<th scope="col">Country</th>
										<th scope="col">ABN</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 0;
									while ($rows = mysqli_fetch_assoc($result_admin)) {
										$i++;
									?>
										<tr>
											<th scope="row"><?= $i ?></th>
											<th scope="row"><?= $rows['id'] ?></th>
											<td><?= $rows['type_user'] ?></td>
											<td><?= $rows['username'] ?></td>
											<td><?= $rows['first_name'] ?></td>
											<td><?= $rows['last_name'] ?></td>
											<td><?php echo $rows['email']; ?></td>
											<td><?php echo $rows['mobile']; ?></td>
											<td><?php echo $rows['address']; ?></td>
											<td><?php echo $rows['country']; ?></td>
											<td><?php echo $rows['abn']; ?></td>
											<td><a href="./system_CRUD/update_admin.php?id=<?= $rows['id'] ?>" class="btn btn-success">Update</a>

												<a href="./system_CRUD/delete_admin.php?id=<?= $rows['id'] ?>" class="btn btn-danger">Delete</a>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						<?php } ?>
						<div class="link-right">
							<a href="./system_CRUD/create_admin.php" class="link-primary">Create</a>
						</div>
					</div>
				</div>
			</div>
			<!--------------------------accommodation card---------------------------->
			<div class="tab" id="order_content">
				<div class="tab tab_create">
					<td>
						Location :<input type="email" name="edit_location" id="edit_location">
					</td>

					<td>
						Price :<input type="location" name="edit_price" id="edit_price">
					</td>

					<td>
						Num_of_room :<input type="text" name="edit_room" id="edit_room">
					</td>

					<td>
						Num_of_bathroom :<input type="text" name="edit_bathroom" id="edit_bathroom">
					</td>

					<td>
						Smoke :<input type="text" name="edit_smoke" id="edit_smoke">
					</td>

					<td>
						Garage :<input type="text" name="edit_garage" id="edit_garage">
					</td>

					<td>
						Internet :<input type="text" name="edit_internet" id="edit_internet">
					</td>

					<div class="create_btn">
						<button onclick="create_order()">Create</button>
						<button id="edit_btn" onclick="edit_order()">Edit</button>
					</div>
				</div>
				<table id="order_table">
					<thead>
						<tr>
							<th>Location</th>
							<th>Price</th>
							<th>Num_of_room</th>
							<th>Num_of_bathroom</th>
							<th>Smoke</th>
							<th>Garage</th>
							<th>Internet</th>
						</tr>
					</thead>
					<tr>
						<td>MEL</td>
						<td>30</td>
						<td>2</td>
						<td>3</td>
						<td>NO</td>
						<td>YES</td>
						<td>YES</td>
					</tr>
					<tr>
						<td>SYN</td>
						<td>100</td>
						<td>34</td>
						<td>5</td>
						<td>YES</td>
						<td>NO</td>
						<td>YES</td>
					</tr>
					<tr>
						<td>Hobart</td>
						<td>90</td>
						<td>8</td>
						<td>2</td>
						<td>NO</td>
						<td>YES</td>
						<td>NO</td>
					</tr>
					<tr>
						<td>ADELAILE</td>
						<td>60</td>
						<td>5</td>
						<td>2</td>
						<td>YES</td>
						<td>YES</td>
						<td>YES</td>
					</tr>
				</table>
			</div>

			<!--------------------------review card---------------------------->
			<div class="tab" id="review_content">
				<table id="review_table">
					<thead>
						<tr>
							<th>No.reference</th>
							<th>Location</th>
							<th>Rate score (sum_rate/num_review)</th>
							<th>Action</th>
						</tr>
					</thead>
					<tr>
						<td>#202101</td>
						<td>Mel</td>
						<td>3.8</td>
						<td>
							<button onclick="delete_review()" id="delete" type="button" class="btn btn-outline-danger">Delete</button>
						</td>
					</tr>
					<tr>
						<td>#202102</td>
						<td>SYN</td>
						<td>3.8</td>
						<td>
							<button onclick="delete_review()" id="delete" type="button" class="btn btn-outline-danger">Delete</button>
						</td>
					</tr>
					<tr>
						<td>#202103</td>
						<td>Hobart</td>
						<td>3.8</td>
						<td>
							<button onclick="delete_review()" id="delete" type="button" class="btn btn-outline-danger">Delete</button>
						</td>
					</tr>
				</table>
			</div>
			<div class="tab" id="q_n_a_content">
				<table id="review_table">
					<thead>
						<tr>
							<th>Question reference</th>
							<th>No.question</th>
							<th>content</th>
						</tr>
					</thead>
					<tr>
						<td>#202101</td>
						<td>1</td>
						<td>Question1</td>
					</tr>
					<tr>
						<td>#202102</td>
						<td>2</td>
						<td>Question2</td>
					</tr>
					<tr>
						<td>#202103</td>
						<td>3</td>
						<td>Question3</td>
					</tr>
				</table>
			</div>
		</main>
	</div>
	<!-- called the javascript files -->
	<script src="../js/dashboard.js"></script>
	<script src="../js/host_CRUD.js"></script>
	<!-- <script src="../js/CRUD_user.js"></script> -->
</body>

</html>