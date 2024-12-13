<?php require_once('database/connection.php') ?>
<?php include_once('linker.php') ?>
<?php include_once('mail_sending2.php') ?>
<!-- <?php include_once('header.php') ?> -->
<a href="index.php" class="btn btn-primary m-auto d-flex justify-content-center text-center">Return to Home</a>

<?php
if (isset($_POST['submit_email'])) {
    extract($_POST);
    // check if credentials are okay, and email is verified
    $sql = "SELECT * FROM author_information WHERE author_email='$email'";
    $result = mysqli_query($conn, $sql);
    // $verification_code = ;
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        extract($row);
        $receiver = $author_email;
        $subject = "Reset Password";
        $body = "<p>Click On This Link to Reset Password <a href='http://localhost/Project/reset_password.php?key=" . $author_email . "&reset=" . $author_password . "'>Reset Password</a></p>";
        // $body = '<p>Click On This Link to Reset Password <a href="reset_password.php?email=">' . $author_password . '</a></p>';
        $send_mail = send_mail($receiver, $subject, $body);

        echo "<p class='text-success text-bold text-center fs-5 mt-3'>Reset password link has sent to your email address</p>";

        // header("location: forget_password.php");
        // ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Email is not Found</p>";
    }
}
?>

<div class="container my-5 d-flex justify-content-center">
    <div class="col-md-5 col-12">
        <div class="card rounded m-auto py-4 px-5 shadow">
            <form action="" method="post">
                <h3 class="text-center">Reset Password Link</h3>

                <div class="mb-3">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email Address" required />
                </div>

                <div class="">
                    <button type="submit" class="btn btn-primary" name="submit_email">
                        Submit
                    </button>
                </div>
            </form>
            <script src="validate_client_side.js"></script>
        </div>
    </div>
</div>
<?php include_once('footer.php') ?>