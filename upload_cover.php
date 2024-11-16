<?php
$upload_dir = './uploads/';
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true); // Ensure the upload directory exists
}

if (isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $fileName = 'cover_' . time() . '_' . basename($file['name']);
    $filePath = $upload_dir . $fileName;

    // Move the uploaded file to the upload directory
    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        // Send back the filename in the response
        echo json_encode(['img_upload' => $fileName]); // 'img_upload' is the key to use in JS
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to upload file.']);
    }
}
?>
