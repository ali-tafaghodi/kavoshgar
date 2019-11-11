<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <?php echo $error['error'];

                ?>
            </header>
            <div class="panel-body">
                <?php

                $this->load->helper('form');
                echo form_open_multipart("panel/category/category/process/{$data[0]['id']}", array('class' => 'form-horizontal'))
                ?>

                <fieldset title="Step1" class="step" id="default-step-0">
                    <legend></legend>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">نام دسته بندی</label>
                        <div class="col-lg-10">
                            <?php

                            $name = isset($data[0]['name']) ? $data[0]['name'] : null;
                            echo form_input(array(
                                "name" => "frm[name]",
                                "class" => "form-control",
                                "value" => $name
                            )); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label"> تصویر</label>
                        <div class="col-lg-10">
                            <?php
                            $image0 = isset($data[0]['img']) ? $data[0]['img'] : null;
                            echo form_upload(array(
                                'name' => 'file',
                                'class' => 'form-control',
                                'Onchange' => 'readURL1(this)',
                                'value' => $image0

                            ));
                            if ($image0) {
                                ?>
                                <br>
                                <img id="blah1" width="50"
                                     src="<?php echo PUBLIC_PATH . 'site/img/' . $image0 ?>"
                                     alt=""/>
                                <?php
                            }
                            ?>
                            <br>
                            <img id="blah1" src="#" alt=""/>

                        </div>
                    </div>





                    <input type="submit" class="finish btn btn-danger" value="ثبت" name="btn"/>
                    <?php
                    echo form_close();
                    ?>
            </div>
        </section>
    </div>
</div>
<!-- page end-->
</section>
<!--<script type="text/javascript">-->
<!---->
<!---->
<!--</script>-->
