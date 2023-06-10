<?php
include_once "include/header.php";
?>

<main id="main">

    <!-- ======= Search Results ======= -->
    <section id="search-result" class="search-result">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="category-title">نتیجه جستجو : <?php echo strip_tags($_GET['keyword']); ?></h3>

                    <h2> <?php echo "find ".count($news)." news "; ?> </h2>
                        <h4> <?php
                            $page = ceil(count($news)/3);
                            echo $page." page news ";
                            ?> </h4>
                        <?php
                            if(isset($_GET['page'])){
                                $numpage = $_GET['page'];
                            }else{
                                $numpage = 1;
                            }
                            echo "you are in page $numpage";
                            foreach ($news as $k=>$item){
                                $key = $k +1;
                                $maxnews = $numpage*3;
                                $minnews = $numpage*3-2;
                                if ($minnews <= $key and $key <= $maxnews){
                                ?>

                                    <div class="d-md-flex post-entry-2 small-img">
                                        <a href="/news?id=<?php echo $item['id']; ?>" class="me-4 thumbnail">
                                            <img src="/media/<?php echo $item['image']; ?>" alt="<?php echo $item['title']; ?>" class="img-fluid">
                                        </a>
                                        <div>
                                            <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span><?php echo $item['created_at'] ?></span></div>
                                            <h3><a href="/news?id=<?php echo $item['id']; ?>"><?php echo $item['title']; ?></a></h3>
                                            <p><?php echo $item['short_description']; ?></p>
                                        </div>
                                    </div>

                                <?php
                                }
                        }
                        ?>
                    <!-- Paging -->
                    <div class="text-start py-4">
                        <div class="custom-pagination">
                            <?php
                            if ($numpage != 1){?>
                                <a href="/search?keyword=<?php echo strip_tags($_GET['keyword']); ?>&page=<?php echo $numpage-1; ?>" class="prev">Prevous</a><?php
                            }
                            For($i=1;$i<=$page;$i++){
                                ?><a href="/search?keyword=<?php echo strip_tags($_GET['keyword']); ?>&page=<?php echo $i; ?>" <?php if($i == $numpage){echo 'class="active"';} ?>><?php echo $i;?></a><?php
                            }
                            if ($numpage != $page){?>
                                <a href="/search?keyword=<?php echo strip_tags($_GET['keyword']); ?>&page=<?php echo $numpage+1; ?>" class="next">Next</a>
                            <?php
                            }
                            ?>
                        </div>
                    </div><!-- End Paging -->

                </div>

            </div>
        </div>
    </section> <!-- End Search Result -->

</main><!-- End #main -->

<?php
include_once "include/footer.php";
?>
