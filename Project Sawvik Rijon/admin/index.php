<?php include("admin_header.php"); ?>



<div class="container-fluid mt-3 text-center">
    <h3 class="text-dark">Admin Dashboard</h3>
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="card shadow p-3 mb-5">
                <h6>Add Speaker</h6>
                <a href="add_speaker_details.php">Add</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow p-3 mb-5">
                <h6>View Speakers</h6>
                <a href="show_all_speakers.php">View</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow p-3 mb-5">
                <h6>Add Committee Member</h6>
                <a href="add_committee_details.php">Add</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow p-3 mb-5">
                <h6>View Committee Members</h6>
                <a href="committee_details.php">View</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow p-3 mb-5">
                <h6>Add Important Date</h6>
                <a href="add_important_dates.php">Add</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow p-3 mb-5">
                <h6>View Important Dates</h6>
                <a href="show_all_dates.php">View</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow p-3 mb-5">
                <h6>Add Call For Paper</h6>
                <a href="add_call_for_paper.php">Add</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow p-3 mb-5">
                <h6>View Call For Papers</h6>
                <a href="show_all_call_for_papers.php">View</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow p-3 mb-5">
                <h6>View Extended Abstract</h6>
                <a href="show_all_papers.php">View</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow p-3 mb-5">
                <h6>View Authors</h6>
                <a href="view_authors.php">View</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow p-3 mb-5">
                <h6>Add Reviewer</h6>
                <a href="add_reviewers.php">Add</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow p-3 mb-5">
                <h6>View Reviewers</h6>
                <a href="show_all_reviewers.php">View</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow p-3 mb-5">
                <h6>Manage Pending Reviewers</h6>
                <a href="manage_pending_reviewers.php">Manage</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow p-3 mb-5">
                <h6>View Paper Reviews</h6>
                <a href="show_all_reviews.php">Select Paper</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow p-3 mb-5">
                <h6>View Reviewer's Review</h6>
                <a href="show_reviewer.php">Select Reviewer</a>
            </div>
        </div>    
        <div class="col-md-6">
            <div class="card shadow p-3 mb-5">
                <h6>Assign Papers</h6>
                <a href="assign_paper_type.php">Assign</a>
            </div>
        </div> 
    </div>
</div>
<?php include("admin_footer.php"); ?>