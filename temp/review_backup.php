<?php //include('update_cust_f.php') 
?>

<?php
session_start();
include "../db_conn.php";
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
        header("Location: ../login_book.php");
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
    <form method="post" action="booking_server.php">
        <!-- house id -->
        <input type="text" name="id" value="<?php echo $id; ?>" ; hidden>

        <!-- status -->
        <div class="input-group">
            <label>Status</label>
            <?php echo $row->b_status ?>
            
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- <script src="../../js/booking.js"></script> -->
</body>

</html>