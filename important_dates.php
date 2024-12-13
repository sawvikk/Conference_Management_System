<div class="container">
    <h2 class="text-uppercase fw-bold text-center mb-3" data-aos="fade-up">
        Important <span class="secondary_color">Dates</span>
    </h2>
    <div class="card-group rounded shadow text-center" data-aos="fade-up-right">
        <?php
        $select_from_new_paper = "SELECT * FROM `important_dates` ";
        $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
        if (mysqli_num_rows($run_select_from_new_paper) > 0) {
            while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                extract($row);
                $date_format = date("d F, Y", strtotime($date));
                // echo $topic;
                // echo $date_format;
        ?>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-primary"><?php echo $topic; ?></h5>
                        <p class="card-text" style="font-size: 1.5rem;"><?php echo $date_format; ?></p>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>