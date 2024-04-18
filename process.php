<?php

include "../conn.php";
session_start();

//adding student to class 
if (isset($_POST['add_class'])) {
    $id_number = $_POST['id_number'];
    $class_id  = $_POST['class_id'];

    $check_if_reg = mysqli_query($conn, "SELECT * FROM student WHERE id_num = '$id_number'");
    $num_reg  = mysqli_num_rows($check_if_reg);

    if ($num_reg >= 1) {
        $check_reg = mysqli_query($conn, "SELECT * FROM reg_student WHERE id_number ='$id_number'");
        $num_reg   = mysqli_num_rows($check_reg);
        if ($num_reg >= 1) {
?>
            <script>
                alert("This Student is already registered in this class");
                location.href = 'class/class.php';
            </script>
            <?php
        } else {
            $insert  = mysqli_query($conn, "INSERT INTO reg_student VALUE('0','$id_number','$class_id')");
            if ($insert == true) {
            ?>
                <script>
                    alert("Student added successfully!");
                    location.href = 'class/class.php?id=<?php echo $class_id; ?>';
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert("Error Adding Student");
                    location.href = 'class/class.php';
                </script>
        <?php
            }
        }
    } else {
        ?>
        <script>
            alert("This student is not register!");
            location.href = 'class/class.php';
        </script>
    <?php
    }
}
//register as student

if (isset($_POST['register_student'])) {
    $st_full_name = $_POST['st_full_name'];
    $st_contact = $_POST['st_contact'];
    $st_address = $_POST['st_address'];
    $st_email = $_POST['st_email'];
    $st_password = $_POST['st_password'];
    $section = $_POST['section'];

    $insert = mysqli_query($conn, "INSERT INTO reg_student VALUES(0,'$st_email','$st_full_name','$st_contact','$st_address','$st_password','$section')");

    if ($insert == TRUE) {


    ?>
        <script>
            alert("Insert Successfully!");
            location.href = "index.html";
        </script>

    <?php
    } else {
    ?>
        <script>
            alert("Insert Unsuccessfull!");
            location.href = "index.html";
        </script>

    <?php
    }
}



//login for admin

if (isset($_POST['admin_login'])) {

    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];

    $check = mysqli_query($conn, "SELECT * FROM admin WHERE admin_email ='$admin_email'  AND admin_password = '$admin_password'");

    $row = mysqli_num_rows($check);

    $_SESSION['admin_email'] = "$admin_email";
    $_SESSION['admin_password'] = "$admin_password";

    if ($row >= 1) {

    ?>
        <script>
            alert("Login Successfully!");
            location.href = "admin_dashboard";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Login Unsuccessful!");
            location.href = " index.html";
        </script>
    <?php

    }
}


//login for student

if (isset($_POST['student_login'])) {

    $student_email = $_POST['student_email'];

    $student_password = $_POST['student_password'];

    $check = mysqli_query($conn, "SELECT * FROM student WHERE student_email ='$student_email' AND student_password= '$student_password'");

    $student = mysqli_num_rows($check);



    if ($student >= 1) {
        $_SESSION['student_email'] = "$student_email";
    ?>
        <script>
            alert("Login Successfully!");
            location.href = "student_dashboard/index.php";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Login Unsuccessful!");
            location.href = "index.html";
        </script>
    <?php

    }
}

//login for partnered company

if (isset($_POST['pc_login'])) {

    $pc_email = $_POST['pc_email'];
    $pc_password = $_POST['pc_password'];

    $check = mysqli_query($conn, "SELECT * FROM partner_company WHERE pc_email ='$pc_email' AND pc_password= '$pc_password'");

    $row = mysqli_num_rows($check);

    $_SESSION['pc_email'] = "$pc_email";

    if ($row >= 1) {

    ?>
        <script>
            alert("Login Successfully!");
            location.href = "admin_dashboard/index.html";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Login Unsuccessful!");
            location.href = "index.html";
        </script>
    <?php

    }
}
//adding partner company
if (isset($_POST['reg_company'])) {
    $fileName = $_FILES['image']['name'];
    $fileTmpName  = $_FILES['image']['tmp_name'];
    $comp_name  = $_POST['comp_name'];
    $com_email = $_POST['com_email'];
    $com_pass = $_POST['com_pass'];
    $com_loc = $_POST['com_loc'];
    $com_contact = $_POST['com_contact'];
    $com_facebook_acc = $_POST['com_facebook_acc'];
    $supervisor = $_POST['supervisor'];

    $create_company = mysqli_query($conn, "INSERT INTO partner_company VALUE('0','$fileName','$comp_name','$com_email','$com_pass','$com_loc','$com_contact','$com_facebook_acc','$supervisor')");
    if ($create_company == true) {
        move_uploaded_file($fileTmpName, 'assets/uploads/' . $fileName);

    ?>
        <script>
            alert("Company Created!");
            window.location.href = 'partnered.php';
        </script>
    <?php

    } else {
    ?>
        <script>
            alert("Error Creating Company!");
            window.location.href = 'partnered.php';
        </script>
    <?php
    }
}

