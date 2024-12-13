<?php ob_start(); ?>
<?php require_once("../database/connection.php") ?>
<?php include("admin_header.php") ?>
<?php
if (isset($_POST['edit_committee'])) {
    extract($_POST);
    // print_r($_POST);
    // print_r($_FILES);
    if (isset($_FILES['image'])) {
        $committee_image_name = $_FILES['image']['name'];
        $committee_image_tmp_name = $_FILES['image']['tmp_name'];
        // echo $committee_image_tmp_name;
        $path_info = strtolower(pathinfo($committee_image_name, PATHINFO_EXTENSION));
        // echo $path_info;
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
            unlink('../Images/committee_images/' . $current_image);
            $update_sql = "UPDATE `committee` SET `committee_name`='$name',`committee_university`='$university',`committee_topic`='$post',`committee_email`='$email',`committee_image`='$committee_image_name',`committee_status`='$committee_status' WHERE committee_id='$id'";
            $run_insert_qry = mysqli_query($conn, $update_sql);
            if ($run_insert_qry) {
                move_uploaded_file($committee_image_tmp_name, '../Images/committee_images/' . $committee_image_name);
                header("location: committee_details.php");
                ob_end_flush();
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data is inserted</p>";
            }
        }
    }
}
