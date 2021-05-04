<?php //include('update_cust_f.php') 
?>

<?php
session_start();
include "../../db_conn.php";
$c_username = "";
$c_first_name = "";
$c_last_name = "";
$c_email = "";
$c_mobile = "";
$c_address = "";
$c_country = "";
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

        $sql = "SELECT * FROM users_customer WHERE id=$id";
        $result = mysqli_query($db, $sql);
        if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                // $c_username = $row['c_username'];
                // $c_first_name = $row['c_first_name'];
                // $c_last_name = $row['c_last_name'];
                // $c_email = $row['c_email'];
                // $c_mobile = $row['c_mobile'];
                // $c_address = $row['c_address'];
                // $c_country = $row['c_country'];
        } else {
                // echo ("ok");
                header("Location: ../sys_dashboard.php");
        }
}
?>
<!DOCTYPE html>
<html>

<head>
        <title>Update customer</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="css/style.css"> -->
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>

<body>
        <div class="header">
                <h2>Update customer</h2>
        </div>
        <form method="post" action="update_cust_f.php">

                <?php if (isset($_GET['error'])) { ?>
                        <div class="alert alert-danger" role="alert">
                                <?php echo $_GET['error']; ?>
                        </div>
                <?php } ?>

                <input type="text" name="id" value="<?php echo $id; ?>" ; hidden>
                <div class="input-group">
                        <label>Username</label>
                        <input type="text" name="c_username" value="<?= $row['c_username'] ?>">
                </div>

                <div class="input-group">
                        <label>First Name</label>
                        <input type="text" name="c_first_name" value="<?= $row['c_first_name'] ?>">
                </div>

                <div class="input-group">
                        <label>Last Name</label>
                        <input type="text" name="c_last_name" value="<?= $row['c_last_name'] ?>">
                </div>
                <div class="input-group">
                        <label>Email</label>
                        <input type="email" name="c_email" value="<?= $row['c_email'] ?>">
                </div>

                <div class="input-group">
                        <label>Mobile</label>
                        <input type="text" name="c_mobile" value="<?= $row['c_mobile'] ?>">
                </div>
                <div class="input-group">
                        <label>Address</label>
                        <input type="text" name="c_address" value="<?= $row['c_address'] ?>">
                </div>
                <div class="input-group">
                        <label>Country</label>
                        <select class="c_country" name="c_country" value="<?= $row['c_country'] ?>"><br>
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

                        <button type="submit" class="btn btn-primary" name="edit_cust">Update</button>
                        <a href="../sys_dashboard.php" class="link-primary">View</a>
                </div>
        </form>
</body>

</html>