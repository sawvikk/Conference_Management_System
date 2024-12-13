<!--Need to add sort by track,date and submission status-->

<?php ob_start(); ?>
<?php require_once("../database/connection.php") ?>
<?php include("admin_header.php") ?>
<?php
if (isset($_GET['reviewer_id'])) {
    $reviewer_id = $_GET['reviewer_id'];
    // echo "Reviewer ".$reviewer_id;
?>

 
<div class="container-fluid mt-5">
    <h3 class="text-center text-dark fw-bold">Select Papers for Assignment</h3>
    <?php 
    
    $sql = "SELECT * FROM `reviewers`  WHERE `reviewer_id`='$reviewer_id'  AND admin_approved='1';"; 
    $query = mysqli_query($conn, $sql);
    if($query){
        ?>
    <h3 class="text-center text-dark fw-bold">Reviewer : <?php 
    $row = mysqli_fetch_assoc($query);
    extract($row); 

    echo $reviewer_name; 
    
    ?></h3>
        <?php 
    }

    
    ?>
    <div class="col">
        <form action="assign_multiple_papers.php" method="post" enctype="multipart/form-data" class="border border-1 border-primary bg-light p-3 rounded-3 my-3">
            <div class="card pt-5 pb-4 shadow mb-5 px-md-5 px-3 bg-body rounded">
                <div class="table-responsive">
                    <table id="table" class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Serial No</th>
                                <th>Paper Title</th>
                                <th>Paper Keywords</th>
                                <th>Track</th>
                                <th>Authors</th>
                                <th>File</th>
                                <th>Submission Date</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // select paper information
                            $select_from_new_paper = "SELECT np.*
                            FROM new_paper np
                            LEFT JOIN review_table rt ON np.paper_id = rt.paper_id AND rt.reviewer_id = $reviewer_id
                            WHERE rt.reviewer_id IS NULL;
                            ";
                            $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                            $serial_no = 1;
                            if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                                while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                                    extract($row);
                            ?>
                                    <tr>
                                        <td>
                                            <input type="hidden" name="reviewerID" value="<?php echo $_GET['reviewer_id']; ?>" required>
                                            <input type="checkbox" name="selectedPapers[]" value="<?php echo $paper_id?>"></td>
                                        <td><?php echo $serial_no."   "; ?></td>
                                        <td><?php echo $paper_title ?></td>
                                        <td><?php echo $paper_keywords ?></td>
                                        <td><?php echo $track ?></td>
                                        <td><?php echo $authors_name ?></td>
                                        <td><a href="../author/document_for_manuscript/<?php echo $manuscript_pdf ?>"><?php echo $manuscript_pdf; ?></a></td>
                                        <td><?php echo date('d-M-Y', strtotime($timestamps)) ?></td>
                                        <?php
                                        if ($row['paper_status'] == 1) {
                                            if ($row['count'] == 1) {
                                        ?>
                                                <td class="text-secondary fw-bold"><?php echo "New Submission" ?></td>
                                            <?php
                                            } else {
                                            ?>
                                                <td class="text-secondary fw-bold"><?php echo "Re-Submission" ?></td>
                                        <?php
                                            }
                                        }
                                        ?>
                                        <!-- <td>
                                            <a href="assign_reviewer_table.php?paper_id=<?php echo $paper_id ?>" class="btn btn-primary" onclick="return confirmAssign()">Assign</a>
                                        </td> -->
                                    </tr>
                            <?php
                                    $serial_no++;
                                }
                            }else{
    echo "<p class='text-dark text-bold text-center fs-5 mt-3'>All Papers have been assigned to $reviewer_name. </p>";
 }                           ?>
                        </tbody>
                    </table>
                </div>
                <script>
                    function confirmSubmission() {
                        return confirm(" Are you sure you want to confirm your submission?");
                    }

                    function confirmAssign() {
                        return confirm(" Are you sure you want to assign this ?");
                    }
                </script>
            </div> 
            <div class="d-flex justify-content-center mt-3">
                <input type="submit" name="assign_papers" value="Assign Papers" class="btn btn-primary mx-auto">
            </div>
        </form>
    </div>
</div>
<?php 
}
else{

    echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No reviewer selected </p>";

}

?>
<?php include_once("admin_footer.php") ?>