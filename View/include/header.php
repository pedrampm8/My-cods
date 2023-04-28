<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>پدرام نیوز</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/dd.jpg" rel="icon">
    <link href="assets/img/dd.jpg" rel="dd">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS Files -->
    <link href="assets/css/variables.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: ZenBlog
    * Updated: Mar 10 2023 with Bootstrap v5.2.3
    * Template URL: https://bootstrapmade.com/zenblog-bootstrap-blog-template/
    * Author: BootstrapMade.com
    * License: https:///bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1>Pedram News</h1>
        </a>

        <nav id="navbar" class="navbar">
            <?php

                require_once "Model/Category.php";
                $categoryModel  = new Category();

                $headerCategories = $categoryModel->getRoot();

                function getChildCat($catId){ //recursive functions
                    $categoryModel  = new Category();
                    $childCats = $categoryModel->getChildren($catId);
                    if(count($childCats) > 0){
                        ?>
                        <ul>
                            <?php
                            foreach ($childCats as $child){
                                ?>
                                <li class="dropdown"><a href="/category?id=<?php echo $child['id'] ?>"><?php echo $child['title'] ?></a>

                                    <?php
                                        getChildCat($child['id']);
                                    ?>

                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                        <?php

                    }
                }

            ?>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/contactus">Contact</a></li>
                <li><a href="/dashboard">dashboard</a></li>

                <?php
                    foreach ($headerCategories as $headerCategory) {
                        ?>
                            <li class="dropdown">
                                <a href="/category?id=<?php echo $headerCategory['id'] ?>">
                                    <?php echo $headerCategory['title'] ?> <i class="bi bi-chevron-down dropdown-indicator"></i>
                                </a>
                                <?php

                                    getChildCat($headerCategory['id']);

                                ?>

                            </li>
                        <?php
                    }
                ?>

            </ul>
        </nav>
        <!-- .navbar -->

        <div class="position-relative">
<!--            <a href="#" class="mx-2"><span class="bi-facebook"></span></a>-->
<!--            <a href="#" class="mx-2"><span class="bi-twitter"></span></a>-->
            <a href="https://instagram.com/pedram_pm8?igshid=YmMyMTA2M2Y=" class="mx-2"><span class="bi-instagram"></span></a>

            <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
            <i class="bi bi-list mobile-nav-toggle"></i>

            <!-- ======= Search Form ======= -->
            <div class="search-form-wrap js-search-form-wrap">
                <form action="/search" class="search-form">
                    <span class="icon bi-search"></span>
                    <input name="keyword" type="text" placeholder="جستجو" class="form-control">
                    <button class="btn"><span class="bi-x"></span></button>
                </form>
            </div><!-- End Search Form -->

        </div>

    </div>

</header><!-- End Header -->