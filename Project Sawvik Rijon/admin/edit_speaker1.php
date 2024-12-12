<?php include("admin_header.php") ?>
<?php require_once("../database/connection.php") ?>
<!-- Name	University	Topic	email	Image	Status -->
<?php
if (isset($_GET['speaker_id'])) {
    $id = $_GET['speaker_id'];
    // select paper information
    $select_from_new_paper = "SELECT * FROM speakers WHERE speaker_id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    // $serial_no = 1;
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
?>
        <!--Code for adding new speakers-->
        
        
<div class="container-fluid  my-5 d-flex justify-content-center">
<div class="col-lg-6 col-md-12 col-12 bg-white p-5 border border-primary border-2 rounded ">
<h2 class="text-capitalize text-center text-primary bg-error">Edit Speaker Details</h2>
<form action="update_speaker.php" method="post" enctype="multipart/form-data">
    <div class="p-3 my-3 rounded" style="background:#eaf0ff5b; ">
        <div class="row">
            <div class="mt-3 col-md-6">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="<?php echo $speaker_name; ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            </div>
            <div class="mt-3 col-md-6">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo $speaker_email; ?>">
            </div>
        </div>
        <div class="row">
            <div class="mt-3 col-md-6">
                <label for="university">University</label>
                <input type="text" name="university" id="university" class="form-control" value="<?php echo $speaker_university; ?>" >
            </div>
            <div class="mt-3 col-md-6">
                <label for="topic">Topic</label>
                <input type="text" name="topic" id="topic" class="form-control" value="<?php echo $speaker_topic; ?>"  >
            </div>
        </div>
        <div class="row">
            <div class="mt-3">
                <label>Previous Image</label><br>
                <img src="../Images/speaker_images/<?php echo $speaker_image ?>" width="50px" alt="speaker_image">
                <input type="hidden" name="current_image" value="<?php echo $speaker_image; ?>" />
            </div>
            <div class="mt-3">
                <label for="image">New Image</label>
                <input type="file" name="image" id="image" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class=" d-flex justify-content-center mt-3 col-md-6">
                <input type="submit" name="edit_speaker" value="Edit" class="btn btn-primary">
            </div>
        </div>

    </div>
            
</form>

</div>
</div>
   
        
        
        <!-- <div class="container-fluid  mt-5 d-flex justify-content-center">
            //<div class="row"> 
            <div class="col-md-8 col-12">
                <h2 class="text-capitalize text-center text-primary">Edit Speaker Details</h2>
                <form action="update_speaker.php" method="post" enctype="multipart/form-data">
                    // <div class="card p-3 mb-5 shadow"> 
                    <div class="mt-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $speaker_name; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    </div>
                    <div class="mt-3">
                        <label for="university">University</label>
                        <input type="text" name="university" id="university" class="form-control" value="<?php echo $speaker_university; ?>">
                    </div>
                    <div class="mt-3">
                        <label for="topic">Topic</label>
                        <input type="text" name="topic" id="topic" class="form-control" value="<?php echo $speaker_topic; ?>">
                    </div>
                    <div class="mt-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?php echo $speaker_email; ?>">
                    </div>
                    <div class="mt-3">
                        <label>Previous Image</label><br>
                        <img src="../Images/speaker_images/<?php echo $speaker_image ?>" width="50px" alt="speaker_image">
                        <input type="hidden" name="current_image" value="<?php echo $speaker_image; ?>" />
                    </div>
                    <div class="mt-3">
                        <label for="image">New Image</label>
                        <input type="file" name="image" id="image" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <input type="submit" name="edit_speaker" value="Edit" class="btn btn-primary">
                    </div>
                    // </div>
                </form>
            </div>
        </div> -->
<?php
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data found</p>";
    }
}
?>
<?php include_once("admin_footer.php") ?>