
var fecha = $('#fecha').val();
if(fecha == ''){
    fecha =new Date();
}
$('#fecha').datepicker({
    format: 'dd/mm/yyyy',
   
}).datepicker("setDate", fecha);
