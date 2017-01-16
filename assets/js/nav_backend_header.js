$(document).ready(function() {
    $('#ver_notificaicones').hover(function(){
       $.ajax({
            type: "POST",
            url: $('#site_url').val() + 'Notificaciones/vistas/',
            data: {},
            dataType: "json",
            success: function (response) {
                if(response.result == 1){
                    $('#contador_notificaciones_nav').html('0');
                    $('#contador_notificaciones_nav_exp').html('0 notificaciones');
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        }); 
    });
});