//updating company 
if (isset($_POST['upd_company'])) {
    $upd_comp_id = $_GET['id'];

    $comp_name  = $_POST['comp_name'];
    $com_email = $_POST['com_email'];
    $com_pass = $_POST['com_pass'];
    $com_loc = $_POST['com_loc'];
    $com_contact = $_POST['com_contact'];
    $com_facebook_acc = $_POST['com_facebook_acc'];
    $supervisor = $_POST['supervisor'];


    $update_comp = mysqli_query($conn, "UPDATE partner_company SET  com_email = '$com_email', com_pass = '$com_pass', com_loc = '$com_loc' , com_contact = '$com_contact', com_facebook_acc = '$com_facebook_acc', supervisor = '$supervisor' WHERE id ='$upd_comp_id'");
    if ($update_comp == true) {
    ?>

        <script>
            alert('Company information Updated Successfully');
            window.location.href = 'partnered.php';
        </script>
    <?php


    } else {
    ?>
        <script>
            alert('Error Updating Company Information');
            window.location.href = 'partnered.php';
        </script>
    <?php

    }
}

//for deleting the company
if (isset($_POST['del_company'])) {
    $del_comp_id = $_GET['id'];

    $delete_company = mysqli_query($conn, "DELETE FROM partner_company WHERE id='$del_comp_id'");
    if ($delete_company == true) {
    ?>
        <script>
            alert('Company Deleted Successfully!');
            window.location.href = 'partnered.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Error Deleting Company!');
            window.location.href = 'partnered.php';
        </script>
    <?php
    }
}

//register partner company
if (isset($_POST['register_pc'])) {
    $pc_email = $_POST['pc_email'];
    $pc_name = $_POST['pc_name'];
    $pc_contact = $_POST['contact'];
    $pc_address = $_POST['address'];
    $pc_position = $_POST['position'];

    $check_partner = mysqli_query($conn, "SELECT * FROM partner_company WHERE pc_email = '$pc_email'");
    $partner = mysqli_num_rows($check_partner);

    if ($partner >= 1) {
    ?>
        <script>
            alert("This email already exist");
            window.location.href = "account.php";
        </script>
        <?php
    } else {
        $register_company = mysqli_query($conn, "INSERT INTO  partner_company VALUE('0','$pc_email','$pc_name','$pc_name','$pc_contact','$pc_position','$pc_address') ");
        if ($register_company == TRUE) {
        ?>
            <script>
                alert("Account Successfully Registered");
                window.location.href = "account.php";
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("Error Account Registration");
                window.location.href = "account.php";
            </script>
        <?php
        }
    }
}

//updating partnered_accocunt 
if (isset($_POST['update_partnercompany'])) {
    $partner_acc = $_GET['id'];

    $update_partnered_company = mysqli_query($conn, "UPDATE companies SET ");
}
//partnered company delete
if (isset($_POST['del_partner'])) {
    $del_partner_id = $_GET['id'];


    $delete_partner = mysqli_query($conn, "DELETE FROM partner_company WHERE id='$del_partner_id'");

    if ($delete_partner == TRUE) {

        ?>
        <script>
            alert("Account  deleted Successfully");
            window.location.href = "account.php";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Error Deleting Account ");
            window.location.href = "account.php";
        </script>
    <?php
    }
}

//for creating announcement 
if (isset($_POST['create_announcement'])) {
    $title = $_POST['title'];
    $message = $_POST['message'];
    $date = date('d-m-Y');

    $insert_announce = mysqli_query($conn, "INSERT INTO announcements VALUE('0','$title','$message','$date')");
    if ($insert_announce == true) {
    ?>
        <script>
            alert('Announcement Posted');
            window.location.href = 'announcement.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Error Creating Announcement');
            window.location.href = 'announcement.php';
        </script>
    <?php
    }
}

