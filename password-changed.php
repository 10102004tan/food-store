<?php require_once "controllerUserData.php"; ?>
<?php
if($_SESSION['info'] == false){
    header('Location: forget-pw.php');  
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <?php 
            if(isset($_SESSION['info'])){
                ?>
                <div class="alert alert-success text-center">
                    <?php echo $_SESSION['info']; ?>
                </div>
                <?php
            }
            ?>
                <a href="login.php" class="button">Login now</a>
            </div>
        </div>
    </div>

</body>

</html>