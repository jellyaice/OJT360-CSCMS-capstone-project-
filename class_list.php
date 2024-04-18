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
<!DOCTYPE>
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
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $name; ?></span>
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
        <a class="nav-link collapsed" href="index.php">
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
      <h1>DASHBOARD</h1>
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
        <?php
        $get_class = mysqli_query($conn, "SELECT * FROM class");

        while ($class = mysqli_fetch_array($get_class)) {
          $section = $class['section'];

        ?>
          <div class="col-xxl-4 col-sm-12">

            <div class="card info-card sales-card">


              <div class="card-body">
                <h5 class="card-title"><?php echo $class['section']; ?></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person"></i>
                  </div>
                  <div class="ps-3">
                    <a href="class/class.php?id=<?php echo $class['id']; ?>">View Class</a>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->
        <?php
        }
        ?>

      </div>
    </section>


    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#menu1">UI-FCI-BSIT-4-2</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#menu2">UI-FCI-BSIT-4-3</a>
      </li>

    </ul>


    <!-- Tab panes -->
    <div class="tab-content">

      <div id="menu1" class="container tab-pane fade"><br>
        <h3>UI-FC1-BSIT4-2</h3>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <td>Name</td>
                <td>Email</td>
                <td>ID Number</td>
                <td>Section</td>
                <td>Action</td>

              </tr>
            </thead>
            <tbody>
              <?php
              $get_Student = mysqli_query($conn, "SELECT * FROM student WHERE section='UI-FC1-BSIT4-2' ");
              while ($student = mysqli_fetch_array($get_Student)) {


              ?>
                <tr>
                  <td><?php echo $student['student_name']; ?></td>
                  <td><?php echo $student['student_email']; ?></td>
                  <td><?php echo $student['id_num']; ?></td>
                  <td><?php echo $student['section']; ?></td>
                  <td>Action</td>

                  <div class="modal fade" id="more_std<?php echo $student['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"> Students Account Information</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="process.php?id=<?php echo $student['id'] ?>" method="POST" autocomplete="off">


                            <div class="input-group mb-3">
                              <div class="input-group-text">
                                <i class="bi bi-envelope-check-fill"></i>
                              </div>
                              <input type="email" class="form-control" name="student_email" value="<?php echo $student['student_email'] ?>" required>
                            </div>

                            <div class="input-group mb-3">
                              <div class="input-group-text">
                                <i class="bi bi-person-fill"></i>
                              </div>
                              <input type="text" class="form-control" name="st_name" value="<?php echo $student['student_name'] ?> " required>
                            </div>

                            <div class="input-group mb-3">
                              <div class="input-group-text">
                                <i class="bi bi-phone-fill"></i>
                              </div>
                              <input type="number" class="form-control" name="contact" value="<?php echo $student['contact'] ?>" required>
                            </div>

                            <div class="input-group mb-3">
                              <div class="input-group-text">
                                <i class="bi bi-house-fill"></i>
                              </div>
                              <input type="text" class="form-control" name="address" value="<?php echo $student['address'] ?>" required>
                            </div>

                            <div class="input-group mb-3">
                              <div class="input-group-text">
                                <i class="bi bi-123"></i>
                              </div>
                              <input type="text" class="form-control" name="id_num" value="<?php echo $student['id_num'] ?>" required>
                            </div>

                            <div class="input-group mb-3">
                              <div class="input-group-text">
                                <i class="bi bi-"></i>
                              </div>
                              <input type="text" class="form-control" name="section" value="<?php echo $student['section'] ?>" required>
                            </div>









                        </div>


                        </form>
                      </div>
                    </div>
                  </div>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>

      <div id="menu2" class="container tab-pane fade"><br>
        <h3>UI-FC1-BSIT4-3</h3>

        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <td>Name</td>
                <td>Email</td>
                <td>ID Number</td>
                <td>Section</td>
                <td>Action</td>
              </tr>
            </thead>
            <tbody>
              <?php
              $get_Student = mysqli_query($conn, "SELECT * FROM student WHERE section ='UI-FC1-BSIT4-3'");
              while ($student = mysqli_fetch_array($get_Student)) {


              ?>
                <tr>
                  <td><?php echo $student['student_name']; ?></td>
                  <td><?php echo $student['student_email']; ?></td>
                  <td><?php echo $student['id_num']; ?></td>
                  <td><?php echo $student['section']; ?></td>



        </div>
      </div>
      </tr>
    <?php
              }
    ?>
    </tbody>
    </table>
    </div>
    </div>


    </div>
    </div>


    <!---->

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