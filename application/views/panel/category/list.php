<!--main content start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        لیست دسته بندی

                    </header>
                    <table class="table table-striped border-top" id="sample_1">
                        <thead>
                        <tr>
                            <th width="50px" class="hidden-phone"
                            ">ردیف</th>
                            <th width="450px" class="hidden-phone"
                            ">نام</th>
                            <th class="hidden-phone">آدرس</th>
                            <th class="hidden-phone">عکس</th>
                            <th class="hidden-phone"></th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data as $key => $val) : ?>

                            <tr class="odd gradeX">

                                <td><?= $key + 1; ?> </td>
                                <td class="hidden-phone"><?= $val['name']; ?></td>

                                <td> <input style="direction: ltr ; width:270px"  value="<?php echo base_url("site/blog/post/index/{$val['chid']}"); ?>"></td>

                                <td class=" "><img width="30" src="<?php echo PUBLIC_PATH.'site/img/blog/'.$val['img'];?>"/></td>

                                <td class="hidden-phone"><a href="<?= base_url("panel/category/category/index/{$val['id']}"); ?>" class="label label-danger" style="cursor: pointer">ویرایش</a></td>

                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
