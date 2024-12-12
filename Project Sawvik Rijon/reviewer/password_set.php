<?php ob_start(); ?>
<?php include_once("../linker.php") ?>
<?php include_once("../validate_server_side.php") ?>


<?php 
if(isset($_GET['email']))
{   $email = $_GET['email'];
    // echo "email id is got ".$email."<br>";
if (isset($_POST['set'])) {
    extract($_POST);
    if ($password==$confirm_password){
        // echo $_GET['email']."<br>";
        // echo $password."<br>" ; 
        // echo $confirm_password."<br>"; 
        $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
        // echo $encrypted_password."<br>"; 
        $update = "UPDATE reviewers SET password='$encrypted_password' WHERE reviewer_email='$email' AND admin_approved='1'";
        $update_qry = mysqli_query($conn, $update);
        if($update_qry){
            // echo "ok"."<br>";         
            header("Location: login.php");
        }
        else{
            echo "Password is not stored."; 
        }
    }
else{
    echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Password and confirm password are different</p>";

}
}
}
else{
    echo "No Email Id"; 
}
?>

<div class="container d-flex justify-content-center align-items-center" style="height: 100vh">
    <div class="col-md-5 col-12">
        <div class="card rounded m-auto py-4 px-5 shadow">
            <form action="" method="post" onsubmit="return loginFormData()">
                <h3 class="text-center text-primary">Set Reviewer Password </h3>
                
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter password"  required />
                    <span id="password_err" class="text-danger"></span>
                </div>
                <div class="mb-3">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm password"  required />
                </div>

                <div class="">
                    <button type="submit" class="btn btn-primary" name="set">
                        Set
                    </button>
                </div>
            </form>
            <script src="../validate_client_side.js"></script>
        </div>
    </div>
</div>