<!-- page start-->
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <div class="panel-body">
                <?php
                $this->load->helper('form');
                echo form_open("panel/profile/list_close/{$rd_contact[0]['id']}", array('class' => 'form-horizontal'));
                ?>
                <!--                <form class="form-horizontal" action="panel/profile/list_contact">-->
                <div class="form-group">
                    <label class="col-sm-2 control-label ">ایمیل :</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?php echo $rd_contact[0]['email'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">موضوع :</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?php echo $rd_contact[0]['subject'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">متن پیام :</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="12"><?php echo $rd_contact[0]['text'] ?></textarea>
                    </div>
                </div>
                <!--                    <button onclick="myFunction()">Replace document</button>-->
                <input type="submit" class="finish btn btn-danger" value="بستن"/>
                <?php
                echo form_close();

                ?>
            </div>
        </section>
    </div>
</div>
<!-- page end-->
</section>
