<!--================ Hero sm Banner start =================-->
  <section class="hero-banner hero-banner--sm mb-30px">
    <div class="container">
      <div class="hero-banner--sm__content">
        <h1>تماس با ما</h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>">خانه</a></li>
            <li class="breadcrumb-item active" aria-current="page">تماس با ما</li>
          </ol>
        </nav>
      </div>
    </div>
  </section>
  <!--================ Hero sm Banner end =================-->
  <!-- ================ contact section start ================= -->
  <section class="section-margin">
    <div class="container">
      <div class="d-none d-sm-block mb-5 pb-4">
      <div class="row">
        <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3><a href="mailto:ali.tafaghodii@gmail.com">sajad.optical@gmail.com</a></h3>
            </div>
          </div>
        </div>
        <div class="col-md-8 col-lg-9">
            <p class="pm" style="color: red;font-size: 20px;text-align: center"></p>
            <?php
            $this->load->helper('form');
            echo validation_errors();
            echo form_open("", array('onsubmit' => 'return ajaxemail()', 'id' => 'contactForm', 'class' => 'form-contact contact_form'));
            ?>
            <div class="row">
              <div class="col-lg-5">
                <div class="form-group">
                    <?php
                    echo form_input(array(
                        "name" => "name",
                        "class" => "form-control",
                        "placeholder" => "لطفا نام خود را وارد کنید",
                        'data-validation' => "required",
                        'data-validation-error-msg' => " *اجباری"
                    )); ?>
                </div>
                <div class="form-group">
                    <?php
                    echo form_input(array(
                        'name' => 'email',
                        "class" => "form-control",
                        "placeholder" => "لطفا ایمیل خود را وارد کنید",
                        'data-validation' => "email",
                        'data-validation-error-msg' => " لطفا ایمیل را به درستی وارد نمایید"
                    )); ?>
<!--                  <input class="form-control" name="frm[email]" id="email" type="email" placeholder="ایمیل *">-->
                </div>
                <div class="form-group">
                    <?php
                   echo $subject = form_input(array(
                        'name' => 'subject',
                        'class' => 'form-control',
                        'placeholder' => 'موضوع *',
                        'data-validation' => "required",
                        'data-validation-error-msg' => " *اجباری"
                    ));
                    ?>
<!--                  <input class="form-control" name="frm[subject]" id="subject" type="text" placeholder=" موضوع *">-->
                </div>
              </div>
              <div class="col-lg-7">
                <div class="form-group">
                    <?php
                    echo form_textarea(array(
                        'name' => 'message',
                        'size' => '50',
                        'class' => 'form-control different-control w-100',
                        'placeholder' => 'پیام *',
                        'cols' => '30',
                        'rows' => '5',
                        'data-validation' => "required",
                        'data-validation-error-msg' => " *اجباری"
                    ));
                    ?>
                </div>
              </div>
            </div>
            <div class="form-group text-center text-md-right mt-3">
                <?php
                echo form_submit(array(
                    'name' => 'submit',
                    'class' => 'button button-contactForm',
                    'value' => 'ارسال پیام'

                ));
                ?>
            </div>
            <?php
             echo form_close();
            ?>
        </div>
      </div>
    </div>
  </section>
	<!-- ================ contact section end ================= -->

<script src="<?php echo PUBLIC_PATH; ?>site/vendors/jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>Site/js/jquery.form-validator.min.js"></script>
<script type="text/javascript">
    $.validate({
        form: '#contactForm'
    });

    function ajaxemail() {
        var data_send_mail = {
            'name': $('input[name="name"]').val(),
            'email': $('input[name="email"]').val(),
            'subject': $('input[name="subject"]').val(),
            'text': $('textarea[name="message"]').val()
        }

        console.log(data_send_mail);
        $.post("<?php echo base_url();?>site/contact/process/", data_send_mail, function (data) {
            console.log(data);
            if (data == 'Email sent.') {
                $('.pm').html('ایمیل ارسال شد');
                $('input[name="name"]').val('');
                $('textarea[name="message"]').val('');
                $('input[name="subject"]').val('');
                $('input[name="email"]').val('');
                $('.pm').hide().html('ایمیل ارسال شد').fadeIn('slow').delay(3000).hide(1)
            } else  {
                $('.pm').html('مشکلی در ارسال ایمیل بوجود آمد');
                $('input[name="email"]').val('');
                $('.pm').hide().html('مشکلی در ارسال ایمیل بوجود آمد').fadeIn('slow').delay(3000).hide(1)
            }
        });
        return false;
    }

</script>