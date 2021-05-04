<?php //include('update_cust_f.php') 
?>

<?php
session_start();
include "../../db_conn.php";
$b_first_name = "";
$b_last_name = "";
$b_email = "";
$b_mobile = "";
$b_status = "";
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

    $sql = "SELECT * FROM booking WHERE id=$id";
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        // echo ("ok");
        header("Location: ../host_dashboard.php");
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Update house</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>

<body>
    <div class="header">
        <h2>Update house</h2>
    </div>
    <form method="post" action="update_order_f.php">

        <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error']; ?>
            </div>
        <?php } ?>
        <!-- house id -->
        <input type="text" name="id" value="<?php echo $id; ?>" ; hidden>
        <!-- house name -->
        <div class="input-group">
            <label>First name</label>
            <input type="text" name="b_first_name" value="<?= $row['b_first_name'] ?>">
        </div>
        <!-- house description -->
        <div class="input-group">
            <label>Last name</label>
            <input type="text" name="b_last_name" value="<?= $row['b_last_name'] ?>">
        </div>
        <!-- house address -->
        <div class="input-group">
            <label>Email</label>
            <input type="text" name="b_email" value="<?= $row['b_email'] ?>">
        </div>
        <!-- house price -->
        <div class="input-group">
            <label>Mobile</label>
            <input type="text" name="b_mobile" value="<?= $row['b_mobile'] ?>">
        </div>
        <!-- booking status-->
        <div class="input-group">
            <label>Status</label>
            <select class="country" name="b_status" value="<?= $row['b_status'] ?>"><br>
                <option selected value="In process">In process</option>
                <!-- <option value="in process">In process</option> -->
                <option value="Approve">Approve</option>
                <option value="Reject">Reject</option>
            </select><br>
        </div>


        <!-- button  -->
        <div class="input-group">
            <button type="submit" class="btn btn-primary" name="edit_order">Update</button>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="../../js/booking.js"></script>
</body>

</html>