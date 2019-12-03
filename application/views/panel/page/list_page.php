        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        لیست صفحات
                    </header>
                    <table class="table table-striped border-top" id="sample_1">
                        <thead>
                        <tr>
                            <th width="50px" class="hidden-phone"
                            ">ردیف</th>
                            <th width="450px" class="hidden-phone"
                            ">عنوان</th>
                            <th class="hidden-phone">کلمات کلیدی</th>
                            <th class="hidden-phone">آدرس</th>
                            <th class="hidden-phone"></th>
                            <th class="hidden-phone"></th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data as $key => $page) : ?>

                            <tr class="odd gradeX">

                                <td><?= $key + 1; ?> </td>
                                <td class="hidden-phone"><?= $page['title']; ?></td>
                                <td class="hidden-phone"><?= $page['keywords']; ?></td>
                                <td> <input style="direction: ltr"  value="<?= base_url("site/page/listshow/{$page['id']}"); ?>"></td>


                                <td class="hidden-phone"><a href="<?= base_url("panel/page/index/{$page['id']}"); ?>"
                                                            class="label label-danger"
                                                            style="cursor: pointer">ویرایش</a></td>
                                <td class="hidden-phone"><a href="<?= base_url("panel/page/del_page/{$page['id']}"); ?>"
                                                            class="label label-success" style="cursor: pointer">حذف</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
