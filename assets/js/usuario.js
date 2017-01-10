$(document).ready(function() {
        
    
        
    $("#remove_img").click(function(e) {
        e.preventDefault();
        document.getElementById("img_perfil_src").src="";});
        $("#imagen").change(function(){
            readURL(this);
        });
    
    
    });
    function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img_perfil_src').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}