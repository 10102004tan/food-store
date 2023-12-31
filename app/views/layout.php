<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        <?php if (!empty($title)) {
            echo $title;
        } ?>
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../../public/images/icons/favicon.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public/fonts/themify/themify-icons.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public/vendor/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public/vendor/lightbox2/css/lightbox.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public/css/util.css">
    <link rel="stylesheet" type="text/css" href="public/css/main.css">
    <link rel="stylesheet" type="text/css" href="public/css/custom.css">
    <!--===============================================================================================-->
</head>

<body class="animsition">

    <!-- Header -->
    <header>
        <!-- Header desktop -->
        <div class="wrap-menu-header gradient1 trans-0-4">
            <div class="container h-full">
                <div class="wrap_header trans-0-3">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="index.php">
                            <img src="public/images/icons/logo.png" alt="IMG-LOGO"
                                data-logofixed="public/images/icons/logo2.png">
                        </a>
                    </div>

                    <!-- Menu -->
                    <div class="wrap_menu p-l-45 p-l-0-xl">
                        <nav class="menu">
                            <ul class="main_menu">
                                <li>
                                    <a href="index.php" style="text-transform: uppercase">Home</a>
                                </li>

                                <li>
                                    <a href="menu.php" style="text-transform: uppercase">Menu</a>
                                </li>
                                <li>
                                    <a href="blog.php" style="text-transform: uppercase">Blog</a>
                                </li>
                                <li>
                                    <a href="reservation.php" style="text-transform: uppercase">Reservation</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <!-- Social -->
                    <div class="social flex-w flex-l-m p-r-20">
                        <?php if (isset($_COOKIE['username'])) { ?>

                        <div class="mr-2 d-flex align-items-center justify-content-center user-account"
                            style="font-size: 16px; cursor: pointer; color: #ec1d25; position: relative;">
                            <?= $_COOKIE['username'] ?>
                            <div class="box-action-account"
                                style="top: calc(100%);position: absolute; padding: 20px; border-radius: 10px; background-color: #fff; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                                <ul class="d-flex align-items-center flex-col">
                                    <li>
                                        <a href="order-history.php" style="color: #000;">History order
                                            <ion-icon name="reload-outline"></ion-icon>
                                        </a>    
                                    </li>
                                    <li>
                                        <a href="logout.php" style="color: #000;">Logout
                                            <ion-icon name="log-out-outline"></ion-icon>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <?php } else { ?>
                        <a href="login.php" class="mr-2 d-flex align-items-center justify-content-center text-uppercase"
                            style="font-size: 14px; margin-right: 14px;">Login</a>
                        <a href="register.php"
                            class="mr-2 d-flex align-items-center justify-content-center text-uppercase"
                            style="font-size: 14px">Register</a>
                        <?php } ?>
                        <a href="shopping-cart.php"
                            class="mr-2 d-flex align-items-center justify-content-center pos-relative"
                            style="font-size: 20px">
                            <ion-icon name="cart-outline"></ion-icon>
                            <span class="shopping-cart-amount">
                                <?= isset($_SESSION["cart"]) ? count($_SESSION["cart"]) : 0 ?>
                            </span>
                        </a>
                        <button class="btn-show-sidebar m-l-33 trans-0-4"></button>
                    </div>
                    <!-- end social -->
                </div>
            </div>
        </div>
    </header>

    <!-- Sidebar -->
    <aside class="sidebar trans-0-4">
        <!-- Button Hide sidebar -->
        <button class="btn-hide-sidebar ti-close color0-hov trans-0-4"></button>

        <!-- - -->
        <ul class="menu-sidebar p-t-95 p-b-70">
            <li class="t-center m-b-13">
                <a href="index.php" style="text-transform: uppercase" class="txt19">Home</a>
            </li>
            <li class="t-center m-b-13">
                <a href="menu.php" style="text-transform: uppercase" class="txt19">Menu</a>
            </li>
            <li class="t-center m-b-13">
                <a href="reservation.php" style="text-transform: uppercase" class="txt19">Reservation</a>
            </li>
            <li class="t-center m-b-13">
                <a href="blog.php" style="text-transform: uppercase" class="txt19">Blog</a>
            </li>
        </ul>

        <!-- - -->
        <div class="gallery-sidebar t-center p-l-60 p-r-60 p-b-40">
            <!-- - -->
            <h4 class="txt20 m-b-33">
                Gallery
            </h4>

            <!-- Gallery -->
            <div class="wrap-gallery-sidebar flex-w">
                <a class="item-gallery-sidebar wrap-pic-w" href="public/images/photo-gallery-01.jpg"
                    data-lightbox="gallery-footer">
                    <img src="public/images/photo-gallery-thumb-01.jpg" alt="GALLERY">
                </a>

                <a class="item-gallery-sidebar wrap-pic-w" href="public/images/photo-gallery-02.jpg"
                    data-lightbox="gallery-footer">
                    <img src="public/images/photo-gallery-thumb-02.jpg" alt="GALLERY">
                </a>

                <a class="item-gallery-sidebar wrap-pic-w" href="public/images/photo-gallery-03.jpg"
                    data-lightbox="gallery-footer">
                    <img src="public/images/photo-gallery-thumb-03.jpg" alt="GALLERY">
                </a>

                <a class="item-gallery-sidebar wrap-pic-w" href="public/images/photo-gallery-05.jpg"
                    data-lightbox="gallery-footer">
                    <img src="public/images/photo-gallery-thumb-05.jpg" alt="GALLERY">
                </a>

                <a class="item-gallery-sidebar wrap-pic-w" href="public/images/photo-gallery-06.jpg"
                    data-lightbox="gallery-footer">
                    <img src="public/images/photo-gallery-thumb-06.jpg" alt="GALLERY">
                </a>

                <a class="item-gallery-sidebar wrap-pic-w" href="public/images/photo-gallery-07.jpg"
                    data-lightbox="gallery-footer">
                    <img src="public/images/photo-gallery-thumb-07.jpg" alt="GALLERY">
                </a>

                <a class="item-gallery-sidebar wrap-pic-w" href="public/images/photo-gallery-09.jpg"
                    data-lightbox="gallery-footer">
                    <img src="public/images/photo-gallery-thumb-09.jpg" alt="GALLERY">
                </a>

                <a class="item-gallery-sidebar wrap-pic-w" href="public/images/photo-gallery-10.jpg"
                    data-lightbox="gallery-footer">
                    <img src="public/images/photo-gallery-thumb-10.jpg" alt="GALLERY">
                </a>

                <a class="item-gallery-sidebar wrap-pic-w" href="public/images/photo-gallery-11.jpg"
                    data-lightbox="gallery-footer">
                    <img src="public/images/photo-gallery-thumb-11.jpg" alt="GALLERY">
                </a>
            </div>
        </div>
    </aside>

    <!-- content -->
    <?php if (!empty($slot)) {
        echo $slot;
    } ?>

    <!-- end content -->

    <!-- Footer -->
    <footer class="bg1">
        <div class="container p-t-40 p-b-70">
            <div class="row">
                <div class="col-sm-6 col-md-4 p-t-50">
                    <!-- - -->
                    <h4 class="txt13 m-b-33">
                        Contact Us
                    </h4>

                    <ul class="m-b-70">
                        <li class="txt14 m-b-14">
                            <i class="fa fa-map-marker fs-16 dis-inline-block size19" aria-hidden="true"></i>
                            8th floor, 379 Hudson St, New York, NY 10018
                        </li>

                        <li class="txt14 m-b-14">
                            <i class="fa fa-phone fs-16 dis-inline-block size19" aria-hidden="true"></i>
                            (+1) 96 716 6879
                        </li>

                        <li class="txt14 m-b-14">
                            <i class="fa fa-envelope fs-13 dis-inline-block size19" aria-hidden="true"></i>
                            contact@site.com
                        </li>
                    </ul>

                    <!-- - -->
                    <h4 class="txt13 m-b-32">
                        Opening Times
                    </h4>

                    <ul>
                        <li class="txt14">
                            09:30 AM ? 11:00 PM
                        </li>

                        <li class="txt14">
                            Every Day
                        </li>
                    </ul>
                </div>

                <div class="col-sm-6 col-md-4 p-t-50">
                    <!-- - -->
                    <h4 class="txt13 m-b-33">
                        Latest twitter
                    </h4>

                    <div class="m-b-25">
                        <span class="fs-13 color2 m-r-5">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </span>
                        <a href="#" class="txt15">
                            @colorlib
                        </a>

                        <p class="txt14 m-b-18">
                            Activello is a good option. It has a slider built into that displays the featured image in
                            the slider.
                            <a href="#" class="txt15">
                                https://buff.ly/2zaSfAQ
                            </a>
                        </p>

                        <span class="txt16">
                            21 Dec 2017
                        </span>
                    </div>

                    <div>
                        <span class="fs-13 color2 m-r-5">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </span>
                        <a href="#" class="txt15">
                            @colorlib
                        </a>

                        <p class="txt14 m-b-18">
                            Activello is a good option. It has a slider built into that displays
                            <a href="#" class="txt15">
                                https://buff.ly/2zaSfAQ
                            </a>
                        </p>

                        <span class="txt16">
                            21 Dec 2017
                        </span>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 p-t-50">
                    <!-- - -->
                    <h4 class="txt13 m-b-38">
                        Gallery
                    </h4>

                    <!-- Gallery footer -->
                    <div class="wrap-gallery-footer flex-w">
                        <a class="item-gallery-footer wrap-pic-w" href="public/images/photo-gallery-01.jpg"
                            data-lightbox="gallery-footer">
                            <img src="public/images/photo-gallery-thumb-01.jpg" alt="GALLERY">
                        </a>

                        <a class="item-gallery-footer wrap-pic-w" href="public/images/photo-gallery-02.jpg"
                            data-lightbox="gallery-footer">
                            <img src="public/images/photo-gallery-thumb-02.jpg" alt="GALLERY">
                        </a>

                        <a class="item-gallery-footer wrap-pic-w" href="public/images/photo-gallery-03.jpg"
                            data-lightbox="gallery-footer">
                            <img src="public/images/photo-gallery-thumb-03.jpg" alt="GALLERY">
                        </a>

                        <a class="item-gallery-footer wrap-pic-w" href="public/images/photo-gallery-04.jpg"
                            data-lightbox="gallery-footer">
                            <img src="public/images/photo-gallery-thumb-04.jpg" alt="GALLERY">
                        </a>

                        <a class="item-gallery-footer wrap-pic-w" href="public/images/photo-gallery-05.jpg"
                            data-lightbox="gallery-footer">
                            <img src="public/images/photo-gallery-thumb-05.jpg" alt="GALLERY">
                        </a>

                        <a class="item-gallery-footer wrap-pic-w" href="public/images/photo-gallery-06.jpg"
                            data-lightbox="gallery-footer">
                            <img src="public/images/photo-gallery-thumb-06.jpg" alt="GALLERY">
                        </a>

                        <a class="item-gallery-footer wrap-pic-w" href="public/images/photo-gallery-07.jpg"
                            data-lightbox="gallery-footer">
                            <img src="public/images/photo-gallery-thumb-07.jpg" alt="GALLERY">
                        </a>

                        <a class="item-gallery-footer wrap-pic-w" href="public/images/photo-gallery-08.jpg"
                            data-lightbox="gallery-footer">
                            <img src="public/images/photo-gallery-thumb-08.jpg" alt="GALLERY">
                        </a>

                        <a class="item-gallery-footer wrap-pic-w" href="public/images/photo-gallery-09.jpg"
                            data-lightbox="gallery-footer">
                            <img src="public/images/photo-gallery-thumb-09.jpg" alt="GALLERY">
                        </a>

                        <a class="item-gallery-footer wrap-pic-w" href="public/images/photo-gallery-10.jpg"
                            data-lightbox="gallery-footer">
                            <img src="public/images/photo-gallery-thumb-10.jpg" alt="GALLERY">
                        </a>

                        <a class="item-gallery-footer wrap-pic-w" href="public/images/photo-gallery-11.jpg"
                            data-lightbox="gallery-footer">
                            <img src="public/images/photo-gallery-thumb-11.jpg" alt="GALLERY">
                        </a>

                        <a class="item-gallery-footer wrap-pic-w" href="public/images/photo-gallery-12.jpg"
                            data-lightbox="gallery-footer">
                            <img src="public/images/photo-gallery-thumb-12.jpg" alt="GALLERY">
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <div class="end-footer bg2">
            <div class="container">
                <div class="flex-sb-m flex-w p-t-22 p-b-22">
                    <div class="p-t-5 p-b-5">
                        <a href="#" class="fs-15 c-white"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a>
                        <a href="#" class="fs-15 c-white"><i class="fa fa-facebook m-l-18" aria-hidden="true"></i></a>
                        <a href="#" class="fs-15 c-white"><i class="fa fa-twitter m-l-18" aria-hidden="true"></i></a>
                    </div>

                    <div class="txt17 p-r-20 p-t-5 p-b-5">
                        Copyright &copy; 2018 All rights reserved | This template is made with <i
                            class="fa fa-heart"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Back to top -->
    <div class="btn-back-to-top bg0-hov" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="fa fa-angle-double-up" aria-hidden="true"></i>
        </span>
    </div>

    <!-- Container Selection1 -->
    <div id="dropDownSelect1"></div>

    <!-- Modal Video 01-->
    <div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">

        <div class="modal-dialog" role="document" data-dismiss="modal">
            <div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

            <div class="wrap-video-mo-01">
                <div class="w-full wrap-pic-w op-0-0"><img src="images/icons/video-16-9.jpg" alt="IMG"></div>
                <div class="video-mo-01">
                    <iframe src="https://www.youtube.com/embed/5k1hSu2gdKE?rel=0&amp;showinfo=0"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="public/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="public/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="public/vendor/bootstrap/js/popper.js"></script>
    <script type="text/javascript" src="public/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="public/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="public/vendor/daterangepicker/moment.min.js"></script>
    <script type="text/javascript" src="public/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="public/vendor/slick/slick.min.js"></script>
    <script type="text/javascript" src="public/js/slick-custom.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="public/vendor/parallax100/parallax100.js"></script>
    <script type="text/javascript">
    $('.parallax100').parallax100();
    </script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="public/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="public/vendor/lightbox2/js/lightbox.min.js"></script>
    <!--===============================================================================================-->
    <script src="public/js/main.js"></script>
    <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
    <df-messenger intent="WELCOME" chat-title="Food Store" agent-id="6a34ab84-94d3-40f2-a71c-6e37046b99cb"
        language-code="vi"></df-messenger>

</body>

</html>