<?php
$filename = "manuscript.zip";
echo $filename;
if (file_exists($filename)) {
    // adjust the below absolute file path according to the folder you have downloaded
    // the zip file
    // I have downloaded the zip file to the current folder
    $absoluteFilePath = __DIR__ . '/admin//' . $filename;
    echo $absoluteFilePath;
    header('Pragma: public');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Cache-Control: private', false);
    // content-type has to be defined according to the file extension (filetype)
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="' . basename($filename) . '";');
    header('Content-Transfer-Encoding: binary');
    header('Content-Length: ' . filesize($absoluteFilePath));
    readfile($absoluteFilePath);
    exit();
}
?>