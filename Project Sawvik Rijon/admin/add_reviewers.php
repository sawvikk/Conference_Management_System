<?php include("admin_header.php"); ?>
<?php require_once("../database/connection.php") ?>
<?php include('../mail_sending2.php') ?>
<?php
if (isset($_POST['add_reviewer'])) {
    extract($_POST);
    $designation_list = array("professor"=>"Professor", "associateProfessor"=> "Associate Professor","assistantProfessor"=>"Assistant Professor","lecturer"=>"Lecturer");

    $sql = "SELECT * FROM reviewers WHERE reviewer_email = '$email' AND admin_approved='1'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
    echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Email Already Exists</p>";
    } 
    else 
    {
    if (isset($_FILES['image'])) {
        $reviewer_image_name = $_FILES['image']['name'];
        $reviewer_image_tmp_name = $_FILES['image']['tmp_name'];
        // echo $speaker_image_tmp_name;
        $path_info = strtolower(pathinfo($reviewer_image_name, PATHINFO_EXTENSION));
        // echo $path_info;
        $reviewer_image_name = time() . ".$path_info";
        $image_file_type = $_FILES['image']['type'];
        // print_r($_FILES['manuscript_pdf']);

        $count_error = 0;
        $arr = array("jpg", "png", "jpeg");
        if (!in_array($path_info, $arr)) {
            $count_error++;
        }

        if ($count_error > 0) {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Error occurs</p>";
        }
        else{
            if($password===$confirmPassword){
            $insert_sql = "INSERT INTO `reviewers`(`reviewer_name`, `reviewer_email`, `password`, `designation`, `department`, `university`, `division`, `country`, `expertise`, `image`,`admin_approved`) VALUES ('$name','$email','$password','$designation','$dept','$university','$division','$country','$expertise','$reviewer_image_name','1')";

            $run_insert_qry = mysqli_query($conn, $insert_sql);
            if ($run_insert_qry) {
                move_uploaded_file($reviewer_image_tmp_name, '../Images/reviewer_images/' . $reviewer_image_name);
                // echo "Good";
                $receiver = $email;
                $subject = "Reviewer Account Information";
                $body = '<p>Dear '.$name.',<br>Congratulations on joining our platform as a reviewer. Here are your account details: </p><h3>Reviewer Information</h3>
            <p>Reviewer Name: '.$name.'<br>
            Reviewer Email: '.$email.'<br>
            Reviewer Designation: '.$designation_list[$designation].'<br>
            Reviewer Department/Office: '.$dept.'<br>
            Reviewer University/Organization: '.$university.'<br>
            Reviewer Division/State: '.$division.'<br>
            Reviewer Country: '.$country.'<br>
            Reviewer Expertise: '.$expertise.'<br>
            
            <p>
            Link : <a href="
            http://localhost/Project/reviewer/password_set.php?email='.$email.'">Set Password</a>
        <br>
        <p>Please set password of your account and log in.If you encounter any issues or have questions, feel free to reach out to us.<br><br>
        Best Regards,<br/>
                    Professor Dr. Tushar Kanti Saha,<br/>
                    Convener,<br/>
                    ICTBJ-2023 Organizing Committee <br/>
                    Trishal, Mymensingh, Bangladesh <br/>
                    E-Mail: <a href="ictbj@.com">ictbj@.com</a> <br/>
                    Tel. +8801711028510 (WhatsApp)
        </p>'; 
                // $receiver = "sawvik.dipto10@gmail.com";
                // $subject = "Sawvik";
                $send_mail = send_mail($receiver, $subject, $body);
                header("location: show_all_reviewers.php");
                ob_end_flush();
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data is inserted</p>";
            }
        }
        else{
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Password and confirm password are different</p>";
        }

        }
    }
    else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Image is not found</p>";
    }
} 
}

?>

<!--Code for adding new reviewers-->
<div class="container-fluid  my-5 d-flex justify-content-center">
    <!-- <div class="row"> -->
    <div class="col-lg-6 col-md-12 col-12 bg-white p-5 border border-primary border-2 rounded ">
        <h2 class="text-capitalize text-center">Add Reviewer</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <!-- <div class="card p-3 mb-5 shadow"> -->
            
            <div class="p-3 my-3 rounded" style="background:#eaf0ff5b; ">
            <h4 class="text-capitalize text-center "><u>Personal Information</u></h4>
            <div class="row">
            <div class="mt-3 col-md-6">
                <label for="name">Name<span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
            </div>
            <div class="mt-3 col-md-6">
                <label for="email">E-mail<span class="text-danger">*</span></label>
                <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required>
            </div>
            </div>
            </div>
            <div class="p-3 my-3 rounded" style="background:#eaf0ff5b; ">
            <h4 class="text-capitalize text-center "><u>Account Information</u></h4>
            <div class="row">
            <div class="mt-3 col-md-6">
                <label for="password">Password<span class="text-danger">*</span></label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="mt-3 col-md-6" >
                <label for="confirmPassword">Confirm Password <span class="text-danger">*</span></label>
                <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" class="form-control" required>
            </div>
            </div>
            </div>
            <div>
            <div class="p-3 my-3 rounded" style="background:#eaf0ff5b; ">
            <h4 class="text-capitalize text-center "><u>Affiliation</u></h4>
            <div class="row">

            <div class="mt-3 col-md-6">
            <label for="designation">Designation:<span class="text-danger">*</span></label>
            <select class="form-select" id="designation" name="designation">
                <option value="Choose designation" selected disabled>Choose  Designation</option>
                <option value="professor">Professor</option>
                <option value="associateProfessor">Associate Professor</option>
                <option value="assistantProfessor">Assistant Professor</option>
                <option value="lecturer">Lecturer</option>
                <!-- Add more options as needed -->
            </select>
            </div>
            <div class="mt-3 col-md-6">
                <label for="dept">Department/Office<span class="text-danger">*</span></label>
                <input type="text" name="dept" id="dept" class="form-control" placeholder="Department/Office" required>
            </div>
            </div>
            <div class="row">
            <div class="mt-3 col-md-12">
                <label for="university">University/Organization<span class="text-danger">*</span></label>
                <input type="text" name="university"  placeholder="University/Organization" id="university" class="form-control" required>
            </div>
            </div>
            <div class="row">
            <div class="mt-3 col-md-6">
                <label for="division">Division/State<span class="text-danger">*</span></label>
                <input type="text" name="division" placeholder="Division/State"  id="division" class="form-control" required>
            </div>
            <div class="mt-3 col-md-6">
                <label for="country">Country<span class="text-danger">*</span></label>
                <input type="text" name="country" id="country" class="form-control" placeholder="Country" required>
            </div>
            </div>
            </div>
            <div class="p-3 my-3 rounded" style="background:#eaf0ff5b; ">
            <h4 class="text-capitalize text-center "><u>Expertise & Image</u></h4>
            <div class="mt-3">
                <label for="expertise">Area of expertise : <b> <span class="text-danger">*</span> <i class="text-danger">(Please Separate by ",")</i></b></label>
                <input type="text" name="expertise" id="expertise" class="form-control" placeholder="Area of Expertise" required>
            </div>
            <div class="mt-3">
                <label for="image">Image<span class="text-danger">*</span></label>
                <input type="file" name="image" id="image" class="form-control" required>
            </div>
            </div>
            
            <div class="d-flex justify-content-center mt-3">
                <input type="submit" name="add_reviewer" value="Add" class="btn btn-primary">
            </div>
            <!-- </div> -->
        </form>
    </div>
</div>

<?php include("admin_footer.php") ?>