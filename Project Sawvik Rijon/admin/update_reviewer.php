<?php ob_start(); ?>
<?php require_once("../database/connection.php") ?>
<?php include("admin_header.php") ?>
<?php
if (isset($_POST['edit_reviewer'])) {
    // echo "$id"; 
    echo "reviewer edition<br>";
    extract($_POST);
    echo $id; 
    echo "<pre>";
        print_r($_FILES);
        echo "</pre>";
    // print_r($_POST);
    // print_r($_FILES);
    if (isset($_FILES['image'])) {
        echo 'image<br>';
        echo "<pre>";
        print_r($_FILES);
        echo "</pre>";
        $reviewer_image_name = $_FILES['image']['name'];
        echo  $reviewer_image_name."Good<br>";
        $reviewer_image_tmp_name = $_FILES['image']['tmp_name'];
        echo $reviewer_image_tmp_name.'9090';
        $path_info = strtolower(pathinfo($reviewer_image_name, PATHINFO_EXTENSION));
        echo $path_info;
        $reviewer_image_name = time() . ".$path_info";
        $manuscript_pdf_file_type = $_FILES['image']['type'];
        // print_r($_FILES['manuscript_pdf']);

        echo "path_info".$path_info;
        $count_error = 0;
        $arr = array("jpg", "png", "jpeg");
        if (!in_array($path_info, $arr)) {
            $count_error++;
        }

        if ($count_error > 0) {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Error occurs</p>";
        } else {
            unlink('../Images/reviewer_images/' . $current_image);

            $update_sql = "UPDATE `reviewers` SET `reviewer_name`='$name',`reviewer_email`='$email',`designation`='$designation',`department`='$dept',`university`='$university',`division`='$division',`country`='$country',`expertise`='$expertise',`image`='$reviewer_image_name' WHERE reviewer_id='$id'  AND admin_approved='1'"; 

            // $update_sql = "UPDATE `reviewers` SET `reviewer_name`='$name',`speaker_university`='$university',`speaker_topic`='$topic',`speaker_email`='$email',`speaker_image`='$speaker_image_name' WHERE speaker_id='$id'";
            $run_insert_qry = mysqli_query($conn, $update_sql);
            if ($run_insert_qry) {
                move_uploaded_file($reviewer_image_tmp_name, '../Images/reviewer_images/' . $reviewer_image_name);
                echo "Run "; 
                header("location: show_all_reviewers.php");
                ob_end_flush();
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data is updated</p>";
            }
        }
    }
}
