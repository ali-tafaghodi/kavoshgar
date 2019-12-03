$(document).ready(function () {
    var path = $(location).attr('href');
    var base_url = location.protocol + "//" + location.host +"/";
    var site_url = base_url + "site/";
    $("#result").fadeOut(0);
    $('#search_text').click(function(){
        $(this).next("#result").fadeIn(0);
    });
    $('#search_text').keyup(function () {
        var txt = $(this).val();
        console.log(txt);
        if (txt !== '') {
            $.ajax({
                type: 'POST',
                data: {search: txt},
                url: site_url+"search/process",
                dataType: 'text',
                success: function (res) {
                    $("#result").html(res);

                }
            });
        }
        else {
            $("#result").html('');
        }
    });
    
});
