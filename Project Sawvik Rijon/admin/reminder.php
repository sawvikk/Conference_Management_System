<?php ob_start(); ?>
<?php require_once("../database/connection.php") ?>
<?php include("admin_header.php") ?>
<?php include('../mail_sending2.php') ?>
<?php 
if(isset($_GET['reviewer_id'],$_GET['paper_id'])){
    $reviewer_id= $_GET['reviewer_id'];
    $paper_id = $_GET['paper_id']; 
    $sql = "SELECT np.paper_title as paper_title, r.reviewer_name as reviewer_name,rt.deadline as deadline, rt.assigned_date as assigned_date , r.reviewer_email as reviewer_email FROM review_table rt JOIN reviewers r ON rt.reviewer_id = r.reviewer_id JOIN new_paper np ON rt.paper_id = np.paper_id WHERE rt.reviewer_id = $reviewer_id AND rt.paper_id = $paper_id";
    $query = mysqli_query($conn, $sql);
        if($query){
        $row = mysqli_fetch_assoc($query);
        extract($row); 
        $receiver = $reviewer_email;
        $subject = "Review Reminder";
        $body = '<p>Dear '.$reviewer_name.',<br>I hope you are doing well! This is a reminder to review the paper titled: </p><h3>';
        $body.=$paper_title.'</h3><p>This paper was assigned to you on '.$assigned_date.' and your deadline is '.$deadline.'. Our admin believes your insights will be invaluable for these papers. To review them, please log in to your account on our <a href="http://localhost/Project/reviewer/login.php">website</a> . You will find all the details needed for the review process there.
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
        echo "<h1 class='text-success text-bold text-center  mt-3 p-5 bg-white '> Reminder of review of Papers have been assigned successfully. </h1>";
        echo "Assigned";
        ?>
        <script>
            alert("Review Reminder successful");
            window.location.href = "assign_reviewer_table.php?paper_id=<?php echo$paper_id;?>";
        </script><?php

            }
        else{
?> <p class="text-danger">Wrong query</p>; <?php 
        }
        }
        else{
            ?> <p class="text-danger">Wrong query</p>; <?php 
        }
?>