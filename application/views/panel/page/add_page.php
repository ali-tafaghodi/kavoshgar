        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                      افزودن صفحه جدید

                    </header>
                    <div class="panel-body">

                        <form class="form-horizontal" id="default" method="post" action="<?php echo base_url("panel/page/process/{$ids}"); ?>" enctype="multipart/form-data">
                            <fieldset title="Step1" class="step" id="default-step-0">
                                <legend></legend>
                                <div class="form-group">
                                    <?php
                                        $title = isset($data['title']) ? $data['title'] : null;
                                    ?>
                                    <label class="col-lg-2 control-label">  عنوان </label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control"  name="frm[title]" value="<?php echo $title; ?>">
                                    </div>
                                </div>
                                <?php
                                    $keywords = isset($data['keywords']) ? $data['keywords'] : null;
                                ?>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">کلمات کلیدی</label>
                                    <div class="col-lg-10">
                                        <input  class="form-control"  name="frm[keywords]" value="<?php echo $keywords; ?>">
                                    </div>
                                </div>
                                <?php
                                    $discription = isset($data['discription']) ? $data['discription'] : null;

                                ?>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">توضیحات</label>
                                    <div class="col-lg-10">
                                        <script src="//cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
                                        <textarea type="text" class="form-control"  name="frm[discription]" ><?php echo $discription; ?></textarea>
                                        <script>
                                            CKEDITOR.replace('frm[discription]');
                                        </script>
                                    </div>
                                </div>



                            <input type="submit" class="finish btn btn-danger" value="ثبت" name="btn" />
                        </form>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
