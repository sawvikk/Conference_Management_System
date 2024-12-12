<?php ob_start(); ?>
<?php include_once("../linker.php") ?>
<?php include_once("../validate_server_side.php") ?>


<?php 
if (isset($_POST['login'])) {
    $data = $_POST;
    // print_r($data);
    // echo "<br><br>";
    $loginArr = validateLoginData($conn, $data);
    extract($loginArr);
    $pass = $password;
    // print_r($loginArr);
    // check if credentials are okay, and email is verified
    $sql = "SELECT * FROM reviewers WHERE reviewer_email='$email'  AND admin_approved='1'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        extract($user);
        // echo "Sawvik  ".$pass."<br>".$password;
        if (password_verify($pass,$password)){
            echo "Same Same"."<br>";
            $sql_pass = "SELECT * FROM reviewers WHERE password='$password' AND admin_approved='1'";
            $result_pass = mysqli_query($conn, $sql_pass);

            if (mysqli_num_rows($result_pass) > 0) {
                // echo $reviewer_id."  ".$password."  ".$reviewer_password;
                $_SESSION['reviewer_id'] = $reviewer_id;
                $_SESSION['reviewer_name'] = $reviewer_name;
                $_SESSION['reviewer_email'] = $reviewer_email;
                header("Location: index.php");
                ob_end_flush();
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-5  '>No data found</p>";
            }
        } else {
            echo "<p class='text-danger text-bold text-center fs-5 mt-5 '>Wrong Password</p>";
        }
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Email is not registered or approved</p>";
    }
}
?>

<div class="container d-flex justify-content-center align-items-center" style="height: 100vh">
    <div class="col-md-5 col-12">
        <div class="card rounded m-auto py-4 px-5 shadow">
            <form action="" method="post" onsubmit="return loginFormData()">
                <h3 class="text-center">Reviewer Login</h3>

                <div class="mb-3">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" onkeyup="validateEmail()" required />
                    <span id="email_err" class="text-danger"></span>
                </div>

                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" onkeyup="validatePassword()" required />
                    <span id="password_err" class="text-danger"></span>
                </div>

                <div class="">
                    <button type="submit" class="btn btn-primary" name="login">
                        Login
                    </button>
                    <br><br>
                    <p class="forgot-password text-right">
                    Do you have any account?
                    <a href="../reviewer_registration.php">sign up?</a>
                </p>
                </div>
            </form>
            <script src="../validate_client_side.js"></script>
        </div>
    </div>
</div>