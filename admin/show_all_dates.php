<?php include("admin_header.php") ?>
<!--For displaying all Papers details-->
<!--Need to add sort by track,date and submission status-->
<!-- <a href="add_speaker_details.php" class="btn btn-primary">Add Speaker</a> -->
<div class="container-fluid mt-5">
    <h3 class="text-center text-dark fw-bold">Important Dates Details</h3>
    <div class="col">
        <div class="card pt-5 pb-4 shadow mb-5 px-md-5 px-3 bg-body rounded">
            <div class="table-responsive">
                <table id="table" class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th>Serial No</th>
                            <th>Topic</th>
                            <th>Date</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // select paper information
                        $select_from_new_paper = "SELECT * FROM `important_dates` ";
                        $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                        $serial_no = 1;
                        if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                            while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                                extract($row);
                                $date_format = date("d F, Y", strtotime($date));
                        ?>
                                <tr>
                                    <td><?php echo $serial_no; ?></td>
                                    <td><?php echo $topic ?></td>
                                    <td><?php echo $date_format ?></td>
                                    <td>
                                        <a href="edit_date.php?date_id=<?php echo $id ?>" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <a href="delete_date.php?id=<?php echo $id ?>" class="btn btn-primary" onclick="return confirmSubmission()">Delete</a>
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