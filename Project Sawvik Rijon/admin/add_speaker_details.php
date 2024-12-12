<?php include("admin_header.php") ?>
<?php require_once("../database/connection.php") ?>
<!-- Name	University	Topic	email	Image	Status -->
<?php
if (isset($_POST['add_speaker'])) {
    extract($_POST);
    // echo "<pre>";
    // print_r($_POST);
    // print_r($_FILES);
    if (isset($_FILES['image'])) {
        $speaker_image_name = $_FILES['image']['name'];
        $speaker_image_tmp_name = $_FILES['image']['tmp_name'];
        // echo $speaker_image_tmp_name;
        $path_info = strtolower(pathinfo($speaker_image_name, PATHINFO_EXTENSION));
        // echo $path_info;
        $speaker_image_name = time() . ".$path_info";
        $manuscript_pdf_file_type = $_FILES['image']['type'];
        // print_r($_FILES['manuscript_pdf']);


        $count_error = 0;
        $arr = array("jpg", "png", "jpeg");
        if (!in_array($path_info, $arr)) {
            $count_error++;
        }

        if ($count_error > 0) {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Error occurs</p>";
        } else {
            $insert_sql = "INSERT INTO `speakers`(`speaker_name`,`speaker_university`,`speaker_topic`,`speaker_email`,`speaker_image`,`speaker_contact`,`speaker_password`,`speaker_country`,`speaker_status`,`verification_code`) VALUES('$name','$university','$topic','$email','$speaker_image_name','','','','0','')";
            $run_insert_qry = mysqli_query($conn, $insert_sql);
            if ($run_insert_qry) {
                move_uploaded_file($speaker_image_tmp_name, '../Images/speaker_images/' . $speaker_image_name);
                header("location: show_all_speakers.php");
                ob_end_flush();
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data is inserted</p>";
            }
        }
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Image is not found</p>";
    }
}
?>




<div class="container-fluid  my-5 d-flex justify-content-center">
<div class="col-lg-6 col-md-12 col-12 bg-white p-5 border border-primary border-2 rounded ">
<h2 class="text-capitalize text-center">Add New Speaker</h2>
<form action="" method="post" enctype="multipart/form-data">
    <div class="p-3 my-3 rounded" style="background:#eaf0ff5b; ">
        <div class="row">
            <div class="mt-3 col-md-6">
                <label for="name">Name<span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mt-3 col-md-6">
                <label for="email">E-mail<span class="text-danger">*</span></label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="mt-3 col-md-6">
                <label for="university">University<span class="text-danger">*</span></label>
                <input type="text" name="university" id="university" class="form-control" required>
            </div>
            <div class="mt-3 col-md-6">
                <label for="topic">Topic<span class="text-danger">*</span></label>
                <input type="text" name="topic" id="topic" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="mt-3 col-md-6">
                <label for="image">Image<span class="text-danger">*</span></label>
                <input type="file" name="image" id="image" class="form-control" required>
            </div>
        </div>
        <div class="row">
            
            <div class=" d-flex justify-content-center mt-3 col-md-12 ">
                <input type="submit" name="add_speaker" value="Add" class="btn btn-primary">
            </div>
        </div>

    </div>
            
</form>

</div>
</div>

<!-- 
<div class="container-fluid  mt-5 d-flex justify-content-center">
    //<div class="row"> 
    <div class="col-md-6 col-12 bg-white p-5 border border-primary border-2 rounded ">
        <h2 class="text-capitalize text-center">Add New Speaker</h2>
        <form action="" method="post" enctype="multipart/form-data">
            //<div class="card p-3 mb-5 shadow"> 
            <div class="mt-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mt-3">
                <label for="university">University</label>
                <input type="text" name="university" id="university" class="form-control" required>
            </div>
            <div class="mt-3">
                <label for="topic">Topic</label>
                <input type="text" name="topic" id="topic" class="form-control" required>
            </div>
            <div class="mt-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="mt-3">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control" required>
            </div>
            <div class="mt-3">
                <input type="submit" name="add_speaker" value="Add" class="btn btn-primary">
            </div>
        </form>
    </div>
</div> -->

<?php include("admin_footer.php") ?>
<!-- Name,Email,Affiliation, expertise field er keyword -->