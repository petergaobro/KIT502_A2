<!-- KIT 502 
Group 3 last edit 26/03/2021 -->
<?php
include "./review_read.php";
// include "./CRUD/update_cust.php";
// session_start();

// if (!isset($_SESSION['username'])) {
//  $_SESSION['msg'] = "You must log in first";
//  header('location: review.php');
// }
// if (isset($_GET['logout'])) {
//  session_destroy();
//  unset($_SESSION['username']);
//  header("location: review.php");
// }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <title>KIT_502_web_dev</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../css/login_reg.css">
    <!-- <link rel="shortcut icon" type="image" href="../img/logo/Photo.png"> -->
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
                <li><a class="active_nav" href="../customer/booking.php">Book</a></li>
                <li><a class="active_nav" href="#">Customer</a>
                    <!-- sub user bar -->
                    <div class="sub_user">
                        <ul>
                            <li><a href="../customer/customer_login.php">Login</a></li>
                            <!-- <li><a onclick="do_logout()" href="../html/login_reg.html">Logout</a></li> -->
                            <li><a href="../customer/review.php">Review</a></li>
                        </ul>
                    </div>
                </li>
                <!-- <li><a><button id="open" type="button" class="btn btn-info">Search Now</button></a></li> -->
            </ul>
        </div>
        <!-- <script src="../js/toggle_bar.js" defer></script> -->
    </nav>



    <!---------------part 2-------------------->
    <!--------------------------user card---------------------------->
    <!--------------------------user card---------------------------->
    <div class="tab" id="user_content">

        <!-- create and edit customers' details in the table -->
        <div class="container">
            <div class="box_customer">
                <h4 class="display-4 text-center">Reviews</h4><br>
                <?php if (isset($_GET['success'])) { ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $_GET['success']; ?>
                    </div>
                <?php } ?>
                <?php if (mysqli_num_rows($result_review)) { ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Order.NO</th>
                                <th scope="col">location</th>
                                <th scope="col">Rate</th>
                                <th scope="col">Comment</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            while ($rows = mysqli_fetch_assoc($result_review)) {
                                $i++;
                            ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $rows['r_location'] ?></td>
                                    <td><?= $rows['r_rating'] ?></td>
                                    <td><?= $rows['r_comment'] ?></td>
                                    <td><a href="./update_review.php?id=<?= $rows['id'] ?>" class="btn btn-success">Update</a>

                                        <a href="./delete_review.php?id=<?= $rows['id'] ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } ?>
                <div class="link-right">
                    <a href="create_view.php" class="link-primary">Create</a>
                </div>
            </div>

        </div>
    </div>



	<!-- seperate line part -->
	<div class="seperate_line"></div>

	<!--------------footer_part------------------->
	<!-- <div class="footer_container"> -->
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
	<!-- </div> -->
	<!-- footer part -->
	<footer>
		<p>Copyright &copy; , KIT_502 Assignment_2</p>
	</footer>
	<!-- js files -->
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="../js/home.js"></script>
	<!-- <script src="./js/search_pop.js"></script> -->
	<script src="../js/admin_pop.js"></script>
	<script src="../js/booking.js"></script>

</body>

</html>