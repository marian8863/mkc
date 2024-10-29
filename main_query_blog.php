<?php
// Fetch unique months from blog_content for archives
$archive_sql = "
    SELECT DISTINCT DATE_FORMAT(published_date, '%Y-%m') AS month_year
    FROM blog_content
    ORDER BY month_year DESC";
$archive_result = $con->query($archive_sql);

$archives = [];
if ($archive_result->num_rows > 0) {
    while ($row = $archive_result->fetch_assoc()) {
        $archives[] = $row['month_year'];
    }
}

// Handle month-year filtering
$selected_month_year = isset($_GET['archive']) ? $con->real_escape_string($_GET['archive']) : '';

// Fetch unique site names from the categories table
$site_name_sql = "SELECT DISTINCT site_name FROM categories";
$site_name_result = $con->query($site_name_sql);

$site_names = [];
if ($site_name_result->num_rows > 0) {
    while ($row = $site_name_result->fetch_assoc()) {
        $site_names[] = $row['site_name'];
    }
}

// Get site name and post ID from URL
$selected_site_name = isset($_GET['site_name']) ? $con->real_escape_string($_GET['site_name']) : '';
$selected_post_id = isset($_GET['post_id']) ? (int)$_GET['post_id'] : 0;

// Get category ID(s) for the selected site name
$category_ids = [];
if ($selected_site_name && $selected_site_name !== 'all') {
    $site_name_categories_sql = "SELECT c_id FROM categories WHERE site_name = '$selected_site_name'";
    $site_name_categories_result = $con->query($site_name_categories_sql);

    if ($site_name_categories_result->num_rows > 0) {
        while ($row = $site_name_categories_result->fetch_assoc()) {
            $category_ids[] = $row['c_id'];
        }
    }
}

// If a specific post is selected, find its category ID
if ($selected_post_id > 0) {
    $post_category_sql = "SELECT c_id FROM blog_content WHERE blog_id = $selected_post_id";
    $post_category_result = $con->query($post_category_sql);
    
    if ($post_category_result->num_rows > 0) {
        $post_category_row = $post_category_result->fetch_assoc();
        $category_ids = [$post_category_row['c_id']]; // Use the category of the selected post
    }
}

// Calculate the pagination range
function paginate($total_pages, $current_page) {
    $range = 2; // Number of pages to show around the current page
    $start = max(1, $current_page - $range);
    $end = min($total_pages, $current_page + $range);
    
    // If there are more pages before the range
    if ($start > 1) {
        $pages[] = 1; // Always include the first page
        if ($start > 2) {
            $pages[] = '...'; // Add ellipsis if there's a gap
        }
    }
    
    // Add the range of pages
    for ($i = $start; $i <= $end; $i++) {
        $pages[] = $i;
    }
    
    // If there are more pages after the range
    if ($end < $total_pages) {
        if ($end < $total_pages - 1) {
            $pages[] = '...'; // Add ellipsis if there's a gap
        }
        $pages[] = $total_pages; // Always include the last page
    }

    return $pages;
}

// Pagination settings
$records_per_page = 2; // Number of records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $records_per_page;

// Fetch total record count for pagination
$total_sql = "SELECT COUNT(*) AS total FROM blog_content" . (count($category_ids) > 0 ? " WHERE blog_content.c_id IN (" . implode(',', $category_ids) . ")" : "");
$total_result = $con->query($total_sql);
$total_row = $total_result->fetch_assoc();
$total_records = $total_row['total'];
$total_pages = ceil($total_records / $records_per_page);

// Generate pagination
$pagination = paginate($total_pages, $page);

// Adjust SQL query to filter by selected category IDs if provided
// Adjust SQL query to filter by selected category IDs and/or archive month-year if provided
$filter_sql = "
SELECT 
    blog_content.blog_id,
    blog_content.cover_img, 
    blog_content.title, 
    blog_content.tags, 
    blog_content.published_by, 
    categories.c_name AS category, 
    blog_content.published_date
FROM 
    blog_content
JOIN 
    categories ON blog_content.c_id = categories.c_id
" . (count($category_ids) > 0 || $selected_month_year ? "WHERE " : "") .
(count($category_ids) > 0 ? "blog_content.c_id IN (" . implode(',', $category_ids) . ")" : "") .
($selected_month_year ? (count($category_ids) > 0 ? " AND " : "") . "DATE_FORMAT(blog_content.published_date, '%Y-%m') = '$selected_month_year'" : "") . "
ORDER BY 
    CASE WHEN blog_content.blog_id = $selected_post_id THEN 0 ELSE 1 END, 
    blog_content.published_date DESC
LIMIT $offset, $records_per_page";

$result = $con->query($filter_sql);

$blogs = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $blog_id = $row['blog_id'];
        
        // Fetch gallery images for each blog post
        $gallery_sql = "SELECT gallery_img FROM blog_gallery WHERE blog_id = $blog_id";
        $gallery_result = $con->query($gallery_sql);
        $gallery_images = [];
        
        if ($gallery_result->num_rows > 0) {
            while ($gallery_row = $gallery_result->fetch_assoc()) {
                $gallery_images[] = $gallery_row['gallery_img'];
            }
        }
        
        $blogs[$blog_id] = [
            'details' => $row,
            'gallery' => $gallery_images
        ];
    }
} else {
    $no_posts_message = $selected_site_name ? "No posts available for the site '$selected_site_name'." : "No posts available.";
}

// Get total record count for pagination
$total_sql = "SELECT COUNT(*) AS total FROM blog_content" . (count($category_ids) > 0 ? " WHERE blog_content.c_id IN (" . implode(',', $category_ids) . ")" : "");
$total_result = $con->query($total_sql);
$total_row = $total_result->fetch_assoc();
$total_records = $total_row['total'];
$total_pages = ceil($total_records / $records_per_page);

// Fetch random posts for the "Recent Posts" widget
$random_posts_sql = "
SELECT 
    blog_content.blog_id,
    blog_content.cover_img, 
    blog_content.title,
    blog_content.published_date,
    categories.site_name
FROM 
    blog_content
JOIN
    categories ON blog_content.c_id = categories.c_id
ORDER BY 
    RAND()
LIMIT 3
";

$random_posts_result = $con->query($random_posts_sql);

$recent_posts = [];
if ($random_posts_result->num_rows > 0) {
    while ($row = $random_posts_result->fetch_assoc()) {
        $recent_posts[] = $row;
    }
}

// Close connection
$con->close();
?>

<?php
function truncateTitle($title, $maxLength = 60) {
    if (strlen($title) > $maxLength) {
        return substr($title, 0, $maxLength) . '...';
    }
    return $title;
}
?>
