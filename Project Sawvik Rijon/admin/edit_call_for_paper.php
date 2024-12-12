<?php require_once("../database/connection.php") ?>
<?php include("admin_header.php") ?>
<!-- Name	University	Topic	email	Image	Status -->
<?php
if (isset($_GET['call_for_paper_id'])) {
    $id = $_GET['call_for_paper_id'];
    // select paper information
    $select_from_new_paper = "SELECT * FROM call_for_paper WHERE id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    // $serial_no = 1;
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
?>
        <!--Code for adding new speakers-->
        <div class="container-fluid  m-5 d-flex justify-content-center">
            <!-- <div class="row"> -->
            <div class="col-md-3 p-4 border border-primary border-2 rounded  col-12 bg-white">
                <h2 class="text-capitalize text-center">Edit Call For Paper Details</h2>
                <form action="update_call_for_paper.php" method="post" enctype="multipart/form-data">
                    <!-- <div class="card p-3 mb-5 shadow"> -->
                    <div class="mt-3">
                        <label>Previous Image-1</label><br>
                        <img src="../Images/call_for_paper/<?php echo $image1 ?>" width="50px" alt="image1">
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <input type="hidden" name="current_image1" value="<?php echo $image1; ?>" />
                    </div>
                    <div class="mt-3">
                        <label for="image1">New Image-1</label>
                        <input type="file" name="image1" id="image1" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label>Previous Image-2</label><br>
                        <img src="../Images/call_for_paper/<?php echo $image2 ?>" width="50px" alt="image2">
                        <input type="hidden" name="current_image2" value="<?php echo $image2; ?>" />
                    </div>
                    <div class="mt-3">
                        <label for="image2">New Image-2</label>
                        <input type="file" name="image2" id="image2" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label>Previous PDF File</label><br>
                        <a href="../Files/call_for_paper/<?php echo $pdf_file ?>"><?php echo $pdf_file ?></a>
                        <input type="hidden" name="current_pdf_file" value="<?php echo $pdf_file; ?>" />
                    </div>
                    <div class="mt-3">
                        <label for="pdf_file">New PDF File</label>
                        <input type="file" name="pdf_file" id="pdf_file" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label>Previous DOC File</label><br>
                        <a href="../Files/call_for_paper/<?php echo $doc_file ?>"><?php echo $doc_file ?></a>
                        <input type="hidden" name="current_doc_file" value="<?php echo $doc_file; ?>" />
                    </div>
                    <div class="mt-3">
                        <label for="doc_file">New DOC File</label>
                        <input type="file" name="doc_file" id="doc_file" class="form-control">
                    </div>

                    <div class=" d-flex justify-content-center mt-3">
                        <input type="submit" name="edit_call_for_paper" value="Edit" class="btn btn-primary">
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