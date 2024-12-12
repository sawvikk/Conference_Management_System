<h2 class="text-uppercase fw-bold text-center" data-aos="fade-up"><span class="secondary_color">Time Left</span> before The Event</h2>
<div class="container mt-3" data-aos="fade-up-right">
    <div class="row">
        <!-- <h2 id="counter" class="text-center"></h2> -->
        
        <div class="col-md-3 h-100">
            <div class="bg-warning">
                <p class="fs-1 fw-bold text-white" id="days"></p>
            </div>
        </div>
        <div class="col-md-3 h-100">
            <div class="bg-success">
                <p class="fs-1 fw-bold text-white" id="hours"></p>
            </div>
        </div>
        <div class="col-md-3 h-100">
            <div class="bg-danger">
                <p class="fs-1 fw-bold text-white" id="minutes"></p>
            </div>
        </div>
        <div class="col-md-3 h-100">
            <div class="bg-primary">
                <p class="fs-1 fw-bold text-white" id="seconds"> Seconds</p>
            </div>
        </div>
    </div>
</div>
<?php
$dateTime = strtotime('February 27, 2024 10:00:00');
$getDateTime = date("F d, Y H:i:s", $dateTime);
?>
<!-- Script -->
<script>
    var countDownTimer = new Date("<?php echo "$getDateTime"; ?>").getTime();
    // Update the count down every 1 second
    var interval = setInterval(function() {
        var current = new Date().getTime();
        // Find the difference between current and the count down date
        var diff = countDownTimer - current;
        // Countdown Time calculation for days, hours, minutes and seconds
        var days = Math.max(Math.floor(diff / (1000 * 60 * 60 * 24)),00);
        var hours = Math.max(Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)),0);
        var minutes =Math.max(Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60)),0);
        var seconds = Math.max(Math.floor((diff % (1000 * 60)) / 1000),0);

        document.getElementById("days").innerHTML = days + ' Days';
        document.getElementById("hours").innerHTML = hours + ' Hours';
        document.getElementById("minutes").innerHTML = minutes + ' Minutes';
        document.getElementById("seconds").innerHTML = seconds + ' Seconds';
        // Display Expired, if the count down is over
        if (diff < 0) {
            clearInterval(interval);
            document.getElementById("counter").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>