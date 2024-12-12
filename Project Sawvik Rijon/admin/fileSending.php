
<?php ob_start(); ?>
<?php require_once("../database/connection.php") ?>
<?php include("admin_header.php") ?>
<?php include_once("../linker.php") ?>
<?php
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function send_mail($receiver, $subject, $body,$file)
{
    // mail sending
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    //Load Composer's autoloader
    require '../vendor/autoload.php';

    $mail = new PHPMailer(true);
    $sender_email = 'sawvik.dipto10@gmail.com';
    $sender_pass = 'bnpnrspugjozayak';

    //Enable verbose debug output
    $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;
    // $mail->SMTPDebug = 2; // 2 for detailed debugging information



    //Send using SMTP
    $mail->isSMTP();

    //Set the SMTP server to send through
    $mail->Host = 'smtp.gmail.com';

    //Enable SMTP authentication
    $mail->SMTPAuth = true;

    //SMTP username
    $mail->Username = $sender_email;

    //SMTP password
    $mail->Password = $sender_pass;

    //Enable TLS encryption;
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->SMTPSecure = 'tls';
    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $mail->Port = 587;

    //Recipients
    $mail->setFrom($sender_email, 'ictbj.jkkniu.edu.bd');

    //Add a recipient
    $mail->addAddress($receiver, "JKKNIU CONFERENCE");
    $mail->addReplyTo($sender_email);

    //Set email format to HTML
    $mail->isHTML(true);

    $mail->addAttachment('../author/document_for_manuscript/'.$file);

    $mail->Subject = $subject;
    $mail->Body = $body;
    if ($mail->send()) {
        $mail->ClearAddresses();
        $mail->clearReplyTos();
        // echo "Mail_sending2.php is working ....";
    }
}
?>


<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $Data = "SELECT manuscript_pdf FROM new_paper WHERE id = $id";
    // $result = mysqli_query($conn, $Data);
    
    $result = mysqli_query($conn, $Data);
    if ($result) {
        

        if ($row = mysqli_fetch_assoc($result)) {
            // Access the manuscript_pdf column from the row
            $manuscriptPdf = $row['manuscript_pdf'];
    
            $sql = "SELECT email FROM Professors where send_email=1";

            $pro = mysqli_query($conn,$sql);
            if ($pro) {
                // Check if any rows were returned
                while ($rowone = mysqli_fetch_assoc($pro)) {
                    // Access the 'email' column from the row
                    $email = $rowone['email'];

                    // Print or use the email as needed
                    echo "Email: $email<br>";
                    echo "Manuscript PDF: $manuscriptPdf";
                    $subject = 'Request for Peer Review: '.$manuscriptPdf;        
                    $body = "<p>Dear Professor ,<br>
                    I hope this email finds you well. I have recently completed a research paper, which focuses on ... . Given your extensive knowledge in this area, I believe your insights and feedback would be invaluable in enhancing the quality of this work.<br><br>
                    
                    I have attached the full manuscript for your convenience. Your expertise in specific aspect of the field aligns well with the core themes of my research, and I am particularly interested in receiving your feedback on some areas.<br><br>
                    
                    The deadline for submitting reviewer feedback is [a reasonable deadline, if applicable]. Your time and effort in providing a thoughtful review will be greatly appreciated. If you are unable to commit to this review, please let me know at your earliest convenience.<br><br>
                    
                    Your feedback will play a crucial role in refining this paper for potential publication, and I am confident that your insights will contribute significantly to the advancement of this research.<br>
                    <br>
                    Thank you very much for considering my request. I look forward to your positive response.<br><br>
                    
                    Best Regards,<br/>
                    Professor Dr. Tushar Kanti Saha,<br/>
                    Convener,<br/>
                    ICTBJ-2023 Organizing Committee <br/>
                    Trishal, Mymensingh, Bangladesh <br/>
                    E-Mail: <a href='ictbj@.com'>ictbj@.com</a> <br/>
                    Tel. +8801711028510 (WhatsApp)";

                    $send_mail = send_mail($email, $subject, $body, $manuscriptPdf);
                }

                // Free the result set
                mysqli_free_result($pro);
            } else {
                // Handle query execution error
                echo "No data found<br>";
            }
            // Now $manuscriptPdf contains the value of manuscript_pdf for the specified id
            
        } else {
            echo "No matching record found for id: $id";
        }
    
        // Free the result set
        mysqli_free_result($result);

        echo "<p class='text-success text-bold text-center fs-5 mt-3'>Sent successfully.</p>";
        header("Location: show_all_papers.php");
        ob_end_flush();
    }
    else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Not Sent</p>";
    }
}
?>
<?php include("admin_footer.php") ?>
    
