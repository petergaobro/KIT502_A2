<?php
// session_start();
include('q_a_f.php');
include "./customer_read_detail.php";
// include "./host_CRUD/read_house.php";
include "../admin/host_CRUD/read_order.php";
include "../admin/host_CRUD/read_review.php";
include "../db_conn.php";
include "../admin/host_CRUD/read_q_a.php";
// include "../customer/q_a_f.php";



// include "./host_CRUD/read_order.php";
// include "./host_CRUD/read_review.php";
session_start();

if (!isset($_SESSION['c_username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: customer_login.php');
}

$QA = "";
$errors = array();

if (isset($_GET['id'])) {
    // include "../../db_conn.php";

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = validate($_GET['id']);

    $sql = "SELECT * FROM Q_A WHERE id=$id";
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        // echo ("ok");
        header("Location: ./customer_profile.php");
    }
}
?>
<!DOCTYPE html>
<html>

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
    <!-- <link rel="stylesheet" href="../css/system_CRUD.css" /> -->
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
                            <li>
                                <a href="customer_login.php?logout='1'">Logout</a>
                            </li>
                            <!-- <li><a href="../customer/customer_login.php">Login</a></li> -->
                            <!-- <li><a onclick="do_logout()" href="../html/login_reg.html">Logout</a></li> -->
                            <li><a href="../customer/review.php">Review</a></li>

                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>


    <div class="main_container">
        <header>
            <h2>
                <label for="">
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
                    <?php if (isset($_SESSION['c_username'])) : ?>
                        <h3>Welcome <?php echo $_SESSION['c_username']; ?></h3>
                    <?php endif ?>
                </div>
            </div>
        </header>
        <main>
            <div class="dash_card_container">
                <ul>
                    <li class="active_card">
                        <a onclick="client_tab()">
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
                                    <h1>Order Rate</h1>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="active_card">
                        <a onclick="q_n_a_tab()">
                            <div class="dash_card">
                                <div>
                                    <h1>Q&A</h1>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="active_card">
                        <a onclick="response_tab()">
                            <div class="dash_card">
                                <div>
                                    <h1>Response</h1>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <!------------------------Personal Details----------------->
            <div class="tab" id="client_content">
                <div class="container">
                    <div class="box_customer">
                        <h4 class="display-4 text-center">Personal Details</h4><br>
                        <?php if (isset($_GET['success'])) { ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $_GET['success']; ?>
                            </div>
                        <?php } ?>
                        <?php if (mysqli_num_rows($result_customer_detail)) { ?>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <!-- <th scope="col">User ID</th> -->
                                        <th scope="col" style="display: none;">Account ID</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col" style="display:none">Password</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    while ($rows = mysqli_fetch_assoc($result_customer_detail)) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <td><?php echo $rows['c_username']; ?></td>
                                            <td><?php echo $rows['c_first_name']; ?></td>
                                            <td><?php echo $rows['c_last_name']; ?></td>
                                            <td><?php echo $rows['c_email']; ?></td>
                                            <td><?php echo $rows['c_mobile']; ?></td>
                                            <td style="display:none"><?php echo $rows['c_password']; ?></td>
                                            <td><?php echo $rows['c_address']; ?></td>
                                            <td><?php echo $rows['c_country']; ?></td>
                                            <td><a href="customer_update_detail.php?id=<?= $rows['id'] ?>" class="btn btn-success">Change Details</a>
                                                <a href="customer_change_pws.php?id=<?= $rows['id'] ?>" class="btn btn-danger">Change Password</a>
                                        </td>

                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <!-- <table>
                                <td>
                                <td><a href="customer_change_pws.php?id=<?= $rows['id'] ?>" class="btn btn-danger">Change Password</a></td>
                                </td>
                            </table> -->
                        <?php } ?>
                    </div>
                </div>
            </div>

            <!------------------------Orders History----------------->
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

            <!------------------------q&a card----------------->
            <div class="tab" id="q_n_a_content">
                <div class="container">
                    <div class="box_customer">
                        <form method="post" action="customer_profile.php">
                            <?php include('../errors.php'); ?>
                            <div class="input-group">
                                <label>New Q&A?</label>
                                <input type="text" name="c_q_a" value="<?php echo $c_q_a; ?>">
                            </div>
                            <div class="input-group">
                                <button type="submit" class="btn" name="edit_q_a">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!------------------------response card----------------->
            <div class="tab" id="response_content">
                <div class="container">
                    <div class="box_customer">
                        <h4 class="display-4 text-center">Response</h4><br>
                        <?php if (isset($_GET['success'])) { ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $_GET['success']; ?>
                            </div>
                        <?php } ?>
                        <?php if (mysqli_num_rows($result_q_a)) { ?>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Order.NO</th>
                                        <th scope="col">ID.NO</th>
                                        <th scope="col">Content</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    while ($rows = mysqli_fetch_assoc($result_q_a)) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <th scope="row"><?= $i ?></th>
                                            <th scope="row"><?= $rows['id'] ?></th>
                                            <td><?php echo $rows['QA']; ?></td>
                                            <td><a href="update_qa.php?id=<?= $rows['id'] ?>" class="btn btn-success">Update</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </main>
    </div>
    <!-- insert the javascript files -->

</body>
<script src="../js/client_profile.js"></script>

</html>