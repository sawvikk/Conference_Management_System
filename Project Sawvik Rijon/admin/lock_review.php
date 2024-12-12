<?php require_once("../database/connection.php") ?>

<?php 
if (isset($_GET['reviewer_id'], $_GET['paper_id'])) {
    $reviewer_id=$_GET['reviewer_id'];
    $paper_id=$_GET['paper_id'];
    // echo $reviewer_id;
    // echo $paper_id;

    $insert_data = "UPDATE `review_table` SET `further_review`=impossible WHERE `reviewer_id`=$reviewer_id AND `paper_id`=$paper_id;";
    $insert_query = mysqli_query($conn, $insert_data);
    if ($insert_query) {
        echo "Locked";
        // header("Location: assign_reviewer_table.php?paper_id=".$paper_id);

    }
    else{
        echo "Not Assigned . Something went wrong .";
        // header("Location: assign_reviewer_table.php?id=".$paper_id);

    }

}
else{
    echo "Something went wrong";
}


?>
