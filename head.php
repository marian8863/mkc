<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<!-- 
THEME: Constra - Construction Html5 Template
VERSION: 1.0.0
AUTHOR: Themefisher

HOMEPAGE: https://themefisher.com/products/constra-construction-template/
DEMO: https://demo.themefisher.com/constra/
GITHUB: https://github.com/themefisher/Constra-Bootstrap-Construction-Template

WEBSITE: https://themefisher.com
TWITTER: https://twitter.com/themefisher
FACEBOOK: https://www.facebook.com/themefisher
-->
<?php 
    include('config.php');

    // $main_url="http://localhost/mk";
    $main_url="https://masterkingconstructions.com/";

?>

<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
================================================== -->

  <title><?php echo $title; ?></title>



  <!-- Mobile Specific Metas
================================================== -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta property="og:type" content="website" />
<meta name="description" content="Master King Constructions fulfills your expectations by emphasizing Quantity, Quality, and Speed. Trust us to deliver excellence in every project.">
<meta name="keywords" content="Master King Constructions, construction services, quality construction, reliable contractor, building projects, construction management, renovation, residential construction, commercial construction">
<meta name="author" content="Master King Constructions">
<meta name="robots" content="index, follow">
<meta property="og:title" content="Master King Constructions - Building Your Dreams">
<meta property="og:description" content="Master King Constructions delivers exceptional construction services focusing on Quantity, Quality, and Speed. Trust us for your next project.">
<!-- <meta property="og:image" content="images/logo-or-image.jpg"> -->
<meta property="og:url" content="https://www.masterkingconstructions.com/">
<meta property="og:image" content="https://masterkingconstructions.com/images/share_logo.png" />
<!-- <meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Master King Constructions">
<meta name="twitter:description" content="We fulfill your construction expectations through our commitment to Quantity, Quality, and Speed.">
<meta name="twitter:image" content="path/to/your/logo-or-image.jpg"> -->



<!-- Open Graph / Facebook -->




  <!-- Favicon
================================================== -->
  <link rel="icon" type="image/png" href="images/favicon1.png">

  <!-- CSS
================================================== -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="plugins/fontawesome/css/all.min.css">
  <!-- Animation -->
  <link rel="stylesheet" href="plugins/animate-css/animate.css">
  <!-- slick Carousel -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick/slick-theme.css">
  <!-- Colorbox -->
  <link rel="stylesheet" href="plugins/colorbox/colorbox.css">
  <!-- Template styles-->
  <link rel="stylesheet" href="css/style.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4/dist/fancybox.css" />
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4/dist/fancybox.umd.js"></script>


<style>
          /* Balloon styling with PNG images */
          .balloon {
            position: absolute;
            bottom: -150px;
            width: 100px;
            height: auto;
            opacity: 0.9;
            animation: floatBalloon 10s infinite linear;
        }
        

        /* Colors and random sizes for balloons */
        .balloon:nth-child(1) { left: 10%; animation-duration: 8s; transform: scale(0.8); }
        .balloon:nth-child(2) { left: 25%; animation-duration: 10s; transform: scale(1.1); }
        .balloon:nth-child(3) { left: 40%; animation-duration: 9s; transform: scale(0.9); }
        .balloon:nth-child(4) { left: 55%; animation-duration: 11s; transform: scale(1.2); }
        .balloon:nth-child(5) { left: 70%; animation-duration: 9s; transform: scale(0.7); }
        .balloon:nth-child(6) { left: 85%; animation-duration: 12s; transform: scale(1); }


        @keyframes floatBalloon {
            0% { transform: translateY(0); }
            100% { transform: translateY(-120vh); }
        }
    </style>
</head>

<body>
  <div class="body-inner">
        <!-- Real balloon images with animation -->
   