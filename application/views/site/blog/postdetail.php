<!--================ Hero sm Banner start =================-->
<section class="hero-banner hero-banner--sm mb-30px">
    <div class="container">
        <div class="hero-banner--sm__content">
            <h1>Blog Details</h1>
            <nav aria-label="breadcrumb" class="banner-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">خانه</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $data[0]['title'];?></li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!--================ Hero sm Banner end =================-->


<!--================Blog Area =================-->
<section class="blog_area single-post-area section-margin--medium">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <?php foreach ($data as $key => $postdetail) {
                    ?>

                    <div class="single-post row">
                        <div class="col-lg-12">
                            <div class="feature-img">
                                <img class="img-fluid" src="<?php echo PUBLIC_PATH; ?>site/img/blog/<?php echo _namepic($postdetail['pic']); ?>_750.<?php echo _extpic($postdetail['pic']); ?>" alt="">
                                <!-- <img class="img-fluid" src="<?= PUBLIC_PATH ?>site/img/blog/feature-img1.jpg" alt=""> -->
                            </div>
                        </div>
                        <div class="col-lg-3  col-md-3">
                            <div class="blog_info text-right">
                                <div class="post_tag">
                                    <a href="#">Food,</a>
                                    <a class="active" href="#">Technology,</a>
                                    <a href="#">Politics,</a>
                                    <a href="#">Lifestyle</a>
                                </div>
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
                                    <span> 1.2M Views </span>
                                    <i class="lnr lnr-eye"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span> 06 Comments </span>
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
                    <h2><?php echo $postdetail['title'];?></h2>
                    <p class="excert">
                        <?php echo $postdetail['txt'];?>
                    </p>

                </div>

            </div>
        <?php  } ?>


        <div class="navigation-area">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                    <div class="thumb">
                        <a href="#">
                            <img class="img-fluid" src="img/blog/prev.jpg" alt="">
                        </a>
                    </div>
                    <div class="arrow">
                        <a href="#">
                            <span class="lnr text-white lnr-arrow-right"></span>
                        </a>
                    </div>
                    <div class="detials">
                        <p>پست قبلی</p>
                        <a href="#">
                            <h4>Space The Final Frontier</h4>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                    <div class="detials">
                        <p>پست بعدی</p>
                        <a href="#">
                            <h4>Telescopes 101</h4>
                        </a>
                    </div>
                    <div class="arrow">
                        <a href="#">
                            <span class="lnr text-white lnr-arrow-left"></span>
                        </a>
                    </div>
                    <div class="thumb">
                        <a href="#">
                            <img class="img-fluid" src="img/blog/next.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="comments-area">

            <h4>05 کامنت</h4>

            <?php  foreach ($coment as $key => $comm) {


                    ?>

                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="<?php echo PUBLIC_PATH; ?>site/img/blog/c1.jpg" alt="">
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
                            <div class="reply-btn">
                                <a href="#" class="btn-reply text-uppercase">پاسخ</a>
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
            echo form_open("site/blog/postdetail/insertComment",array('onsubmit' => 'return formajax()', 'id' => 'myform'));
            ?>

            <!-- <form method="post" action="site/blog/postdetail/insertComment"> -->
            <div class="form-inline">
                <div class="form-group col-lg-6 col-md-6 name">

                    <?php
                    echo form_input(array(
                        "name" => "frm[name]",
                        "class" => "form-control",
                        "placeholder"=>"نام(ضروری)",
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
                        "placeholder"=>"ایمیل (ضروری)",
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
                    "placeholder"=>"موضوع",
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
                    "placeholder"=>"دیدگاه . . .",
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
                "value"=>"ارسال دیدگاه"

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
                    <input type="text" class="form-control" placeholder="Search Posts">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="lnr lnr-magnifier"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
                <div class="br"></div>
            </aside>
            <aside class="single_sidebar_widget author_widget">
                <img class="author_img rounded-circle" src="img/blog/author.png" alt="">
                <h4>Charlie Barber</h4>
                <p>Senior blog writer</p>
                <div class="social_icon">
                    <a href="#">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-behance"></i>
                    </a>
                </div>
                <p>Boot camps have its supporters andit sdetractors. Some people do not understand why you should
                    have to spend money on boot camp when you can get. Boot camps have itssuppor ters andits
                    detractors.
                </p>
                <div class="br"></div>
            </aside>
            <aside class="single_sidebar_widget popular_post_widget">
                <h3 class="widget_title">Popular Posts</h3>
                <div class="media post_item">
                    <img src="img/blog/popular-post/post1.jpg" alt="post">
                    <div class="media-body">
                        <a href="blog-details.html">
                            <h3>Space The Final Frontier</h3>
                        </a>
                        <p>02 Hours ago</p>
                    </div>
                </div>
                <div class="media post_item">
                    <img src="img/blog/popular-post/post2.jpg" alt="post">
                    <div class="media-body">
                        <a href="blog-details.html">
                            <h3>The Amazing Hubble</h3>
                        </a>
                        <p>02 Hours ago</p>
                    </div>
                </div>
                <div class="media post_item">
                    <img src="img/blog/popular-post/post3.jpg" alt="post">
                    <div class="media-body">
                        <a href="blog-details.html">
                            <h3>Astronomy Or Astrology</h3>
                        </a>
                        <p>03 Hours ago</p>
                    </div>
                </div>
                <div class="media post_item">
                    <img src="img/blog/popular-post/post4.jpg" alt="post">
                    <div class="media-body">
                        <a href="blog-details.html">
                            <h3>Asteroids telescope</h3>
                        </a>
                        <p>01 Hours ago</p>
                    </div>
                </div>
                <div class="br"></div>
            </aside>
            <aside class="single_sidebar_widget ads_widget">
                <a href="#">
                    <img class="img-fluid" src="img/blog/add.jpg" alt="">
                </a>
                <div class="br"></div>
            </aside>
            <aside class="single_sidebar_widget post_category_widget">
                <h4 class="widget_title">Post Catgories</h4>
                <ul class="list cat-list">
                    <li>
                        <a href="#" class="d-flex justify-content-between">
                            <p>Technology</p>
                            <p>37</p>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="d-flex justify-content-between">
                            <p>Lifestyle</p>
                            <p>24</p>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="d-flex justify-content-between">
                            <p>Fashion</p>
                            <p>59</p>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="d-flex justify-content-between">
                            <p>Art</p>
                            <p>29</p>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="d-flex justify-content-between">
                            <p>Food</p>
                            <p>15</p>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="d-flex justify-content-between">
                            <p>Architecture</p>
                            <p>09</p>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="d-flex justify-content-between">
                            <p>Adventure</p>
                            <p>44</p>
                        </a>
                    </li>
                </ul>
                <div class="br"></div>
            </aside>
            <aside class="single-sidebar-widget newsletter_widget">
                <h4 class="widget_title">Newsletter</h4>
                <p>
                    Here, I focus on a range of items and features that we use in life without giving them a second thought.
                </p>
                <div class="form-group d-flex flex-row">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email address" onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Enter email'">
                    </div>
                    <a href="#" class="bbtns">Subcribe</a>
                </div>
                <p class="text-bottom">You can unsubscribe at any time</p>
                <div class="br"></div>
            </aside>
            <aside class="single-sidebar-widget tag_cloud_widget">
                <h4 class="widget_title">Tag Clouds</h4>
                <ul class="list">
                    <li>
                        <a href="#">Technology</a>
                    </li>
                    <li>
                        <a href="#">Fashion</a>
                    </li>
                    <li>
                        <a href="#">Architecture</a>
                    </li>
                    <li>
                        <a href="#">Fashion</a>
                    </li>
                    <li>
                        <a href="#">Food</a>
                    </li>
                    <li>
                        <a href="#">Technology</a>
                    </li>
                    <li>
                        <a href="#">Lifestyle</a>
                    </li>
                    <li>
                        <a href="#">Art</a>
                    </li>
                    <li>
                        <a href="#">Adventure</a>
                    </li>
                    <li>
                        <a href="#">Food</a>
                    </li>
                    <li>
                        <a href="#">Lifestyle</a>
                    </li>
                    <li>
                        <a href="#">Adventure</a>
                    </li>
                </ul>
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
$.validate({
    form: '#myform'
});

function formajax() {
    var data_send = {
        'name': $('input[name="frm[name]"]').val(),
        'email': $('input[name="frm[email]"]').val(),
        'subject': $('input[name="frm[subject]"]').val(),
        'message': $('textarea[name="frm[message]"]').val()
    }
    // console.console.log('ok');
    // console.log(data_send);
    $.post("<?php echo base_url();?>site/blog/postdetail/insertComment/<?php echo $data[0]['id']; ?>", data_send, function (data) {
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
