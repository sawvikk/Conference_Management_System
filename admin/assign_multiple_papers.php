
<?php ob_start(); ?>
<?php require_once("../database/connection.php") ?>
<?php include("admin_header.php") ?>
<?php include('../mail_sending2.php') ?>

<?php 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if selectedPapers is set in the POST data
    if (isset($_POST['selectedPapers']) && is_array($_POST['selectedPapers'])) {
        // Sanitize and process the selected rolls
        $selectedPapers = array_map('intval', $_POST['selectedPapers']);
        
    if (isset($_POST['reviewerID'])) {
        $reviewer_id = $_POST['reviewerID'];
        echo "Reviewer ".$reviewer_id;
        echo "Selected Papers: " . implode(', ', $selectedPapers);
        echo "<br><br>";
        $sql = "SELECT * FROM `reviewers`  WHERE `reviewer_id`='$reviewer_id' AND admin_approved='1';";
        $query = mysqli_query($conn, $sql);
        if($query){
        $row = mysqli_fetch_assoc($query);
        extract($row); 
        
        // 
        $receiver = $reviewer_email;
        $subject = "Review Invitation";
         
        $body = '<p>Dear '.$reviewer_name.',<br>I hope you are doing well! We would love to have your expertise in reviewing some papers . Here are the papers assigned to you:</p>
        <h3>Paper Title</h3><ol>';
        // // $body1 = "<p>Dear".$reviewer_name",<br> I hope you're doing well! We'd love to have your expertise in reviewing some papers . Here are the papers assigned to you:</p>";
        $serial =1;
        foreach($selectedPapers as $paper_id){
            echo ""; 
            $serial+=1;
            $sql2 = "SELECT * FROM new_paper WHERE  `paper_id`=$paper_id"; 
            $query2 = mysqli_query($conn,$sql2); 
            if($query2){
                $row2 = mysqli_fetch_assoc($query2); 
                extract($row2);

                $body.="<li>$paper_title </li>";
        
        }}
        $body.='</ol><p>Our admin believes your insights will be invaluable for these papers. To review them, please log in to your account on our <a href="http://localhost/Project/reviewer/login.php">website</a> . You will find all the details needed for the review process there.
        <br>
        Your feedback is crucial for the success of our research, and we appreciate your contribution. If you have any questions, feel free to reach out to our support team at [Your Support Email].
        
        Thanks a bunch!
        
        Best Regards,<br/>
                    Professor Dr. Tushar Kanti Saha,<br/>
                    Convener,<br/>
                    ICTBJ-2023 Organizing Committee <br/>
                    Trishal, Mymensingh, Bangladesh <br/>
                    E-Mail: <a href="ictbj@.com">ictbj@.com</a> <br/>
                    Tel. +8801711028510 (WhatsApp)</p>';

        $send_mail = send_mail($receiver, $subject, $body);
        echo ($receiver . " " . " " . $subject . " " . $body);
        }
    $numberOfSubmission=0;
    $assigned_date = date('Y-m-d');
    $deadline = date('Y-m-d', strtotime($assigned_date . '+10 days'));
    foreach($selectedPapers as $paper_id){
    // echo "POPO".$paper_id."  <br>";
    $insert_data = "INSERT INTO `review_table`(`reviewer_id`, `paper_id`, `suitability_of_title`, `novelty_of_work`, `presentation`, `results_and_analysis`, `overall_evaluation`, `reviewer_confidence`, `confidential_remarks`, `review_status`,`further_review`,`assigned_date`,`deadline`) VALUES ($reviewer_id,$paper_id,' ',' ',' ',' ',' ',' ',' ','Assigned','possible','$assigned_date','$deadline')";
    $insert_query = mysqli_query($conn, $insert_data);
    
    if ($insert_query) {
        $numberOfSubmission+=1; 
    }

    if($numberOfSubmission==sizeof($selectedPapers)){
        echo "<h1 class='text-success text-bold text-center  mt-3'> Papers have been assigned successfully. </h1>";
        echo "Assigned";?> 
        <script>
        
        // window.location.href = "assigned_papers_to_reviewer.php?reviewer_id=
        
        
        </script> 
        <?php           
        header("Location: assigned_papers_to_reviewer.php?reviewer_id=$reviewer_id");
    }
    else{
        echo $numberOfSubmission ;
        echo sizeof($selectedPapers); 
        echo  "<p class='text-danger text-bold text-center fs-5 mt-3'>Not Assigned . Something went wrong . </p>";

        // header("Location: assign_reviewer_table.php?id=".$paper_id);

    }

        }}
        else{
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No reviewer selected </p>";

        }
        // echo "Selected papers: " . implode(', ', $selectedPapers);
    } else {
        // No rolls were selected
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No paper selected </p>";
    }
} else {
    // Invalid request method
    echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Invalid Request Method </p>";
}

?>
<?php include_once("admin_footer.php") ?>