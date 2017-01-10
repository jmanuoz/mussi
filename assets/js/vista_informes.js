jQuery(document).ready(function () {
$('#datepaginator_sample_4').datepaginator({
                size: "small",
                onSelectedDateChanged: function(event, date) {
                    obtener_informes(date);                  
                }
            });
        var fecha_hoy = new Date();
        obtener_informes(fecha_hoy);
        var elt = $('#object_tagsinput');
        
        elt.tagsinput({
          itemValue: 'value',
          itemText: 'text',
        });
        var mails =  jQuery.parseJSON($('#mails').val());
        for (i = 0; i < mails.length; i++) { 
            
            elt.tagsinput('add', {
                "value": mails[i].mail,
                "text": mails[i].mail,
                "continent": mails[i].mail
            });
        }
        
        elt.on('itemRemoved', function(event) {
            $.ajax({
                    type: "POST",
                    url: $('#site_url').val() + '/Informes_Medios/borrar_destinatario/',
                    data: {mail:event.item.value},dataType: "json",

                    error: function (xhr, ajaxOptions, thrownError) {

                    },
                    success:function(response){
                         
                    }
                });
        });
        
        
        
        $('#object_tagsinput_add').on('click', function(){
            if(isEmail($('#object_tagsinput_value').val())){
                $.ajax({
                    type: "POST",
                    url: $('#site_url').val() + '/Informes_Medios/agregar_destinatario/',
                    data: {mail:$('#object_tagsinput_value').val()},dataType: "json",

                    error: function (xhr, ajaxOptions, thrownError) {

                    },
                    success:function(response){
                         elt.tagsinput('add', { 
                            "value": $('#object_tagsinput_value').val(), 
                            "text": $('#object_tagsinput_value').val(), 
                            "continent": $('#object_tagsinput_value').val()    
                        });
                    }
                });
            }else{
                alert('Ingrese un mail válido');
            }
           });
        });


function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

function obtener_informes(date){
    $.ajax({
        type: "POST",
        url: $('#site_url').val() + '/Informes_Medios/obtener_informes_fecha/',
        data: {fecha:moment(date).format("YYYY-MM-DD")},dataType: "json",

        error: function (xhr, ajaxOptions, thrownError) {

        },
        success:function(response){
            $('#lista_informes').html(response.informes);
        }
    });
}