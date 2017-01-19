function quitar_post(post_id) {
    if (confirm('Seguro que desea eliminar este Post?')) {
        $.ajax({
            type: "POST",
            url: $('#site_url').val() + 'Redes/quitar_post/' + post_id + '/' + $('#social_net').val(),
            data: {},
            dataType: "json",
            success: function (response) {

                if (response.success == true) {
                    $('#checkbox-' + post_id).removeAttr("disabled");
                    $('#remove_post-' + post_id).remove();
                    $('#checkbox-' + post_id).removeAttr("checked");
                    $('#checkbox-' + post_id).parent().removeClass('checked');
                    $('#checkbox-' + post_id).unbind("click", noUnckeck);
                    $('#uniform-checkbox-' + post_id).removeClass('disabled');
                    $("#category-"+post_id).each(function () { //added a each loop here
                        $(this).select2('val', '')
                    });
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {

            }
        });
    }
    return false;

}
var noUnckeck = function () {
    $(this).parent().addClass('checked');
    return false;
};
$(document).ready(function () {
    $("input:checked").bind("click", noUnckeck);
    $(".js-example-basic-multiple").select2();
});