<!-- KIT 502 
Group 3 last edit 26/03/2021 -->
<?php
include "./review_read.php";
// include "./CRUD/update_cust.php";
// session_start();

// if (!isset($_SESSION['username'])) {
//  $_SESSION['msg'] = "You must log in first";
//  header('location: review.php');
// }
// if (isset($_GET['logout'])) {
//  session_destroy();
//  unset($_SESSION['username']);
//  header("location: review.php");
// }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <title>KIT_502_web_dev</title>
    <link rel="stylesheet" type="text/css" href="./css/home.css">
    <link rel="stylesheet" type="text/css" href="./css/booking.css">
    <!-- <link rel="stylesheet" type="text/css" href="./css/popup_window.css"> -->
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>

<body>
    <!---------------part 1-------------------->
    <div class="covid_div">
        <aside class="covid_notice">
            <a class="covid_news" href=" ">
                <span class="covid_words">Get the latest on our COVID-19 response</span>
            </a>
        </aside>
    </div>
    <nav class="nav_bar">
        <!-- <a href="#" class="toggle_btn">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a > -->
        <div class="nav_links">
            <ul class="list_nav">
                <li><a class="active_nav" href="./home.php">Home</a></li>
                <li><a class="active_nav" href="./customer/booking.php">Book</a></li>
                <li><a class="active_nav" href="#">Customer</a>
                    <!-- sub user bar -->
                </li>

            </ul>
        </div>
    </nav>

    <!---------------part 2-------------------->
    <!--------------------------user card---------------------------->
    <!--------------------------user card---------------------------->
    <div class="tab" id="user_content">

        <!-- create and edit customers' details in the table -->
        <div class="container">
            <div class="box_customer">
                <h4 class="display-4 text-center">Reviews</h4><br>
                <?php if (isset($_GET['success'])) { ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $_GET['success']; ?>
                    </div>
                <?php } ?>
                <?php if (mysqli_num_rows($result_review)) { ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Order.NO</th>
                                <th scope="col">location</th>
                                <th scope="col">Rate</th>
                                <th scope="col">Comment</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            while ($rows = mysqli_fetch_assoc($result_review)) {
                                $i++;
                            ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $rows['r_location'] ?></td>
                                    <td><?= $rows['r_rating'] ?></td>
                                    <td><?= $rows['r_comment'] ?></td>
                                    <td><a href="./update_review.php?id=<?= $rows['id'] ?>" class="btn btn-success">Update</a>

                                        <a href="./delete_review.php?id=<?= $rows['id'] ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } ?>
                <div class="link-right">
                    <a href="create_view.php" class="link-primary">Create</a>
                </div>
            </div>

        </div>
    </div>


    <!-- js files -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="./js/home.js"></script>
    <!-- <script src="./js/search_pop.js"></script> -->
    <script src="./js/admin_pop.js"></script>
    <script src="./js/booking.js"></script>
</body>

</html>