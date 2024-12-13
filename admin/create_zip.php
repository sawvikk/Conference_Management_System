<?php
// Important: You should have read and write permissions to read
// the folder and write the zip file
$zipArchive = new ZipArchive();
$zipFile = "./manuscript.zip";
if ($zipArchive->open($zipFile, ZipArchive::CREATE) !== TRUE) {
    exit("Unable to open file.");
}
$folder = '../admin/document_for_manuscript';
createZip($zipArchive, $folder);
$zipArchive->close();
echo 'Zip file created.';

function createZip($zipArchive, $folder)
{
    if (is_dir($folder)) {
        if ($f = opendir($folder)) {
            while (($file = readdir($f)) !== false) {
                if (is_file($folder . $file)) {
                    if ($file != '' && $file != '.' && $file != '..') {
                        $zipArchive->addFile($folder . $file);
                    }
                } else {
                    if (is_dir($folder . $file)) {
                        if ($file != '' && $file != '.' && $file != '..') {
                            $zipArchive->addEmptyDir($folder . $file);
                            $folder = $folder . $file . '/';
                            createZip($zipArchive, $folder);
                        }
                    }
                }
            }
            closedir($f);
        } else {
            exit("Unable to open directory " . $folder);
        }
    } else {
        exit($folder . " is not a directory.");
    }
}
?>