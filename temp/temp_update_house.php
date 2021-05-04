<form class="form-group" method="post" action="update_house_f.php">
    <?php if (isset($_GET['error'])) { ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_GET['error']; ?>
        </div>
    <?php } ?>
    <div id="form">
        <h1 class="text-black text-center">Update house</h1>

        <div id="first-group">
            <!-- house name -->
            <div id="content">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" id="input-group" name="house_name" value="<?= $row['house_name'] ?>">
            </div>
            <!-- house description -->
            <div id="content">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <input type="text" id="input-group" name="house_desc" value="<?= $row['house_desc'] ?>">
                <!-- <input type="number" id="input-group" placeholder="Phone number"> -->
                <!-- <input type="file" name="house_image" accept="image/gif, image/jpeg, image/png"> -->
            </div>
            <!-- house address -->
            <div id="content">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <input type="text" id="input-group" name="house_addr" value="<?= $row['house_addr'] ?>">
            </div>
            <!-- house city -->
            <div id="content">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <select id="input-group" name="house_city" value="<?= $row['house_city'] ?>">
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
                <input type="text" id="input-group" name="house_price" value="<?= $row['house_price'] ?>">
            </div>
            <!-- house number of guest -->
            <div id="content">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <select id="input-group" name="house_guest" value="<?= $row['house_guest'] ?>"><br>
                    <option value="">No.of guests</option>
                    <option value="1-5">1-5</option>
                    <option value="6-10">6-10</option>
                    <option value="11-20">11-20</option>
                </select>
            </div>
            <!-- house number of room -->
            <div id="content">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <select id="input-group" name="house_num_room" value="<?= $row['house_num_room'] ?>">
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
                <select id="input-group" name="house_num_bathroom" value="<?= $row['house_num_bathroom'] ?>">
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
                <input type="text" id="checkin" name="house_checkin" value="<?= $row['house_checkin'] ?>">
            </div>
            <!-- house check out date -->
            <div id="content">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <input type="text" id="checkout" name="house_checkout" value="<?= $row['house_checkout'] ?>">
            </div>
            <!-- entire house -->
            <div id="content">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <select id="input-group" name="house_entire" value="<?= $row['house_entire'] ?>">
                    <option value="">House entire</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <!-- Garage -->
            <div id="content">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <select id="input-group" name="house_garage" value="<?= $row['house_garage'] ?>">
                    <option value="">House garage</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <!-- smoke -->
            <div id="content">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <select id="input-group" name="house_smoke" value="<?= $row['house_smoke'] ?>">
                    <option value="">House smoke</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <!-- internet -->
            <div id="content">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <select id="input-group" name="house_internet" value="<?= $row['house_internet'] ?>">
                    <option value="">House internet</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <!-- pet -->
            <div id="content">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <select id="input-group" name="house_pet" value="<?= $row['house_pet'] ?>">
                    <option value="">House pet</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <!-- image -->
            <!-- <div id="content"> -->
            <i class="fa fa-calendar" aria-hidden="true"></i>

            <input type="file" id="input-group" name="house_image" accept="image/gif, image/jpeg, image/png" value="<?= $row['house_image'] ?>">
            <p>Please upload house image</p>
            <!-- </div> -->


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
        <!-- <button type="submit" class="btn" value="Submit" id="submit-btn" name="create_house_host">Create Now</button> -->
        <div id="content">

            <button type="submit" class="btn btn-primary" name="edit_house">Update</button>
            <a href="../host_dashboard.php" class="link-primary">View</a>
        </div>

    </div>
</form>