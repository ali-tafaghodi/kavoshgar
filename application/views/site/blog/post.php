<!--================ Hero sm Banner start =================-->
<section class="hero-banner hero-banner--sm mb-30px">
    <div class="container">
        <div class="hero-banner--sm__content">
            <h1>مقالات</h1>
            <nav aria-label="breadcrumb" class="banner-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">خانه</a></li>
                    <li class="breadcrumb-item active" aria-current="page">مقالات</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<!--================ Hero sm Banner end =================-->
<script src="<?php echo PUBLIC_PATH; ?>site/vendors/jquery/jquery-3.2.1.min.js"></script>
<script src="<?php echo PUBLIC_PATH; ?>site/js/search.js"></script>

<!--================Blog Categorie Area =================-->
<section class="blog_categorie_area">
    <div class="container">
        <div class="row">


        </div>
    </div>
</section>
<!--================Blog Categorie Area =================-->

<!--================Blog Area =================-->
<section class="blog_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog_left_sidebar">

                    <?php

                    foreach ($posts as $key => $blog) {
                        ?>
                        <article class="row blog_item">
                            <div class="col-md-3">
                                <div class="blog_info text-right">

                                    <ul class="blog_meta list">
                                        <!-- <li>
                                        <a href="#">ادمین
                                        <i class="lnr lnr-user"></i>
                                    </a>
                                </li> -->
                                        <li>
                                            <a href="#"><?php
                                                echo persianNumber(_getDate(strtotime($blog['created_at'])));
                                                ?>
                                                <i class="lnr lnr-calendar-full"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#"><?php
                                                $i = 0;
                                                foreach ($views as $key => $view) {
                                                    if ($view['blog_id'] == $blog['id']) {
                                                        $i += 1;
                                                    }
                                                }
                                                echo persianNumber($i);
                                                ?>
                                                <i class="lnr lnr-eye"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#"><?php
                                                $j = 0;
                                                foreach ($count as $key => $con) {
                                                    if ($con['blog_id'] == $blog['id']) {
                                                        $j += 1;
                                                    }
                                                }
                                                echo persianNumber($j);
                                                ?>
                                                <i class="lnr lnr-bubble"></i>
                                            </a>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="blog_post">

                                    <img src="<?php echo PUBLIC_PATH; ?>site/img/blog/<?php echo _namepic($blog['pic']); ?>_750.<?php echo _extpic($blog['pic']); ?>"
                                         alt="">
                                    <div class="blog_details">
                                        <?php $id = $blog['id']; ?>
                                        <a href="<?php echo base_url("site/blog/postdetail/categury/{$id}/"); ?>">
                                            <h2><?= $blog['title'] ?></h2>
                                        </a>
                                        <p><?= word_limiter($blog['txt'], 70); ?></p>

                                        <a class="button button-blog"
                                           href="<?php echo base_url("site/blog/postdetail/categury/{$id}/"); ?>">ادامه
                                            مطلب</a>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <?php
                    }
                    ?>


                    <nav class="blog-pagination justify-content-center d-flex">

                        <?php echo $pagination; ?>
                    </nav>
                </div>
            </div>


            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="جستجو" id="search_text">
                            <!-- <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="lnr lnr-magnifier"></i>
                                </button>
                            </span> -->

                            <ul id="result">

                            </ul>

                        </div>
                        <!-- /input-group -->
                        <div class="br"></div>
                    </aside>


                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">آخرین مقالات</h3>

                        <?php foreach ($postend as $key => $post_end) :
                            ?>
                            <div class="media post_item">
                                <img src="<?php echo PUBLIC_PATH; ?>site/img/blog/popular-post/post1.jpg" alt="post">
                                <div class="media-body">
                                    <a href="<?php echo base_url() . "site/blog/postdetail/categury/{$post_end['id']}" ?>/">
                                        <h3><?php echo $post_end['title']; ?></h3>
                                    </a>
                                    <p><?php echo _getDate(strtotime($post_end['created_at'])); ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <div class="br"></div>
                    </aside>


                    <aside class="single_sidebar_widget ads_widget">
                        <a href="#">
                            <img class="img-fluid" src="<?php echo PUBLIC_PATH; ?>site/img/blog/add.jpg" alt="">
                        </a>
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">دسته بندی</h4>
                        <ul class="list cat-list">

                            <?php

                            foreach ($cat as $key => $catgory) {
                                $i = 0;
                                ?>
                                <li>
                                    <a href="<?php echo base_url("site/blog/post/index/{$catgory['chid']}"); ?>"
                                       class="d-flex justify-content-between">
                                        <p><?php echo $catgory['name']; ?></p>
                                        <?php
                                        foreach ($catblog as $key => $cat_blog) {
                                            if ($cat_blog['chid'] == $catgory['chid']) {
                                                $i += 1;
                                            }
                                        }
                                        ?>
                                        <p><?php echo $i; ?></p>
                                    </a>
                                </li>
                            <?php } ?>

                        </ul>
                        <div class="br"></div>
                    </aside>


                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->
