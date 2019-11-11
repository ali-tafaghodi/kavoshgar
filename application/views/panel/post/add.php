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
                echo form_open_multipart("panel/post/list_post/process/{$data['ids']}", array('class' => 'form-horizontal'))
                ?>

                <fieldset title="Step1" class="step" id="default-step-0">
                    <legend></legend>
                    <div class="form-group">
                        <label class="col-lg-2 control-label"> عنوان مطلب</label>
                        <div class="col-lg-10">
                            <?php

                            $title = isset($data[0]['title']) ? $data[0]['title'] : null;
                            echo form_input(array(
                                "name" => "frm[title]",
                                "class" => "form-control",
                                "value" => $title
                            )); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label"> عکس</label>
                        <div class="col-lg-10">
                            <?php
                            $pic = isset($data[0]['pic']) ? $data[0]['pic'] : null;
                            echo form_upload(array(
                                'name' => 'file',
                                'class' => 'form-control',
                                'Onchange' => 'readURL1(this)',
                                'value' => $pic

                            ));
                            if ($pic) {
                                ?>
                                <br>
                                <img id="blah1" width="50"
                                src="<?php echo PUBLIC_PATH . 'site/img/blog/' . $pic ?>"
                                alt=""/>
                                <?php
                            }
                            ?>
                            <br>
                            <img id="blah1" src="#" alt=""/>

                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-lg-2 control-label">دسته بندی</label>
                        <div class="col-lg-10">

                            <?php
                            $option = array();
                            $sel = array();

                            foreach ($cat as $value) {
                                if ($data['ids'])
                                {
                                    if ($data[0]['chid'] == $value['chid']) {
                                        $sel = $value['chid'];
                                    }
                                }
                                $option[$value['chid']] = $value['name'];


                            } ?>
                            <?php
                            echo form_dropdown(array(
                                "name" => "frm[chid]",
                                "class" => "form-control m-bot15",
                                "options" => $option,
                                "selected" => $sel
                            ));
                            ?>

                        </div>

                    </div>
                    <!-- <script src="<?php echo PUBLIC_PATH; ?>panel/js/jquery.js"></script> -->
                    <script src="<?php echo BASE_URL; ?>ckeditor/ckeditor.js"></script>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">متن</label>
                        <div class="col-lg-10">
                            <?php
                            $text = isset($data[0]['txt']) ? $data[0]['txt'] : null;
                            echo form_textarea(array(
                                "name" => "frm[txt]",
                                "class" => "form-control",
                                'cols' => '80',
                                'rows' => '8',
                                'value' => $text
                            )); ?>
                            <script>
                            CKEDITOR.replace( 'frm[txt]' );
                            </script>
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
