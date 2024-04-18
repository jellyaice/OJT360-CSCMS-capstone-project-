<?php
include '../conn.php';
session_start();
if (empty($_SESSION['pc_email'])) {
?>
  <script>
    alert('Session Empty Please Login');
    window.location.href = '../index.html';
  </script>
<?php
} else {
  $e = $_SESSION['pc_email'];
  $get_admin = mysqli_query($conn, "SELECT * FROM pc_acc WHERE pc_email = '$e'");
  while ($admin = mysqli_fetch_array($get_admin)) {
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

      <li class="nav-item">
        <a class="nav-link collapsed" href="applicants.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>APPLICANTS</span>
        </a>
      </li><li class="nav-item">
        <a class="nav-link " href="evaluation.php">
          <i class="bi bi-card-list"></i>
          <span>EVALUATION</span>
        </a>
      </li>



      <li class="nav-item">
        <a class="nav-link " href="approved.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>APPROVED APPLICANTS</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="decline.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>DECLINED APPLICANTS</span>
        </a>
      </li>

    
      

      <!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="intern.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>INTERN NEEDS</span>
        </a>
      </li><!-- End Login Page Nav -->

      


  </aside><!-- End Sidebar-->

  <main id="main" class="main">




    <div class="pagetitle">
      <h1>INTERN NEEDS</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="intern.php">Home</a></li>
          <li class="breadcrumb-item active">Intern Needs</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="modal" id="add_job" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Adding Available Jobs</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="modal"></button>
          </div>
          <div class="modal-body">
            <form action="process.php" method="POST" enctype="multipart/form-data">


              <div class="row">
                <div class="col-md-12 col-sm-12 mb-3">
                  <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-file"></i></div>
                    <input type="file" name="img" class="form-control" id="">
                  </div>

                </div>

                <div class="col-md-12 col-sm-12 mb-3">
                  <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-envelope"></i></div>
                    <input type="email" name="comp_email" class="form-control" placeholder="Company Email">
                  </div>

                </div>
                <div class="col-md-12 col-sm-12 mb-3">
                  <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-image"></i></div>
                    <input type="text" name="comp_desc" class="form-control" placeholder="Company Description">
                  </div>

                </div>



                <div class="col-md-12 col-sm-12 mb-3">
                  <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-list-ol"></i></div>
                    <input type="text" name="comp_intern" class="form-control" placeholder="Intern Needs">
                  </div>
                </div>

                <div class="col-md-12 col-sm-12 mb-3">
                  <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-person-lines-fill"></i></div>
                    <input type="text" name="job_title" class="form-control" placeholder="Job Title">
                  </div>
                </div>

                

                


                <input type="submit" name="add_job" class="btn btn-primary form-control" value="ADD">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
      
    </div>
  </div>
</div>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_job">Add Job</button>
    <section class="section dashboard mt-3">
      <div class="row">

        <?php
        $get_intern = mysqli_query($conn, "SELECT * FROM intern  ");
        while ($intern = mysqli_fetch_array($get_intern)) {


        ?>
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">Available Jobs</div>
              <div class="card-body">
                <img src="assets/uploads/<?php echo $intern['image']; ?>" class="card-img-top">
                <p class="card-text">Company Email: <?php echo $intern['comp_email']; ?></p>
                <p class="card-text">Company Description: <?php echo $intern['comp_desc']; ?></p>
                <p class="card-text"> Intern Needs: <?php echo $intern['comp_intern']; ?></p>
                <p class="card-text">Job Title: <?php echo $intern['job_title']; ?></p>
                
                <button class="btn btn-primary form-control" data-bs-toggle="modal" data-bs-target="#more<?php echo $intern['id']; ?>">View More</button>
              </div>
              <div class="modal" id="more<?php echo $intern['id']; ?>" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Edit Job Info</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="modal"></button>
                    </div>
                    <div class="modal-body">
                      <form action="process.php?id=<?php echo $intern['id']; ?>" method="POST">


                        <div class="row">


                         

                          </div>
                          <div class="col-md-12 col-sm-12 mb-3">
                            <div class="input-group">
                              <div class="input-group-text"><i class="bi bi-envelope"></i></div>
                              <input type="email" name="comp_email" class="form-control" placeholder="Company Email" value="<?php echo $intern['comp_email']; ?>">
                            </div>

                          </div>



                          <div class="col-md-12 col-sm-12 mb-3">
                            <div class="input-group">
                              <div class="input-group-text"><i class="bi bi-image"></i></div>
                              <input type="text" name="comp_desc" class="form-control" placeholder="Company Description" value="<?php echo $intern['comp_desc']; ?>">
                            </div>

                          </div>

                          <div class="col-md-12 col-sm-12 mb-3">
                            <div class="input-group">
                              <div class="input-group-text"><i class="bi bi-list-ol"></i></div>
                              <input type="text" name="comp_intern" class="form-control" placeholder="Company Intern Needs" value="<?php echo $intern['comp_intern']; ?>">
                            </div>

                          </div>

                          <div class="col-md-12 col-sm-12 mb-3">
                            <div class="input-group">
                              <div class="input-group-text"><i class="bi bi-person-lines-fill"></i></div>
                              <input type="text" name="job_title" class="form-control" placeholder="Job Title" value="<?php echo $intern['job_title']; ?>">
                            </div>

                          </div>

                          



                          <div class="d-grid gap-2">
                            <button type="submit" name="upd_job" class="btn btn-success">Save Changes</button>
                            <button type="submit" name="del_job" onclick="return confirm('Do you want to delete this company?')" class="btn btn-danger">Delete</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
        }
        ?>
          </div>
     
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