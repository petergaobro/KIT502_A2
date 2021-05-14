<?php include('create_house_f.php')?>
<!DOCTYPE html>
<html>

<head>
    <title>Host create house</title>
    <link rel="stylesheet" type="text/css" href="../../css/h_create_house.css">
    <link rel="stylesheet" type="text/css" href="../../css/booking.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <form class="form-group" method="post" action="create_house.php">
        <?php include('../../errors.php'); ?>
        <div id="form">
            <h1 class="text-black text-center">Create house</h1>

            <div id="first-group">
                <!-- house name -->
                <div id="content">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <input type="text" id="input-group" name="house_name" placeholder="House name" value="<?php echo $house_name; ?>">
                </div>
                <!-- house description -->
                <div id="content">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <input type="text" id="input-group" name="house_desc" placeholder="House description" value="<?php echo $house_desc; ?>">
                </div>
                <!-- house address -->
                <div id="content">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <input type="text" id="input-group" name="house_addr" placeholder="House address" value="<?php echo $house_addr; ?>">
                </div>
                <!-- house city -->
                <div id="content">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <select id="input-group" name="house_city" placeholder="House city" value="<?php echo $house_city; ?>">
                        <option value="">City</option>
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
                    </select>
                </div>
                <!-- house price -->
                <div id="content">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <input type="text" id="input-group" name="house_price" placeholder="House price" value="<?php echo $house_price; ?>">
                </div>
                <!-- house number of guest -->
                <div id="content">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <input type="number" id="input-group" name="house_guest" placeholder="Select guest" min="1" value="<?php echo $house_guest; ?>">
                </div>
                <!-- house number of room -->
                <div id="content">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <select id="input-group" name="house_num_room" placeholder="Number of room" value="<?php echo $house_num_room; ?>">
                        <option value="">No.of room</option>
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
                    </select>
                </div>
                <!-- house number of bathroom -->
                <div id="content">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <select id="input-group" name="house_num_bathroom" placeholder="Number of bathroom" value="<?php echo $house_num_bathroom; ?>">
                        <option value="">No.of bathroom</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
            </div>

            <div id="second-group">
                <div id="content">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <input type="text" id="checkin" name="house_checkin" placeholder="House check in" value="<?php echo $house_checkin; ?>">
                </div>
                <!-- house check out date -->
                <div id="content">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <input type="text" id="checkout" name="house_checkout" placeholder="House check out" value="<?php echo $house_checkout; ?>">
                </div>
                <!-- entire house -->
                <div id="content">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <select id="input-group" name="house_entire" placeholder="House entire" value="<?php echo $house_entire; ?>">
                        <option value="">House entire</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <!-- Garage -->
                <div id="content">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <select id="input-group" name="house_garage" placeholder="House garage" value="<?php echo $house_garage; ?>">
                        <option value="">House garage</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <!-- smoke -->
                <div id="content">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <select id="input-group" name="house_smoke" placeholder="House smoke" value="<?php echo $house_smoke; ?>">
                        <option value="">House smoke</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <!-- internet -->
                <div id="content">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <select id="input-group" name="house_internet" placeholder="House internet" value="<?php echo $house_internet; ?>">
                        <option value="">House internet</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <!-- pet -->
                <div id="content">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <select id="input-group" name="house_pet" placeholder="House pet" value="<?php echo $house_pet; ?>">
                        <option value="">House pet</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <!-- image -->
                <div id="content">
                    <i class="fa fa-calendar" aria-hidden="true"></i>

                    <input type="file" id="input-group" name="house_image" accept="image/gif, image/jpeg, image/png" placeholder="House image" value="<?php echo $house_image; ?>">
                    <p>Please upload house image</p>
                </div>
            </div>
            <button type="submit" class="btn" value="Submit" id="submit-btn" name="create_house_host">Create Now</button>
        </div>
    </form>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="../../js/booking.js"></script>
</body>
</html>