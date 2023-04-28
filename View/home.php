<?php
    include_once "include/header.php";
?>

<main id="main">


    <?php
        foreach ($categoriesRooWithNews as $cat){
            ?>
            <!-- ======= Culture Category Section ======= -->
            <section class="category-section">
                <div class="container" data-aos="fade-up">

                    <div class="section-header d-flex justify-content-between align-items-center mb-5">
                        <h2><?php echo $cat['title'] ?></h2>
                        <div><a href="/category?id=<?php echo $cat['id'] ?>" class="more">See All <?php echo $cat['title'] ?></a></div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">

                            <div class="row">

                                <?php

                                    foreach ($cat["news"] as $k=>$news){
                                        if ($k>2){
                                            break;
                                        }
                                        ?>
                                            <div class="col-lg-4">
                                                <div class="post-entry-1 border-bottom">
                                                    <a href="/news?id=<?php echo $news['id'] ?>"><img src="/media/<?php echo $news['image'] ?>" alt="<?php echo $news['title'] ?>" class="img-fluid"></a>
                                                    <div class="post-meta"><span class="date"><?php echo $cat['title'] ?></span> <span class="mx-1">&bullet;</span> <span><?php echo $news['created_at'] ?></span></div>
                                                    <h2 class="mb-2"><a href="/news?id=<?php echo $news['id'] ?>"><?php echo $news['title'] ?></a></h2>
                                                    <span class="author mb-3 d-block">پدرام میرمومن</span>
                                                    <p class="mb-4 d-block"><?php echo $news['short_description'] ?></p>
                                                </div>
                                            </div>
                                        <?php
                                    }

                                ?>


                            </div>
                        </div>


                    </div>
                </div>
            </section><!-- End Culture Category Section -->

            <?php
        }
    ?>



</main><!-- End #main -->

<?php
    include_once "include/footer.php";
?>