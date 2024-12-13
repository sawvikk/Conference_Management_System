<?php ob_start(); ?>
<?php require_once("../database/connection.php") ?>
<?php include("admin_header.php") ?>
<?php include('../mail_sending2.php') ?>
<?php 
if (isset($_GET['reviewer_id'], $_GET['paper_id'])) {
    $reviewer_id=$_GET['reviewer_id'];
    $paper_id=$_GET['paper_id'];
    
    // Get current date for assigned_date
    $assigned_date = date('Y-m-d');
    
    // Calculate deadline (10 days later)
    $deadline = date('Y-m-d', strtotime($assigned_date . '+10 days'));

    // Insert data into review_table
    $insert_data = "INSERT INTO `review_table`(`reviewer_id`, `paper_id`, `suitability_of_title`, `novelty_of_work`, `presentation`, `results_and_analysis`, `overall_evaluation`, `reviewer_confidence`, `confidential_remarks`, `review_status`, `further_review`, `assigned_date`, `deadline`) VALUES ($reviewer_id, $paper_id, ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Assigned', 'possible', '$assigned_date', '$deadline')";
    
    $insert_query = mysqli_query($conn, $insert_data);
    
    if ($insert_query) {

        $sql = "SELECT * FROM `reviewers`  WHERE `reviewer_id`='$reviewer_id' AND admin_approved='1';";
        $query = mysqli_query($conn, $sql);
        if($query){
            $row = mysqli_fetch_assoc($query);
            extract($row); 
            
            // 
            $receiver = $reviewer_email;
            $subject = "Review Invitation";
            
            $body = '<p>Dear '.$reviewer_name.',<br>I hope you are doing well! We would love to have your expertise in reviewing the paper.</p>
            <h3>Paper Title :'; 
            $sql2 = "SELECT * FROM `new_paper`  WHERE `paper_id`=$paper_id;";
            $query2 = mysqli_query($conn, $sql2);
            if($query2){
                $row2 = mysqli_fetch_assoc($query2);
                extract($row2);
                $body.=$paper_title.'</h3><p> Our admin believes your insights will be invaluable for these papers. To review them, please log in to your account on our <a href="http://localhost/Project/reviewer/login.php">website</a> . You will find all the details needed for the review process there.
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
            
                echo "Assigned";
                $send_mail = send_mail($receiver, $subject, $body);
                echo ($receiver . " " . " " . $subject . " " . $body);
            
            header("Location: assign_reviewer_table.php?paper_id=".$paper_id);
        } 
        else {
            echo "Mail not sent . Something went wrong with paper id .";
        }
    }
     else {
    echo "Mail not sent. Something went wrong with reviewer id . ";
    }
}
else{
    echo "Not inserted into reviewer table properly. ";
}
}
else{
    echo "No paper or reviewer id . Sorry";
}
?>
