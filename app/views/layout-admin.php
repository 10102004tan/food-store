
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../../public/css/custom.css"rel="stylesheet" />
    <link href="../../public/css/dashboard.css" rel="stylesheet" />
    <title><?php if (!empty($title)){
        echo $title;
    } ?></title>
</head>

<body style="width: 100%; height: 100vh; overflow: hidden">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    
                    <li class="nav-item">
                        <a class="nav-link" href="../../admin/products/index.php">Food management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../admin/menus/index.php">Menu management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../admin/reservations/index.php">Reservation management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../login.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- <div class="code">
        <h1 class="animated"><span style="color: #97C774">W</span><span style="color: #B63E98">e</span><span
                style="color: #D18E62">l</span><span style="color: #DB3E41">l</span><span
                style="color: #1BABA5">c</span><span style="color: #ff9f43">o</span><span
                style="color: #ee5253">m</span><span style="color: #f368e0">e</span>, admin.</h1>
    </div> -->

     <!-- content -->
     <?php if (!empty($slot)) {
        echo $slot;
    } ?>


</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>

</html>