<?php ob_start(); ?> 
<?php require_once('database/connection.php') ?>
<?php include_once('linker.php') ?>
<!-- <a href="index.php" class="btn btn-primary m-auto d-flex justify-content-center text-center">Return to Home</a> -->
<?php include_once ('validate_server_side.php'); ?>
<?php include_once('mail_sending2.php') ?>

<?php
if (isset($_POST['signup'])) {
$matched = 0;
// echo "Submitted";

if (isset($_POST['captcha']) && ($_POST['captcha'] != "")) {
// Validation: Checking entered captcha code with the generated captcha code
// echo "Submitted part 2 ";
if (strcmp($_SESSION['captcha'], $_POST['captcha']) != 0) {
// Note: the captcha code is compared case insensitively.
// if you want case sensitive match, check above with strcmp()
$status = "<p class='text-danger text-bold text-center fs-5 mt-3'>
Entered captcha code does not match! 
Kindly try again.</p>";
$matched = 0;
// echo " Submitted part 3 ";
} else {
$status = "<p class='text-success text-bold text-center fs-5 mt-3'>Your captcha code is matched.</p>";
$matched = 1;
// echo "Submitted part 4";
}

if ($matched === 1) {
// echo "Submitted part 5";
$data = $_POST;
// print_r($data);
// echo "<br><br>";
$arr = validateData($conn, $data);
// print_r($arr);
extract($arr);
// $hash_password = md5($password);
if ($password === $confirm_password) {
try {
$encrypted_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "SELECT * FROM author_information WHERE author_email = '$email'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
if ($count > 0) {
echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Email Already Exists</p>";
} else {
$verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

$receiver = $email;
$subject = "Email verification";
$body = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';
$send_mail = send_mail($receiver, $subject, $body);
// echo ($receiver . " " . " " . $subject . " " . $body);

$insert_data = "INSERT INTO `author_information`(`author_name`,`author_email`, `author_contact_no`,`author_password`,`verification_code`, `email_verified_at`) VALUES ('$name','$email','$contact','$encrypted_password','$verification_code',NULL)";
$insert_query = mysqli_query($conn, $insert_data);
if ($insert_query) {
// $_SESSION['verification_code'] = $verification_code;
echo "Problem in insert query ";
header("Location: chnemail-verification.php?email=" . $email);
ob_end_flush();
} else {
echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Data is not inserted yet!</p>";
}
}
} catch (Exception $e) {
echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Email is not sent yet!</p>".$e;
}
} else {
echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Both passwords are not Matched.</p>";
}
}
else {
// echo $status;
}
}
}
else {
// echo 'Form is not submitted yet!';
}
?> 



<div  class="container-fluid my-5 d-flex justify-content-center ">
<div class="col-md-3 col-12">
<div class="card rounded m-auto py-4 px-5 shadow">
<form action="" method="post" onsubmit="return formData()" >
<h3 class="text-center text-primary ">Sign Up</h3><br>
<div class="mb-3">
<label for="name">Name</label>
<input type="text" class="form-control border-dark rounded-pill" name="name" id="name" placeholder="Enter Your Name" onkeyup="validateName()" required />
<span id="name_err"></span>
</div>

<!-- <div class="mb-3">
<label for="designation">Designation</label>
<input type="text" class="form-control border-dark rounded-pill" name="designation" id="designation" placeholder="Enter Your Designation" onkeyup="validateName()" required />
<span id="name_err"></span>
</div> -->

<!-- <div class="mb-3">
<label for="university">University Name</label>
<input type="text" class="form-control border-dark rounded-pill" name="university" id="university" placeholder="Enter Your University Name" onkeyup="validateName()" required />
<span id="name_err"></span>
</div> -->

<div class="mb-3">
<label for="email">Email</label>
<input type="email" class="form-control border-dark rounded-pill" name="email" id="email" placeholder="Enter Your Email Address" onkeyup="validateEmail()" required />
<span id="email_err"></span>
</div>


<div class="mb-3">
<label for="contact">Contact No.</label>
<input type="text" class="form-control border-dark rounded-pill" name="contact" id="contact" placeholder="Enter Your Contact Number" onkeyup="validateContact()" required />
<span id="contact_err"></span>
</div>
<!-- <div class="mb-3">
<label for="country">Country</label>
<input type="text" class="form-control border-dark rounded-pill" name="country" id="country" placeholder="Enter Your Country Name" onkeyup="validateName()" required />
<span id="name_err"></span>
</div> -->
<div class="mb-3">
<label for="password">Password</label>
<input type="password" class="form-control border-dark rounded-pill" name="password" id="password" placeholder="Enter Your Password" onkeyup="validatePassword()" required />
<span id="password_err"></span>
</div>
<div class="mb-3">
<label for="confirm_password">Confirm Password</label>
<input type="password" class="form-control border-dark rounded-pill" name="confirm_password" id="confirm_password" placeholder="Please Confirm Your Password" onkeyup="validateConfirmPassword()" required />
<span id="confirm_password_err"></span>
</div>

<div class="mb-3">
<label for="captcha">Enter Captcha</label><br />
<input type="text" class="form-control border-dark rounded-pill" name="captcha" id="captcha" placeholder="Captcha Code From Below Image" required />
<p class="mt-2">
<img src="captcha.php?rand=<?php echo rand(); ?>" alt="captcha"id="captcha_image" />
</p>
<p>Can't read the image?
<a href='javascript: refreshCaptcha();'>click here</a>
to refresh
</p>
</div>
<button type="submit" class="btn btn-primary" name="signup">
Sign Up
</button>

<p class="forgot-password text-right mt-2">
Already have an account?
<a href="login3.php">sign in?</a>
</p>

</form>
<script>
function refreshCaptcha() {
var img = document.images['captcha_image'];
img.src = img.src.substring(
0, img.src.lastIndexOf("?")
) + "?rand=" + Math.random() * 1000;
}
</script>
<script src="validate_client_side.js"></script>
</div>
</div>
</div>
<?php include_once('footer.php') ?>
