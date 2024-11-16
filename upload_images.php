<?php
$upload_dir = 'uploads/';
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

$response = [];
$errors = [];

if (isset($_FILES['images'])) {
    $totalFiles = count($_FILES['images']['name']);

    for ($i = 0; $i < $totalFiles; $i++) {
        $fileTmp = $_FILES['images']['tmp_name'][$i];
        $fileName = basename($_FILES['images']['name'][$i]);
        $fileSize = $_FILES['images']['size'][$i];
        $fileError = $_FILES['images']['error'][$i];

        // Check if the file is a valid image
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        if (!in_array($fileExt, ['jpg', 'jpeg', 'png', 'gif'])) {
            $errors[] = "File $fileName is not a valid image.";
            continue;
        }

        if ($fileError === UPLOAD_ERR_OK) {
            $newFileName = uniqid('img_', true) . '.' . $fileExt;
            $filePath = $upload_dir . $newFileName;

            if (move_uploaded_file($fileTmp, $filePath)) {
                $response[] = ['filename' => $newFileName, 'path' => $filePath];
            } else {
                $errors[] = "Error uploading $fileName.";
            }
        } else {
            $errors[] = "Error with file $fileName.";
        }
    }

    if (count($errors) > 0) {
        echo json_encode(['status' => 'error', 'messages' => $errors]);
    } else {
        echo json_encode(['status' => 'success', 'files' => $response]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'No files uploaded.']);
}
?>
