jQuery(document).ready(function () {
    $('.glyphicon-trash').click(function(){
        var borrar = confirm("Este seguro que desea eliminar esta encuesta?");
        if(borrar){
            var id = $(this).attr("id");
            var res = id.split("-");
             $.ajax({
                    type: "POST",
                    url: $('#site_url').val() + '/Encuestas/eliminar/'+res[1],
                    data: {},
                    dataType: "json",
                    success: function(response){
                        if(response.result){
                            window.location = $('#site_url').val() + '/Encuestas/lista_encuestas';
                        }
                    },
                     error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                  }
                  });
        }
    });
});


