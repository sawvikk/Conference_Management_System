<?php ob_start(); ?>
<?php require_once("../database/connection.php") ?>
<?php include("admin_header.php") ?>
<?php
if (isset($_GET['id'], $_GET['image1'], $_GET['image2'], $_GET['pdf_file'], $_GET['doc_file'])) {
    $id = $_GET['id'];
    $image1 = $_GET['image1'];
    $image2 = $_GET['image2'];
    $pdf_file = $_GET['pdf_file'];
    $doc_file = $_GET['doc_file'];
    $deleteData = "DELETE FROM call_for_paper WHERE `id` = '$id'";
    $result = mysqli_query($conn, $deleteData);
    if ($result) {
        unlink('../Images/call_for_paper/' . $image1);
        unlink('../Images/call_for_paper/' . $image2);
        unlink('../Files/call_for_paper/' . $pdf_file);
        unlink('../Files/call_for_paper/' . $doc_file);
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Deleted successfully</p>";
        header("Location: show_all_call_for_papers.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Not Deleted</p>";
    }
}
?>
<?php include("admin_footer.php") ?>