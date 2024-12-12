<?php
$uploadDir = 'uploads/';

if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$uploadedFile = $uploadDir . basename($_FILES['file']['name']);
$uploadSuccess = move_uploaded_file($_FILES['file']['tmp_name'], $uploadedFile);

$response = array();

if ($uploadSuccess) {
    $response['success'] = true;
    $response['filePath'] = $uploadedFile;
} else {
    $response['success'] = false;
}

header('Content-Type: application/json');
echo json_encode($response);
?>
