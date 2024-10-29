<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Blog | MKC.";

include_once("head.php");
include_once("menu.php");

// $u_n = $_SESSION['user']['username'];
// $u_t = $_SESSION['user']['user_type'];
// $u_p = $_SESSION['user']['profile'];

include_once("main_query_blog.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<style>
.loading-spinner {
    width: 100%; 
    height: 100%; 
    background: url('images/load.gif') no-repeat center center/cover;
    background-size: 20px 20px; 
    display: block; 
    position: absolute; 
    top: 0; 
    left: 0; 
    z-index: 10; /* Ensure it appears above the image */
}

.image-container {
    position: relative; /* Set the position to relative to contain the spinner */
}

.img-loaded {
    opacity: 1; 
    transition: opacity 10s ease-in-out; 

}

.img-loading {
    opacity: 0; 
}
</style>

<script>
function removeLoadingSpinner(img) {
    const container = img.parentElement; // Get the container div
    const spinner = container.querySelector('.loading-spinner'); // Get the spinner
    if (spinner) {
        spinner.style.display = 'none'; // Hide the spinner
    }
    img.classList.remove('img-loading'); // Remove loading class
    img.classList.add('img-loaded'); // Add loaded class
}
</script>



<div id="banner-area" class="banner-area" style="background-image:url(images/banner/banner3.jpg)">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">Our Site Works</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item"><a href="#">Blog</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Our Site Works</li>
                    </ol>
                </nav>
              </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Banner text end -->
</div><!-- Banner area end --> 

<section id="main-container" class="main-container">
        <div class="container">
            <div class="row">

            <div class="col-lg-4 order-1 order-lg-0">

                <div class="sidebar sidebar-left">
                <?php
                
                ?>
                <!-- Recent post  -->
                <div class="widget recent-posts">
            <h3 class="widget-title">Recent Posts</h3>
            <ul class="list-unstyled">
                <?php if (!empty($recent_posts)): ?>
                    <?php foreach ($recent_posts as $post): ?>
                        <li class="d-flex align-items-center">
                            <div class="posts-thumb">
                                <a href="?site_name=<?php echo urlencode($post['site_name']); ?>&post_id=<?php echo $post['blog_id']; ?>">
                                    <img loading="lazy" src="images/news/project1/<?php echo $post['cover_img']; ?>">
                                </a>
                            </div>
                            <div class="post-info">
                                <h4 class="entry-title">
                                    <a href="?site_name=<?php echo urlencode($post['site_name']); ?>&post_id=<?php echo $post['blog_id']; ?>">
                                        <?php echo htmlspecialchars(truncateTitle($post['title'])); ?>
                                    </a>
                                </h4>
                                <small class="post-date"><?php echo date("F j, Y", strtotime($post['published_date'])); ?></small> <!-- Display the published date -->
                            </div>
                        </li><!-- Post end -->
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>No recent posts available.</li>
                <?php endif; ?>
            </ul>
        </div><!-- Recent post end -->






          <!-- Recent post end -->



          <div class="widget">
            <h3 class="widget-title">Categories</h3>
            <ul class="arrow nav nav-tabs category-list">
                <li><a href="?site_name=all">Show All Posts</a></li>
                <?php foreach ($site_names as $site_name): ?>
                    <li><a href="?site_name=<?php echo urlencode($site_name); ?>"><?php echo htmlspecialchars($site_name); ?></a></li>
                <?php endforeach; ?>
            </ul>
          </div><!-- Categories end -->

            <div class="widget ">
                <h3 class="widget-title">Archives</h3>
                <ul class="arrow nav nav-tabs widget-archives">
                    <?php foreach ($archives as $archive): ?>
                        <li><a href="?archive=<?php echo urlencode($archive); ?>"><?php echo date("F Y", strtotime($archive . "-01")); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div><!-- Archives end -->



          <div class="widget widget-tags">
            <h3 class="widget-title">Tags </h3>

            <ul class="list-unstyled">
              <li><a href="#">Construction</a></li>
              <li><a href="#">Design</a></li>
              <li><a href="#">Project</a></li>
              <li><a href="#">Building</a></li>
              <li><a href="#">Finance</a></li>
              <li><a href="#">Safety</a></li>
              <li><a href="#">Contracting</a></li>
              <li><a href="#">Planning</a></li>
            </ul>
          </div><!-- Tags end -->


        </div><!-- Sidebar end -->
      </div><!-- Sidebar Col end -->



<!-- main content -->
<div class="col-lg-8 mb-5 mb-lg-0 order-0 order-lg-1">
    <?php if (!empty($blogs)): ?>
        <?php foreach ($blogs as $blog_id => $blog): ?>
        <div class="post">
            <div class="post-media post-image image-container">
                <span class="loading-spinner"></span>
                <img loading="lazy" src="images/news/project1/<?php echo $blog['details']['cover_img']; ?>" alt="img" class="img-fluid img-loading" onload="removeLoadingSpinner(this)">
            </div>

            <div class="post-body">
                <div class="entry-header">
                    <div class="post-meta">
                        <span class="post-author">
                            <i class="far fa-user"></i><a href="#"> <?php echo $blog['details']['published_by']; ?></a>
                        </span>
                        <span class="post-cat">
                          <i class="far fa-folder-open"></i><a> <?php echo $blog['details']['category']; ?></a>
                        </span>
                        <span class="post-meta-date"><i class="far fa-calendar"></i><?php echo date('M d, Y', strtotime($blog['details']['published_date'])); ?></span>
                    </div>
                    <h2 class="entry-title">
                        <a href="news-single.html"><?php echo $blog['details']['title']; ?></a>
                    </h2>
                </div><!-- header end -->

                <div class="entry-content">
                    <p>
                        <?php echo $blog['details']['tags']; ?>
                    </p>
                    <!-- Gallery start -->
                    <section id="project-area" class="project-area solid-bg">
                      <div class="container">
                          <div class="row">
                              <div class="col-12">
                                  <div class="row shuffle-wrapper">
                                      <?php 
                                      $gallery_count = count($blog['gallery']);
                                      $visible_images = array_slice($blog['gallery'], 0, 4); // Show first 4 images
                                      foreach ($visible_images as $index => $gallery_img): ?>
                                      <div class="col-6 col-lg-4 col-md-6 shuffle-item">
                                          <div class="project-img-container">
                                              <a href="images/news/project1/<?php echo $gallery_img; ?>" data-fancybox="gallery-<?php echo $blog_id; ?>" data-caption="Image <?php echo $index + 1; ?>">
                                                  <img class="img-fluid" src="images/news/project1/<?php echo $gallery_img; ?>" alt="project-img">
                                              </a>
                                          </div>
                                      </div>
                                      <?php endforeach; ?>

                                      <?php if ($gallery_count > 4): ?>
                                      <div class="col-12">
                                          <a href="images/news/project1/<?php echo $blog['gallery'][4]; ?>" data-fancybox="gallery-<?php echo $blog_id; ?>" class="btn btn-primary">
                                              +<?php echo ($gallery_count - 4); ?> more
                                          </a>
                                      </div>
                                      <?php endif; ?>

                                      <!-- Hidden gallery images to be opened in Fancybox -->
                                      <?php for ($i = 4; $i < $gallery_count; $i++): ?>
                                      <a href="images/news/project1/<?php echo $blog['gallery'][$i]; ?>" data-fancybox="gallery-<?php echo $blog_id; ?>" data-caption="Image <?php echo $i + 1; ?>" style="display:none;">
                                          <img src="images/news/project1/<?php echo $blog['gallery'][$i]; ?>" alt="project-img">
                                      </a>
                                      <?php endfor; ?>
                                  </div><!-- shuffle end -->
                              </div>
                          </div><!-- Content row end -->
                      </div><!-- Container end -->
                    </section>
                    <!-- Gallery end -->
                </div><!-- entry-content end -->
            </div><!-- post-body end -->
        </div><!-- post end -->
        <?php endforeach; ?>
    <?php else: ?>
        <p><?php echo isset($no_posts_message) ? $no_posts_message : "No posts available."; ?></p>
    <?php endif; ?>

        <!-- Pagination controls -->
        <nav class="paging" aria-label="Page navigation example">
            <ul class="pagination">
                <!-- Previous page link -->
                <li class="page-item <?php if ($page <= 1) echo 'disabled'; ?>">
                    <a class="page-link" href="<?php if ($page > 1) echo '?page=' . ($page - 1) . ($selected_site_name ? '&site_name=' . urlencode($selected_site_name) : ''); ?>">
                        <i class="fas fa-angle-double-left"></i>
                    </a>
                </li>

                <!-- Page number links -->
                <?php foreach ($pagination as $item): ?>
                    <?php if ($item === '...'): ?>
                        <li class="page-item disabled"><span class="page-link">...</span></li>
                    <?php else: ?>
                        <li class="page-item <?php if ($item == $page) echo 'active'; ?>">
                            <a class="page-link" href="?page=<?php echo $item; ?><?php echo $selected_site_name ? '&site_name=' . urlencode($selected_site_name) : ''; ?>"><?php echo $item; ?></a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>

                <!-- Next page link -->
                <li class="page-item <?php if ($page >= $total_pages) echo 'disabled'; ?>">
                    <a class="page-link" href="<?php if ($page < $total_pages) echo '?page=' . ($page + 1) . ($selected_site_name ? '&site_name=' . urlencode($selected_site_name) : ''); ?>">
                        <i class="fas fa-angle-double-right"></i>
                    </a>
                </li>
            </ul>
        </nav><!-- Pagination end -->
</div><!-- Main content end -->



    </div><!-- Main row end -->

  </div><!-- Container end -->
</section><!-- Main container end -->

<!--BLOCK#2 end YOUR CODE HERE -->


<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->