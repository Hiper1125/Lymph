<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lymph &mdash; About</title>
    <link rel="shortcut icon" href="res/images/favicon.svg" type="image/x-icon">

    <!-- ----------------- Google Fonts ---------------- -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- --------------- External CSS -------------- -->
    <link rel="stylesheet" href="res/css/bootstrap.css">
    <link rel="stylesheet" href="res/css/style.css">
    <link rel="stylesheet" href="res/css/responsive.css">

</head>

<body class="animte-in">
    <!-- ===================== Inner Menu Start ================= -->
    <section id="menu">
        <div class="container menu">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="res/images/logo.png" class="img-fluid logoImg" alt="logo">
                    <h1 class="logoText">Lymph</h1>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto ml-auto">
                        <li class="nav-item ">
                            <a class="nav-link mr-3 activee" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mr-3" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mr-3" href="#">Doctors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="book.php">Book</a>
                        </li>
                    </ul>
                    <button id="login" class="btn btn-outline-success my-2 my-sm-0 loginBtn"
                        type="submit">Login</button>
                </div>
            </nav>
        </div>
    </section>
    <!-- ===================== Inner Menu End ================= -->

    <!-- ===================== Banner Content Start ================= -->
    <div class="banner container">
        <h1 class="visitModuleTitle text-center mt-4">Doctors</h1>

        <?php 
            include "res/php/main.php";
            include "res/php/doctors.php";

            if(isset($_SESSION["DoctorsInfo"]))
            {
                foreach($_SESSION["DoctorsInfo"] as $Doctor)
                {
                    echo "<div class='visitModuleContent'>
                    <div class='row d-flex justify-content-center no-wrap'>
                        <img class='circle-img' src=".$Doctor["Pic"].">
                        <div class='m-left'>
                            <h1 class='bannerTit'>Doc. ".$Doctor["Name"]." ".$Doctor["Surname"]."</h1>
                            <p class='bannerDescript mt-3'>".$Doctor["Bio"]."</p>
                        </div>
                    </div>
                    </div>";
                }
            }

        ?>

    <!-- ===================== Banner Content Start ================= -->
    </section>
    <!-- ===================== Banner Part End ================= -->

    <!-- JS FILES -->
    <script src="https://kit.fontawesome.com/5857fbd9b0.js" crossorigin="anonymous"></script>
    <script src="res/js/jquery.slim.js"></script>
    <script src="res/js/popper.min.js"></script>
    <script src="res/js/bootstrap.min.js"></script>
    <script src="res/js/index.js"></script>
    <script src="res/js/core.js"></script>

</body>

</html>