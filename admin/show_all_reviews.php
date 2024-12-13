<!--Need to add sort by track,date and submission status-->

<?php include_once("admin_header.php") ?>

<div class="container-fluid mt-5">
    <h3 class="text-center text-dark fw-bold">All Papers</h3>
    <div class="col">
        <div class="card pt-5 pb-4 shadow mb-5 px-md-5 px-3 bg-body rounded">
            <div class="table-responsive">
                <table id="table" class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th>Serial No</th>
                            <th>Paper Title</th>
                            <th>Paper Keywords</th>
                            <th>Track</th>
                            <th>Authors</th>
                            <th>File</th>
                            <th>Submission Date</th>
                            <th>Status</th>
                            <th>Reviewer</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // select paper information
                        $select_from_new_paper = "SELECT * FROM `new_paper` ";
                        $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                        $serial_no = 1;
                        if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                            while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                                extract($row);
                        ?>
                                <tr>
                                    <td><?php echo $serial_no; ?></td>
                                    <td><?php echo $paper_title ?></td>
                                    <td><?php echo $paper_keywords ?></td>
                                    <td><?php echo $track ?></td>
                                    <td><?php echo $authors_name ?></td>
                                    <td><a href="../author/document_for_manuscript/<?php echo $manuscript_pdf ?>"><?php echo $manuscript_pdf ?></a></td>
                                    <td><?php echo date('d-M-Y', strtotime($timestamps)) ?></td>
                                    <?php
                                    if ($row['paper_status'] == 1) {
                                        if ($row['count'] == 1) {
                                    ?>
                                            <td class="text-secondary fw-bold"><?php echo "New Submission" ?></td>
                                        <?php
                                        } else {
                                        ?>
                                            <td class="text-secondary fw-bold"><?php echo "Re-Submission" ?></td>
                                    <?php
                                        }
                                    }
                                    ?>
                                    
                                    <td>
                                        <a href="show_all_reviewer_for_review.php?paper_id=<?php echo $paper_id ?>" class="btn btn-primary" >Select Reviewer</a>
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
                function confirmAssign() {
                    return confirm(" Are you sure you want to assign this ?");
                }
            </script>
        </div>
    </div>
</div>

<?php include_once("admin_footer.php") ?>