<?php ob_start(); ?>
<?php require_once("../database/connection.php") ?>
<?php include("admin_header.php") ?>
<?php 
    if(isset($_GET['paper_id'])){
        if(isset($_GET['reviewer_id'])){
            $paper_id=$_GET['paper_id'];
            $reviewer_id=$_GET['reviewer_id'];
            $sql = "SELECT * FROM review_table WHERE paper_id=".$paper_id." AND reviewer_id=".$reviewer_id;
            $run_sql = mysqli_query($conn,$sql);
            if (mysqli_num_rows($run_sql) > 0) {
                $row = mysqli_fetch_assoc($run_sql);
                extract($row);
            }
        }
?>

<div class="container-fluid  my-5 d-flex justify-content-center">
    <!-- <div class="row"> -->
    <div class="col-md-8 col-12">
        <h2 class="text-capitalize text-center text-dark">Review Form</h2>
        <h4>
        <?php 
            $sql = "SELECT * FROM  new_paper WHERE paper_id=".$_GET['paper_id'];
            $run_sql = mysqli_query($conn,$sql);
            if (mysqli_num_rows($run_sql) > 0) {
                $row = mysqli_fetch_assoc($run_sql);
                extract($row);
                $assoc_arr = array("excellent"=> "Excellent","good"=>"Good","fair"=>"Fair","poor"=>"Poor","very_poor"=>"Very poor","strong_accept"=>"Strong accept","accept"=>"Accept","weak_accept"=>"Weak accept","borderline_paper"=>"Borderline paper","weak_reject"=>"Weak reject","reject"=>"Reject","strong_reject"=>"Strong reject","expert"=>"Expert","high"=>"High","medium"=>"Medium","low"=>"Low","none"=>"None");
            }
            
            // echo "Paper Title : ".$paper_title."<br>Paper Keywords : ".$paper_keywords."<br>Track : ".$track."<br>Author's Name/s : ".$authors_name."<br>Author's Affiliation : ".$authors_affiliation;
?>
    <div class="container mt-4 text-dark">
        <table class="table table-bordered border-dark text-dark table-responsive">
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
    <br><br>

            <!-- echo '<table border="5 ">';
            echo '<tr><td>Paper Title</td><td>'.$paper_title.'</td></tr>';
            echo '<tr><td>Paper Keywords</td><td>'.$paper_keywords.'</td></tr>';
            echo '<tr><td>Track</td><td>'.$track.'</td></tr>';
            echo '<tr><td>Author\'s Name/s</td><td>'.$authors_name.'</td></tr>';
            echo '<tr><td>Author\'s Affiliation</td><td>'.$authors_affiliation.'</td></tr>';
            echo '</table>'; -->

        </h4>
        <form action="" method="post" enctype="multipart/form-data" class="border border-1 border-primary bg-light p-3 rounded-3">
            <!-- <div class="card p-3 mb-5 shadow"> -->
            <div class="mt-3 text-">
                <h4 for="suitability_of_title"><b>Suitability of the Title of the paper : </b> &nbsp; &nbsp; <?php echo $assoc_arr[$suitability_of_title]; ?><br><br></h4>
            </div>
            <div class="mt-3">
                <h4 for="novelty_of_work"><b>Novelty of the work : </b> &nbsp; &nbsp; <?php echo $assoc_arr[$novelty_of_work]; ?><br><br></h4>
            </div>
            <div class="mt-3">
                <h4 for="presentation"><b>Presentation : </b>&nbsp; &nbsp; <?php echo $assoc_arr[$presentation]; ?><br><br></h4>
            </div>

            <div class="mt-3">
                <h4 for="results_and_analysis"><b>Result and Analysis : </b> <?php echo $assoc_arr[$results_and_analysis]; ?><br><br></h4>
            </div>
            
            <div class="mt-3">
                <h4 for="overall_evaluation"><b>Overall Evaluation : </b><?php echo $assoc_arr[$overall_evaluation]; ?><br><br></h4>
            </div>
            <div class="mt-3">
                <h4 for="reviewer_confidence"><b>Reviewer's Confidence : </b><?php echo $assoc_arr[$reviewer_confidence]; ?><br><br></h4>
            </div>

                <div class="mt-3">
                    <h4 for="confidencial_remarks"><b>Confidential Remarks for the program committee : </b><?php echo $confidential_remarks; ?><br><br></h4>
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
<?php include_once("admin_footer.php") ?>
