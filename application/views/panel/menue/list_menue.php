<!-- page start-->
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                لیست منوها
            </header>
            <table class="table table-striped border-top" id="sample_1">
                <thead>
                <tr>
                    <th width="50px" class="hidden-phone"
                    ">ردیف</th>
                    <th width="450px" class="hidden-phone"
                    ">عنوان منو</th>
                    <th class="hidden-phone">عنوان سرگروه</th>
                    <th class="hidden-phone">لینک منو</th>
                    <th class="hidden-phone">ترتیب</th>
                    <th class="hidden-phone">وضعیت</th>
                    <th class="hidden-phone"></th>
                    <th class="hidden-phone"></th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($data as $key => $menue) : ?>

                    <tr class="odd gradeX">

                        <td><?= $key + 1; ?> </td>
                        <td class="hidden-phone"><?= $menue['title']; ?></td>
                        <td class="hidden-phone"><?php
                            if ($menue['chid'] == 0) {
                                echo "ندارد";
                            } else {
                                foreach ($data as $sub_menu) {
                                    if ($menue['chid'] == $sub_menu['id']) {
                                        echo $sub_menu['title'];
                                    }
                                }
                            }


                            ?></td>
                        <td class="hidden-phone"><?= $menue['address_file']; ?></td>
                        <td class="hidden-phone"><?= $menue['sort']; ?></td>
                        <?php
                        if ($menue['status'] == '1') { ?>
                            <td class="hidden-phone"><a href="" class="label label-success" >فعال</a></td>
                        <?php } else { ?>
                            <td class="hidden-phone"><a href="" class="label label-danger" >غیرفعال</a></td>
                            <?php
                        }
                        ?>


                        <td class="hidden-phone"><a href="<?= base_url("panel/list_menue/index/{$menue['id']}"); ?>"
                                                    class="label label-danger"
                                                    style="cursor: pointer">ویرایش</a></td>
                        <td class="hidden-phone"><a href="<?= base_url("panel/list_menue/del_menu/{$menue['id']}"); ?>"
                                                    class="label label-success" style="cursor: pointer">حذف</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </div>
</div>
<!-- page end-->
