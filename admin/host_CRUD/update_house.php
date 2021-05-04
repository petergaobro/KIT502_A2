<?php //include('update_cust_f.php') 
?>

<?php
session_start();
include "../../db_conn.php";
$house_name = "";
$house_desc = "";
$house_addr = "";
$house_city = "";
$house_price = "";
$house_guest = "";
$house_num_room = "";
$house_num_bathroom = "";

$house_checkin = "";
$house_checkout = "";
$house_entire = "";
$house_garage = "";
$house_smoke = "";
$house_internet = "";
$house_pet = "";
$house_image = "";
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

    $sql = "SELECT * FROM house WHERE id=$id";
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
    <form method="post" action="update_house_f.php">

        <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error']; ?>
            </div>
        <?php } ?>
        <!-- house id -->
        <input type="text" name="id" value="<?php echo $id; ?>" ; hidden>
        <!-- house name -->
        <div class="input-group">
            <label>House name</label>
            <input type="text" name="house_name" value="<?= $row['house_name'] ?>">
        </div>
        <!-- house description -->
        <div class="input-group">
            <label>House description</label>
            <input type="text" name="house_desc" value="<?= $row['house_desc'] ?>">
        </div>
        <!-- house address -->
        <div class="input-group">
            <label>House address</label>
            <input type="text" name="house_addr" value="<?= $row['house_addr'] ?>">
        </div>
        <!-- house city -->
        <div class="input-group">
            <label>House city</label>
            <select class="house_city" name="house_city" value="<?= $row['house_city'] ?>"><br>
                <!-- <option value="">City</option> -->
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
        <!-- house price -->
        <div class="input-group">
            <label>House price</label>
            <input type="text" name="house_price" value="<?= $row['house_price'] ?>">
        </div>
        <!-- house guest -->
        <div class="input-group">
            <label>House guest</label>
            <select class="house_guest" name="house_guest" value="<?= $row['house_guest'] ?>"><br>
                <!-- <option value="">No.of guests</option> -->
                <option value="1-5">1-5</option>
                <option value="6-10">6-10</option>
                <option value="11-20">11-20</option>
            </select><br>
        </div>
        <!-- house room -->
        <div class="input-group">
            <label>Number of room</label>
            <select class="house_num_room" name="house_num_room" value="<?= $row['house_num_room'] ?>"><br>
                <!-- <option value="">No.of guests</option> -->
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select><br>
        </div>
        <!-- house bathroom -->
        <div class="input-group">
            <label>Number of bathroom</label>
            <select class="house_num_bathroom" name="house_num_bathroom" value="<?= $row['house_num_bathroom'] ?>"><br>
                <!-- <option value="">No.of guests</option> -->
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select><br>
        </div>





        <!-- house check in date -->
        <div class="input-group">
            <label>House check in date</label>
            <input type="text" id="checkin" name="house_checkin" value="<?= $row['house_checkin'] ?>">
        </div>
        <!-- house check out date -->
        <div class="input-group">
            <label>House check out date</label>
            <input type="text" id="checkout" name="house_checkout" value="<?= $row['house_checkout'] ?>">
        </div>
        <!-- house entire -->
        <div class="input-group">
            <label>House entire</label>
            <select class="house_entire" name="house_entire" value="<?= $row['house_entire'] ?>"><br>
                <!-- <option value="">House garage</option> -->
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select><br>
        </div>
        <!-- house garage -->
        <div class="input-group">
            <label>House garage</label>
            <select class="house_garage" name="house_garage" value="<?= $row['house_garage'] ?>"><br>
                <!-- <option value="">House garage</option> -->
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select><br>
        </div>
        <!-- house smoke -->
        <div class="input-group">
            <label>House entire</label>
            <select class="house_smoke" name="house_smoke" value="<?= $row['house_smoke'] ?>"><br>
                <!-- <option value="">House garage</option> -->
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select><br>
        </div>
        <!-- house internet -->
        <div class="input-group">
            <label>House internet</label>
            <select class="house_internet" name="house_internet" value="<?= $row['house_internet'] ?>"><br>
                <!-- <option value="">House garage</option> -->
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select><br>
        </div>
        <!-- house pet -->
        <div class="input-group">
            <label>House pet</label>
            <select class="house_pet" name="house_pet" value="<?= $row['house_pet'] ?>"><br>
                <!-- <option value="">House garage</option> -->
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select><br>
        </div>
        <!-- house image -->
        <div class="input-group">
            <label>House image</label>
            <input type="file" name="house_image" accept="image/gif, image/jpeg, image/png" value="<?= $row['house_image'] ?>">
        </div>
        <!-- button  -->
        <div class="input-group">
            <button type="submit" class="btn btn-primary" name="edit_house">Update</button>
            <a href="../host_dashboard.php" class="link-primary">View</a>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="../../js/booking.js"></script>
</body>

</html>