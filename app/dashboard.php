<?php
include '../res/php/main.php';
include '../res/php/dashboard.php';
check_loggedin("app.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lymph &mdash; App</title>
  <link rel="shortcut icon" href="../res/images/favicon.svg" type="image/x-icon">

  <!-- ----------------- Google Fonts ---------------- -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- --------------- External CSS -------------- -->
  <link rel="stylesheet" href="../res/css/bootstrap.css">
  <link rel="stylesheet" href="../res/css/style.css">
  <link rel="stylesheet" href="../res/css/responsive.css">

</head>

<body class="animte-in">

  <!-- ===================== Banner Part Start ================= -->
  <section id="visitModule">

    <!-- ===================== Inner Menu Start ================= -->
    <section id="menu">
      <div class="container menu">
        <nav class="navbar navbar-expand-lg">
          <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="../res/images/logo.png" class="img-fluid logoImg" alt="logo">
            <h1 class="logoText">Lymph</h1>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
          </button>

          <div class="collapse navbar-collapse no-login" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto ml-auto">
              <li class="nav-item ">
                <a class="nav-link mr-3 activee" href="../index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mr-3" href="../about.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mr-3" href="../doctors.php">Doctors</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../book.php">Book</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </section>
    <!-- ===================== Inner Menu End ================= -->

    <!-- ===================== Banner Content Start ================= -->
    <div class="banner container">
      <h1 class="visitModuleTitle text-center mt-4">Welcome</h1>
      <h3 class="informationSubTitle text-center">Doc. <?= $_SESSION['DoctorData']['Surname'], ' ', $_SESSION['DoctorData']['Name'] ?></h3>
      <div class="welcomeTable mt-5">

        <div class="">
          <table class="table text-center tableCtrl">
            <thead class="tableHead text-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Patient Name</th>
                <th scope="col">Registered</th>
                <th scope="col">Visit Date</th>
                <th scope="col">Manage</th>
              </tr>
            </thead>

            <tbody>
              <?php
              if (isset($_SESSION['PatientsList'])) {
                foreach ($_SESSION['PatientsList'] as &$Patient) {

                  $id = $Patient['Id'];
                  $full_name = $Patient['Surname'] . " " . $Patient['Name'];
                  $registered = $Patient['State'];
                  $date = $Patient['Date'];

                  if ($registered = "Attivo") {
                    $registered = "True";
                  } else {
                    $registered = "False";
                  }

                  echo
                  "<tr>
                      <td>$id</td>
                      <td>$full_name</td>
                      <td>$registered</td>
                      <td>$date</td>
                      <td><a id='view' href='manage.php?id=$id'><i class='far fa-eye'></a></i></td>
                  </tr>";
                }
              }
              ?>
            </tbody>
          </table>
        </div>

        <div class="welcomeExBtn wcbtcarrow tblArrow1 navArrow">
          <button class="btn rightBtnCtrl "><i class="fas fa-arrow-left"></i></button>
        </div>
      </div>
    </div>
    <!-- ===================== Banner Content Start ================= -->
  </section>
  <!-- ===================== Banner Part End ================= -->

  <!-- JS FILES -->
  <script src="https://kit.fontawesome.com/5857fbd9b0.js" crossorigin="anonymous"></script>
  <script src="../res/js/jquery.slim.js"></script>
  <script src="../res/js/popper.min.js"></script>
  <script src="../res/js/bootstrap.min.js"></script>
  <script src="../res/js/core.js"></script>

</body>

</html>