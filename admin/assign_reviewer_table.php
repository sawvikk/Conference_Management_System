<?php ob_start(); ?>
<?php require_once("../database/connection.php") ?>
<?php include("admin_header.php") ?>
<?php include('../mail_sending2.php') ?>
<?php
if (isset($_GET['paper_id'])) {
    $paper_id = $_GET['paper_id'];
    // echo $paper_id;
    // Retrieve paper information and reviewer information as needed

    // Check if the form is submitted

    $papersql = "SELECT * FROM `new_paper` WHERE `paper_id` = $paper_id; ";
    $runpapersql = mysqli_query($conn,$papersql);
    $rowpapercount = mysqli_fetch_assoc($runpapersql);
    extract($rowpapercount);
    ?>
    <div class="container-fluid mt-5">
    <h3 class="text-center text-dark fw-bold">Assign Paper</h3>
    <h3 class="text-center text-dark fw-bold">Paper Title : <?php echo $paper_title ;?></h3>

    <div class="col">
        <div class="card pt-5 pb-4 shadow mb-5 px-md-5 px-3 bg-body rounded">
            <div class="table-responsive">
                <table id="table" class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th>Serial No</th>
                            <th>Name</th>
                            <th>Paper Review Count</th>
                            <th>E-mail</th>
                            <th>Designation</th>
                            <th>Department</th>
                            <th>University</th>
                            <th>Division</th>
                            <th>Country</th>
                            <th>Area of Expertise</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Assign</th>
                            <th>Assigned Date</th>
                            <th>Deadline</th>
                            <th>Send Reminder</th>
                            <!-- <th>Edit</th>
                            <th>Delete</th> -->
                        </tr>
</thead>
<tbody>
    <?php 
        $select = "SELECT * FROM `reviewers` WHERE admin_approved='1'";
        $run_select = mysqli_query($conn,$select);
        $serial_no=1;
        $designation_list = array("professor"=>"Professor", "associateProfessor"=> "Associate Professor","assistantProfessor"=>"Assistant Professor","lecturer"=>"Lecturer");
        if (mysqli_num_rows($run_select) > 0) {
            while ($row = mysqli_fetch_assoc($run_select)) {
                extract($row);

        ?>
                <tr>
                    <td><?php echo $serial_no; ?></td>
                    <td><?php echo $reviewer_name;  ?> </td>
                    <td>
                        <?php 
                            $rsql = "SELECT COUNT(`reviewer_id`) AS countreviewed FROM `review_table` WHERE `reviewer_id`= $reviewer_id AND`review_status`='reviewed' ;";
                            $runrsql = mysqli_query($conn,$rsql);
                            $rowrcount = mysqli_fetch_assoc($runrsql);
                            extract($rowrcount);

                            $sql = "SELECT COUNT(`reviewer_id`) AS count FROM `review_table` WHERE `reviewer_id`= $reviewer_id ;"; 
                            $run_sql = mysqli_query($conn,$sql);
                            $rowcount = mysqli_fetch_assoc($run_sql);
                            extract($rowcount);
                            echo "Pending: $count <br> Reviewed: $countreviewed <br> Total Assigned ".$count+$countreviewed;
                        ?>
                    </td>
                    <td><?php echo $reviewer_email ?></td>
                    <td><?php echo $designation_list[$designation] ?></td>
                    <td><?php echo $department ?></td>
                    <td><?php echo $university ?></td>
                    <td><?php echo $division ?></td>
                    <td><?php echo $country ?></td>
                    <td><?php echo $expertise ?></td>
                    <td><img src="../Images/reviewer_images/<?php echo $row['image'] ?>" width='50px' height='50px'></td>
                    <td>
                        <?php 
                        $selectStatus = "SELECT review_status FROM review_table WHERE reviewer_id='$reviewer_id' AND paper_id='$paper_id'";
                        $run_selectStatus = mysqli_query($conn,$selectStatus);
                        if (mysqli_num_rows($run_selectStatus) > 0) {
                           $rowStatus = mysqli_fetch_array($run_selectStatus);
                            extract($rowStatus);
                            echo $review_status;
                        }
                        else{
                            echo "Not Assigned";
                        }
                        ?>
                    </td>
                    <td>
                    <?php 
    $selectStatus = "SELECT * FROM review_table WHERE reviewer_id='$reviewer_id' AND paper_id='$paper_id'";
                        $run_selectStatus = mysqli_query($conn,$selectStatus);
                        if (mysqli_num_rows($run_selectStatus) > 0) {
                           $rowStatus = mysqli_fetch_array($run_selectStatus);
                            extract($rowStatus);
                            if($review_status == "Assigned"){
                                ?>
                        <a href="#" class="btn btn-secondary" >Already Assigned </a>

                                <?php
                            }
                            else if($review_status == "Reviewed"){
                                if($further_review=="possible"){
?>      
                     <a href="lock_review.php?reviewer_id=<?php echo $reviewer_id ?>&&paper_id=<?php echo $paper_id; ?>" class="btn btn-primary" >Lock Review</a> <?php 
                     }
                     else{
                     ?>

                        <a href="#" class="btn btn-secondary" >Review Locked </a>
                    <!-- <a href="assign_reviewer.php?reviewer_id=<?php echo $reviewer_id ?>&&paper_id=<?php echo $paper_id; ?>" class="btn btn-primary" onclick="return confirmSubmission()">Assign</a> -->
<?php
                      } }
                        }
                        else{
                            ?>
                    <a href="assign_reviewer.php?reviewer_id=<?php echo $reviewer_id ?>&&paper_id=<?php echo $paper_id; ?>" class="btn btn-primary" onclick="return confirmSubmission()"> Assign</a>
<?php
                        }
                        ?>
                        
                    </td>
                    <?php 
                        $selectStatus = "SELECT * FROM review_table WHERE reviewer_id='$reviewer_id' AND paper_id='$paper_id'";
                        $run_selectStatus = mysqli_query($conn,$selectStatus);
                        if (mysqli_num_rows($run_selectStatus) > 0) {
                           $rowStatus = mysqli_fetch_array($run_selectStatus);
                            extract($rowStatus);
                            ?><td><?php echo $assigned_date; ?></td>
                            <td><?php echo $deadline; ?></td>
                            <td>
                                <a href="reminder.php?reviewer_id=<?php echo $reviewer_id ?>&&paper_id=<?php echo $paper_id; ?>" class="btn btn-primary" onclick="return confirmSubmission()"> Send Reminder</a>
                            </td>
                            <?php 
                        
                    }
                        else{
                            ?><td>Not Assigned</td><td>Not Assigned</td><td>Not Assigned</td><?php 
                        }
                        ?>
                    <!-- <td>Assign</td> -->
                    <!-- <td>asas</td> -->
                    

                </tr>

        <?php
                    $serial_no++;
                }
            }
        ?>

    
</tbody>
</table>
            </div>
            <script>
                function confirmSubmission() {
                    return confirm(" Are you sure you want to assign this paper?");
                }
            </script>
        </div>
    </div>
</div>
<?php 
}
else{
    echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Not Assigned</p>";
}
?>
<?php include("admin_footer.php") ?>