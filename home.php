<!-- KIT 502 
Group 3 last edit 26/03/2021 -->

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <title>KIT_502_web_dev</title>
    <link rel="stylesheet" type="text/css" href="./css/home.css">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image" href="../img/logo/Photo.png">
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
            <img src="./img/logo/Photo.png" alt="">
        </div>
        <div class="nav_links">
            <ul class="list_nav">
                <li><a class="active_nav" href="./home.php">Home</a></li>
                <li><a class="active_nav" href="./customer/booking.php">Book</a></li>
                <li><a class="active_nav" href="#">Customer</a>
                    <!-- sub user bar -->
                    <div class="sub_user">
                        <ul>
                            <li><a href="./customer/customer_login.php">Login</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="./admin/admin_login.php"><button id="do_admin_login" type="button" class="btn btn-dark" onclick="do_admin_login()">Admin</button></a></li>
            </ul>
        </div>
    </nav>
    <!---------------part 2-------------------->
    <div class="gallery_container">
        <div class="slide_show_container">
            <div onclick="push_slides(-1)" class="radio_btn arrow_prev">
                <span class="arrow prev_arrow"></span>
            </div>
            <div onclick="push_slides(1)" class="radio_btn arrow_next">
                <span class="arrow next_arrow"></span>
            </div>
            <!-- gallery text bar -->
            <div class="text_container">
                <p class="text_form slideTextFromTop"></p>
            </div>
            <div class="img_container" id="first">
                <img src="./img/gallery/hotel_1.jpeg">
                    <p class="text_form">Ithaa, Location: Rangali Island, Maldives</p>
            </div>
            <div class="img_container">
                <img src="./img/gallery/hotel_2.jpg">
                    <p class="text_form">Parallax Restaurant, Location: Mammoth Lakes, California</p>
            </div>
            <div class="img_container">
                <img src="./img/gallery/hotel_3.jpg">
                    <p class="text_form">Sur un Arbre Perché, Location: Paris, France</p>
            </div>
            <div class="img_container">
                <img src="./img/gallery/hotel_4.jpg">
                    <p class="text_form">Eternity, Location: Truskavets, Ukraine</p>
            </div>
            <div class="img_container">
                <img src="./img/gallery/hotel_5.jpg">
                    <p class="text_form">The Disaster Café, Location: Loloret de Mar, Spain</p>
            </div>
            <!-- booking button -->
            <div class="more_info">
                <a class="explore_btn" href="./customer/booking.php">BOOKING NOW</a>
            </div>
        </div>
        <div id="dots_container"></div>
    </div>
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
        <div class="google_map">
            <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2922.5404210451375!2d147.32365931566832!3d-42.9036422497168!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xaa6ddf5a09db9cc9%3A0xf03c94eb451f680!2sUniversity%20of%20Tasmania!5e0!3m2!1sen!2sau!4v1620016679034!5m2!1sen!2sau" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe></p>
        </div>
    </div>
    <div class="social_main">
        <div class="social_container">
            <li>
                <a href="https://www.facebook.com/UniversityofTasmania/">
                    <img src="./img/footer_social/fb.png" alt="">
                </a>
            </li>
        </div>
        <div class="social_container">
            <li>
                <a href="https://www.instagram.com/universityoftasmania/?hl=en">
                    <img src="./img/footer_social/ins.png" alt="">
                </a>
            </li>
        </div>
        <div class="social_container">
            <li>
                <a href="https://twitter.com/UTAS_?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor">
                    <img src="./img/footer_social/twitter.webp" alt="">
                </a>
            </li>
        </div>
        <div class="social_container">
            <li>
                <a href="https://www.youtube.com/channel/UCnSDAnLD6JDC7C5ZVaKbC2g">
                    <img src="./img/footer_social/youtube.jpeg" alt="">
                </a>
            </li>
        </div>
    </div>
    <!-- footer part -->
    <footer>
        <p>Copyright &copy; , KIT_502 Assignment_2</p>
    </footer>
    <!-- js files -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="./js/home.js"></script>
</body>

</html>