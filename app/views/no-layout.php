<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>
        <?php
        if (isset($title)) {
            echo $title;
        }
        ?>
    </title>
</head>

<body>
    <?php
    if (isset($slot)) {
        echo $slot;
    }
    ?>

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
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>