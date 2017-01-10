jQuery(document).ready(function () {
var substringMatcher = function(strs) {
  return function findMatches(q, cb) {
    var matches, substringRegex;

    // an array that will be populated with substring matches
    matches = [];

    // regex used to determine if a string contains the substring `q`
    substrRegex = new RegExp(q, 'i');

    // iterate through the pool of strings and for any string that
    // contains the substring `q`, add it to the `matches` array
    $.each(strs, function(i, str) {
      if (substrRegex.test(str.area)) {
        matches.push(str);
      }
    });

    cb(matches);
  };
};

var areas = jQuery.parseJSON( $('#areas').val());



$('input.typeahead').typeahead({
  hint: true,
  highlight: true,
  minLength: 1
},
{ 
  source: substringMatcher(areas),
  name: 'area',
   display: 'area',
});


$('#fecha').datepicker({
    format: 'dd/mm/yyyy',
   
});

$('#remove_file').click(function(e){
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: $('#site_url').val() + '/Encuestas/borrar_presentacion/' + $('#id_encuesta').val(),
        data: {},
        dataType: "json",
        success: function (response) {
            $('#presentacion_icon').attr('class','');
            $('#presentacion_icon').html('');
            $('#presentacion_file').val('');
        },
        error: function (xhr, ajaxOptions, thrownError) {
          
        }
    });
    
    
});

});