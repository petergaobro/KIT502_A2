<?php include('create_view_f.php') ?>
<!DOCTYPE html>
<html>

<head>
    <title>Create Review</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../css/login_reg.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
            <p>UTas</p>
            <p>Accommodation</p>
        </div>
        <div class="nav_links">
            <ul class="list_nav">
                <li><a class="active_nav" href="../home.php">Home</a></li>
                <li><a class="active_nav" href="../customer/booking.php">Book</a></li>
                <li><a class="active_nav" href="#">Customer</a>
                    <!-- sub user bar -->
                    <div class="sub_user">
                        <ul>
                            <li><a href="../customer/customer_login.php">Login</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="../admin/admin_login.php"><button id="do_admin_login" type="button" class="btn btn-dark" onclick="do_admin_login()">Admin</button></a></li>
            </ul>
        </div>
    </nav>


    <div class="header">
        <h2>Create Review</h2>
    </div>
    <form method="post" action="create_view.php">
        <?php include('../errors.php'); ?>
        <div class="input-group">
            <label>Location</label>
            <input type="text" name="r_location" value="<?php echo $r_location; ?>">
        </div>
        <div class="input-group">
            <label>Rating</label>
            <input type="number" name="r_rating" min="0" max="5" value="<?php echo $r_rating; ?>">
        </div>
        <div class="input-group">
            <label>Comment</label>
            <input type="text" name="r_comment" value="<?php echo $r_comment; ?>">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="create_view">Create</button>
        </div>
    </form>
    <!-- seperate line part -->
    <div class="seperate_line"></div>
    <!--------------footer_part------------------->
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
    <footer>
        <p>Copyright &copy; , KIT_502 Assignment_2</p>
    </footer>
</body>

</html>