<?php ob_start(); ?>
<?php require_once("../database/connection.php") ?>
<?php include("admin_header.php") ?>
<!-- Name	University	Topic	email	Image	Status -->
<?php
if (isset($_POST['add_dates'])) {
    extract($_POST);
    // echo "<pre>";
    // print_r($_POST);
    // print_r($_FILES);

    $insert_sql = "INSERT INTO `important_dates`(`topic`,`date`) VALUES('$topic','$date')";
    $run_insert_qry = mysqli_query($conn, $insert_sql);
    if ($run_insert_qry) {
        header("location: show_all_dates.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data is inserted</p>";
    }
}
?>
<!--Code for adding new speakers-->
<div class="container-fluid  mt-5 d-flex justify-content-center">
    <!-- <div class="row"> -->
    <div class="col-md-3 p-4 border border-primary border-2 rounded  col-12 bg-white">
        <h2 class="text-capitalize text-center">Add Important Date</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mt-3">
                <label for="topic">Topic</label>
                <input type="text" name="topic" id="topic" class="form-control" required>
            </div>
            <div class="mt-3">
                <label for="date">Date</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>
            <div class=" d-flex justify-content-center mt-3">
                <input type="submit" name="add_dates" value="Add" class="btn btn-primary">
            </div>
            <!-- </div> -->
        </form>
    </div>
</div>

<?php include("admin_footer.php") ?>