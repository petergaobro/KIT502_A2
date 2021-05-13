<?php //include('update_cust_f.php') 
?>

<?php
session_start();
include "../db_conn.php";


$c_username = "";
$c_first_name = "";
$c_last_name = "";
$c_email = "";
$c_mobile = "";
$c_password = "";
$c_address = "";
$c_country = "";

$errors = array();

if (isset($_GET['id'])) {
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
    } else {
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
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
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
                            <li>
                                <a href="customer_login.php?logout='1'" class="active_fun">
                                    <span>Logout</span></a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="header">
        <h2>Update Personal Details</h2>
    </div>
    <form method="post" action="customer_update_detail_f.php">

        <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error']; ?>
            </div>
        <?php } ?>
        <!-- User id -->
        <input type="text" name="id" value="<?php echo $id; ?>" ; hidden>
        <!-- User Name -->
        <div class="input-group">
            <label>User Name</label>
            <input type="text" name="c_username" readonly="readonly" value="<?= $row['c_username'] ?>">
        </div>
        <!-- First Name -->
        <div class="input-group">
            <label>First Name</label>
            <input type="text" name="c_first_name" readonly="readonly" value="<?= $row['c_first_name'] ?>">
        </div>
        <!-- Last Name -->
        <div class="input-group">
            <label>Last Name</label>
            <input type="text" name="c_last_name" readonly="readonly" value="<?= $row['c_last_name'] ?>">
        </div>
        <!-- Email Adress -->
        <div class="input-group">
            <label>Email</label>
            <input type="Email" name="c_email" readonly="readonly" value="<?= $row['c_email'] ?>">
        </div>
        <!-- Mobile-->
        <div class="input-group">
            <label>Mobile</label>
            <input type="text" name="c_mobile" value="<?= $row['c_mobile'] ?>">
        </div>
        <!-- Confirm Password -->
        <div class="input-group">
            <label>Address</label>
            <input type="text" name="c_address" value="<?= $row['c_address'] ?>">
        </div>
        <!-- house city -->
        <div class="input-group">
            <label>City</label>
            <select class="house_city" name="c_country" value="<?= $row['c_country'] ?>"><br>
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
            </select><br>
        </div>
        <!-- button  -->
        <div class="input-group">
            <button type="submit" class="btn btn-primary" name="edit_customer_profile">Update</button>
            <a href="customer_profile.php" class="link-primary">Cancel</a>
        </div>
    </form>
    <script src="../../js/booking.js"></script>
</body>

</html>