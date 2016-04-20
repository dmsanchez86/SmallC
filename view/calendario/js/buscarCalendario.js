$(document).ready(function() 
 {
       
              
    reloadTable();  
    $("#btnRegistrar").click(function() 
          {
                //validarFormulario();
                return false;
          });
                  

} );



 function reloadTable()
          {
              $('#tableData').dataTable({
                        "bPaginate": true,
                        "bLengthChange": false,
                        "columns" : 
                                [
                                    {"data":"Nombre"},
                                    {"data":"Nº Explotación"},
                                    {"data":"Nº Crotal"},
                                    {"data":"Nº Fuego"},
                                    {"data":"Fecha Nacimiento"},
                                    {"data":"Sexo"},
                                    {"data":"Finca"},
                                    {"data":"Ganaderia"},
                                    {"data":"Pelaje"},
                                    {"data":"Encaste"},
                                    {"data":"Madre"},
                                    {"data":"Padre"},
                                    {"data":"Estado"},
                                    {"data":"Editar"}

                                ],
                        "bFilter": true,
                        "bJQueryUI": true, 
                        "aoColumns" : [ null,null, null,null,null, null,null,null, null,null,null, null,null,null]//ocultar : { "bSearchable": true, "bVisible": false } 
                        ,"bDestroy": true
                      });
          }