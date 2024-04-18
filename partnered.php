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
    //$name = $admin['name'];

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
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php  ?></span>
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
        <a class="nav-link collapsed " href="index.php">
          <i class="bi bi-grid"></i>
          <span>REPORTS</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->
      <!-- End Profile Page Nav -->


      <li class="nav-item">
        <a class="nav-link " href="partnered.php">
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
        <a class="nav-link " href="announcement.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>ANNOUNCEMENT</span>
        </a>
      </li><!-- End Login Page Nav -->

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
      <h1>DASHBOARD</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="modal" id="add_company" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Adding Company</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="modal"></button>
          </div>
          <div class="modal-body">
            <form action="process.php" method="POST" enctype="multipart/form-data">


              <div class="row">
                <div class="col-md-12 col-sm-12 mb-3">
                  <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-file"></i></div>
                    <input type="file" name="image" class="form-control" id="">
                  </div>

                </div>

                <div class="col-md-12 col-sm-12 mb-3">
                  <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-person"></i></div>
                    <input type="text" name="comp_name" class="form-control" placeholder="Company Name">
                  </div>

                </div>
                <div class="col-md-12 col-sm-12 mb-3">
                  <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-envelope"></i></div>
                    <input type="email" name="com_email" class="form-control" placeholder="Company Email">
                  </div>

                </div>



                <div class="col-md-12 col-sm-12 mb-3">
                  <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-geo-alt-fill"></i></div>
                    <input type="location" name="com_loc" class="form-control" placeholder="Company Location">
                  </div>
                </div>

                <div class="col-md-12 col-sm-12 mb-3">
                  <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-person-lines-fill"></i></div>
                    <input type="text" name="com_contact" class="form-control" placeholder="Company Contact">
                  </div>
                </div>

                <div class="col-md-12 col-sm-12 mb-3">
                  <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-facebook"></i></div>
                    <input type="text" name="com_facebook_acc" class="form-control" placeholder="Company Facebook Account">
                  </div>
                </div>

                <div class="col-md-12 col-sm-12 mb-3">
                  <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                    <input type="text" name="supervisor" class="form-control" placeholder="Supervisor">
                  </div>
                </div>



                <input type="submit" name="reg_company" class="btn btn-primary form-control" value="Register">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_company">Add Company</button>
    <section class="section dashboard mt-3">
      <div class="row">

        <?php
        $get_company = mysqli_query($conn, "SELECT * FROM partner_company");
        while ($company = mysqli_fetch_array($get_company)) {


        ?>
          <div class="col-lg-4">
            <div class="card">
              <div class="card-header">Partnered Company</div>
              <div class="card-body">
                <img src="assets/uploads/<?php echo $company['image']; ?>" class="card-img-top">
                <p class="card-text">Company Name: <?php echo $company['com_name']; ?></p>
                <p class="card-text">Company Location: <?php echo $company['com_loc']; ?></p>
                <p class="card-text">Company Email: <?php echo $company['com_email']; ?></p>
                <p class="card-text">Company Contact: <?php echo $company['com_contact']; ?></p>
                <p class="card-text">Company Facebook Account: <?php echo $company['com_facebook_acc']; ?></p>
                <p class="card-text">Supervisor: <?php echo $company['supervisor']; ?></p>
                <button class="btn btn-primary form-control" data-bs-toggle="modal" data-bs-target="#more<?php echo $company['id']; ?>">View More</button>
              </div>
              <div class="modal" id="more<?php echo $company['id']; ?>" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Edit Company Info</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="modal"></button>
                    </div>
                    <div class="modal-body">
                      <form action="process.php?id=<?php echo $company['id']; ?>" method="POST">


                        <div class="row">


                          <div class="col-md-12 col-sm-12 mb-3">
                            <div class="input-group">
                              <div class="input-group-text"><i class="bi bi-person"></i></div>
                              <input type="text" name="comp_name" class="form-control" placeholder="Company Name" value="<?php echo $company['com_name']; ?>">
                            </div>

                          </div>
                          <div class="col-md-12 col-sm-12 mb-3">
                            <div class="input-group">
                              <div class="input-group-text"><i class="bi bi-envelope"></i></div>
                              <input type="email" name="com_email" class="form-control" placeholder="Company Email" value="<?php echo $company['com_email']; ?>">
                            </div>

                          </div>



                          <div class="col-md-12 col-sm-12 mb-3">
                            <div class="input-group">
                              <div class="input-group-text"><i class="bi bi-geo-alt-fill"></i></div>
                              <input type="location" name="com_loc" class="form-control" placeholder="Company Location" value="<?php echo $company['com_loc']; ?>">
                            </div>

                          </div>

                          <div class="col-md-12 col-sm-12 mb-3">
                            <div class="input-group">
                              <div class="input-group-text"><i class="bi bi-person-lines-fill"></i></div>
                              <input type="text" name="com_contact" class="form-control" placeholder="Company Contact" value="<?php echo $company['com_contact']; ?>">
                            </div>

                          </div>

                          <div class="col-md-12 col-sm-12 mb-3">
                            <div class="input-group">
                              <div class="input-group-text"><i class="bi bi-facebook"></i></div>
                              <input type="text" name="com_facebook_acc" class="form-control" placeholder="Company Facebook" value="<?php echo $company['com_facebook_acc']; ?>">
                            </div>

                          </div>

                          <div class="col-md-12 col-sm-12 mb-3">
                            <div class="input-group">
                              <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                              <input type="text" name="supervisor" class="form-control" placeholder="Supervisor" value="<?php echo $company['supervisor']; ?>">
                            </div>

                          </div>




                          <div class="d-grid gap-2">
                            <button type="submit" name="upd_company" class="btn btn-success">Save Changes</button>
                            <button type="submit" name="del_company" onclick="return confirm('Do you want to delete this company?')" class="btn btn-danger">Delete</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
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