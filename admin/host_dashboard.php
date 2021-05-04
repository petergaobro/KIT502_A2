<?php
include "./host_CRUD/read_house.php";
include "./host_CRUD/read_order.php";
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link css file and font style -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../css/dashboard.css" />
    <link rel="stylesheet" href="../css/system_CRUD.css" />
    <title>UTas host dashboard</title>
</head>

<body>
    <!-- sider nav bar -->
    <div class="db_sider">
        <div class="db_brand">
            <h2><span class="las la-hotel"></span>Utas Hotel</h2>
        </div>
        <!-- <div class="db_brand">
            <img src="../img/logo/logo.png" alt="">
        </div> -->
        <div class="sider_bar_menu">
            <ul>
                <li>
                    <a class="active_fun" onclick="house_tab()"><span class="las la-users"></span>
                        <span>House</span></a>
                </li>
                <li>
                    <a class="active_fun" onclick="order_tab()"><span class="las la-list-alt"></span>
                        <span>Orders</span></a>
                </li>
                <li>
                    <a class="active_fun" onclick="rate_tab()"><span class="las la-list-alt"></span>
                        <span>Rates</span></a>
                </li>
                <li>
                    <a href="admin_login.php?logout='1'" class="active_fun"><span class="las la-hotel"></span>
                        <span>Logout</span></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main_container">
        <header>
            <h2>
                <label for="">
                    <span class="las la-bars"></span>
                </label> Dashboard
            </h2>
            <!-- user nav bar -->
            <div class="user_bar">
                <img src="../img/dashboard/user_icon.webp" alt="">
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
                    <h6>Host</h6>
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
                                    <h1>10</h1>
                                    <span>House</span>
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
                                    <span class="las la-users"></span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="active_card">
                        <a onclick="rate_tab()">
                            <div class="dash_card">
                                <div>
                                    <h1>10</h1>
                                    <span>Rates</span>
                                </div>
                                <div>
                                    <span class="las la-list-alt"></span>
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
                        <h4 class="display-4 text-center">House</h4><br>
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
                                        <th scope="col">House name</th>
                                        <th scope="col">House description</th>
                                        <th scope="col">House address</th>
                                        <th scope="col">House city</th>
                                        <th scope="col">House price</th>
                                        <th scope="col">Num. guest</th>
                                        <th scope="col">Num. room</th>
                                        <th scope="col">Num. bathroom</th>
                                        <th scope="col">Check in</th>
                                        <th scope="col">Check out</th>
                                        <th scope="col">Entire house?</th>
                                        <th scope="col">Garage</th>
                                        <th scope="col">Smoking</th>
                                        <th scope="col">Internet</th>
                                        <th scope="col">Pet</th>
                                        <th scope="col">Image</th>
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
                        <h4 class="display-4 text-center">Rates_comment</h4><br>


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