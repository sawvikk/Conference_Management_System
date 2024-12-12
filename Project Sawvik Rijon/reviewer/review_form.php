<?php ob_start(); ?>
<?php require_once("../database/connection.php") ?>
<?php include("reviewer_header.php") ?>
<!-- Name	University	Topic	email	Image	Status -->

<?php 
    if(isset($_GET['paper_id'])){

        if (isset($_POST['submit_review'])) {
    extract($_POST);
    // echo $suitability_of_title."  ".$novelty_of_work."  ".$presentation."   ".$results_and_analysis."  ".$overall_evaluation."  ".$reviewer_confidence."  ".$confidential_remarks."  ";
    $reviewer_id = $_SESSION['reviewer_id'];
    $paper_id = $_GET['paper_id'];
    $update_sql = "UPDATE `review_table` SET `suitability_of_title`='$suitability_of_title',`novelty_of_work`='$novelty_of_work',`presentation`='$presentation',`results_and_analysis`='$results_and_analysis',`overall_evaluation`='$overall_evaluation',`reviewer_confidence`='$reviewer_confidence',`confidential_remarks`='$confidential_remarks',
    `review_status`='Reviewed' WHERE `reviewer_id`='$reviewer_id' AND `paper_id`='$paper_id'";
    // $update_sql = "UPDATE `reviewer_table` SET  `suitability_of_title`='$suitability_of_title' WHERE 1 ";
$run_insert_qry = mysqli_query($conn, $update_sql);


if ($run_insert_qry) {
    header("location: show_assigned_papers.php");
    ob_end_flush();
} else {
    echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data is updated</p>";
}

// if ($run_insert_qry) {header("location: index.php");
// // header("location: show_all_call_for_papers.php");
// ob_end_flush();
// ob_end_flush();
// echo "Good";
// } else {
// echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data is updated</p>";
// }
}
else{
    // echo "Submit button not clicked  ";
}
?>

<!--Code for adding new speakers-->
<div class="container-fluid text-dark mt-5 d-flex justify-content-center">
    <!-- <div class="row"> -->
    <div class="col-md-5 col-12">
        <h2 class="text-capitalize text-dark text-center">Review Form</h2>
        <h4>
        <?php 
            $sql = "SELECT * FROM  new_paper WHERE paper_id=".$_GET['paper_id'];
            $run_sql = mysqli_query($conn,$sql);
            if (mysqli_num_rows($run_sql) > 0) {
                $row = mysqli_fetch_assoc($run_sql);
                extract($row);
            }
            
            // echo "Paper Title : ".$paper_title."<br>Paper Keywords : ".$paper_keywords."<br>Track : ".$track."<br>Author's Name/s : ".$authors_name."<br>Author's Affiliation : ".$authors_affiliation;

        ?>
    <div class="container mt-4 text-dark">
    <table class="table table-bordered border-dark text-dark">
        <tr>
            <td>Paper Title</td>
            <td><?php echo $paper_title; ?></td>
        </tr>
        <tr>
            <td>Paper Keywords</td>
            <td><?php echo $paper_keywords; ?></td>
        </tr>
        <tr>
            <td>Track</td>
            <td><?php echo $track; ?></td>
        </tr>
        <tr>
            <td>Author's Name/s</td>
            <td><?php echo $authors_name; ?></td>
        </tr>
        <tr>
            <td>Author's Affiliation</td>
            <td><?php echo $authors_affiliation; ?></td>
        </tr>
    </table>
    </div>    
    
    </h4>
        <form action="" method="post" enctype="multipart/form-data" class="border border-1 border-primary bg-light p-3 rounded-3 my-3">
            <!-- <div class="card p-3 mb-5 shadow"> -->
            <div class="mt-3">
                <label for="suitability_of_title"><b>Suitability of the Title of the paper : </b><b class="text-danger">*</b>Please assess whether the title of the work goes fine with the contents of the paper</label><br>
                <input type="radio" id="sot_excellent" name="suitability_of_title" value="excellent" required>
                <label for="sot_excellent">excellent</label><br>
                <input type="radio" id="sot_good" name="suitability_of_title" value="good"   required>
                <label for="sot_good">good</label><br>
                <input type="radio" id="sot_fair" name="suitability_of_title" value="fair"   required>
                <label for="sot_fair">fair</label><br>
                <input type="radio" id="sot_poor" name="suitability_of_title" value="poor"   required>
                <label for="sot_poor">poor</label><br>
                <input type="radio" id="sot_very_poor" name="suitability_of_title" value="very_poor"   required>
                <label for="sot_very_poor">very poor</label><br><br>
            </div>
            <div class="mt-3">
                <label for="novelty_of_work"><b>Novelty of the work : </b><b class="text-danger">*</b>How do you score novelty of this work ?</label><br>
                <input type="radio" id="now_excellent" name="novelty_of_work" value="excellent" required>
                <label for="now_excellent">excellent</label><br>
                <input type="radio" id="now_good" name="novelty_of_work" value="good" required>
                <label for="now_good">good</label><br>
                <input type="radio" id="now_fair" name="novelty_of_work" value="fair" required>
                <label for="now_fair">fair</label><br>
                <input type="radio" id="now_poor" name="novelty_of_work" value="poor" required>
                <label for="now_poor">poor</label><br>
                <input type="radio" id="now_very_poor" name="novelty_of_work" value="very_poor" required>
                <label for="now_very_poor">very poor</label><br><br>
            </div>
            


            <div class="mt-3">
                <label for="presentation"><b>Presentation : </b><b class="text-danger">*</b>How do you score novelty of this work ?</label><br>
                <input type="radio" id="p_excellent" name="presentation" value="excellent" required>
                <label for="p_excellent">excellent</label><br>
                <input type="radio" id="p_good" name="presentation" value="good" required>
                <label for="p_good">good</label><br>
                <input type="radio" id="p_fair" name="presentation" value="fair" required>
                <label for="p_fair">fair</label><br>
                <input type="radio" id="p_poor" name="presentation" value="poor" required>
                <label for="p_poor">poor</label><br>
                <input type="radio" id="p_very_poor" name="presentation" value="very_poor" required>
                <label for="p_very_poor">very poor</label><br><br>
            </div>

            <div class="mt-3">
                <label for="results_and_analysis"><b>Result and Analysis : </b><b class="text-danger">*</b>At what extent have they carried out sufficient performance evaluation and presented the results to support the list the contributions ?</label><br>
                <input type="radio" id="ra_excellent" name="results_and_analysis" value="excellent" required>
                <label for="ra_excellent">excellent</label><br>
                <input type="radio" id="ra_good" name="results_and_analysis" value="good" required>
                <label for="ra_good">good</label><br>
                <input type="radio" id="ra_fair" name="results_and_analysis" value="fair" required>
                <label for="ra_fair">fair</label><br>
                <input type="radio" id="ra_poor" name="results_and_analysis" value="poor" required>
                <label for="ra_poor">poor</label><br>
                <input type="radio" id="ra_very_poor" name="results_and_analysis" value="very_poor" required>
                <label for="ra_very_poor">very poor</label><br><br>
            </div>
            
            <div class="mt-3">
                <label for="overall_evaluation"><b>Overall Evaluation : </b><b class="text-danger">*</b>Please provide a detailed review for your scores.</label><br>
                
                <input type="radio" id="strong_accept" name="overall_evaluation" value="strong_accept" required>
                <label for="strong_accept">strong accept</label><br>
                <input type="radio" id="accept" name="overall_evaluation" value="accept" required>
                <label for="accept">accept</label><br>
                <input type="radio" id="weak_accept" name="overall_evaluation" value="weak_accept" required>
                <label for="weak_accept">weak accept</label><br>
                <input type="radio" id="borderline_paper" name="overall_evaluation" value="borderline_paper" required>
                <label for="borderline_paper">borderline paper</label><br>
                <input type="radio" id="weak_reject" name="overall_evaluation" value="weak_reject" required>
                <label for="weak_reject">weak reject</label><br>   
                <input type="radio" id="reject" name="overall_evaluation" value="reject" required>
                <label for="reject">reject</label><br>
                <input type="radio" id="strong_reject" name="overall_evaluation" value="strong_reject" required>
                <label for="strong_reject">strong reject</label><br>
                </div>
                <div class="mt-3">
                    <label for="reviewer_confidence"><b>Reviewer's Confidence : </b><b class="text-danger">*</b>Reviewer's confidence</label><br>

                    <input type="radio" id="expert" name="reviewer_confidence" value="expert" required>
                    <label for="expert">expert</label><br>

                    <input type="radio" id="high" name="reviewer_confidence" value="high" required>
                    <label for="high">high</label><br>

                    <input type="radio" id="medium" name="reviewer_confidence" value="medium" required>
                    <label for="medium">medium</label><br>

                    <input type="radio" id="low" name="reviewer_confidence" value="low" required>
                    <label for="low">low</label><br>

                    <input type="radio" id="none" name="reviewer_confidence" value="none" required>
                    <label for="none">none </label><br><br>
                </div>

                <div class="mt-3">
                    <label for="confidencial_remarks"><b>Confidential Remarks for the program committee : </b><b class="text-danger">*</b>If you want to add any remarks intended only for PC members please write them below.</label><br>

                    <input type="textarea" id="confidential_remarks" name="confidential_remarks" required>
                </div>         


            <div class="d-flex justify-content-center mt-3">
                <input type="submit" name="submit_review" value="Submit Review" class="btn btn-primary mx-auto">
            </div>
            <!-- </div> -->
        </form>
    </div>
</div>
<?php 
}
else{
    echo "Invalid Paper";
}
?>
<?php include_once("reviewer_footer.php") ?>
