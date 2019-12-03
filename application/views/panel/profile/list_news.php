<!-- page start-->
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
لیست خبرنامه
            </header>
            <table class="table table-striped border-top" id="sample_1">
                <thead>
                <tr>
                    <th width="50px" class="hidden-phone"
                    ">ردیف</th>
                    <th width="450px" class="hidden-phone"
                    ">ایمیل</th>
                    <th class="hidden-phone"></th>
                    <th class="hidden-phone"></th>
                    <th class="hidden-phone"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($news_all as $key => $news) : ?>

                    <tr class="odd gradeX">

                        <td><?= $key + 1; ?> </td>
                        <td class="hidden-phone"><?= $news['email']; ?></td>
                        <td class="hidden-phone"></td>
                        <td class="hidden-phone"></td>
                        <td class="hidden-phone"></td>
                        <?php

                        ?>



                        <td class="hidden-phone"><a href="<?= base_url("panel/profile/del_news/{$news['id']}"); ?>"
                                                    class="label label-danger" style="cursor: pointer">حذف</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </div>
</div>
<!-- page end-->
