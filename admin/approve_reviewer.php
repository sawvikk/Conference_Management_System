<?php include("admin_header.php") ?>
<?php require_once("../database/connection.php") ?>
<!-- Name	University	Topic	email	Image	Status -->
<?php 
if (isset($_GET['reviewer_id'])) {
    $id = $_GET['reviewer_id'];
    echo $id; 
    $update_sql = "UPDATE `reviewers` SET `admin_approved`='1' WHERE `reviewer_id`=$id";
    $run_insert_qry = mysqli_query($conn, $update_sql);
    if($run_insert_qry){
        header("location: manage_pending_reviewers.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No reviewer is approved</p>";
    }
}
?>
<?php include_once("admin_footer.php") ?>