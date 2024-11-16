<?php
$upload_dir = './uploads/';
if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);

if (isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $fileName = 'gallery_' . time() . '_' . basename($file['name']);
    $filePath = $upload_dir . $fileName;

    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        echo json_encode(['img_upload' => $fileName]); // Same key here
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to upload file.']);
    }
}
?>
