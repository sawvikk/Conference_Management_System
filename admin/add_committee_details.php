<?php include("admin_header.php") ?>
<?php require_once("../database/connection.php") ?>

<!-- Name	University	Topic	email	Image	Status -->
<?php
if (isset($_POST['add_committee'])) {
    extract($_POST);
    //     echo "<pre>";
    //     print_r($_POST);
    // print_r($_FILES);
    if (isset($_FILES['image'])) {

        $committee_image_name = $_FILES['image']['name'];
        $committee_image_tmp_name = $_FILES['image']['tmp_name'];
        // echo $committee_image_tmp_name;
        $path_info = strtolower(pathinfo($committee_image_name, PATHINFO_EXTENSION));
        echo $path_info;
        $committee_image_name = time() . ".$path_info";
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
            $insert_sql="INSERT INTO `committee`( `committee_image`, `committee_name`, `committee_email`, `committee_contact`, `committee_password`, `committee_university`, `committee_topic`, `committee_status`, `verification_code`) VALUES ('$committee_image_name','$name','$email','','','$university','$post','$committee_status','')"; 
            // $insert_sql = "INSERT INTO `committee`(`committee_contact`,`committee_name`,`committee_university`,`committee_topic`,`committee_email`,`committee_image`, `committee_status`) VALUES('', '$name','$university','$post','$email','$committee_image_name','$committee_status')";
            $run_insert_qry = mysqli_query($conn, $insert_sql);
            if ($run_insert_qry) {
                if (move_uploaded_file($committee_image_tmp_name, '../Images/committee_images/' . $committee_image_name)) {
                    echo "File moved successfully.";
                } else {
                    echo "Error moving file: " . $_FILES['image']['error'];
                }
                header("location: committee_details.php");
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
<!--Code for adding new committees-->
<div class="container-fluid  mt-5 d-flex justify-content-center">
    <!-- <div class="row"> -->
    <div class="col-md-3 p-4 bg-white border border-primary  border-2 rounded col-12">
        <h2 class="text-capitalize text-center">Add New Committee Member</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <!-- <div class="card p-3 mb-5 shadow"> -->
            <div class="mt-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mt-3">
                <label for="university">University</label>
                <input type="text" name="university" id="university" class="form-control" required>
            </div>
            <div class="mt-3">
                <label for="post">Post</label>
                <input type="text" name="post" id="post" class="form-control" required>
            </div>
            <div class="mt-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="my-3">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control" required>
            </div>
            <label for="committee_status">Select Committee</label>
            <select name="committee_status" id="committee_status" class="form-control">
                <option value="0">Local</option>
                <option value="1">International</option>
            </select>
            <div class=" d-flex justify-content-center mt-3">
                <input type="submit" name="add_committee" value="Add" class="btn btn-primary">
            </div>
            <!-- </div> -->
        </form>
    </div>
</div>

<?php include("admin_footer.php") ?>