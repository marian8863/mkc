<?php
include 'db_connection.php';

$title = $conn->real_escape_string($_POST['title']);
$tags = $conn->real_escape_string($_POST['tags']);
$c_id = (int)$_POST['c_id'];
$published_by = $conn->real_escape_string($_POST['published_by']);
$published_date = $conn->real_escape_string($_POST['published_date']);
$cover_img = $conn->real_escape_string($_POST['cover_img']);
$gallery_imgs = explode(',', rtrim($_POST['gallery_imgs'], ','));

// Insert data into blog_content table
$insert_blog_query = "INSERT INTO blog_content (cover_img, title, tags, published_by, c_id, published_date)
                      VALUES ('$cover_img', 'nknkn', 'knknk', 'bjbj', '2', '2024-08-09')";

if ($conn->query($insert_blog_query) === TRUE) {
    $blog_id = $conn->insert_id;

    // Insert gallery images into blog_gallery table
    foreach ($gallery_imgs as $gallery_img) {
        $gallery_img = $conn->real_escape_string($gallery_img);
        $insert_gallery_query = "INSERT INTO blog_gallery (gallery_img, blog_id, published_date)
                                 VALUES ('$gallery_img', $blog_id, '2024-08-09')";
        $conn->query($insert_gallery_query);
    }
    echo "Blog post and gallery images added successfully!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
