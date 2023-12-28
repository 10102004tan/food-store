<?php
include 'config/database.php';
include 'helper/token_hash_helper.php';


$member = new Member();
// Check if user is already login
if (isset($_COOKIE['token'])) {
    $token = $_COOKIE['token'];
    $user = $member->getUserByToken($token);
    header("location: index.php");
} else {
    // User is not logged in
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $status = $member->login($username, $password);
        if ($status == -1) {
            $_SESSION['danger'] = "Something went wrong !!!";
        } else if ($status == 0) { // Admin
            header("location: app/views/layout-admin.php");
        } else if ($status == 1) { // User
            header("location: index.php");
        }
    }
}


?>
<!doctype html>
<html lang="en">

<head>
    <title>Login page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="public/css/style.css">

</head>

<body class="img js-fullheight w-100" style="background-image: url(public/images/bg-intro-01.jpg); height: 100vh">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                </div>
            </div>
            <div class="row justify-content-center">

                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h3 class="mb-4 text-center">Login page</h3>
                        <?php if (isset($_SESSION['danger'])) : ?>
                            <div class="alert alert-danger">Sai tên đăng nhập hoặc mật khâu</div>
                        <?php
                            session_unset();
                        endif ?>
                        <form action="#" class="signin-form" action="" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username" name="username" required>
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="password" class="form-control" placeholder="Password" name="password" required>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="checkbox-wrap checkbox-primary">Remember Me
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="forget-pw.php" style="color: #fff">Forgot Password</a>
                                </div>
                            </div>
                        </form>
                        <p class="w-100 text-center">&mdash; Or create account <a href="register.php">Here</a> &mdash;
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/popper.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/main_login.js"></script>
</body>

</html>