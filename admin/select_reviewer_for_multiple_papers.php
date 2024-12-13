<?php include("admin_header.php"); ?>
<div class="container-fluid mt-5">
    <h3 class="text-center text-dark fw-bold">Select Reviewer for Multiple Papers Assignment</h3>
    <div class="col">
        <div class="card pt-5 pb-4 shadow mb-5 px-md-5 px-3 bg-body rounded">
            <div class="table-responsive">
                <table id="table" class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th rowspan="2">Serial No</th>
                            <th colspan="2">Personal Information</th>
                            <th colspan="5">Affiliation Information</th>
                            <th colspan="2">Experise and Image</th>
                            <th colspan="1">Action</th>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <th>E-mail</th>
                            <!-- <th>Password</th> -->
                            <th>Designation</th>
                            <th>Department/Office</th>
                            <th>University/Organization</th>
                            <th>Division/State</th>
                            <th>Country</th>
                            <th>Area of Expertise</th>
                            <th>Image</th>
                            <th>Paper Selection</th>
                        </tr>
</thead>
<tbody>
    <?php 
        $select = "SELECT * FROM `reviewers` WHERE admin_approved='1'";
        $run_select = mysqli_query($conn,$select);
        $serial_no=1;
        if (mysqli_num_rows($run_select) > 0) {
            while ($row = mysqli_fetch_assoc($run_select)) {
                extract($row);
                $designation_list = array("professor"=>"Professor", "associateProfessor"=> "Associate Professor","assistantProfessor"=>"Assistant Professor","lecturer"=>"Lecturer");
        ?>
                <tr>
                    <td><?php echo $serial_no; ?></td>
                    <td><?php echo $reviewer_name ?></td>
                    <td><?php echo $reviewer_email ?></td>
                    <!-- <td><?php echo $password ?></td> -->
                    <td><?php echo $designation_list[$designation] ?></td>
                    <td><?php echo $department ?></td>
                    <td><?php echo $university ?></td>
                    <td><?php echo $division ?></td>
                    <td><?php echo $country ?></td>
                    <td><?php echo $expertise?></td>
                    <td><img src="../Images/reviewer_images/<?php echo $row['image']; ?> " width='50px' height='50px'></td>
                    <td>
                        <a href="assign_multiple_papers_table.php?reviewer_id=<?php echo $reviewer_id ?>" class="btn btn-primary">Select</a>
                    </td>
                    
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
                    return confirm(" Are you sure you want to confirm your submission?");
                }
            </script>
        </div>
    </div>
</div> 
<?php include("admin_footer.php") ?>