<?php //include('update_cust_f.php') 
?>

<?php
session_start();
include "../db_conn.php";



$c_password = "";

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

    $sql_customer_detail = "SELECT * FROM users_customer WHERE id=$id";
    $result_customer_detail = mysqli_query($db, $sql_customer_detail);
    if (mysqli_num_rows($result_customer_detail) > 0) {
        $row = mysqli_fetch_assoc($result_customer_detail);
        // $c_username = $row['c_username'];
        // $c_first_name = $row['c_first_name'];
        // $c_last_name = $row['c_last_name'];
        // $c_email = $row['c_email'];
        // $c_mobile = $row['c_mobile'];
        // $c_address = $row['c_address'];
        // $c_country = $row['c_country'];
    } else {
        // echo ("ok");
        header("Location: customer_profile.php");
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../css/customer_profile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../css/login_reg.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link css file and font style -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- <link rel="stylesheet" href="../css/dashboard.css" /> -->
    <link rel="stylesheet" href="../css/system_CRUD.css" />
    <title>Update Personal Details</title>

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





    <div class="header">
        <h2>Change Password</h2>
    </div>
    <form method="post" action="customer_change_pws_f.php">

        <?php include('../errors.php'); ?>
        <!-- User id -->
        <input type="text" name="id" value="<?php echo $id; ?>" ; hidden>
        <!-- Password -->
        <div class="input-group">
            <label>Password</label>
            <input type="c_password_c" name="c_password_c1">
        </div>
        <!-- Confirm Password -->
        <div class="input-group">
            <label>Confirm Password</label>
            <input type="c_password_c" name="c_password_c2">
        </div>

        <!-- button  -->
        <div class="input-group">
            <button type="submit" class="btn btn-primary" name="customer_change_pws">Confirm to Change Password</button>
            <a href="customer_profile.php" class="link-primary">Cancel</a>
        </div>
    </form>


</body>

</html>