<?php include('author_header.php') ?>
<?php include('../mail_sending2.php') ?>
<?php
if (isset($_POST['submit'])) {
    // extract($_POST);
    // $_SESSION['submit'] = 1;
    // $_SESSION['paper_title'] = $_POST['paper_title'];
    // $_SESSION['paper_keyword'] = $_POST['paper_keywords'];
    // $_SESSION['paper_abstract'] = $_POST['paper_abstract'];
    // $_SESSION['paper_type'] = $_POST['paper_type'];
    $_SESSION['number_of_authors'] = $_POST['paper_authors'];
    $_SESSION['input_field_name'] = "";
    $_SESSION['input_field_affiliation'] = "";
    // $_SESSION['input_field_designation'] = "";
    $_SESSION['input_field_email'] = "";
    


    for ($i = 0; $i < $_SESSION['number_of_authors']; $i++) {
        if ($i == $_SESSION['number_of_authors'] - 1) {
            $_SESSION['input_field_name'] .= $_POST['input_field_name' . $i];
            $_SESSION['input_field_affiliation'] .= $_POST['input_field_affiliation' . $i];
            // $_SESSION['input_field_designation'] .= $_POST['input_field_designation' . $i];
            $_SESSION['input_field_email'] .= $_POST['input_field_email' . $i];
        } else {
            $_SESSION['input_field_name'] .= $_POST['input_field_name' . $i] . ",";
            $_SESSION['input_field_affiliation'] .= $_POST['input_field_affiliation' . $i] . ",";
            // $_SESSION['input_field_designation'] .= $_POST['input_field_designation' . $i] . ",";
            $_SESSION['input_field_email'] .= $_POST['input_field_email' . $i] . ",";
        }
    }


    $manuscript_pdf_file_name = $_FILES['manuscript_pdf']['name'];
    // $manuscript_pdf_file_tmp_name = $_FILES['manuscript_pdf']['tmp_name'];
    // echo $manuscript_pdf_file_tmp_name;
    $path_info = pathinfo($manuscript_pdf_file_name, PATHINFO_EXTENSION);
    // echo $path_info;
    $manuscript_pdf_file_name = uniqid() . ".$path_info";
    $manuscript_pdf_file_type = $_FILES['manuscript_pdf']['type'];
    // print_r($_FILES['manuscript_pdf']);


    $count_error = 0;
    $arr = array("doc", "docx","pdf");
    //if ($path_info != "doc" || $path_info != "docx") {
    if (!in_array($path_info, $arr)) {
        $count_error++;
    }

    if ($count_error > 0) {
    } else {

        $authnum = $_POST['paper_authors']; 
        $coauthnum = $_POST['corresponding_author_number']-1;
        $coauthname = $_POST['input_field_name' . $coauthnum];
        $coauthaffiliation = $_POST['input_field_affiliation' . $coauthnum];
        $coauthemail = $_POST['input_field_email'.$coauthnum];

        $paper_id = time();

        $paper_title = $_POST['paper_title'];
        $paper_keyword = $_POST['paper_keywords'];
        $track = $_POST['track'];
        // echo $track;
        // $paper_abstract = $_SESSION['paper_abstract'];
        // $paper_type = $_SESSION['paper_type'];
        $input_field_name = $_SESSION['input_field_name'];
        $input_field_affiliation = $_SESSION['input_field_affiliation'];
        // $input_field_designation = $_SESSION['input_field_designation'];
        $input_field_email = $_SESSION['input_field_email'];
        // echo $paper_title;

        $timestamps = date("Y-m-d h:i:s", $paper_id);
        $current_time = date("d F, Y", $paper_id);
        $current_year = date("Y", $paper_id);
        // echo $current_time;
        // echo $paper_title;
        

        $select_from_new_paper = "SELECT * FROM `new_paper` WHERE author_id='$_SESSION[author_id]'";
        $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
        if (mysqli_num_rows($run_select_from_new_paper) > 0) {
            // echo "Entering line 76";
            $row = mysqli_fetch_assoc($run_select_from_new_paper);
            extract($row);
            // echo $authors_email;
            $arr = explode(",", $authors_email);
            // print_r($arr);
            $bool = in_array($_SESSION['author_email'], $arr);
            // echo $bool;
            if ($bool) {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>One author can upload only one paper</p>";
            }
        } else {
            $insert_qry = "INSERT INTO `new_paper`(`paper_id`, `author_id`,`paper_title`, `paper_keywords`,`track`,`authors_name`, `authors_affiliation`, `authors_email`, `manuscript_pdf`, `paper_status`, `count`,`timestamps`, `corresponding_author_name`, `corresponding_author_affiliation`, `corresponding_author_email`) VALUES ('$paper_id','$_SESSION[author_id]','$paper_title','$paper_keyword','$track','$input_field_name','$input_field_affiliation','$input_field_email','$manuscript_pdf_file_name','1','1','$timestamps','$coauthname','$coauthaffiliation','$coauthemail')";

            $run_insert_qry = mysqli_query($conn, $insert_qry);
            if ($run_insert_qry) {
                move_uploaded_file($_FILES['manuscript_pdf']['tmp_name'], 'document_for_manuscript/' . $manuscript_pdf_file_name);

                // sent mail
                $receiver = $_SESSION['author_email'];
                $subject = "New Manuscript Submission";
                $body = '<p>Dear Author(s),<br/>Thank you very much for uploading the following manuscript to the ICTBJ-2023
            submission system. We shall be in touch with you when the review of the paper will be completed.<br/><br/>
            <b>Manuscript ID:</b> ICTBJ-' . $current_year . '-' . $_SESSION['author_id'] . '<br/>
            <b>Track of manuscript:</b> ' . $track . '<br/>
            <b>Title:</b> ' . $paper_title . '<br/>
            <b>Authors:</b> ' . $input_field_name . '<br/>
            <b>Received:</b> ' . $current_time . '<br/>
            <b>E-mails:</b> ' . $input_field_email . '<br/><br/><br/>

            Best Regards,<br/>
            Professor Dr. Tushar Kanti Saha,<br/>
            Convener,<br/>
            ICTBJ-2023 Organizing Committee <br/>
            Trishal, Mymensingh, Bangladesh <br/>
            E-Mail: <a href="ictbj@.com">ictbj@.com</a> <br/>
            Tel. +8801711028510 (WhatsApp)</p>';
                $send_mail = send_mail($receiver, $subject, $body);
?>
                <script>
                    // let text = "Do you really want to submit the paper?";
                    // if (confirm(text) == true) {
                    window.alert("Your Paper Has Successfully Submitted. Please check mail for further instructions");
                    window.location = "new_papers.php";
                    // }
                    // else{
                    //     window.location = "new_paper_submission.php";
                    // }
                </script>
<?php
            }
        }
    }
}
?>

