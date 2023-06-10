<?php
        $categoryModel = new Category();

        $categoriesRooWithNews = $categoryModel->getRootCatsWithNews();
        ?>
<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

    <div class="footer-content">
        <div class="container">

            <div class="row g-5">
                <div class="col-lg-4">
                    <h3 class="footer-heading">درباره ما</h3>
                    <p>اینجا یک سایت خبری است و این سایت با زبان برنامه نویسی php برنامه نویسی شده است</p>
                    <p><a href="/about" class="footer-link-more">Learn More</a></p>
                </div>
                <div class="col-6 col-lg-2">
                    <h3 class="footer-heading">linkes</h3>
                    <ul class="footer-links list-unstyled">
                        <li><a href="/"><i class="bi bi-chevron-right"></i> Home</a></li>
                        <li><a href="/about"><i class="bi bi-chevron-right"></i> about</a></li>
                        <li><a href="/contactus"><i class="bi bi-chevron-right"></i> contact</a></li>
                        <li><a href="/dashboard"><i class="bi bi-chevron-right"></i> dashboard</a></li>

                    </ul>
                </div>
                <div class="col-6 col-lg-2">
                    <h3 class="footer-heading">news</h3>
                    <ul class="footer-links list-unstyled">

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
                </div>

                <div class="col-lg-4">
                    <h3 class="footer-heading">Recent news</h3>


                    <ul class="footer-links footer-blog-entry list-unstyled">
                        <li>

                        </li>
                        <li>
                            <?php
                            foreach ($categoriesRooWithNews as $cat){
                                foreach ($cat["news"] as $k=>$news){
                                    if($k == 1)
                                        break;
                                        ?>
                                 <a href="/news?id=<?php echo $news['id'] ?>" class="d-flex align-items-center">
                                     <img src="/media/<?php echo $news['image'] ?>" alt="" class="img-fluid me-3">
                                     <div>
                                         <div class="post-meta d-block"><span class="date"><?php echo $news['title'] ?></span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                         <span><?php echo $news['short_description'] ?></span>
                                     </div>
                                 </a>
                            <?php
                                }
                            }
                            ?>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>

    <div class="footer-legal">
        <div class="container">

            <div class="row justify-content-between">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <div class="copyright">
                        this page have Pedram Mirmomen
                    </div>

                    <div class="credits">
                        PM8</a>
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="social-links mb-3 mb-lg-0 text-center text-md-end">
<!--                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>-->
<!--                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>-->
                        <a href="https://instagram.com/pedram_pm8?igshid=YmMyMTA2M2Y=" class="instagram"><i class="bi bi-instagram"></i></a>
<!--                        <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>-->
<!--                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>-->
                    </div>

                </div>

            </div>

        </div>
    </div>

</footer>

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>