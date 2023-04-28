<?php
include_once "include/header.php";
?>
<?php
$categoryModel = new Category();

$categoriesRooWithNews = $categoryModel->getRootCatsWithNews();

?>
<main id="main">
    <?php
    include_once "View/error.php";
    ?>
    <section class="single-post-content">
        <div class="container">
            <div class="row">
                <div class="col-md-9 post-content" data-aos="fade-up">

                    <!-- ======= Single Post Content ======= -->
                    <div class="single-post">
                        <div class="post-meta"><span class="date"></span> <span class="mx-1">&bullet;</span> <span><?php echo $news["created_at"] ?></span></div>
                        <h1 class="mb-5"><?php echo $news["title"] ?></h1>
                        <p>
                            <?php echo $news["short_description"] ?>
                        </p>

                        <figure class="my-4">
                            <img src="/media/<?php echo $news["image"] ?>" alt="<?php echo $news["title"] ?>" class="img-fluid">
                            <figcaption> <?php echo $news["title"] ?> </figcaption>
                        </figure>

                        <?php echo $news["description"] ?>
                    </div><!-- End Single Post Content -->
                    <?php
                        $id = $_GET['id'];
                        $addres = "/news?id=$id";
                        $command = $GLOBALS["db"]->prepare("SELECT * FROM `command` WHERE `addres`= ?");

                        $command->bind_param("s",$addres);

                        $result = $command->execute();
                        $com = $command->get_result()->fetch_all();
                        $contcom = count($com);
                    ?>
                    <!-- ======= Comments ======= -->

                    <?PHP
                    echo "<h5 class='comment-title py-4'>$contcom Comments</h5>";
                        if($result){
                            for ($i=0;$i<count($com);$i++) {
                                ?>
                                <div class="comments">

                                    <div class="comment d-flex mb-4">
                                        <div class="flex-shrink-0">
                                            <div class="avatar avatar-sm rounded-circle">
                                                <img class="avatar-img" src="assets/img/images (1).jpg" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-2 ms-sm-3">
                                            <div class="comment-meta d-flex align-items-baseline">
                                                <h6 class="me-2"><?php echo $com["$i"]["2"] ?></h6>
                                                <span class="text-muted"><?php echo $com["$i"]["6"] ?></span>
                                            </div>

                                            <div class="comment-body">
                                                <?php echo $com["$i"]["3"] ?>                                        </div>
                                        </div>
                                        <form enctype="multipart/form-data" class="user" method="POST" action="/commandstor/dislike?addres=<?php echo $addres ?>&id=<?php echo $com["$i"]["0"] ?>">
                                            <button name="dislike" class="dislike">
                                                <i class="fa fa-thumbs-o-down" aria-hidden="true">dislike <?php echo $com["$i"]["5"] ?> </i>
                                            </button>
                                        </form>
                                        <form enctype="multipart/form-data" class="user" method="POST" action="/commandstor/like?addres=<?php echo $addres ?>&id=<?php echo $com["$i"]["0"] ?>">
                                            <button name="like" class="like">
                                                <i class="fa fa-thumbs-o-up" aria-hidden="true">like <?php echo $com["$i"]["4"] ?> </i>
                                            </button>
                                        </form>
                                    </div>
                                </div><!-- End Comments -->
                        <?php
                            }
                        }else{
                            return false;
                        }
                        ?>
                    <!-- ======= Comments Form ======= -->
                    <form enctype="multipart/form-data" class="user" method="POST" action="/commandstor?addres=<?php echo $addres ?>">
                        <div class="row justify-content-center mt-5">

                            <div class="col-lg-12">
                                <h5 class="comment-title">Leave a Comment</h5>
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label for="comment-name">Name</label>
                                        <input name="name" type="text" class="form-control" id="comment-name" placeholder="Enter your name">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="comment-email">number</label>
                                        <input name="number" type="text" class="form-control" id="comment-email" placeholder="Enter your phone">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="comment-message">Message</label>

                                        <textarea name="description" type="text" class="form-control" id="comment-message" placeholder="Enter your name" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button name="submit" class="btn btn-primary btn-user" value="Post comment">                    post
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End Comments Form -->
                <div class="col-md-3">
                    <!-- ======= Sidebar ======= -->
                    <div class="aside-block">

                        <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button id="pills-popular-tab" data-bs-toggle="pill" data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular" aria-selected="true">دسترسی سریع به اخبار</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">

                            <!-- Popular -->
                                    <?php
                                    foreach ($categoriesRooWithNews as $cat){
                                        foreach ($cat["news"] as $k=>$news){
//                                            if($k == 1)
//                                                break;
                                            ?>
                                            <a href="/news?id=<?php echo $news['id'] ?>" class="d-flex align-items-center">
<!--                                                <img src="/media/--><?php //echo $news['image'] ?><!--" alt="" class="img-fluid me-3">-->
                                                <div>
                                                    <div class="post-meta d-block"><span class="date"><?php echo $news['title'] ?></span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                                    <span><?php echo $news['short_description'] ?></span>
                                                    <br><br>______________________________________________<br><br>
                                                </div>
                                            </a>
                                            <?php
                                        }
                                    }
                                    ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

<?php
include_once "include/footer.php";
?>
