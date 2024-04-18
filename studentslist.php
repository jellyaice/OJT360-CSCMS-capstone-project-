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
        <a class="nav-link " href="studentslist.php">
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
      <h1>DASHBOARD</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Student List
          <li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">


      <div class="modal fade" id="reg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Register Student</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="process.php" method="POST">


                <div class="input-group mb-3">
                  <div class="input-group-text">
                    <i class="bi bi-envelope-check-fill"></i>
                  </div>
                  <input type="email" class="form-control" name="student_email" placeholder="Enter Email" required>
                </div>

                <div class="input-group mb-3">
                  <div class="input-group-text">
                    <i class="bi bi-person-fill"></i>
                  </div>
                  <input type="name" class="form-control" name="student_name" placeholder="Enter  Full Name" required>
                </div>

                <div class="input-group mb-3">
                  <div class="input-group-text">
                    <i class="bi bi-phone-fill"></i>
                  </div>
                  <input type="contact" class="form-control" name="contact" placeholder="Enter Contact" required>
                </div>

                <div class="input-group mb-3">
                  <div class="input-group-text">
                    <i class="bi bi-house-fill"></i>
                  </div>
                  <input type="Address" class="form-control" name="address" placeholder="Enter Address" required>
                </div>

                <div class="input-group mb-3">
                  <div class="input-group-text">
                    <i class="bi bi-123"></i>
                  </div>
                  <input type="text" class="form-control" name="id_num" placeholder="Enter id number" required>
                </div>

                <div class="input-group mb-3">
                  <div class="input-group-text">
                    <i class="bi bi-card-checklist"></i>
                  </div>
                  <input type="text" class="form-control" name="section" placeholder="Section" required>
                </div>

                <div class="input-group">
                  <div class="input-group-text">
                    <i class="bi bi-key-fill"></i>
                  </div>
                  <input type="password" id="myInput" class="form-control" name="password" required placeholder="Enter Password" id="myInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                </div>

                <!--an element to toggle password visibility-->
                <input type="checkbox" onclick="myFunction()">Show Password

                <script>
                  function myFunction() {
                    var x = document.getElementById("myInput");
                    if (x.type === "password") {
                      x.type = "text";
                    } else {
                      x.type = "password";
                    }
                  }
                </script>


                <div class="modal-footer">
                  <input type="reset" class="btn btn-secondary" value="CLEAR">
                  <input type="submit" class="btn btn-primary" name="register" value="Register">
                </div>

            </div>

            </form>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#reg">Register Student</button>
      </div>



      <div class="card shadow px-2 py-2">

        <div class="card-body">

            <table class="datatable">
              <thead>
                <tr>
                  <th>Fullname</th>
                  <th>Email</th>
                  <th>Contact</th>
                  <th>Address</th>
                  <th>ID Number</th>
                  <th>Section</th>
                  <th>Action</th>

                </tr>
              </thead>
              <tbody>
                <?php
                $get_students = mysqli_query($conn, "SELECT * FROM student");
                while ($students = mysqli_fetch_array($get_students)) {


                ?>
                  <tr>
                    <td><?php echo $students['student_name'] ?></td>
                    <td><?php echo $students['student_email'] ?></td>
                    <td><?php echo $students['contact'] ?></td>
                    <td><?php echo $students['address'] ?></td>
                    <td><?php echo $students['id_num'] ?></td>
                    <td><?php echo $students['section'] ?></td>
                    <td>
                      <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#update_studentlist<?php echo $students['id']; ?>">Update</button>
                    </td>

                    <div class="modal fade" id="update_studentlist<?php echo $students['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Student Info</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>

                        
                          <div class="modal-body">
                            <form action="process.php?id=<?php echo $students['id'];?>" method="POST">

                              <div class="input-group mb-3">
                                <div class="input-group-text">
                                  <i class="bi bi-person-fill"></i>
                                </div>
                                <input type="name" class="form-control" name="student_name" value="<?php echo $students['student_name']; ?>" required>
                              </div>


                              <div class="input-group mb-3">
                                <div class="input-group-text">
                                  <i class="bi bi-envelope-check-fill"></i>
                                </div>
                                <input type="email" class="form-control" name="student_email" value="<?php echo $students['student_email']; ?>" required>
                              </div>


                              <div class="input-group mb-3">
                                <div class="input-group-text">
                                  <i class="bi bi-phone-fill"></i>
                                </div>
                                <input type="contact" class="form-control" name="contact" value="<?php echo $students['contact']; ?>" required>
                              </div>

                              <div class="input-group mb-3">
                                <div class="input-group-text">
                                  <i class="bi bi-house-fill"></i>
                                </div>
                                <input type="Address" class="form-control" name="address" value="<?php echo $students['address']; ?>" required>
                              </div>

                              <div class="input-group mb-3">
                                <div class="input-group-text">
                                  <i class="bi bi-123"></i>
                                </div>
                                <input type="text" class="form-control" name="id_num" value="<?php echo $students['id_num']; ?>" required>
                              </div>

                              <div class="input-group mb-3">
                                <div class="input-group-text">
                                  <i class="bi bi-card-checklist"></i>
                                </div>
                                <input type="text" class="form-control" name="section" value="<?php echo $students['section']; ?>" required>
                              </div>

                              <div class="modal-footer">
                                <input type="submit" class="btn btn-danger" value="Delete" name="delete_studentlist">
                                <input type="submit" class="btn btn-primary" value="Update Changes" name="update_studentlist">
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