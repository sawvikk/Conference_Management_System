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
    <h3 class="text-center text-dark fw-bold">Assigned Papers to </h3>
    <?php 
    
    $sql = "SELECT * FROM `reviewers`  WHERE `reviewer_id`='$reviewer_id' AND admin_approved='1';"; 
    $query = mysqli_query($conn, $sql);
    if($query){
        ?>
    <h3 class="text-center text-dark fw-bold">Reviewer : <span class="text-primary"><?php 
    $row = mysqli_fetch_assoc($query);
    extract($row); 

    echo $reviewer_name; 
    
    ?></span></h3>
        <?php 
    }

    
    ?>
    <div class="col">
            <div class="card pt-5 pb-4 shadow mb-5 px-md-5 px-3 bg-body rounded">
                <div class="table-responsive">
                    <table id="table" class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th>Serial No</th>
                                <th>Paper Title</th>
                                <th>Paper Keywords</th>
                                <th>Track</th>
                                <th>Authors</th>
                                <th>File</th>
                                <th>Submission Date</th>
                                <th>Paper Status</th>
                                <th>Review Status</th>
                                <th>Further Review</th>
                                <th>Show Review</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // select paper information
                            // echo $reviewer_id."<br>";
                            $select_from_new_paper = "SELECT new_paper.*, review_status, further_review
                            FROM new_paper
                            JOIN review_table ON new_paper.paper_id = review_table.paper_id
                            WHERE review_table.reviewer_id = $reviewer_id;";
                            $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                            $serial_no = 1;
                            if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                                while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                                    extract($row);
                            ?>
                                    <tr>
                                        
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
                                        ?><td><?php echo $review_status; ?></td>
                                        <td><?php
                                        
                                        $fr=array('possible'=>'Possible','impossible'=>'Impossible');

                                        echo $fr[$further_review]; ?></td>
                                        <td>
                                        <?php 
                                            $selectStatus = "SELECT review_status FROM review_table WHERE reviewer_id='$reviewer_id' AND paper_id='$paper_id'";
                                            $run_selectStatus = mysqli_query($conn,$selectStatus);
                                            if (mysqli_num_rows($run_selectStatus) > 0) {
                                            $rowStatus = mysqli_fetch_array($run_selectStatus);
                                                extract($rowStatus);
                                                if($review_status == "Assigned"){
                                                    ?>
                                            <a href="#" class="btn btn-secondary" >Not Reviewed Yet</a>

                                                    <?php
                                                }
                                                else{
                                        ?>
                                        <a href="show_review.php?reviewer_id=<?php echo $reviewer_id ?>&&paper_id=<?php echo $paper_id; ?>" class="btn btn-primary" >Show Review</a>
                                        <?php
                                                }
                                            }
                                            else{
                                                ?>
                                        <a href="#" class="btn btn-primary" >No review</a>
                                        <?php
                                            }
                                            ?>
                                            
                                        </td>
                                        <!-- <td>
                                            <a href="assign_reviewer_table.php?paper_id=<?php echo $paper_id ?>" class="btn btn-primary" onclick="return confirmAssign()">Assign</a>
                                        </td> -->
                                    </tr>
                            <?php
                                    $serial_no++;
                                }
                            }
                            ?>
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
    </div>
</div>
<?php 
}
else{

    echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No reviewer selected </p>";

}

?>
<?php include_once("admin_footer.php") ?>