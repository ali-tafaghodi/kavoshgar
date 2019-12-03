<!-- ================ start footer Area ================= -->
<footer class="footer-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-xl-2 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                <h4>مقالات</h4>
                <ul>
                    <?php foreach ($postend as $key => $post_end) :
                        ?>
                        <li>
                            <a href="<?php echo base_url() . "site/blog/postdetail/categury/{$post_end['id']}" ?>/">
                                <?php echo $post_end['title']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>

                </ul>
            </div>
            <div class="col-xl-2 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                <h4>اطلاعات تماس</h4>
                <ul>
                    <li><a href="<?php echo base_url().'site/contact/index';?>">تماس با ما</a></li>

                </ul>
            </div>

            <div class="col-xl-4 col-md-8 mb-4 mb-xl-0 single-footer-widget">
                <h4>خبرنامه</h4>
                <p>برای دریافت آخرین خبرها لطفاً در خبرنامه کاوشگر عضو شوید</p>
                <div class="form-wrap" id="mc_embed_signup">
                    <?php
                    $this->load->helper('form');
                    echo validation_errors();
                    echo form_open("site/newsletter/news/", array('onsubmit' => 'return ajaxnews()', 'id' => 'mynews', 'class' => 'form-inline'));
                    ?>

                    <?php
                    echo form_input(array(
                        "name" => "emaill",
                        "class" => "form-control",
                        "placeholder" => "لطفا ایمیل خود را وارد کنید",
                        'data-validation' => "email",
                        'data-validation-error-msg' => " لطفا ایمیل را به درستی وارد نمایید"
                    )); ?>


                    <button class="click-btn btn btn-default">ثبت نام</button>
                    <!-- <div style="position: absolute; left: -5000px;">
                    <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                </div> -->

                    <p class="pm"></p>

                    <?php echo form_close();

                    ?>

                </div>
            </div>
        </div>
        <div class="footer-bottom row align-items-center text-center text-lg-left">
            <p class="footer-text m-0 col-lg-8 col-md-12">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                کلیه حقوق علمی، مادی و معنوی این وب سایت متعلق به نشریه کاوشگر می باشد.
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            <div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-google"></i></a>
                <a href="#"><i class="fab fa-dribbble"></i></a>
                <a href="#"><i class="fab fa-behance"></i></a>
            </div>
        </div>
    </div>
</footer>
<!-- ================ End footer Area ================= -->

<script src="<?php echo PUBLIC_PATH; ?>site/vendors/jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>Site/js/jquery.form-validator.min.js"></script>
<script type="text/javascript">
    $.validate({
        form: '#mynews'
    });

    function ajaxnews() {
        var data_send_news = {
            'email': $('input[name="emaill"]').val()
        }

        console.log(data_send_news);
        $.post("<?php echo base_url();?>site/newsletter/news/", data_send_news, function (data) {
            console.log(data);
            if (data == 'ok') {
                $('.pm').html('ثبت شد');
                $('input[name="email"]').val('');
                $('.pm').hide().html('ثبت شد').fadeIn('slow').delay(3000).hide(1)
            } else if (data == 'no') {
                $('.pm').html('این ایمیل قبلا ثبت شده است');
                $('input[name="email"]').val('');
                $('.pm').hide().html('این ایمیل قبلا ثبت شده است').fadeIn('slow').delay(3000).hide(1)
            }
        });
        return false;
    }

</script>
<script src="<?php echo PUBLIC_PATH; ?>site/vendors/bootstrap/bootstrap.bundle.min.js"></script>
<script src="<?php echo PUBLIC_PATH; ?>site/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="<?php echo PUBLIC_PATH; ?>site/js/main.js"></script>


</body>
</html>
