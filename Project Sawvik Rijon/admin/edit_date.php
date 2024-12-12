<?php require_once("../database/connection.php") ?>
<?php include("admin_header.php") ?>
<!-- Name	University	Topic	email	Image	Status -->
<?php
if (isset($_GET['date_id'])) {
    $id = $_GET['date_id'];
    // select paper information
    $select_from_new_paper = "SELECT * FROM important_dates WHERE id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    // $serial_no = 1;
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
?>
        <!--Code for adding new committee-->
        <div class="container-fluid  mt-5 d-flex justify-content-center">
            <!-- <div class="row"> -->
            <div class="col-md-3 p-4 border border-primary border-2 rounded  col-12 bg-white">
                <h2 class="text-capitalize text-center">Edit Important Dates</h2>
                <form action="update_date.php" method="post" enctype="multipart/form-data">
                    <!-- <div class="card p-3 mb-5 shadow"> -->
                    <div class="mt-3">
                        <label for="topic">Topic</label>
                        <input type="text" name="topic" id="topic" class="form-control" value="<?php echo $topic; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    </div>
                    <div class="mt-3">
                        <label for="date">Date</label>
                        <input type="date" name="date" id="date" class="form-control" value="<?php echo $date; ?>">
                    </div>
                    <div class=" d-flex justify-content-center mt-3">
                        <input type="submit" name="edit_date" value="Edit" class="btn btn-primary">
                    </div>
                    <!-- </div> -->
                </form>
            </div>
        </div>
<?php
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data found</p>";
    }
}
?>
<?php include_once("admin_footer.php") ?>