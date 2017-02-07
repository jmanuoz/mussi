$(document).ready(function () {
    $('#send_response').click(function(event){
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: $('#site_url').val() + 'Messages/admin_response_message/' + $('#messages_id').val(),
            data: {'message':$('#text').val()},
            dataType: "json",
            success: function (response) {

                if (response.status == 1) {
                    var d = new Date();

                    var month = d.getMonth()+1;
                    var day = d.getDate();

                    var output = d.getHours() + ":" + d.getMinutes() + ' '+day + '/' +
                        (month<10 ? '0' : '') + month + '/' +
                        (day<10 ? '0' : '') + d.getFullYear();
                   $('.chats').append('<li class="out"> <img class="avatar" alt="" src="" />'+
                        '<div class="message">'+
                        '    <span class="arrow"> </span>'+
                        '    <a href="javascript:;" class="name">'+$('#username').val()+'  </a>'+
                        '    <span class="datetime">a las '+output+'  </span>'+
                        '    <span class="body"> '+$('#text').val()+'</span>'+
                       ' </div>  </li>');
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {

            }
        });
    });
});