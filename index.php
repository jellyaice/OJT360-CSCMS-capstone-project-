<?php 
  include '../conn.php';
  session_start();
  if(empty($_SESSION['admin_email'])){
    ?>
    <script>
      alert('Session Empty Please Login');
      window.location.href='../index.html';
    </script>
    <?php
  }else{
    $e = $_SESSION['admin_email'];
    $get_admin = mysqli_query($conn, "SELECT * FROM admin WHERE admin_email = '$e'");
    while($admin = mysqli_fetch_array($get_admin)){
      $name = $admin['name'];
    }
  }

?>
<!DOCTYPE >
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>OJT|360</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/hero-img.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin--template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index." class="logo d-flex align-items-center">
        <img src="assets/img/hero-img.png" alt="">
        <span class="d-none d-lg-block">OJT|360</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->
        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/IMG20230214143946.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php  echo $name; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Angel Mae Rizaba</h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
          

            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>REPORTS</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->
<!-- End Profile Page Nav -->


<li class="nav-item">
        <a class="nav-link collapsed" href="partnered.php">
          <i class="bi bi-question-circle"></i>
          <span>PARTNERED COMPANY</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <!-- End F.A.Q Page Nav -->

      

      <li class="nav-item">
        <a class="nav-link collapsed" href="evaluation.php">
          <i class="bi bi-card-list"></i>
          <span>EVALUATION</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="class_list.php">
          <i class="bi bi-card-list"></i>
          <span>CLASS LIST</span>
        </a>
      </li>
      <!-- End Register Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="studentslist.php">
          <i class="bi bi-card-list"></i>
          <span>STUDENT LIST</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="announcement.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>ANNOUNCEMENT</span>
        </a>
      </li>
      
      <li class="nav-item">
                <a class="nav-link collapsed" href="" data-bs-toggle="modal" data-bs-target="#create_class">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>CREATE CLASS</span>
                </a>
      </li>

      


  </aside><!-- End Sidebar-->
  <div class="modal" id="create_class" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Class Info</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="process.php" method="POST">
            <div class="input-group mb-3">
              <div class="input-group-text"><i class="bi bi-upc-scan"></i></div>
              <input type="text" name="class_code" class="form-control" placeholder="Enter Class Code" required>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-text"><i class="bi bi-card-heading"></i></div>
              <input type="text" name="subject_title" class="form-control" placeholder="Enter Subject Title" required>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-text"><i class="bi bi-image"></i></div>
              <input type="text" name="subject_description" class="form-control" placeholder="Enter Subject Description" required>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-text"><i class="bi bi-person"></i></div>
              <input type="text" name="teachers_name" class="form-control" placeholder="Enter Teacher's Name" required>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-text"><i class="bi bi-list-ol"></i></div>
              <input type="text" name="section" class="form-control" placeholder="Enter Section" required>
            </div>




       
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="create_class" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1> ADMIN DASHBOARD</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <!-- Sales Card -->

      <div class="row">
      <div class="col-xxl-4 col-sm-12">

<div class="card info-card sales-card">

  <div class="filter">
    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
      <li class="dropdown-header text-start">
        <h6>Filter</h6>
      </li>

      <li><a class="dropdown-item" href="#">Today</a></li>
      <li><a class="dropdown-item" href="#">This Month</a></li>
      <li><a class="dropdown-item" href="#">This Year</a></li>
    </ul>
  </div>

  <div class="card-body">
    <h5 class="card-title">Partnered Company <span>| Today</span></h5>

    <div class="d-flex align-items-center">
      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
        <i class="bi bi-cart"></i>
      </div>
      <div class="ps-3">
        <h6>145</h6>
        <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

      </div>
    </div>
  </div>

</div>
</div><!-- End Sales Card -->

<!-- Revenue Card -->
<div class="col-md-4 col-sm-12">
<div class="card info-card revenue-card">

  <div class="filter">
    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
      <li class="dropdown-header text-start">
        <h6>Filter</h6>
      </li>

      <li><a class="dropdown-item" href="#">Today</a></li>
      <li><a class="dropdown-item" href="#">This Month</a></li>
      <li><a class="dropdown-item" href="#">This Year</a></li>
    </ul>
  </div>

  <div class="card-body">
    <h5 class="card-title">Accounts <span>| This Month</span></h5>

    <div class="d-flex align-items-center">
      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
        <i class="bi bi-currency-dollar"></i>
      </div>
      <div class="ps-3">
        <h6>$3,264</h6>
        <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

      </div>
    </div>
  </div>

</div>
</div><!-- End Revenue Card -->

<!-- Customers Card -->
<div class="col-xxl-4 col-xl-4">

<div class="card info-card customers-card">

  <div class="filter">
    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
      <li class="dropdown-header text-start">
        <h6>Filter</h6>
      </li>

      <li><a class="dropdown-item" href="#">Today</a></li>
      <li><a class="dropdown-item" href="#">This Month</a></li>
      <li><a class="dropdown-item" href="#">This Year</a></li>
    </ul>
  </div>

  <div class="card-body">
    <h5 class="card-title">WAR <span>| This Year</span></h5>

    <div class="d-flex align-items-center">
      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
        <i class="bi bi-people"></i>
      </div>
      <div class="ps-3">
        <h6>1244</h6>
        <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

      </div>
    </div>

  </div>
</div>

</div>  
      </div>


            <!-- End Customers Card -->

    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>OJT</span></strong>.360
    </div>
    <div class="credits">
 
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

      </html>