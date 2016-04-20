var id ; 
var idEstado;
var datos  = new Array();
$(document).ready(function() 
 {        
    reloadTable();  
    buscarDatos();
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
                                    {"data":"Imagen"},
                                    {"data":"Nombre"},
                                    {"data":""},
                                    {"data":"Estado"},
                                    {"data":"Editar"}

                                ],
                        "bFilter": true,
                        "bJQueryUI": true, 
                        "aoColumns" : [null,null, { "bSearchable": true, "bVisible": false },null,null]//ocultar : { "bSearchable": true, "bVisible": false } 
                        ,"bDestroy": true
                      });
          }
   function buscarDatos()
      {
          var envio = "url=getI";
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
                var datos  = ["<image style='width:100px;height:100px'  class='img-responsive img-circle' src='"+json[i][1]+"' />",json[i][0],json[i][2],json[i][3],"<button type='button' class='btn btn-info .btn-md' data-toggle='modal' data-target='#EditI' onclick='editarI("+json[i][4]+" ,this,\""+json[i][1]+"\",\""+json[i][0]+"\",\""+json[i][2]+"\" );'>Editar</button>"];
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
    function editarI(id_,obj,imagen,nombre_,_idEst)
    {
        
      document.location.href = "#arriba";
      $("#_image_1").attr("src",imagen);
      $("#t_nombre").val(nombre_);
       datos = new Array();
       id  = id_; 
       idEstado = _idEst;
      cargarEstados();
    }
    
    function cargarEstados()
    {
       var envio = "url=estadosI";
       procesar(envio,resEstados);   
    }
    function resEstados(arreglo)
    {
        if(arreglo ==""|| arreglo == null || arreglo.indexOf("No se encontraron Datos")>-1|| (arreglo != null && arreglo.indexOf('<br />') != -1 ) )
        {   
              $.notify("No se encontraron Datos !");
            return ; 
        }

         var json = eval('('+arreglo+')');
         var datos  = new Array();
         datos.push('<option value="">Seleccione una Opción</option>');
         for(i=0;i<json.length;i++)
         {  
               datos.push('<option value="'+json[i][0]+'">'+json[i][1]+'</option>');
         }
         cargarOptionCombo($('#t_estado'),datos);
        cargarCombobox(document.getElementById('t_estado'),idEstado);
  
    }
    
      function  actualizar()
          {
               $('body').loading({message : "Actualizando .."});  
               
               var fd = new FormData();    
                       fd.append('url','updI');
                       fd.append('_id',id);
                for(var i in datos)
                {
                     fd.append(((datos[i].id=='file_1')?'file':datos[i].id) ,((datos[i].id=='file_1')?document.getElementById('file_1').files[0]:datos[i].value));
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