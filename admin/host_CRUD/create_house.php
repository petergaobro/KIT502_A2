<?php include('create_house_f.php') ?>
<!DOCTYPE html>
<html>

<head>
    <title>Host create house</title>
    <!-- <link rel="stylesheet" type="text/css" href="../../css/style.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="../../css/style.css"> -->
    <link rel="stylesheet" type="text/css" href="../../css/h_create_house.css">
    <link rel="stylesheet" type="text/css" href="../../css/booking.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <!-- <div class="header">
        <h2>Create house</h2>
    </div> -->
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
                    <!-- <input type="number" id="input-group" placeholder="Phone number"> -->
                    <!-- <input type="file" name="house_image" accept="image/gif, image/jpeg, image/png"> -->
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
                    <select id="input-group" name="house_guest" value="<?php echo $house_guest; ?>"><br>
                        <option value="">No.of guests</option>
                        <option value="1-5">1-5</option>
                        <option value="6-10">6-10</option>
                        <option value="11-20">11-20</option>
                    </select>
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

                <!-- house check in date -->

                <!-- <div class="Bk_tab">
                    <label for="checkin">Check In:</label>
                    <input type="text" id="checkin" name="checkin">
                </div>
                <div class="Bk_tab">
                    <label for="checkout">Check Out:</label>
                    <input type="text" id="checkout" name="checkout">
                </div> -->

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


                <!-- <div id="content">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <select id="input-group">
                        <option value="">Room Type</option>
                        <option value="">AC</option>
                        <option value="">Non-AC</option>
                        <option value="">Single Bed</option>
                        <option value="">Double Bed</option>
                    </select>
                </div> -->

            </div>
            <!-- <button type="submit" class="btn" name="create_admin_ad">Register</button> -->
            <button type="submit" class="btn" value="Submit" id="submit-btn" name="create_house_host">Create Now</button>

        </div>
    </form>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="../../js/booking.js"></script>
</body>

</html>