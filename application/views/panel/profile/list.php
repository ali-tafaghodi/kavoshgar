<!-- page start-->
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
لیست پیام ها
            </header>
            <table class="table table-striped border-top" id="sample_1">
                <thead>
                <tr>
                    <th width="50px" class="hidden-phone"
                    ">ردیف</th>
                    <th width="450px" class="hidden-phone"
                    ">نام</th>
                    <th class="hidden-phone">موضوع</th>
                    <th class="hidden-phone"></th>
                    <th class="hidden-phone"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($contact_list as $key => $contact) : ?>

                    <tr class="odd gradeX">

                        <td><?= $key + 1; ?> </td>
                        <td class="hidden-phone"><?= $contact['name']; ?></td>
                        <td class="hidden-phone"><?= $contact['subject']; ?></td>
                        <?php
                        if ($contact['status'] == '0') { ?>
                            <td class="hidden-phone"><a href="" class="label label-success" >خوانده شده</a></td>
                        <?php } else { ?>
                            <td class="hidden-phone"><a href="" class="label label-danger" >خوانده نشده</a></td>
                            <?php
                        }
                        ?>


                        <td class="hidden-phone"><a href="<?= base_url("panel/profile/read_contact/{$contact['id']}"); ?>"
                                                    class="label label-danger"
                                                    style="cursor: pointer">باز کردن پیام</a></td>
                        <td class="hidden-phone"><a href="<?= base_url("panel/profile/del_contact/{$contact['id']}"); ?>"
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
