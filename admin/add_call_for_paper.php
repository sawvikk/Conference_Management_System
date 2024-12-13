<?php ob_start(); ?>
<?php require_once("../database/connection.php") ?>
<?php include("admin_header.php") ?>
<!-- Name	University	Topic	email	Image	Status -->
<?php
if (isset($_POST['add_call_for_paper'])) {
    extract($_POST);
    // echo "<pre>";
    // print_r($_POST);
    // print_r($_FILES);
    if (isset($_FILES['image1'], $_FILES['image2'], $_FILES['pdf_file'], $_FILES['doc_file'])) {
        $image1_name = $_FILES['image1']['name'];
        $image1_tmp_name = $_FILES['image1']['tmp_name'];
        $image2_name = $_FILES['image2']['name'];
        $image2_tmp_name = $_FILES['image2']['tmp_name'];
        $pdf_file_name = $_FILES['pdf_file']['name'];
        $pdf_file_tmp_name = $_FILES['pdf_file']['tmp_name'];
        $doc_file_name = $_FILES['doc_file']['name'];
        $doc_file_tmp_name = $_FILES['doc_file']['tmp_name'];
        // echo $image1_tmp_name;
        $path_info1 = strtolower(pathinfo($image1_name, PATHINFO_EXTENSION));
        $path_info2 = strtolower(pathinfo($image1_name, PATHINFO_EXTENSION));
        $path_info3 = strtolower(pathinfo($pdf_file_name, PATHINFO_EXTENSION));
        $path_info4 = strtolower(pathinfo($doc_file_name, PATHINFO_EXTENSION));
        // echo $path_info;
        $image1_name = uniqid() . ".$path_info1";
        $image2_name = uniqid() . ".$path_info2";
        $pdf_file_name = uniqid() . ".$path_info3";
        $doc_file_name = uniqid() . ".$path_info4";
        // $manuscript_pdf_file_type1 = $_FILES['image1']['type'];
        // $manuscript_pdf_file_type2 = $_FILES['image2']['type'];
        // print_r($_FILES['manuscript_pdf']);


        $count_error = 0;
        $arr1 = array("jpg", "png", "jpeg");
        $arr2 = array("jpg", "png", "jpeg");
        $arr3 = array("pdf");
        $arr4 = array("doc", "docx");
        if (!in_array($path_info1, $arr1) || !in_array($path_info2, $arr2) || !in_array($path_info3, $arr3) || !in_array($path_info4, $arr4)) {
            $count_error++;
        }

        if ($count_error > 0) {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Error occurs</p>";
        } else {
            $insert_sql = "INSERT INTO `call_for_paper`(`image1`,`image2`,`pdf_file`,`doc_file`) VALUES('$image1_name','$image2_name','$pdf_file_name','$doc_file_name')";
            $run_insert_qry = mysqli_query($conn, $insert_sql);
            if ($run_insert_qry) {
                move_uploaded_file($image1_tmp_name, '../Images/call_for_paper/' . $image1_name);
                move_uploaded_file($image2_tmp_name, '../Images/call_for_paper/' . $image2_name);
                move_uploaded_file($pdf_file_tmp_name, '../Files/call_for_paper/' . $pdf_file_name);
                move_uploaded_file($doc_file_tmp_name, '../Files/call_for_paper/' . $doc_file_name);
                header("location: show_all_call_for_papers.php");
                ob_end_flush();
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data is inserted</p>";
            }
        }
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Image is not found</p>";
    }
}
?>
<!--Code for adding new call_for_papers-->
<div class="container-fluid  mt-5 d-flex justify-content-center">
    <!-- <div class="row"> -->
    <div class="col-md-3 p-4 border border-primary border-2 rounded  col-12 bg-white">
        <h2 class="text-capitalize text-center">Add Call For Paper</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <!-- <div class="card p-3 mb-5 shadow"> -->
            <div class="mt-3">
                <label for="image1">Image-1</label>
                <input type="file" name="image1" id="image1" class="form-control" required>
            </div>
            <div class="mt-3">
                <label for="image2">Image-2</label>
                <input type="file" name="image2" id="image2" class="form-control" required>
            </div>
            <div class="mt-3">
                <label for="pdf_file">PDF File</label>
                <input type="file" name="pdf_file" id="pdf_file" class="form-control" required>
            </div>
            <div class="mt-3">
                <label for="doc_file">DOC File</label>
                <input type="file" name="doc_file" id="doc_file" class="form-control" required>
            </div>
            <div class=" d-flex justify-content-center mt-3">
                <input type="submit" name="add_call_for_paper" value="Add" class="btn btn-primary">
            </div>
            <!-- </div> -->
        </form>
    </div>
</div>

<?php include("admin_footer.php") ?>