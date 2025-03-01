<?php
$admin = $_SESSION['admin'] || $_SESSION['user'];

$select_admin  = mysqli_query($con, "SELECT * FROM `users` WHERE `id`='$admin'");
$row_user = mysqli_fetch_assoc($select_admin);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="apple-touch-icon" sizes="76x76" href="includes/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="includes/assets/img/favicon.png">

  <title>
    Soccer Club . Dashboard . USER
  </title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!-- Nucleo Icons -->
  <link href="includes/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="includes/assets/css/nucleo-svg.css" rel="stylesheet" />

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

  <!-- CSS Files -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


  <link id="pagestyle" href="includes/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />





  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>


</head>


<body class="g-sidenav-show  bg-gray-100">





  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">

    <div class="sidenav-header">

      <center> <i class="fa-solid fa-3x text-center mt-5  fa-user text-white"></i>
        <p class="ms-1 font-weight-bold text-white text-center text-uppercase"><?= $row_user['fullname'] ?></p>

      </center>

    </div>

    <br><br>
    <hr class="horizontal light mt-0 mb-2">

    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">









        <li class="nav-item">
          <a class="nav-link text-white " href="index.php?dashboard">

            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>

            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>


        <li class="nav-item">
          <a class="nav-link text-white " href="index.php?settings&type=password">

            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid  fa-gear"></i>
            </div>

            <span class="nav-link-text ms-1">Settings</span>
          </a>
        </li>


        <li class="nav-item">
          <a class="nav-link text-white " href="index.php?blog&type=view">

            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid  fa-blog"></i>
            </div>

            <span class="nav-link-text ms-1">Blog</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="index.php?view_merch">

            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid  fa-shopping-cart"></i>
            </div>

            <span class="nav-link-text ms-1">Merchandise</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white " href="index.php?match&type=view_match">

            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid  fa-futbol"></i>
            </div>

            <span class="nav-link-text ms-1">Matches</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white " href="index.php?settings&type=edit">

            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid  fa-gear"></i>
            </div>

            <span class="nav-link-text ms-1">Website Settings</span>
          </a>
        </li>




















      </ul>
    </div>



  </aside>

  <main class="main-content border-radius-lg ">
    <!-- Navbar -->

    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">

        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">

            <div class="input-group input-group-outline">
              <label class="form-label"></label>
              <input id="search" type="text" placeholder="Search..." class="form-control">
            </div>

          </div>
          <ul class="navbar-nav  justify-content-end">


            <li class="nav-item d-xl-none ps-3 px-4 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>

            <li class="nav-item d-flex align-items-center px-4">
              <a href="index.php?profile" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>

                <span class="d-sm-inline d-none">Profile</span>

              </a>
            </li>
            <li class="nav-item d-flex align-items-center">
              <a href="index.php?logout" class="nav-link text-body font-weight-bold px-0">
                &nbsp; <i class="fa fa-arrow-right-from-bracket me-sm-1"></i>
                <span class="d-sm-inline d-none">Logout</span>

              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>