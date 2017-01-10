/**
 * This file holds IWAYCC table report javascript module
 *
 * Javascript
 *
 * @package   iwaycc.editor
 * @author    Juan Manuel Ortiz de Zarate <juan.ortizdezarate@intraway.com>
 * @copyright 2011 Intraway Corp.
 * @link      http://www.intraway.com
 */
/**
 * Base namespace for iwaycc modules
 */
var cpe = cpe || {};

/**
 * Editor module
 *
 * This module handle tags view 
 */
cpe.partidos = {};

/**
 * Tags
 *
 * Class handle tags view
 *
 * @package iwaycc.chart
 * @author Juan Manuel Ortiz de Zarate <juan.ortizdezarate@intraway.com>
 * @copyright 2011 Intraway Corp.
 * @link      http://www.intraway.com
 */
cpe.partidos = {
    
    setup:function(){
        $('.remvoe-profesor').click(function(event){
            var profesorId = $(this).attr('id');
            bootbox.confirm("¿Seguro que desea eliminar este grafico?", function(result) {
            if(result){cpe.partidos.delete(profesorId);}
          }); });
    },
    
    delete: function(id){
        
         var options = {            
            type: 'POST',
            async : false,
            dataType: 'json',
            data : {'profesorId':$(this).attr('id')},
            success: function(data){                
                cpe.partidos.removed(data);},
            url:$('#base_url').val()+'index.php/graficos/delete/'+id
        };
        
        return $.ajax(options);
    },
    
    removed:function(data){
        bootbox.alert(data.msg,function(){            
                location.reload();            
        });        
        
    }
}

$(document).ready(function() {
    cpe.partidos.setup();
    
});