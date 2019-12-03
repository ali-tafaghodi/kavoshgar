<!-- page start-->
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
لیست دیدگاهها
            </header>
            <table class="table table-striped border-top" id="sample_1">
                <thead>
                <tr>
                    <th width="50px" class="hidden-phone"
                    ">ردیف</th>
                    <th width="450px" class="hidden-phone"
                    ">نام</th>
                    <th class="hidden-phone">موضوع</th>
                    <th class="hidden-phone">متن</th>
                    <th class="hidden-phone">عنوان صفحه</th>
                    <th class="hidden-phone"></th>
                    <th class="hidden-phone"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($comment as $key => $comment_list) : ?>

                    <tr class="odd gradeX">

                        <td><?= $key + 1; ?> </td>
                        <td class="hidden-phone"><?= $comment_list['name']; ?></td>
                        <td class="hidden-phone"><?= $comment_list['subject']; ?></td>
                        <td class="hidden-phone"><?= $comment_list['message']; ?></td>
                        <td class="hidden-phone"><?= isset($comment_list['_blog_title'])? $comment_list['_blog_title']: $comment_list['_page_title']; ?></td>
                        <?php
                        if ($comment_list['status'] == '0') { ?>
                            <td class="hidden-phone"><button onclick="return My_function1(<?php echo $comment_list['id']?>)" class="label label-danger" name="btn1_status">عدم نمایش</button></td>
                        <?php } else { ?>
                            <td class="hidden-phone"><button onclick="My_function2(<?php echo $comment_list['id']?>)" name="btn2_status" class="label label-success" >نمایش</button></td>
                            <?php
                        }
                        ?>


                        <td class="hidden-phone"><a href="<?= base_url("panel/profile/read_coment/{$comment_list['id']}"); ?>"
                                                    class="label label-danger"
                                                    style="cursor: pointer">باز کردن پیام</a></td>
                        <td class="hidden-phone"><a href="<?= base_url("panel/profile/del_coment/{$comment_list['id']}"); ?>"
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
<script type="text/javascript">
    var base_url = location.protocol + "//" + location.host + "/";
    var site_url = base_url + "panel/";
    function My_function1(id){
        var data_status = {
            'btn': $('button[name="btn1_status"]').html()        }

        console.log(id);
        $.post("<?php echo base_url();?>panel/profile/comment_show/"+id, data_status, function (data) {
            // console.log(data);
            if (data == 'ok') {
                window.location.href = site_url + "profile/list_coment";
                }
        });
    }
    function My_function2(id){
        var data_status = {
            'btn': $('button[name="btn2_status"]').html()        }

        console.log(id);
        $.post("<?php echo base_url();?>panel/profile/comment_unshow/"+id, data_status, function (data) {
            if (data == 'ok') {
                window.location.href = site_url + "profile/list_coment";
            }

        });
    }
</script>