//updating announcement 
if (isset($_POST['upd_announce'])) {
    $announce_id = $_GET['id'];
    $upd_title = $_POST['title'];
    $upd_message = $_POST['message'];



    $upd_announce = mysqli_query($conn, "UPDATE announcements SET title = '$upd_title', message = '$upd_message' WHERE id = '$announce_id'");

    if ($upd_announce == true) {
    ?>
        <script>
            alert('Announcement Updated Successfully!');
            window.location.href = 'announcement.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Error Updating Announcement');
            window.location.href = 'announcement.php';
        </script>
    <?php
    }
}


//for deleting announcement 
if (isset($_POST['del_announce'])) {
    $del_announce = $_GET['id'];

    $delete_announcemet = mysqli_query($conn, "DELETE FROM announcements WHERE id = '$del_announce'");

    if ($del_announce == true) {
    ?>
        <script>
            alert('Announcement Deleted Successfully!');
            window.location.href = 'announcement.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            W
            alert('Error Deleting Announcement');
            window.location.href = 'announcement.php';
        </script>
    <?php
    }
}

//updating students account 
if (isset($_POST['upd_student'])) {
    $student_id = $_GET['id'];
    $name = $_POST['st_name'];
    $student_email = $_POST['student_email'];
    $contact  = $_POST['contact'];
    $address = $_POST['address'];
    $id_num = $_POST['id_num'];
    $section = $_POST['section'];

    $update_student = mysqli_query($conn, "UPDATE student SET student_email = '$student_email', student_name = '$name',contact='$contact', address='$address', id_num='$id_num',section='$section' WHERE id = '$student_id'");

    if ($update_student == true) {
    ?>
        <script>
            alert('Student Account Updated Successfully!');
            window.location.href = 'account.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Error Updating Account!');
            window.location.href = 'account.php';
        </script>
    <?php
    }
}

if (isset($_POST['del_student'])) {
    $del_student_id = $_GET['id'];

    $delete_student = mysqli_query($conn, "DELETE FROM student WHERE id = '$del_student_id'");

    if ($delete_student == true) {
    ?>
        <script>
            alert('Student Account Deleted Successfully!');
            window.location.href = 'account.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Error Deleting Account');
            window.location.href = 'account.php';
        </script>
    <?php
    }
}

// this is for modal class_list

if (isset($_POST['create_class'])) {
    $class_code = $_POST['class_code'];
    $subject_title = $_POST['subject_title'];
    $subject_description = $_POST['subject_description'];
    $teachers_name = $_POST['teachers_name'];
    $section = $_POST['section'];

    $class = mysqli_query($conn, "INSERT INTO class VALUE('0','$class_code','$subject_title','$subject_description','$teachers_name','$section')");

    if ($class == TRUE) {


    ?>
        <script>
            alert("Class Created Successfully!");
            location.href = "index.php";
        </script>

    <?php

    } else {
    ?>
        <script>
            alert("Error in Creating Class !");
            location.href = "index.php";
        </script>

    <?php
    }
}


//Update StudentList


if (isset($_POST['update_studentlist'])) {
    $upd_studentsid = $_GET['id'];
    $student_email = $_POST['student_email'];
    $student_name  = $_POST['student_name'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $id_num = $_POST['id_num'];
    $section = $_POST['section'];


    $update_studentlist = mysqli_query($conn, "UPDATE student SET student_email = '$student_email', student_name = '$student_name',contact='$contact', address='$address', id_num='$id_num',section='$section' WHERE id = '$upd_studentsid'");

    if ($update_studentlist == true) {

    ?>
        <script>
            alert('Student Account Updated Successfully!');
            window.location.href = 'studentslist.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Error Updating Account!');
            window.location.href = 'studentslist.php';
        </script>
    <?php
    }
}

//Delete StudentList


if (isset($_POST['delete_studentlist'])) {

    $delete_studentlistid = $_GET['id'];

    $delete_studentlist = mysqli_query($conn, "DELETE FROM student WHERE id = '$delete_studentlistid'");

    if ($delete_studentlist == true) {
    ?>
        <script>
            alert('Student Account Deleted Successfully!');
            window.location.href = 'studentslist.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Error Deleting Account');
            window.location.href = 'studentslist.php';
        </script>
<?php
    }
}
?>