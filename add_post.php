<?php
include 'db_connection.php';

// Fetch categories for dropdown
$categories_result = $conn->query("SELECT c_id, c_name FROM categories");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog Post Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h2>Add New Blog Post</h2>

    <form action="submit_post.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Cover Image</label>
        <div id="coverDropzone" class="dropzone"></div>
        <input type="hidden" name="cover_img" id="cover_img">
    </div>

    <!-- Add other fields here -->

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

    <!-- <form action="" method="POST" enctype="multipart/form-data"> -->
        <!-- <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" value="bbjbhj" name="title" required>
        </div>
        <div class="mb-3">
            <label for="tags" class="form-label">Tags</label>
            <input type="text" class="form-control" id="tags" value="vhvhjvbh" name="tags">
        </div>-->

        <!-- <div class="mb-3">
            <label class="form-label">Cover Image</label>
            <div id="coverDropzone" class="dropzone"></div>
            <input type="hidden" name="cover_img" id="cover_img">
        </div>  -->

        <!-- <div class="mb-3">
            <label for="c_id" class="form-label">Category</label>
            <select class="form-select" id="c_id" name="c_id" required>
                <option value="">Select a category</option>
                <php while ($row = $categories_result->fetch_assoc()): ?>
                    <option value="<= $row['c_id'] ?>"><= htmlspecialchars($row['c_name']) ?></option>
                <php endwhile; ?>
            </select>
        </div> -->

        <!-- Dropzone for Gallery Images -->
        <!-- <div class="mb-3">
            <label class="form-label">Gallery Images</label>
            <div id="galleryDropzone" class="dropzone"></div>
            <input type="hidden" name="gallery_imgs" id="gallery_imgs">
        </div> -->

        <!-- <div class="mb-3">
            <label for="published_by" class="form-label">Published By</label>
            <input type="text" class="form-control" id="published_by" name="published_by" value="jbkjj" required>
        </div>
        <div class="mb-3">
            <label for="published_date" class="form-label">Published Date</label>
            <input type="date" class="form-control" id="published_date" name="published_date" value="2024-11-08" required>
        </div> -->
        <!-- <button type="submit" class="btn btn-primary">Submit</button>
    </form> -->
</div>

<!-- Initialize Dropzone Scripts -->
<script>

    // Initialize Dropzone
var coverDropzone = new Dropzone("#coverDropzone", {
    url: "upload_cover", // Ensure this is the correct PHP file
    maxFiles: 1,
    acceptedFiles: "image/*",
    addRemoveLinks: true,
    init: function () {
        this.on("success", function (file, response) {
            // When upload is successful, set the value of the hidden field
            document.getElementById('cover_img').value = response.img_upload;  // 'img_upload' returned from PHP
        });
        this.on("removedfile", function () {
            document.getElementById('cover_img').value = '';  // Clear value when file is removed
        });
    }
});

// Prevent form submission if the cover image is not uploaded yet
document.querySelector("form").addEventListener("submit", function(e) {
    var coverImgValue = document.getElementById('cover_img').value;

    // Check if the cover image is set
    if (!coverImgValue) {
        alert("Please upload a cover image before submitting.");
        e.preventDefault(); // Prevent form submission
    } else {
        console.log("Cover Image Value:", coverImgValue);
    }
});

 // Cover image Dropzone
// var coverDropzone = new Dropzone("#coverDropzone", {
//     url: "upload_cover",
//     maxFiles: 1,
//     acceptedFiles: "image/*",
//     addRemoveLinks: true,
//     init: function () {
//         this.on("success", function (file, response) {
//             document.getElementById('cover_img').value = response.img_upload;  // 'file' key returned from PHP
//         });
//         this.on("removedfile", function () {
//             document.getElementById('cover_img').value = '';
//         });
//     }
// });

// Gallery images Dropzone
// var galleryDropzone = new Dropzone("#galleryDropzone", {
//     url: "upload_gallery",
//     acceptedFiles: "image/*",
//     addRemoveLinks: true,
//     init: function () {
//         this.on("success", function (file, response) {
//             var currentValue = document.getElementById('gallery_imgs').value;
//             document.getElementById('gallery_imgs').value = currentValue + response.img_upload + ",";  // 'file' key returned from PHP
//         });
//         this.on("removedfile", function (file) {
//             var imageNames = document.getElementById('gallery_imgs').value.split(',');
//             var updatedNames = imageNames.filter(name => name !== file.upload.img_upload);
//             document.getElementById('gallery_imgs').value = updatedNames.join(',');
//         });
//     }
// });

document.querySelector("form").addEventListener("submit", function(e) {
    console.log("Cover Image Value:", document.getElementById('cover_img').value);
    // console.log("Gallery Images Value:", document.getElementById('gallery_imgs').value);
    // You can add more validation or prevent the form submission if the values are empty
});


</script>
</body>
</html>
