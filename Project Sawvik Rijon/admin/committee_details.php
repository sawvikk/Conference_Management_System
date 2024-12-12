<!--For displaying all Papers details-->
<!--Need to add sort by track,date and submission status-->
<?php include("admin_header.php") ?>

<!-- <a href="add_committee_details.php" class="btn btn-primary">Add Committee Member</a> -->

<div class="container-fluid mt-5">
    <h3 class="text-center text-dark fw-bold">All Committee Details</h3>
    <div class="col">
        <div class="card pt-5 pb-4 shadow mb-5 px-md-5 px-3 bg-body rounded">
            <div class="table-responsive">
                <table id="table" class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th>Serial No</th>
                            <th>Name</th>
                            <th>University</th>
                            <th>Post</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Role</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // select paper information
                        $select_from_new_paper = "SELECT * FROM `committee` ";
                        $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                        $serial_no = 1;
                        if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                            while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                                extract($row);
                        ?>
                                <tr>
                                    <td><?php echo $serial_no; ?></td>
                                    <td><?php echo $committee_name ?></td>
                                    <td><?php echo $committee_university ?></td>
                                    <td><?php echo $committee_topic ?></td>
                                    <td><?php echo $committee_email ?></td>
                                    <td><img src="../Images/committee_images/<?php echo $row['committee_image'] ?>" width='50px' height='50px'></td>
                                    <td><?php if(isset($committee_status) && $committee_status==="0"){
                                        echo "Local";
                                    }
                                    else{
                                        echo "International";
                                    } ?></td>
                                    <td>
                                        <a href="edit_committee.php?committee_id=<?php echo $committee_id ?>" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <a href="delete_committee.php?id=<?php echo $committee_id ?>&&image=<?php echo $committee_image; ?>" class="btn btn-primary" onclick="return confirmSubmission()">Delete</a>
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