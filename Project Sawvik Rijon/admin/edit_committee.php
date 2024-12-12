<?php include("admin_header.php") ?>
<?php require_once("../database/connection.php") ?>
<!-- Name	University	Topic	email	Image	Status -->
<?php
if (isset($_GET['committee_id'])) {
    $id = $_GET['committee_id'];
    // select paper information
    $select_from_new_paper = "SELECT * FROM committee WHERE committee_id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    // $serial_no = 1;
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
?>
        <!--Code for adding new committee-->
        <div class="container-fluid  mt-5 d-flex justify-content-center">
            <!-- <div class="row"> -->
            <div class="col-md-3 p-4 border border-primary border-2 rounded col-12">
                <h2 class="text-capitalize text-center">Edit committee Details</h2>
                <form action="update_committee.php" method="post" enctype="multipart/form-data">
                    <!-- <div class="card p-3 mb-5 shadow"> -->
                    <div class="mt-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $committee_name; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    </div>
                    <div class="mt-3">
                        <label for="university">University</label>
                        <input type="text" name="university" id="university" class="form-control" value="<?php echo $committee_university; ?>">
                    </div>
                    <div class="mt-3">
                        <label for="post">Post</label>
                        <input type="text" name="post" id="post" class="form-control" value="<?php echo $committee_topic; ?>">
                    </div>
                    <div class="mt-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?php echo $committee_email; ?>">
                    </div>
                    <div class="mt-3">
                        <label>Previous Image</label><br>
                        <img src="../Images/committee_images/<?php echo $committee_image ?>" width="50px" alt="committee_image">
                        <input type="hidden" name="current_image" value="<?php echo $committee_image; ?>" />
                    </div>
                    <div class="my-3">
                        <label for="image">New Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <select name="committee_status" id="committee_status" class="form-control">
                        <option value="0" <?php if(isset($committee_status) && $committee_status==="0"){
                            echo "selected";
                        } ?>>Local</option>
                        <option value="1" <?php if(isset($committee_status) && $committee_status==="1"){
                            echo "selected";
                        } ?>>International</option>
                    </select>
                    <div class=" d-flex justify-content-center mt-3">
                        <input type="submit" name="edit_committee" value="Edit" class="btn btn-primary">
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