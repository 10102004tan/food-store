<?php
require_once "controllerUserData.php"; ?>
<!doctype html>
<html lang="en">

<head>
    <title>Forget page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="public/css/style.css">

</head>
<body class="img js-fullheight w-100" style="background-image: url(public/images/bg-intro-010.jpg); height: 100vh">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h3 class="mb-4 text-center">Forget password</h3>
                        <?php
                        if (count($errors) > 0):
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php
                                foreach ($errors as $error) {
                                    echo $error;
                                }
                                ?>
                            </div>
                        <?php endif ?>

                        <form action="forget-pw.php" class="signin-form" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username" name="username" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="check-username"
                                    class="form-control btn btn-primary submit px-3">Send</button>
                            </div>
                        </form>
                        <p class="w-100 text-center">&mdash; Go to login <a href="login.php">Here</a> &mdash;
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