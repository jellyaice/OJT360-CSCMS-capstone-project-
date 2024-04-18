<?php
include '../conn.php';
session_start();
if (empty($_SESSION['admin_email'])) {
?>
  <script>
    alert('Session Empty Please Login');
    window.location.href = '../index.html';
  </script>
<?php
} else {
  $e = $_SESSION['admin_email'];
  $get_admin = mysqli_query($conn, "SELECT * FROM admin WHERE admin_email = '$e'");
  while ($admin = mysqli_fetch_array($get_admin)) {
    $name = $admin['name'];
  }
}

?>

<!DOCTYPE html>
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
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
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
            <span class="d-none d-md-block dropdown-toggle ps-2">Angel Mae Rizaba</span>
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
              <hr class="dropdown-divider">
            </li>


            <li>
              <hr class="dropdown-divider">
            </li>


            <li>
              <hr class="dropdown-divider">
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
        <a class="nav-link collapsed " href="index.php">
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
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link " href="studentslist.php">
          <i class="bi bi-card-list"></i>
          <span>STUDENTS LIST</span>
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




          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>WEEKLY ACCOMPLISHMENT REPORT</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">weekly accomplishment report</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
  

      <div class="row">
        <?php 
          $get_war = mysqli_query($conn,"SELECT * FROM war");
          while($war = mysqli_fetch_array($get_war)){

       
        ?>
        <div class="col-md-4">
          <div class="card" style="width: 18rem;">
            <img src="assets/img/th.jpg" class="card-img-top" style="height: 200px;">
            <div class="card-body">
              <p class="card-text">Week: <?php echo $war['week']; ?></p>
              <p class="card-text">Desc: <?php echo $war['des']; ?></p>
              <p class="card-text">Time: <?php echo $war['time']; ?></p>  
              <p class="card-text">Score: <?php echo $war['score']; ?></p>
              <p class="card-text">Remarks: <?php echo $war['remarks']; ?></p>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success">View More</button>
              <button type="submit" class="btn btn-warning"><a href="../student_dashboard/assets/war/<?php echo $war['file']; ?>" target="_blank">View War</a></button>
            </div>
          </div>
        </div>
        <?php 
           }
        ?>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>OJT</span></strong>.360
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      <a href="https://bootstrapmade.com/"></a>
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