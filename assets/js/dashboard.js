var updateCategories = function (post_id) {
    
    $.ajax({
        type: "POST",
        url: $('#site_url').val() + 'Backend/update_categories/' + post_id  ,
        data: {'categories':$('#category-' + post_id).val()},
        dataType: "json",
        success: function (response) {

            if (response.success == true) {
                alert('guardado');
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {

        }
    });
};
function quitar_post(post_id,social_net) {
    if (confirm('Seguro que desea eliminar este Post?')) {
        $.ajax({
            type: "POST",
            url: $('#site_url').val() + 'Redes/quitar_post/' + post_id + '/' + social_net,
            data: {},
            dataType: "json",
            success: function (response) {

                if (response.success == true) {
                    alert('borrado');
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {

            }
        });
    }
    return false;

}
$(document).ready(function () {
    $(".js-example-basic-multiple").select2();
});