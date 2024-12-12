<?php ob_start(); ?>
<?php require_once("../database/connection.php") ?>
<?php include("admin_header.php") ?>
<?php
if (isset($_POST['edit_date'])) {
    extract($_POST);
    // print_r($_POST);
    // print_r($_FILES);
    $update_sql = "UPDATE `important_dates` SET `topic`='$topic',`date`='$date' WHERE id='$id'";
    $run_insert_qry = mysqli_query($conn, $update_sql);
    if ($run_insert_qry) {
        header("location: show_all_dates.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data is updated</p>";
    }
}
