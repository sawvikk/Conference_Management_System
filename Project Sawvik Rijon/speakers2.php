<h2 class="text-uppercase fw-bold text-center" data-aos="fade-up"><span class="secondary_color">Honorable </span>Speakers</h2>

<div class="container mt-3 " data-aos="fade-up-right">
    <div class="row row-cols-1 row-cols-md-4 g-4 d-flex justify-content-center">
        <?php
$select_query = "SELECT `speaker_id`, `speaker_image`, `speaker_name`, `speaker_email`, `speaker_contact`, `speaker_country`, `speaker_university`, `speaker_topic` FROM `speakers` WHERE 1";
$result = mysqli_query($conn, $select_query);

if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $speaker_id = $row['speaker_id'];
        $speaker_image = $row['speaker_image'];
        $speaker_name = $row['speaker_name'];
        $speaker_email = $row['speaker_email'];
        $speaker_contact = $row['speaker_contact'];
        $speaker_country = $row['speaker_country'];
        $speaker_university = $row['speaker_university'];
        $speaker_topic = $row['speaker_topic'];
?>
        <div class="col">
            <div class="card speaker_hover our-team h-100">
                <div class="picture">
                    <img src="Images/speaker_images/<?php echo $speaker_image; ?>" class="card-img-top" alt="Speaker Image" style="height:40vh;object-fit:contain;">
                </div>
                <div class="card-body">
                    <h5 class="card-title primary_color"><?php echo $speaker_name; ?></h5>
                    <p class="card-text"><?php echo $speaker_university; ?><br />
                        Speaking on<br /><b class="secondary_color"><?php echo $speaker_topic; ?></b></p>
                </div>
                <ul class="social">
                    <li>
                        <a class="facebook" href="#fb">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a class="twitter" href="#twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a class="dribbble" href="#dribble">
                            <i class="fab fa-dribbble"></i>
                        </a>
                    </li>
                    <li>
                        <a class="linkedin" href="#linkedin">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
<?php
    }
} else {
    // If there are no speakers in the database
    echo "No speakers found";
}

// Close the database connection
?>

        
    </div>
</div>