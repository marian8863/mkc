<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "masterkingconstructions";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$upload_dir = './uploads/';
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

function isValidImage($fileTmpName, $fileName) {
    $valid_extensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp'];
    $file_extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $file_mime_type = mime_content_type($fileTmpName);
    $valid_mime_types = ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'];

    return in_array($file_extension, $valid_extensions) && in_array($file_mime_type, $valid_mime_types);
}

if (isset($_FILES['file'])) {
    $type = $_POST['type'];
    $blog_id = $_POST['blog_id'];
    $published_date = $_POST['published_date'];

    if (isValidImage($_FILES['file']['tmp_name'], $_FILES['file']['name'])) {
        $img_name = $type . '_' . time() . '_' . basename($_FILES['file']['name']);
        $img_path = $upload_dir . $img_name;

        if (move_uploaded_file($_FILES['file']['tmp_name'], $img_path)) {
            if ($type === 'cover') {
                $query = "INSERT INTO blog_content (cover_img, published_date) VALUES ('$img_name', '$published_date')";
                $conn->query($query);
            } else {
                $query = "INSERT INTO blog_gallery (gallery_img, blog_id, published_date) VALUES ('$img_name', $blog_id, '$published_date')";
                $conn->query($query);
            }
            echo json_encode(['status' => 'success', 'path' => $img_path]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'File upload error']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid image format']);
    }
}
$conn->close();
?>
