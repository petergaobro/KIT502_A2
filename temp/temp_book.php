session_start();

if (!isset($_SESSION['c_username'])) {
	$_SESSION['msg'] = "You must log in first";
	header('location: customer_login.php');
}
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['c_username']);
	header("location: customer_login.php");
}


<form method="post" action="create_house.php">
        <?php include('../../errors.php'); ?>
        <div class="input-group">
            <label>House name</label>
            <input type="text" name="house_name" value="<?php echo $house_name; ?>">
        </div>

        <div class="input-group">
            <label>House description</label>
            <textarea rows="4" cols="50" name="house_desc" form="usrform" value="<?php echo $house_desc; ?>">Text here...</textarea>
        </div>

        <div class="input-group">
            <label>House address</label>
            <input type="text" name="house_addr" value="<?php echo $house_addr; ?>">
        </div>
        <div class="input-group">
            <label>House city</label>
            <input type="email" name="house_city" value="<?php echo $house_city; ?>">
        </div>

        <div class="input-group">
            <label>House price</label>
            <input type="text" name="house_price" value="<?php echo $house_price; ?>">
        </div>
        <div class="input-group">
            <label>Number of guest</label>
            <input type="text" name="house_guest" value="<?php echo $house_guest; ?>">
        </div>
        <div class="input-group">
            <label>Number of room</label>
            <input type="text" name="house_num_room" value="<?php echo $house_num_room; ?>">
        </div>
        <div class="input-group">
            <label>Number of bathroom</label>
            <input type="text" name="house_num_bathroom" value="<?php echo $house_num_bathroom; ?>">
        </div>
        <div class="input-group">
            <label>Check in date</label>
            <input type="text" name="house_checkin" value="<?php echo $house_checkin; ?>">
        </div>
        <div class="input-group">
            <label>Check out date</label>
            <input type="text" name="house_checkout" value="<?php echo $house_checkout; ?>">
        </div>
        <div class="input-group">
            <label>Entire house</label>
            <input type="text" name="house_entire" value="<?php echo $house_entire; ?>">
        </div>
        <div class="input-group">
            <label>Garage</label>
            <input type="text" name="house_garage" value="<?php echo $house_garage; ?>">
        </div>
        <div class="input-group">
            <label>Smoke</label>
            <input type="text" name="house_garage" value="<?php echo $house_garage; ?>">
        </div>
        <div class="input-group">
            <label>Internet</label>
            <input type="text" name="house_garage" value="<?php echo $house_garage; ?>">
        </div>
        <div class="input-group">
            <label>Pet</label>
            <input type="text" name="house_garage" value="<?php echo $house_garage; ?>">
        </div>
        <div class="input-group">
            <label>Image</label>
            <input type="text" name="house_garage" value="<?php echo $house_garage; ?>">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="create_cust_ad">Create</button>
        </div>
    </form>