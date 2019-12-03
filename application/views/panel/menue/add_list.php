<!-- page start-->
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                افزودن منو جدید

            </header>
            <div class="panel-body">
                <?php
                $this->load->helper('form');
                echo form_open("panel/list_menue/process/{$ids}", array('class' => 'form-horizontal'));
                ?>
                <fieldset title="Step1" class="step" id="default-step-0">
                    <legend></legend>
                    <div class="form-group">
                        <label class="col-lg-2 control-label"> عنوان منو</label>
                        <div class="col-lg-10">
                            <?php
                            $title = isset($data['title']) ? $data['title'] : null;
                            echo form_input(array(
                                "name" => "frm[title]",
                                "class" => "form-control",
                                "value" => $title


                            )); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">آدرس منو</label>
                        <div class="col-lg-10">
                            <?php
                            $addres = isset($data['address_file']) ? $data['address_file'] : null;
                            echo form_input(array(
                                "name" => "frm[address_file]",
                                "class" => "form-control",
                                "value" => $addres
                            )); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">سرگروه</label>
                        <div class="col-lg-10">
                            <?php
                            //   $val = isset($data['id']) ? $data['title'] : null;
                            $option = array(
                                '0' => 'سرگروه'
                            );
                            $sel = array();
                            foreach ($chid as $value) {
                                if ($ids) {
                                    if ($data['chid'] == $value['id']) {
                                        $sel = $value['id'];

                                    }
                                }
                                $option[$value['id']] = $value['title'];
                            }
                            echo form_dropdown(array(
                                "name" => "frm[chid]",
                                "class" => "form-control m-bot15",
                                "options" => $option,
                                "selected" => $sel
                            ));
                            ?>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label" ">وضعیت نمایش</label>
                        <div class="col-lg-10">
                            <div>
                                <?php
                                $ch = isset($data['status']) ? $data['status'] : null;
                                $check1 = true;
                                $check2 = true;
                                if ($ch == 1) {
                                    $check1 = true;
                                    $check2 = false;
                                } else {
                                    $check1 = false;
                                    $check2 = true;
                                }


                                echo form_radio(array(
                                    'name' => 'frm[status]',
                                    'value' => '1',
                                    'checked' => $check1
                                ));
                                ?>
                                فعال

                            </div>
                            <br/>
                            <div>
                                <?php


                                echo form_radio(array(
                                    'name' => 'frm[status]',
                                    'value' => '0',
                                    'checked' => $check2
                                ));


                                ?>غیرفعال
                            </div>


                        </div>


                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label"> ترتیب نمایش</label>
                        <div class="col-lg-10">
                            <?php
                            $sort = isset($data['sort']) ? $data['sort'] : null;


                            echo form_input(array(
                                "name" => "frm[sort]",
                                "class" => "form-control",
                                "value" => $sort
                            )); ?>

                        </div>
                    </div>


                    <?php
                    echo form_input(array(
                       'name'=>'btn',
                       'value'=>'ثبت',
                       'class'=>'finish btn btn-danger',
                       'type'=>'submit'
                    ));

                    echo form_close();

                    ?>
            </div>
        </section>
    </div>
</div>
<!-- page end-->
</section>
