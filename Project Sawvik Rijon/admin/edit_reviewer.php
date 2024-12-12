<?php include("admin_header.php") ?>
<?php require_once("../database/connection.php") ?>
<!-- Name	University	Topic	email	Image	Status -->
<?php 
if (isset($_GET['reviewer_id'])) {
    $id = $_GET['reviewer_id'];
    // echo "Sawvik  ".$id; 
    // select paper information
    $select_from_new_paper = "SELECT * FROM reviewers WHERE reviewer_id=$id AND admin_approved='1'";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    // $serial_no = 1;
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
?>
        <div class="container-fluid  my-5 d-flex justify-content-center">
    <!-- <div class="row"> -->
    <div class="col-lg-6 col-md-12 col-12 bg-white p-5 border border-primary border-2 rounded ">
        <h2 class="text-capitalize text-center">Edit Reviewer Details</h2>
        <form action="update_reviewer.php" method="post" enctype="multipart/form-data">
            <!-- <div class="card p-3 mb-5 shadow"> -->
            
            <div class="p-3 my-3 rounded" style="background:#eaf0ff5b; ">
            <h4 class="text-capitalize text-center "><u>Personal Information</u></h4>
            <div class="row">
            <div class="mt-3 col-md-6">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="<?php echo $reviewer_name ; ?>" >
                <input type="hidden" name="id" value="<?php echo $id; ?>" />

            </div>
            <div class="mt-3 col-md-6">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" value="<?php echo $reviewer_email ; ?>">
            </div>
            </div>
            </div>
            <div>
            <div class="p-3 my-3 rounded" style="background:#eaf0ff5b; ">
            <h4 class="text-capitalize text-center "><u>Affiliation</u></h4>
            <div class="row">

            <div class="mt-3 col-md-6">
                <label for="designation">Designation:</label>
                <select class="form-select" id="designation" name="designation">
                    <option value="Choose designation" <?php echo ($designation == "Choose designation") ? "selected" : ""; ?> disabled>Choose Designation</option>
                    <option value="professor" <?php echo ($designation == "professor") ? "selected" : ""; ?> >Professor</option>
                    <option value="associateProfessor" <?php echo ($designation == "associateProfessor") ? "selected" : ""; ?>>Associate Professor</option>
                    <option value="assistantProfessor" <?php echo ($designation == "assistantProfessor") ? "selected" : ""; ?>>Assistant Professor</option>
                    <option value="lecturer" <?php echo ($designation == "lecturer") ? "selected" : ""; ?>>Lecturer</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div class="mt-3 col-md-6">
                <label for="dept">Department/Office</label>
                <input type="text" name="dept" id="dept" class="form-control" placeholder="Department/Office" value="<?php echo $department ; ?>">
            </div>
            </div>
            <div class="row">
            <div class="mt-3 col-md-12">
                <label for="university">University/Organization</label>
                <input type="text" name="university"  placeholder="University/Organization" id="university" class="form-control" value="<?php echo $university ; ?>">
            </div>
            </div>
            <div class="row">
            <div class="mt-3 col-md-6">
                <label for="division">Division/State</label>
                <input type="text" name="division" placeholder="Division/State"  id="division" class="form-control" value="<?php echo $division ; ?>" >
            </div>
            <div class="mt-3 col-md-6">
                <label for="country">Country</label>
                <input type="text" name="country" id="country" class="form-control" placeholder="Country" value="<?php echo $country ; ?>" >
            </div>
            </div>
            </div>
            <div class="p-3 my-3 rounded" style="background:#eaf0ff5b; ">
            <h4 class="text-capitalize text-center "><u>Expertise & Image</u></h4>
            <div class="mt-3">
                <label for="expertise">Area of expertise : <b>  <i class="text-danger">(Please Separate by ",")</i></b></label>
                <input type="text" name="expertise" id="expertise" class="form-control" placeholder="Area of Expertise" value="<?php echo $expertise ; ?>" >
            </div>

            <div class="mt-3">
                <label>Previous Image</label><br>
                <img src="../Images/reviewer_images/<?php echo $image ?>" width="50px" alt="reviewer_image">
                <input type="hidden" name="current_image" value="<?php echo $image; ?>" />
            </div>
            <div class="mt-3">
                <label for="image">New Image</label>
                <input type="file" name="image" id="image" class="form-control" required>
            </div>
            </div>
            
            <div class=" d-flex justify-content-center mt-3">
                <input type="submit" name="edit_reviewer" value="Save Information" class="btn btn-primary">
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