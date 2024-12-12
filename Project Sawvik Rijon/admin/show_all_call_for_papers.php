<?php include("admin_header.php") ?>
<!--For displaying all Papers details-->
<!--Need to add sort by track,date and submission status-->
<!-- <a href="add_speaker_details.php" class="btn btn-primary">Add Speaker</a> -->
<div class="container-fluid mt-5">
    <h3 class="text-center text-dark fw-bold">Call For Paper Details</h3>
    <div class="col">
        <div class="card pt-5 pb-4 shadow mb-5 px-md-5 px-3 bg-body rounded">
            <div class="table-responsive">
                <table id="table" class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th>Serial No</th>
                            <th>Image-1</th>
                            <th>Image-2</th>
                            <th>PDF File</th>
                            <th>DOC File</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // select paper information
                        $select_from_new_paper = "SELECT * FROM call_for_paper";
                        $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                        $serial_no = 1;
                        if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                            while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                                extract($row);
                                // echo $image1;
                                // echo $image2;
                        ?>
                                <tr>
                                    <td><?php echo $serial_no; ?></td>
                                    <td><img src="../Images/call_for_paper/<?php echo $image1 ?>" width='50px' height='50px'></td>
                                    <td><img src="../Images/call_for_paper/<?php echo $image2 ?>" width='50px' height='50px'></td>
                                    <td><a href="../Files/call_for_paper/<?php echo $pdf_file ?>"><?php echo $pdf_file ?></a></td>
                                    <td><a href="../Files/call_for_paper/<?php echo $doc_file ?>"><?php echo $doc_file ?></a></td>
                                    <td>
                                        <a href="edit_call_for_paper.php?call_for_paper_id=<?php echo $id ?>" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <a href="delete_call_for_paper.php?id=<?php echo $id ?>&&image1=<?php echo $image1; ?>&&image2=<?php echo $image2; ?>&&pdf_file=<?php echo $pdf_file; ?>&&doc_file=<?php echo $doc_file; ?>" class="btn btn-primary" onclick="return confirmSubmission()">Delete</a>
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