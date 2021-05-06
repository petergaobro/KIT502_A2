<?php include('booking_server.php');


// echo $_GET['Checkin'];
// echo $_GET['Checkout'];
// echo $_GET['Guest'];
if (isset($_GET['Checkin'])) {
    // include "../../db_conn.php";

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // $con_checkin = $_GET['Checkin'];
    $con_checkin = validate($_GET['Checkin']);
}
if (isset($_GET['Checkout'])) {
    // include "../../db_conn.php";

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // $con_checkin = $_GET['Checkin'];
    $Checkout = validate($_GET['Checkout']);
}
if (isset($_GET['Guest'])) {
    // include "../../db_conn.php";

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // $con_checkin = $_GET['Checkin'];
    $Guest = validate($_GET['Guest']);
}
// $con_checkin = $_GET['Checkin'];
// $con_checkout = $_GET['Checkout'];
// $con_guest = $_GET['Guest'];
// session_start();
// include "../db_conn.php";

// $house_city = "";
// $house_checkin = "";
// $house_checkout = "";
// $house_guest = "";

// $b_first_name = "";
// $b_last_name = "";
// $b_email = "";
// $b_mobile = "";
// $errors = array();

// if (isset($_GET['id'])) {

//     function validate($data)
//     {
//         $data = trim($data);
//         $data = stripslashes($data);
//         $data = htmlspecialchars($data);
//         return $data;
//     }

//     $id = validate($_GET['id']);

//     $sql = "SELECT * FROM house WHERE id=$id";
//     $result = mysqli_query($db, $sql);
//     if (mysqli_num_rows($result) > 0) {
//         $row = mysqli_fetch_assoc($result);
//     } else {
//         header("Location: ../login_book.php");
//     }
// }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Booking confirm</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>

<body>
    <div class="header">
        <h2>Booking confirm</h2>
    </div>
    <form method="post" action="confirm_booking.php">

        <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error']; ?>
            </div>
        <?php } ?>
        <div class="input-group">
            <label>Check in date</label>
            <input type="text" readonly="readonly" name="con_checkin" value="<?php echo $con_checkin; ?>">
        </div>
        <div class="input-group">
            <label>Check out date</label>
            <input type="text" readonly="readonly" name="con_checkout" value="<?php echo $con_checkout; ?>">
            <!-- <input type="text" name="b_first_name" value=""> -->
        </div>
        <div class="input-group">
            <label>Guest</label>
            <input type="text" readonly="readonly" name="con_guest" value="<?php echo $con_guest; ?>">
            <!-- <input type="text" name="b_first_name" value=""> -->
        </div>


        <div class="input-group">
            <label>First name</label>
            <input type="text" name="b_first_name" value="<?php echo $b_first_name; ?>">
        </div>
        <div class="input-group">
            <label>Last name</label>
            <input type="text" name="b_last_name" value="<?php echo $b_last_name; ?>">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="b_email" value="<?php echo $b_email; ?>">
        </div>
        <div class="input-group">
            <label>Mobile</label>
            <input type="text" name="b_mobile" value="<?php echo $b_mobile; ?>">
        </div>

        <div class="input-group">
            <!-- <label>Mobile</label> -->
            <input type="text" name="b_status" value="In process" ; hidden>
        </div>
        <div class="input-group">

            <!-- <button type="submit" class="btn btn-primary" name="edit_cust">Update</button> -->
            <button type="submit" class="btn btn-primary" name="confirm_book">Confirm</button>
            <a href="./review.php" class="link-primary">Review</a>
        </div>
    </form>
</body>

</html>