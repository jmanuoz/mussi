var node_id;
var parent_id;
var tree = $("#tree_3").jstree(true);
jQuery(document).ready(function () {
    $('#guardar_grafico').click(function(){guardar_grafico()});
    
    load_tree()

});


function create_section(parent_node,data){ 
    if(parent_node.type != 'grafico'){
        if(parent_node.id != '#'){
            var tree = $("#tree_3").jstree(true);
             $.ajax({
                    type: "POST",
                    url: $('#site_url').val() + '/Encuestas/crear_sub_seccion/',
                    data: {nombre:'Nueva Seccion',parent_id:parent_node.id, parent_type:parent_node.type},
                    dataType: "json",
                    success: function(response){                
                        $node = tree.create_node(parent_node,response.nodo);
                        tree.edit($node);
                    }
                  });  
          }else{
              alert('No puede crear una seccion ahí');
              load_tree();
          }
      }else{
          alert('No puede agregar secciones a un grafico');
      }
}

function rename_section(node,data){   
    var tree = $("#tree_3").jstree(true);
    tree.edit(node);
     
}

function delete_section(node,data){   
    var tree = $("#tree_3").jstree(true);
     $.ajax({
            type: "POST",
            url: $('#site_url').val() + '/Encuestas/eliminar_sub_seccion/',
            data: {id:node.id},
            dataType: "json",
            success: function(response){
                tree.delete_node(node);
            }
          });   
}

function guardar_grafico(){
    var size = 1;
    if($('#size2').is(':checked')) { size = 2; }
    $.ajax({
            type: "POST",
            url: $('#site_url').val() + '/Encuestas/guardar_grafico/',
            data: {id_grafico:$('#id_grafico_ajax').val(),link:$('#link').val(),size:size},
            dataType: "json",
            success: function(response){
                    if(response.result == 1)
                $('#msg_grafico').show();
                $('#msg_grafico').html('Nodo guardado con exito!')
            }
          });
}


function load_tree(){
    $("#tree_3").jstree({
        "core": {
            "themes": {
                "responsive": false
            },
            strings : {
                'New node': 'Nueva seccion'
            },
            // so that create works
            "check_callback": true,
            'data': {
                "url": $('#site_url').val() + '/Encuestas/secciones/'+$('#id_encuesta').val(),
                "type": "post",
                "dataType": "json",
                "data": function (node) {

                    return {};

                },
                "check_callback": true
            }
        },
        "types": {
            "default": {
                "icon": "fa fa-folder icon-state-warning icon-lg"
            },
            "seccion": {
                "icon": "fa fa-file icon-state-warning icon-lg"
            },
            "subseccion": {
                "icon": "fa fa-file icon-state-warning icon-lg"
            },
            "grafico":{
                "icon":"fa fa-file icon-state-success"
            }
        },
        "state": {"key": "demo2"},
        "plugins": ["contextmenu", "dnd", "state", "types"],
        "contextmenu": {
            "items": function ($node) {
                
                return {
                    "Create": {
                        "label": "Nueva Seccion",
                        "action": function (obj) {
                            create_section($node,obj);                             
                        }
                    },
                    "Rename": {
                        "label": "Renombrar Seccion",
                        "action": function (obj) {
                            rename_section($node,obj);                             
                        }
                    },
                    "Remove": {
                        "label": "Eliminar Seccion",
                        "action": function (obj) {
                           delete_section($node,obj);                             
                        }
                    }
                };
            }
        }
    }).on("move_node.jstree", function (e, data) {
        if(data.parent != '#'){
            $.ajax({
                type: "POST",
                url: $('#site_url').val() + '/Encuestas/mover_sub_seccion/',
                data: {id:data.node.id,new_parent_id:data.parent, new_position: data.position, old_position:data.old_position, old_parent_id: data.old_parent},
                dataType: "json",
                success: function(response){

                }
              });
          }else{
              alert('No puede crear una seccion ahí');
          }
    }).on("rename_node.jstree", function (e, data) {
        $.ajax({
            type: "POST",
            url: $('#site_url').val() + '/Encuestas/renombrar_sub_seccion/',
            data: {id:data.node.id,nombre:data.node.text},
            dataType: "json",
            success: function(response){
                
            }
          }); 
    }).bind("select_node.jstree", function (NODE, REF_NODE) {
            $('#msg_grafico').hide();
            if(REF_NODE.node.type == 'grafico'){
                $.ajax({
                type: "POST",
                url: $('#site_url').val() + '/Encuestas/obtener_grafico_info/',
                data: {id_grafico:REF_NODE.node.id},
                dataType: "json",
                success: function(response){ 
                     $('#link').val(response.grafico.link); 
                     if(response.grafico.size === "1"){                        
                         $("#size1").prop('checked', true);
                         $("#size1").parent().addClass('checked');
                         $("#size2").parent().removeClass('checked');
                     }else{
                         $("#size2").prop('checked', true);
                         $("#size2").parent().addClass('checked');
                         $("#size1").parent().removeClass('checked');
                     }
                      $("#id_grafico_ajax").val(REF_NODE.node.id);
                }
                
              });  
               
            }
        }
    );
}
