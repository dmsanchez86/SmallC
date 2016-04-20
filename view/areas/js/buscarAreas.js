var id ; 
var datos  = new Array();
$(document).ready(function() 
 {  
    buscarDatos();
    reloadTable();  
    $('._t').change
     (function () 
        {
           datos.push(this);
        }
     );
     
      $("#btn_actualizar").click(function() 
          {
              if(datos.length>0)
              {
                  actualizar();
              }
              else 
              {
                   $.notify("No se han realizado cambios", "success");
              }
                
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
                                    {"data":""}
                                ],
                        "bFilter": true,
                        "bJQueryUI": true, 
                        "aoColumns" : [null,null]
                        ,"bDestroy": true
                      });
          }

      function  actualizar()
          {
               $('body').loading({message : "Actualizando .."});  
               
               var fd = new FormData();    
                       fd.append('url','updA');
                       fd.append('_id',id);
                for(var i in datos)
                {
                     fd.append(datos[i].id ,datos[i].value);
                }
                processData(fd,resActualizar );   
          }
       function resActualizar()
       {
           if($.isNumeric(i))
            {
              $.notify("Actualizacón Exitoso", "success");
              buscarDatos();
            }
            else 
            {
               $.notify("Ocurrió un error Procesando los datos"); 
            }
            $('body').loading('stop');
       }
       

       ////////////////////////////////////////////
       
       
    function buscarDatos()
      {
          var envio = "url=getA";
          procesar(envio,resBus);  
      }

    function resBus(arreglo)
    {
          var contenido = ""; 
          if(arreglo ==""|| arreglo == null || arreglo.indexOf("No se encontraron Datos")>-1|| (arreglo != null && arreglo.indexOf('<br />') != -1 ) )
          {
              $.notify("No se encontraron Datos");
              var table = $('#tableData').dataTable();
               table._fnReDraw();
              return ; 
          }

           var json = eval('('+arreglo+')');
           var dataSet = new Array();
           for(i=0;i<json.length;i++)
           {  
                var datos  = [json[i][1],"<button type='button' class='btn btn-info .btn-md' data-toggle='modal' data-target='#EditA' onclick='editarU("+json[i][0]+",\""+json[i][1]+"\",this);'>Editar</button>"];
                dataSet.push(datos);  
           }

           poblarTabla(dataSet); 
    }

    function poblarTabla(data)
    {
        var table = $('#tableData').dataTable();  
        var oSettings = table.fnSettings();
            table.fnClearTable(this);
          for (var i=0; i<data.length; i++)
          {
            table.oApi._fnAddData(oSettings, data[i]);//JSON.stringify(

          }
          oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
          table.fnDraw();
    }
    function editarU(_id, nombre,obj)
    {
        $('#t_nombre').val(nombre);
        id =_id;
      document.location.href = "#arriba";
      
    
      
    }
    