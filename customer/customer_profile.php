<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="../css/customer_profile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../css/login_reg.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link css file and font style -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- <link rel="stylesheet" href="../css/dashboard.css" /> -->
    <link rel="stylesheet" href="../css/system_CRUD.css" />
    <title>Profile</title>
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
                            <li>
                                <a href="customer_login.php?logout='1'" class="active_fun">
                                    <span>Logout</span></a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- <li><a><button id="open" type="button" class="btn btn-info">Search Now</button></a></li> -->
            </ul>
        </div>
    </nav>


    <div class="main_container">
        <header>
            <h2>
                <label for="">
                    <span class="las la-bars"></span>
                </label> Profile
            </h2>
            <!-- user nav bar -->
            <div class="user_bar">
                <div>
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
                    <?php if (isset($_SESSION['username'])) : ?>
                        <h3>Welcome <?php echo $_SESSION['username']; ?></h3>
                    <?php endif ?>
                    <h6>Customer</h6>
                </div>
            </div>
        </header>
        <main>
            <div class="dash_card_container">
                <ul>
                    <li class="active_card">
                        <a onclick="house_tab()">
                            <div class="dash_card">
                                <div>
                                    <h1>Person details</h1>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="active_card">
                        <a onclick="order_tab()">
                            <div class="dash_card">
                                <div>
                                    <h1>Order History</h1>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="active_card">
                        <a onclick="rate_tab()">
                            <div class="dash_card">
                                <div>
                                    <h1>Rate</h1>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <!------------------------House card----------------->
            <div class="tab" id="house_content">
                <div class="container">
                    <div class="box_customer">
                        <h4 class="display-4 text-center">Personal Details</h4><br>
                        <?php if (isset($_GET['success'])) { ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $_GET['success']; ?>
                            </div>
                        <?php } ?>
                        <?php if (mysqli_num_rows($result)) { ?>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">Password</th>
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
                                            <td><?php echo $rows['house_name']; ?></td>
                                            <td><?php echo $rows['house_desc']; ?></td>
                                            <td><?php echo $rows['house_addr']; ?></td>
                                            <td><?php echo $rows['house_city']; ?></td>
                                            <td><?php echo $rows['house_price']; ?></td>
                                            <td><?php echo $rows['house_guest']; ?></td>
                                            <td><?php echo $rows['house_num_room']; ?></td>
                                            <td><?php echo $rows['house_num_bathroom']; ?></td>
                                            <td><?php echo $rows['house_checkin']; ?></td>
                                            <td><?php echo $rows['house_checkout']; ?></td>
                                            <td><?php echo $rows['house_entire']; ?></td>
                                            <td><?php echo $rows['house_garage']; ?></td>
                                            <td><?php echo $rows['house_smoke']; ?></td>
                                            <td><?php echo $rows['house_internet']; ?></td>
                                            <td><?php echo $rows['house_pet']; ?></td>
                                            <td><?php echo $rows['house_image']; ?></td>
                                            <td><a href="./host_CRUD/update_house.php?id=<?= $rows['id'] ?>" class="btn btn-success">Update</a>

                                                <a href="./host_CRUD/delete_house.php?id=<?= $rows['id'] ?>" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } ?>
                        <div class="link-right">
                            <a href="./host_CRUD/create_house.php" class="link-primary">Create</a>
                        </div>
                    </div>
                </div>
            </div>

            <!------------------------Orders card----------------->
            <div class="tab" id="order_content">
                <div class="container">
                    <div class="box_customer">
                        <h4 class="display-4 text-center">Orders</h4><br>
                        <?php if (isset($_GET['success'])) { ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $_GET['success']; ?>
                            </div>
                        <?php } ?>
                        <?php if (mysqli_num_rows($result_order)) { ?>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Order.NO</th>
                                        <th scope="col">ID.NO</th>
                                        <th scope="col">First name</th>
                                        <th scope="col">Last name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    while ($rows = mysqli_fetch_assoc($result_order)) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <th scope="row"><?= $i ?></th>
                                            <th scope="row"><?= $rows['id'] ?></th>
                                            <td><?php echo $rows['b_first_name']; ?></td>
                                            <td><?php echo $rows['b_last_name']; ?></td>
                                            <td><?php echo $rows['b_email']; ?></td>
                                            <td><?php echo $rows['b_mobile']; ?></td>
                                            <td><?php echo $rows['b_status']; ?></td>
                                            <td><a href="./host_CRUD/update_order.php?id=<?= $rows['id'] ?>" class="btn btn-success">Update</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!------------------------rate card----------------->
            <div class="tab" id="rate_content">
                <div class="container">
                    <div class="box_customer">
                        <h4 class="display-4 text-center">Rates&Comment</h4><br>
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
                                        <th scope="col">ID.NO</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Rating</th>
                                        <th scope="col">Comment</th>
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
                                            <th scope="row"><?= $rows['id'] ?></th>
                                            <td><?php echo $rows['r_location']; ?></td>
                                            <td><?php echo $rows['r_rating']; ?></td>
                                            <td><?php echo $rows['r_comment']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <h4 class="display-4 text-center">Average Rates</h4><br>
                        <?php } ?>
                    </div>
                </div>
            </div>


        </main>
    </div>
    <!-- insert the javascript files -->
    <script src="../js/host_dashboard.js"></script>
    <script src="../js/host_CRUD.js"></script>
</body>

</html>