$(document).ready(function () {
    var base_url = location.protocol + "//" + location.host +"/";
    var site_url = base_url + "site/";


    console.log('ok');
    $.validate({
        form: '#myform'
    });

    function formajax() {
        var data_send = {
            'email': $('input[name="frm[email]"]').val()
        }
        // console.console.log('ok');
         console.log(data_send);
        $.post(site_url+"site/Newsletter/news", data_send, function (data) {
            if (data == 'ok') {

                // $('#pm').html('پیام ارسال شد');
                $('input[name="frm[email]"]').val('');

                $('#infoo').hide().html('ثبت شد').fadeIn('slow').delay(3000).hide(1);
            }
        });
        return false;
    }
});
