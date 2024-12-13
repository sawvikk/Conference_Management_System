<div class="container">
    <h2 class="text-uppercase fw-bold text-center mb-3" data-aos="fade-up">Call For <span class="secondary_color">Paper</span> </h2>
    <?php
    $select_from_new_paper = "SELECT * FROM call_for_paper";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        while($row = mysqli_fetch_assoc($run_select_from_new_paper)){
        extract($row);
        // echo mysqli_num_rows($run_select_from_new_paper);
    ?>
        <div class="row">
            <div class="col-md-6" data-aos="fade-up-right">

                <img src="Images/call_for_paper/<?php echo $image1; ?>" alt="cfp_1" class="img-fluid">
            </div>
            <div class="col-md-6" data-aos="fade-up-left">

                <img src="Images/call_for_paper/<?php echo $image2; ?>" alt="cfp_2" class="img-fluid">
            </div>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
            <a href="Files/call_for_paper/<?php echo $pdf_file; ?>" class="d-flex justify-content-center" data-aos="fade-up" download><button class="btn btn-primary">Download Call For Paper</button></a><br>
            <a href="Files/call_for_paper/<?php echo $doc_file; ?>" class="d-flex justify-content-center" data-aos="fade-up" download><button class="btn btn-primary">Download Template</button></a>
        </div>
        <?php 
        }
        ?>

</div>
</div>
<?php
    }