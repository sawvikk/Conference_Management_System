<?php ob_start(); ?>
<?php require_once("../database/connection.php") ?>
<?php include("admin_header.php") ?>
<?php

echo "SAWSAW"; 
if (isset($_GET['id'], $_GET['image'])) {
    // echo $id; 
    $id = $_GET['id'];
    $image = $_GET['image'];
    $deleteData = "DELETE FROM reviewers WHERE reviewer_id = $id  AND admin_approved='1'";
    $result = mysqli_query($conn, $deleteData);
    if ($result) {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Deleted successfully</p>";
        unlink('../Images/reviewer_images/' . $image);
        header("Location: show_all_reviewers.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Not Deleted</p>";
    }
}
?>
<?php include("admin_footer.php") ?>