<!-- <div  class="container-fluid my-5 d-flex justify-content-center ">
<div class="col-md-3 col-12">
<div class="card rounded m-auto py-4 px-5 shadow"> -->


<div class="container-fluid mt-5 d-flex justify-content-center ">
    
    <div class="col-md-10 col-lg-6 col-12 ">
        <div class="card pt-5 pb-4 shadow mb-5 px-md-5 px-3 bg-white border border-primary border-2 rounded">
            <!-- <div class="card-header"> -->
            <!-- </div> -->
            <!-- <div class="card-body"> -->
            <form action="" method="POST" enctype="multipart/form-data" onsubmit="return confirmPaper()">
                <!-- <div class="row justify-content-center"> -->
                <!-- <div class="col-md-6"> -->
                <h3 class="text-center text-dark fw-bold">New Manuscript Submission</h3>
                <div class="row">
                <div class="mt-3 col-md-6">
                    <label for="paper_title"><b>Manuscript Title: <span class="text-danger">*</span></b></label>
                    <div class="input-group mt-2">
                        <input type="text" class="form-control" name="paper_title" id="paper_title" placeholder="Please Type Paper Title" required>
                    </div>
                </div> 
                <!-- </div> -->
                <!-- <div class="col-md-6"> -->
                <div class="mt-3 col-md-6"> 
                    <label for="paper_keywords"><b>Keywords: <span class="text-danger">*</span> <i class="text-danger">(Please Separate by ",")</i></b></label>
                    <div class="input-group mt-2">
                        <input type="text" class="form-control" name="paper_keywords" id="paper_keywords" placeholder="Please Type Keywords" required>
                    </div>
                </div>
                </div>
                <!-- </div> -->

                <!-- <div class="row justify-content-center">
                            <div class="col-md-6"> -->
                <div class="row">
                <div class="mt-3 col-md-6">
                    <label for="track"><b>Track :<span class="text-danger">*</span></b></label>
                    <div class="input-group mt-2">
                        <select class="form-select" name="track" id="track" required>
                            <option value="">Please select a track</option>
                            <option value="Science">Science</option>
                            <option value="Business">Business</option>
                            <option value="Law">Law</option>
                        </select>
                    </div>
                </div>
                <!-- </div>
                </div> -->

                <!-- <div class="row justify-content-center">
                    <div class="col-md-6"> -->
                <div class="mt-3 col-md-6">
                    <label for="select_number_of_authors"><b>Number of Authors:</b></label>
                    <div class="input-group  mt-2">
                        <select class="form-control" name="paper_authors" id="select_number_of_authors" onchange="selectNumberOfaAuthors()" required>
                            <option value="0" selected disabled>Please Select Any Number</option>
                            <?php
                            for ($i = 1; $i <= 5; $i++) {
                            ?>
                                <option value="<?php echo $i ?>"><?php echo $i; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                </div>
                <!-- </div>
            </div> -->

                <div class="row justify-content-center" id="create_div">

                </div>
                <div class="mt-2" id="coauthor"> 

                </div>

                <!-- <div class="row justify-content-center">
                    <div class="col-md-6"> -->
                <div class="mt-2   ">
                    <label for="manuscript_pdf"><b>Select Document For Manuscript: <span class="text-danger">*</span></b></label>
                    <div class="input-group mt-2">
                        <br>
                        <input type="file" class="form-control" name="manuscript_pdf" id="manuscript_pdf" onchange="uploadManuscript()">
                    </div>
                </div>

                <!-- Start of table for manuscript -->
                <div class="col-lg-12 mt-2" style="display:none" id="table_for_manuscript">
                    <table class="table table-bordered">
                        <tr>
                            <th>Serial No:</th>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>Document Type:</th>
                            <td>Manuscript</td>
                        </tr>
                        <tr>
                            <th>File Size</th>
                            <td id="manuscript_file_size"></td>
                        </tr>
                    </table>
                </div>
                <?php if (isset($count_error) && $count_error > 0) echo "<p id='mauscript_pdf_error' style='color: red'>*File Type Must be MS Word (DOC or DOCX)</p>" ?>
                <!-- End of table for manuscript -->
                <!-- <p id="mauscript_pdf_error" class="text-warning bg-black text-center m-2 fw-bold "></p> -->
                <!-- </div> -->
                <!-- </div> -->

                <!-- <div class="row justify-content-center">
            <div class="col-md-4 col-12"> -->
                <div class="d-flex justify-content-center mt-4  ">
                    <div class="text-center ">
                    <input type="submit" name="submit" class="form-control btn btn-primary fw-bold" value="Submit" onclick="return confirmSubmission()">
                </div></div>
            </form>
            <script>
                function selectNumberOfaAuthors() {
                    
                    var create_author_label_name_affiliation_designation_email_div;
                    let number = document.getElementById("select_number_of_authors").value;

                    let e = document.getElementById("create_div");
                    var child = e.lastElementChild;
                    while (child) {
                        e.removeChild(child);
                        child = e.lastElementChild;
                    }


                    let corresponding_author = document.getElementById("coauthor");
                    var child1 = corresponding_author.lastElementChild;
                    while (child1) {
                        corresponding_author.removeChild(child1);
                        child1 = corresponding_author.lastElementChild;
                    }
                    let corresponding_author_number = document.createElement("INPUT");
                    let label = document.createElement("LABEL");
                    label.innerHTML = "Corresponding Author: ";
                    label.className = "fw-bold mt-2"; 
                    corresponding_author_number.type="number";
                    corresponding_author_number.className="form-control mt-2";
                    corresponding_author_number.name="corresponding_author_number";
                    corresponding_author_number.required = true;
                    corresponding_author_number.min=1;
                    corresponding_author_number.max=number;
                    corresponding_author_number.placeholder = "Enter Corresponding Author number"; 
                    corresponding_author.appendChild(label); 
                    corresponding_author.appendChild(corresponding_author_number); 



                    for (let j = 0; j < number; j++) {
                        let create_div = document.getElementById("create_div");

                        let create_div_element = document.createElement("DIV");
                        create_div_element.className = "col-md-4";


                        create_div.appendChild(create_div_element);

                        let input_field_name = document.createElement("INPUT");
                        let input_field_affiliation = document.createElement("INPUT");
                        // let input_field_designation = document.createElement("INPUT");
                        let input_field_email = document.createElement("INPUT");
                        let input_field_label = document.createElement("LABEL");

                        input_field_name.type = "text";
                        input_field_name.className = "form-control mt-2";
                        input_field_name.name = `input_field_name${j}`;
                        input_field_name.required = true;
                        input_field_name.placeholder = `Enter Author Name ${j+1}`;

                        input_field_affiliation.type = "text";
                        input_field_affiliation.className = "form-control mt-2";
                        input_field_affiliation.name = `input_field_affiliation${j}`;
                        input_field_affiliation.required = true;
                        input_field_affiliation.placeholder = `Enter Author Affiliation ${j+1}`;

                        // input_field_designation.type = "text";
                        // input_field_designation.className = "form-control mt-2";
                        // input_field_designation.name = `input_field_designation${j}`;
                        // input_field_designation.required = true;
                        // input_field_designation.placeholder = `Enter Author Designation ${j+1}`;

                        input_field_email.type = "email";
                        input_field_email.className = "form-control mt-2";
                        input_field_email.name = `input_field_email${j}`;
                        input_field_email.required = true;
                        input_field_email.placeholder = `Enter Author Email ${j+1}`;

                        input_field_label.className = "fw-bold mt-2";
                        input_field_label.innerHTML = `Author ${j+1} Information :`;

                        create_div_element.appendChild(input_field_label);
                        create_div_element.appendChild(input_field_name);
                        create_div_element.appendChild(input_field_affiliation);
                        // create_div_element.appendChild(input_field_designation);
                        create_div_element.appendChild(input_field_email);
                    }
                }

                function uploadManuscript() {
                    document.getElementById("table_for_manuscript").style = "display: block";
                    let file_size = document.getElementById("manuscript_pdf").files[0].size;
                    document.getElementById("manuscript_file_size").innerHTML = file_size + " bytes";

                }

                function confirmSubmission() {
                    return confirm("Are you sure you want to confirm your submission?");
                }
            </script>
        </div>
    </div>
</div>

<?php include('author_footer.php') ?>