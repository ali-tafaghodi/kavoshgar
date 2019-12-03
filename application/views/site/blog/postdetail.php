<!--================ Hero sm Banner start =================-->
<section class="hero-banner hero-banner--sm mb-30px">
    <div class="container">
        <div class="hero-banner--sm__content">
            <h1>جزییات مقاله</h1>
            <nav aria-label="breadcrumb" class="banner-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">خانه</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $detailpost[0]['title']; ?></li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!--================ Hero sm Banner end =================-->

<script src="<?php echo PUBLIC_PATH; ?>site/vendors/jquery/jquery-3.2.1.min.js"></script>
<script src="<?php echo PUBLIC_PATH; ?>site/js/search.js"></script>
<!--================Blog Area =================-->
<section class="blog_area single-post-area section-margin--medium">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <?php foreach ($detailpost as $key => $postdetail) {
                    ?>

                    <div class="single-post row">
                        <div class="col-lg-12">
                            <div class="feature-img">
                                <img class="img-fluid"
                                     src="<?php echo PUBLIC_PATH; ?>site/img/blog/<?php echo _namepic($postdetail['pic']); ?>_750.<?php echo _extpic($postdetail['pic']); ?>"
                                     alt="">
                                <!-- <img class="img-fluid" src="<?= PUBLIC_PATH ?>site/img/blog/feature-img1.jpg" alt=""> -->
                            </div>
                        </div>
                        <div class="col-lg-3  col-md-3">
                            <div class="blog_info text-right">

                                <ul class="blog_meta list">
                                    <!-- <li>
                                    <a href="#">
                                    <span>ادمین </span>
                                    <i class="lnr lnr-user"></i>
                                </a>
                            </li> -->
                                    <li>
                                        <a href="#">
                                    <span> <?php
                                        echo persianNumber(_getDate(strtotime($postdetail['created_at'])));
                                        ?> </span>
                                            <i class="lnr lnr-calendar-full"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                    <span> <?php
                                        echo persianNumber($views);
                                        ?> </span>
                                            <i class="lnr lnr-eye"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span> <?php echo persianNumber($count) . ' '; ?>  </span>
                                            <i class="lnr lnr-bubble"></i>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="social-links">
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-github"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-behance"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 blog_details">
                            <h2><?php echo $postdetail['title']; ?></h2>
                            <p class="excert">
                                <?php echo $postdetail['txt']; ?>
                            </p>

                        </div>

                    </div>
                <?php } ?>


                <div class="navigation-area">
                    <div class="row">
                        <?php
                        $ids = array();
                        foreach ($postall as $val) {
                            $ids[] = $val['id'];
                        }
                        $thisindex = array_search($detailpost[0]['id'], $ids);

                        $previd = isset($ids[$thisindex - 1]) ? $ids[$thisindex - 1] : 0;
                        $nextid = isset($ids[$thisindex + 1]) ? $ids[$thisindex + 1] : 0;
                        ?>

                        <?php
                        if ($previd) {
                        $this->load->model('blog/m_postdetail');
                        $detaill_post=$this->m_postdetail->DetailPost($previd);
                        ?>
                        <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                            <div class="thumb">
                                <a href="#">
                                    <img class="img-fluid"  width="80px" src="<?php echo PUBLIC_PATH;?>site/img/blog/<?php echo $detaill_post[0]['pic'];?>" alt="">
                                </a>
                            </div>
                            <div class="arrow">
                                <a href="#">
                                    <span class="lnr text-white lnr-arrow-right"></span>
                                </a>
                            </div>

                            <div class="detials">


                                    <p>پست قبلی</p>
<!--                                    <img class="img-fluid" width="65px" src="--><?php //echo PUBLIC_PATH;?><!--site/img/blog/--><?php //echo $detaill_post[0]['pic'];?><!--" alt="">-->
                                    <a href="<?php echo base_url("site/blog/postdetail/categury/{$previd}/"); ?>">
                                        <h4><?php echo  $detaill_post[0]['title'];?></h4>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>

                        <?php
                        if ($nextid) {
                            $this->load->model('blog/m_postdetail');
                            $detaill_post=$this->m_postdetail->DetailPost($nextid);
                            ?>
                        <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                            <div class="detials">
                                    <p>پست بعدی</p>
                                    <a href="<?php echo base_url("site/blog/postdetail/categury/{$nextid}/"); ?>">
                                        <h4><?php echo  $detaill_post[0]['title'];?></h4>
                                    </a>
                            </div>
                            <div class="arrow">
                                <a href="#">
                                    <span class="lnr text-white lnr-arrow-left"></span>
                                </a>
                            </div>
                            <div class="thumb">
                                <a href="#">
                                    <img class="img-fluid" width="80px" src="<?php echo PUBLIC_PATH;?>site/img/blog/<?php echo $detaill_post[0]['pic'];?>" alt="">
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
                <div class="comments-area">

                    <h4> <?php echo persianNumber($count); ?> کامنت </h4>

                    <?php foreach ($coment as $key => $comm) {


                        ?>

                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="<?php echo PUBLIC_PATH; ?>site/img/avator/<?php echo rand(1, 3); ?>.jpg"
                                             alt="">
                                    </div>
                                    <div class="desc">
                                        <h5>
                                            <a href="#"><?php echo $comm['name']; ?></a>
                                        </h5>
                                        <p class="date"><?php
                                            echo persianNumber(_getDateTime(strtotime($comm['created_at'])));
                                            ?>   </p>
                                        <p class="comment">
                                            <?php echo $comm['message']; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    } ?>
                </div>


                <div class="comment-form">
                    <h4>شما هم دیدگاهی برای این مطلب ارسال کنید</h4>
                    <p id="pm" style="color: red;font-size: 20px"></p>
                    <?php
                    $this->load->helper('form');
                    echo validation_errors();
                    echo form_open("site/blog/postdetail/insertComment", array('onsubmit' => 'return formajaxcomment()', 'id' => 'myform'));
                    ?>

                    <!-- <form method="post" action="site/blog/postdetail/insertComment"> -->
                    <div class="form-inline">
                        <div class="form-group col-lg-6 col-md-6 name">

                            <?php
                            echo form_input(array(
                                "name" => "frm[name]",
                                "class" => "form-control",
                                "placeholder" => "نام(ضروری)",
                                'data-validation' => "required",
                                'data-validation-error-msg' => " *اجباری"
                            )); ?>
                            <!-- <input type="text" class="form-control" id="name" placeholder="نام(ضروری)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'نام(ضروری)'"> -->
                        </div>
                        <div class="form-group col-lg-6 col-md-6 email">
                            <?php
                            echo form_input(array(
                                "name" => "frm[email]",
                                "class" => "form-control",
                                "placeholder" => "ایمیل (ضروری)",
                                'data-validation' => "email",
                                'data-validation-error-msg' => " لطفا ایمیل را به درستی وارد نمایید"
                            )); ?>
                            <!-- <input type="email" class="form-control" id="email" placeholder="ایمیل (ضروری)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'ایمیل (ضروری)'"> -->
                        </div>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_input(array(
                            "name" => "frm[subject]",
                            "class" => "form-control",
                            "placeholder" => "موضوع",
                            'data-validation' => "required",
                            'data-validation-error-msg' => " *اجباری"
                        )); ?>

                        <!-- <input type="text" class="form-control" id="subject" placeholder="موضوع" onfocus="this.placeholder = ''" onblur="this.placeholder = 'موضوع'"> -->
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_textarea(array(
                            "name" => "frm[message]",
                            "class" => "form-control",
                            "placeholder" => "دیدگاه . . .",
                            'data-validation' => "required",
                            'data-validation-error-msg' => " *اجباری"
                        )); ?>

                        <!-- <textarea class="form-control mb-10" rows="5" name="message" placeholder="دیدگاه . . ." onfocus="this.placeholder = ''" onblur="this.placeholder = 'دیدگاه . . .'"
                        required=""></textarea> -->
                    </div>

                    <?php
                    echo form_submit(array(
                        'name' => 'submit',
                        "class" => "button button-postComment",
                        "value" => "ارسال دیدگاه"

                    )); ?>
                    <!-- <a href="#" class="button button-postComment"></a> -->
                    <!-- </form> -->
                    <?php echo form_close(); ?>
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
<script src="<?php echo PUBLIC_PATH; ?>site/vendors/jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>site/js/jquery.form-validator.min.js"></script>
<script type="text/javascript">
    console.log('ok');
    $.validate({
        form: '#myform'
    });

    function formajaxcomment() {
        var data_comment = {
            'name': $('input[name="frm[name]"]').val(),
            'email': $('input[name="frm[email]"]').val(),
            'subject': $('input[name="frm[subject]"]').val(),
            'message': $('textarea[name="frm[message]"]').val()
        }

         // console.log(data_send_comment);
        $.post("<?php echo base_url();?>site/blog/postdetail/insertComment/<?php echo $detailpost[0]['id']; ?>", data_comment, function (data) {
            if (data == 'ok') {

                // $('#pm').html('پیام ارسال شد');
                $('input[name="frm[name]"]').val('');
                $('input[name="frm[email]"]').val('');
                $('input[name="frm[subject]"]').val('');
                $('textarea[name="frm[message]"]').val('');
                $('#pm').hide().html('پیام ارسال شد').fadeIn('slow').delay(3000).hide(1);
            }
        });
        return false;
    }

</script>
