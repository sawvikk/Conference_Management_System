<?php require_once("database/connection.php") ?>

<?php include_once('linker.php') ?>

<body>
    <header>
       <?php include_once('header.php') ?>
    </header>
    
    <section class="HomepageSection m-0" id="NewsScroller">
        <?php include_once('news_scroller.php')?>
    </section>
    <section class="HomepageSection" id="HomeBanner">
        <?php include_once('home_banner.php') ?>
    </section>

    <section>
        <?php include_once('chief_patron.php') ?>
    </section>
    <section class="HomepageSection mt-5 text-center" id="Speakers">
        <?php include_once('speakers2.php') ?>
    </section>
    <section class="HomepageSection mt-5 text-center" id="Publication">
        <?php include_once('publication.php') ?>
    </section>
    <section class="HomepageSection mt-5" id="AboutEvent">
        <?php include_once('about_event.php') ?>
    </section>

    <section class="HomepageSection mt-5 text-center" id="Countdown">
        <?php include_once('count_down.php') ?>
    </section>


    <section class="HomepageSection mt-5 text-center" id="Committee">
        <?php include_once('committee.php') ?>
    </section>

    <section class="HomepageSection mt-5" id="CallForPaper">
        <?php include_once('call_for_paper.php') ?>
    </section>

    <section class="HomepageSection mt-5" id="GuideLines">
        <?php include_once('guidelines.php') ?>
    </section>

    <section class="HomepageSection mt-5" id="ImportantDates">
        <?php include_once('important_dates.php') ?>
    </section>

    <section class="HomepageSection mt-5" id="PaymentDetails">
        <?php include_once('payment_table.php') ?>
    </section>

    <section class="HomepageSection mt-5" id="Schedule">
        <h2 class="text-uppercase fw-bold text-center mb-3" data-aos="fade-up">Conference <span class="secondary_color">Schedule</span> </h2>
        <h3 style="color:darkred" data-aos="fade-up-right" align="center">Coming Soon</h3>
    </section>

    <section class="HomepageSection mt-5" id="EventVenue">
        <?php include_once('event_venue.php') ?>
    </section>

    <section class="HomepageSection mt-5" id="Sponsors">
        <?php include_once('sponsors.php') ?>
    </section>

    <footer data-aos="fade-up">
        <?php include_once('footer.php') ?>
    </footer>
    <!-- Here we hook our AOS JS file  -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- Activate AOS Library -->
    <script>
        AOS.init();
    </script>
</body>

</html>