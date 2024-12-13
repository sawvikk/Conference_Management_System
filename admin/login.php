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
    // print_r($loginArr);
    // check if credentials are okay, and email is verified
    $sql = "SELECT * FROM admin_information WHERE admin_email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        extract($user);

        if (password_verify($password, $admin_password)) {
            $sql_pass = "SELECT * FROM admin_information WHERE admin_password='$admin_password'";
            $result_pass = mysqli_query($conn, $sql_pass);

            if (mysqli_num_rows($result_pass) > 0) {
                $_SESSION['admin_id'] = $admin_id;
                $_SESSION['admin_name'] = $admin_name;
                $_SESSION['admin_email'] = $admin_email;
                header("Location: index.php");
                ob_end_flush();
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data found</p>";
            }
        } else {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Invalid Password</p>";
        }
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Invalid Email</p>";
    }
}
?>

<div class="container d-flex justify-content-center align-items-center" style="height: 100vh">
    <div class="col-md-5 col-12">
        <div class="card rounded m-auto py-4 px-5 shadow">
            <form action="" method="post" onsubmit="return loginFormData()">
                <h3 class="text-center">Admin Login</h3>

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
                </div>
            </form>
            <script src="../validate_client_side.js"></script>
        </div>
    </div>
</div>