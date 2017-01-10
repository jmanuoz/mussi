jQuery(document).ready(function () {
    $('.subseccion').change(
            function () {
                obtener_graficos(this);
            }
    );

    chat();
    
    $('.selector-secciones').click(function(){
        var id = $(this).attr("href");
        var ids = id.split('_');
        var select_id = ids[2];
        obtener_graficos('#select-'+select_id);
    });

});

function chat() {
    var cont = $('#chats');
    var list = $('.chats', cont);
    var form = $('.chat-form', cont);
    var input = $('input', form);
    var btn = $('.btn', form);

    var handleClick = function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: $('#site_url').val() + '/Encuestas/mensaje/',
            data: {mensaje: input.val(), encuesta_id: $('#encuesta_id').val(), id_user_reciever: $('#reciever_id').val()},
            dataType: "json",
            success: function (response) {
                var text = input.val();
                var time = new Date();
                var time_str = (time.getHours() + ':' + time.getMinutes());
                var tpl = '';
                tpl += '<li class="out">';
                tpl += '<img class="avatar" alt="" src="' + $('#user_logo').attr('src') + 'avatar1.jpg"/>';
                tpl += '<div class="message">';
                tpl += '<span class="arrow"></span>';
                tpl += '<a href="#" class="name">' + $('#nombre_usuario_nav').html() + '</a>&nbsp;';
                tpl += '<span class="datetime">at ' + time_str + '</span>';
                tpl += '<span class="body">';
                tpl += text;
                tpl += '</span>';
                tpl += '</div>';
                tpl += '</li>';

                var msg = list.append(tpl);
                input.val("");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert('El mensaje no pudo ser enviado');
            }
        });




        var getLastPostPos = function () {
            var height = 0;
            cont.find("li.out, li.in").each(function () {
                height = height + $(this).outerHeight();
            });

            return height;
        }

        cont.find('.scroller').slimScroll({
            scrollTo: getLastPostPos()
        });
    };
    
    var check = function (e){
                $.ajax({
                        type: "POST",
                        url: $('#site_url').val() + '/Encuestas/obtener_mensajes/',
                        data: { encuesta_id: $('#encuesta_id').val(), id_user_sender: $('#reciever_id').val(),
                            id_user_reciever: $('#sender_id').val(),
                            last_message_id: $('#last_message_id').val()},
                        dataType: "json",
                        success: function (response) {
                            var last_message_id = 0;
                            for (i = 0; i < response.mensajes.length; i++) { 
                            last_message_id = response.mensajes[i].id_mensaje;
                            var tpl = '';
                            tpl += '<li class="in">';
                            tpl += '<img class="avatar" alt="" src="' + $('#base_url').val()+'assets/img_perfiles/'+response.mensajes[i].sender_image + '"/>';
                            tpl += '<div class="message">';
                            tpl += '<span class="arrow"></span>';
                            tpl += '<a href="#" class="name">' + response.mensajes[i].sender_name+' ' + response.mensajes[i].sender_lastname + '</a>&nbsp;';
                            tpl += '<span class="datetime">a las ' + response.mensajes[i].fecha + '</span>';
                            tpl += '<span class="body">';
                            tpl += response.mensajes[i].mensaje;
                            tpl += '</span>';
                            tpl += '</div>';
                            tpl += '</li>';

                            var msg = list.append(tpl);
                            
                            }
                            if(last_message_id > 0){
                                $('#last_message_id').val(last_message_id);
                            }
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            
                        }
                    });
            }
    setInterval(check, 6000);
    $('body').on('click', '.message .name', function (e) {
        e.preventDefault(); // prevent click event

        var name = $(this).text(); // get clicked user's full name
        input.val('@' + name + ':'); // set it into the input field
        App.scrollTo(input); // scroll to input if needed
    });

    btn.click(handleClick);

    input.keypress(function (e) {
        if (e.which == 13) {
            handleClick(e);
            return false; //<---- Add this line
        }
    });
}

function obtener_graficos(select){
    var id = $(select).children(":selected").attr("value");
    var res = id.split("-");
    $.ajax({
        type: "POST",
        url: $('#site_url').val() + '/Encuestas/obtener_graficos/' + res[1],
        data: {},
        dataType: "json",
        success: function (response) {
            $('#grafico-' + res[0]).html(response.html);
        },
        error: function (xhr, ajaxOptions, thrownError) {
          
        }
    });
}

