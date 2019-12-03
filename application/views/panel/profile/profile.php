<!-- page start-->
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                ویرایش پروفایل

            </header>
            <div class="panel-body">

                <?php
                $this->load->helper('form');
                echo form_open("panel/profile/process", array('onsubmit' => 'return ajaxprofie()', 'id' => 'profileForm', 'class' => 'form-horizontal'));
                ?>
                <fieldset title="Step1" class="step" id="default-step-0">
                    <legend></legend>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">نام </label>
                        <div class="col-lg-10">
                            <?php


                            $value = isset($list[0]['name']) ? $list[0]['name'] : null;
                            echo form_input(array(
                                "name" => "frm[name]",
                                "class" => "form-control",
                                "value" => $value,
                                'data-validation' => "required",
                                'data-validation-error-msg' => " *اجباری"
                            )); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">ایمیل</label>
                        <div class="col-lg-10">
                            <?php
                            $value = isset($list[0]['email']) ? $list[0]['email'] : null;
                            echo form_input(array(
                                "name" => "frm[email]",
                                "class" => "form-control",
                                'data-validation' => "email",
                                'data-validation-error-msg' => " لطفا ایمیل را به درستی وارد نمایید",
                                "value" => $value
                            )); ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-lg-2 control-label">پسورد قدیم</label>
                        <div class="col-lg-10">
                            <div>
                                <?php
                                echo form_input(array(
                                    "name" => "frm[pass_old]",
                                    "type" => "password",
                                    "class" => "form-control",
                                    "placeholder" => "لطفا پسورد قدیمی خود را وارد کنید",
                                    'data-validation' => "required",
                                    'data-validation-error-msg' => " *اجباری"
                                )); ?>

                            </div>


                        </div>


                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">پسورد جدید</label>
                        <div class="col-lg-10">
                            <?php
                            echo form_input(array(
                                "name" => "frm[pass_new]",
                                "type" => "password",
                                "class" => "form-control",
                                "placeholder" => "لطفا پسورد جدید خود را وارد کنید",
                                'data-validation' => "required",
                                'data-validation-error-msg' => " *اجباری"

                            )); ?>

                        </div>
                    </div>


                    <?php
                    echo form_input(array(
                        'name' => 'btn',
                        'value' => 'ثبت',
                        'class' => 'finish btn btn-danger',
                        'type' => 'submit'
                    ));

                    echo form_close();

                    ?>
                    <p class="pm" style="color: red;font-size: 15px;text-align: center"></p>
            </div>
        </section>
    </div>
</div>
<!-- page end-->
</section>
<script src="<?php echo PUBLIC_PATH; ?>site/vendors/jquery/jquery-3.2.1.min.js"></script>
<script
        type="text/javascript"
        src="<?php echo PUBLIC_PATH; ?>Site/js/jquery.form-validator.min.js"></script>
<script type="text/javascript">
    $.validate({
        form: '#profileForm'
    });

    function ajaxprofie() {
        var data_profie = {
            'name': $('input[name="frm[name]"]').val(),
            'email': $('input[name="frm[email]"]').val(),
            'pass_old': $('input[name="frm[pass_old]"]').val(),
            'pass_new': $('input[name="frm[pass_new]"]').val()
        }

        console.log(data_profie);
        $.post("<?php echo base_url();?>panel/profile/process/", data_profie, function (data) {
            console.log(data);
            if (data == 'ok') {
                var path = $(location).attr('href');
                var base_url = location.protocol + "//" + location.host + "/";
                var site_url = base_url + "panel/";

                $('.pm').html('ثبت شد');
                $('input[name="pass_old"]').val('');
                $('input[name="pass_new"]').val('');
                $('.pm').hide().html('ثبت شد').fadeIn('slow').delay(3000).hide(1)
                window.location.href = site_url + "profile/logout";
            } else if (data == 'password filed') {
                $('.pm').html('پسورد قدیمی اشتباه می باشد');
                $('input[name="email"]').val('');
                $('.pm').hide().html('پسورد قدیمی اشتباه می باشد').fadeIn('slow').delay(3000).hide(1)
            }
        });
        return false;
    }

</script>
