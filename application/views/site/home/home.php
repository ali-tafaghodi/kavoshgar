<main class="side-main">
  <!--================ Hero sm Banner start =================-->
  <section class="hero-banner mb-30px" >
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="hero-banner__img">
            <img class="img-fluid" src="<?php echo PUBLIC_PATH; ?>site/img/eye.png" alt="">
          </div>
        </div>
        <div class="col-lg-5 pt-5">
          <div class="hero-banner__content">
            <h1>کاوشگر اپتیک </h1>
            <p>مطالب نشریه در بخش های اپتیک، بینایی، عینک سازی، تازه های علم و تکنولوژی و معلومات عمومی تقدیم حضور خوانندگان می شود. مخاطبین اصلی و تخصصی مجله، عینک سازان، بینایی سنج ها و چشم پزشکان می باشند. لیکن مطالب به گونه ای ارائه گردیده که برای عموم جذاب و مفید باشد </p>

          </div>
        </div>
      </div>
    </div>
  </section>
<section class="section-margin">
    <div class="container">
<!--        <div class="section-intro pb-85px text-center">-->
<!--            <h2 class="section-intro__title">کاوشگر اپتیک</h2>-->
<!--            <p class="section-intro__subtitle">مطالب نشریه در بخش های اپتیک، بینایی، عینک سازی، تازه های علم و تکنولوژی و معلومات عمومی تقدیم حضور خوانندگان می شود. مخاطبین اصلی و تخصصی مجله، عینک سازان، بینایی سنج ها و چشم پزشکان می باشند. لیکن مطالب به گونه ای ارائه گردیده که برای عموم جذاب و مفید باشد</p>-->
<!--        </div>-->

        <div class="container">
            <div class="row">

                <?php foreach ($cat as $key => $value) {
                ?>
                <div class="col-lg-4">
                    <a href="<?php echo base_url("site/blog/post/index/{$value['chid']}"); ?>">
                        <div class="card card-feature text-center text-lg-right mb-4 mb-lg-0">
                            <span class="card-feature__icon">
                                <h3 class="card-feature__title"><?php echo $value['name']; ?></h3>
                            </span>
                            <img  class="" src="<?php echo PUBLIC_PATH; ?>site/img/blog/<?php echo $value['img']; ?>" >
                        </div>
                    </a>
                </div>

            <?php } ?>

            </div>
        </div>
    </div>
</section>
<!--================ Feature section end =================-->

<!--================ about section start =================-->

<!--================ End Clients Logo Area =================-->
</main>
