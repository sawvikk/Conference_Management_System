<!--Need to add sort by track,date and submission status-->

<?php include_once("admin_header.php") ?>

<div class="container-fluid mt-5">
    <h3 class="text-center text-dark fw-bold">All Authors</h3>
    <div class="col">
        <div class="card pt-5 pb-4 shadow mb-5 px-md-5 px-3 bg-body rounded">
            <div class="table-responsive">
                <table id="table" class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th>Serial No</th>
                            <th>Author Name</th>
                            <th>Author Email</th>
                            <th>Author Contact</th>
                            <th>Email Verified at</th>
                            <!-- <th>Delete</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // select author information
                        $select_from_new_author = "SELECT * FROM `author_information` ";
                        $run_select_from_new_author = mysqli_query($conn, $select_from_new_author);
                        $serial_no = 1;
                        if (mysqli_num_rows($run_select_from_new_author) > 0) {
                            while ($row = mysqli_fetch_assoc($run_select_from_new_author)) {
                                extract($row);
                        ?>
                                <tr>
                                    <td><?php echo $serial_no; ?></td>
                                    <td><?php echo $author_name ?></td>
                                    <td><?php echo $author_email ?></td>
                                    <td><?php echo $author_contact_no ?></td>
                                    <td><?php echo $email_verified_at ?></td>
                                    <!-- <td>
                                        <a href="delete_author.php?id=<?php echo $id ?>" class="btn btn-primary" onclick="return confirmSubmission()">Delete</a>
                                    </td> -->
                                </tr>
                        <?php
                                $serial_no++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- <script>
                function confirmSubmission() {
                    return confirm(" Are you sure you want to confirm your submission?");
                }
            </script> -->
        </div>
    </div>
</div>

<?php include_once("admin_footer.php") ?>