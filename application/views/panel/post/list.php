<!--main content start-->
<!-- page start-->
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                لیست پست ها
            </header>
            <table class="table table-striped border-top" id="sample_1">
                <thead>
                    <tr>
                        <th width="50px" class="hidden-phone"
                        ">ردیف</th>
                        <th width="450px" class="hidden-phone"
                        ">عنوان</th>
                        <th class="hidden-phone">دسته بندی</th>
                        <th class="hidden-phone"></th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $key => $val) : ?>

                        <tr class="odd gradeX">

                            <td><?= $key + 1; ?> </td>
                            <td class="hidden-phone"><?= $val['title']; ?></td>
                            <?php foreach ($cat as $key => $catgory) :
                                if ($val['chid']==$catgory['chid']):
                                    ?>
                                    <td class="hidden-phone"><?= $catgory['name']; ?></td>
                                    <?php
                                endif;
                            endforeach;
                            ?>
                            <td class="hidden-phone"><a href="<?= base_url("panel/post/list_post/index/{$val['id']}"); ?>" class="label label-danger" style="cursor: pointer">ویرایش</a></td>

                            <td class="hidden-phone"><a href="<?= base_url("panel/post/list_post/del_post/{$val['id']}"); ?>" class="label label-success" style="cursor: pointer">حذف</a></td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </div>
</div>
