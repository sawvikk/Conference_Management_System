<?php ob_start(); ?>
<?php require_once("../database/connection.php") ?>
<?php include("admin_header.php") ?>
<?php
if (isset($_POST['edit_call_for_paper'])) {
    extract($_POST);
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
            unlink('../Images/call_for_paper/' . $current_image1);
            unlink('../Images/call_for_paper/' . $current_image2);
            unlink('../Files/call_for_paper/' . $current_pdf_file);
            unlink('../Files/call_for_paper/' . $current_doc_file);
            $update_sql = "UPDATE `call_for_paper` SET `image1`='$image1_name',`image2`='$image2_name',`pdf_file`='$pdf_file_name',`doc_file`='$doc_file_name' WHERE id='$id'";
            $run_insert_qry = mysqli_query($conn, $update_sql);
            if ($run_insert_qry) {
                move_uploaded_file($image1_tmp_name, '../Images/call_for_paper/' . $image1_name);
                move_uploaded_file($image2_tmp_name, '../Images/call_for_paper/' . $image2_name);
                move_uploaded_file($pdf_file_tmp_name, '../Files/call_for_paper/' . $pdf_file_name);
                move_uploaded_file($doc_file_tmp_name, '../Files/call_for_paper/' . $doc_file_name);
                header("location: show_all_call_for_papers.php");
                ob_end_flush();
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data is updated</p>";
            }
        }
    }
}
