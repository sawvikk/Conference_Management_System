<!--Need to add sort by track,date and submission status-->

<?php include_once("reviewer_header.php") ?>

<div class="container-fluid mt-5">
    <h3 class="text-center text-tertiary fw-bold">All Reviewed Papers</h3>
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
                            <th>Review Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // select paper information
                        $reviewer_id = $_SESSION['reviewer_id'];
                        $select_from_new_paper = "SELECT np.paper_id,np.paper_title,np.paper_keywords,np.track,np.authors_name, np.authors_affiliation, np.authors_email,np.manuscript_pdf, np.timestamps, rt.further_review FROM new_paper np JOIN review_table rt ON np.paper_id = rt.paper_id WHERE rt.review_status = 'Reviewed' AND rt.reviewer_id='$reviewer_id' ";
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
                                    <td>
                                        <?php 
                                        if ($further_review=="possible"){
                                        ?>
                                        <a href="further_review_form.php?paper_id=<?php echo $paper_id ?>" class="btn btn-primary">Change Review</a>
                                        <?php 
                                        }
                                        else{?>
                                            <a href="further_review_form.php?paper_id=<?php echo $paper_id ?>&& further_review=impossible" class="btn btn-primary">Preview </a>
                                        <?php }
                                        
                                        ?>
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
        </div>
    </div>
</div>

<?php include_once("reviewer_footer.php") ?>