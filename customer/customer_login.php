<?php include('customer_server.php') ?>
<!DOCTYPE html>
<html>

<head>
    <title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="../css/home.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="shortcut icon" type="image" href="../img/logo/Photo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

</head>

<body>
    <!---------------part 1-------------------->
    <div class="covid_div">
        <aside class="covid_notice">
            <a class="covid_news" href="https://www.australia.gov.au/">
                <span class="covid_words">Get the latest on our COVID-19 response</span>
            </a>
        </aside>
    </div>
    <nav class="nav_bar">
        <div class="logo">
            <img src="../img/logo/Photo.png" alt="">
        </div>
        <!-- <a href="#" class="toggle_btn">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a> -->
        <div class="nav_links">
            <ul class="list_nav">
                <li><a class="active_nav" href="../home.php">Home</a></li>
                <li><a class="active_nav" href="../customer/booking.php">Book</a></li>
                <li><a class="active_nav" href="#">Customer</a>
                    <!-- sub user bar -->
                    <div class="sub_user">
                        <ul>
                            <li><a href="../customer/customer_login.php">Login</a></li>
                            <!-- <li><a onclick="do_logout()" href="../html/login_reg.html">Logout</a></li> -->
                            <li><a href="../customer/review.php">Review</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="../admin/admin_login.php"><button id="do_admin_login" type="button" class="btn btn-dark" onclick="do_admin_login()">Admin</button></a></li>
                <!-- <li><a><button id="open" type="button" class="btn btn-info">Search Now</button></a></li> -->
            </ul>
        </div>
        <!-- <script src="../js/toggle_bar.js" defer></script> -->
    </nav>










    <div class="header">
        <h2>Customer login</h2>
    </div>

    <form method="post" action="customer_login.php">
        <?php include('../errors.php'); ?>
        <div class="mb-3">
            <label for="c_username" class="form-label">User name</label>
            <input type="text" class="form-control" name="c_username" id="c_username">
        </div>
        <div class="mb-3">
            <label for="c_password" class="form-label">Password</label>
            <input type="c_password" name="c_password" class="form-control" id="c_password">
        </div>
        <div class="input-group">
            <!-- <button type="submit" class="btn" name="login_user">Login</button> -->
            <button type="submit" class="btn btn-primary" name="login_customer">LOGIN</button>
        </div>
        <p>
            Not yet a member? <a href="customer_register.php">Sign up</a>
        </p>
    </form>

    <!-- seperate line part -->
    <div class="seperate_line"></div>

    <!--------------footer_part------------------->
    <!-- <div class="footer_container"> -->
    <div class="contact_us">
        <div class="contact_word">
            <h1>Contact us</h1>
            <p>
                <strong>Address</strong>
                <br>Churchill Ave
                <br>Hobart TAS 7005
            </p>

            <p>
                <strong>Phone</strong>
                <br>+61362262999
            </p>
        </div>

        <div class="google_map">
            <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2922.5404210451375!2d147.32365931566832!3d-42.9036422497168!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xaa6ddf5a09db9cc9%3A0xf03c94eb451f680!2sUniversity%20of%20Tasmania!5e0!3m2!1sen!2sau!4v1620016679034!5m2!1sen!2sau" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe></p>
        </div>
    </div>




    <div class="social_main">
        <div class="social_container">
            <li>
                <a href="https://www.facebook.com/UniversityofTasmania/"><img src="../img/footer_social/fb.png" alt=""></a>
            </li>
        </div>
        <div class="social_container">
            <li>
                <a href="https://www.instagram.com/universityoftasmania/?hl=en"><img src="../img/footer_social/ins.png" alt=""></a>
            </li>
        </div>
        <div class="social_container">
            <li>
                <a href="https://twitter.com/UTAS_?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"><img src="../img/footer_social/twitter.webp" alt=""></a>
            </li>
        </div>
        <div class="social_container">
            <li>
                <a href="https://www.youtube.com/channel/UCnSDAnLD6JDC7C5ZVaKbC2g"><img src="../img/footer_social/youtube.jpeg" alt=""></a>
            </li>
        </div>
    </div>
    <!-- </div> -->
    <!-- footer part -->
    <footer>
        <p>Copyright &copy; , KIT_502 Assignment_2</p>
    </footer>
    <!-- js files -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="../js/home.js"></script>
    <!-- <script src="./js/search_pop.js"></script> -->
    <script src="../js/admin_pop.js"></script>
    <script src="../js/booking.js"></script>


</body>

</html>