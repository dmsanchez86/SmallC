var id ; 
var idEstado;
var idTipo;
var idInst;
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
          if(datos.length>0){
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
                                    {"data":"Identificación"},
                                    {"data":"Nombre"},
                                    {"data":"Primer_Apellido"},
                                    {"data":"Segudo_Apellido"},
                                    {"data":""},
                                    {"data":"Estado"},
                                    {"data":""},
                                    {"data":"Tipo"},
                                    {"data":""},
                                    {"data":"Institución"},
                                    {"data":""}

                                ],
                        "bFilter": true,
                        "bJQueryUI": true, 
                        "aoColumns" : [null,null,null,null,{ "bSearchable": true, "bVisible": false },null,{ "bSearchable": true, "bVisible": false },null,{ "bSearchable": true, "bVisible": false },null,null]//ocultar : { "bSearchable": true, "bVisible": false } 
                        ,"bDestroy": true
                      });
          }

          
          
   function buscarDatos()
      {
          var envio = "url=getU";
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
                var datos  = [json[i][0],json[i][1],json[i][2],json[i][3],json[i][4],json[i][5],json[i][6],json[i][7],json[i][8],json[i][9],"<button type='button' class='btn btn-info .btn-md' data-toggle='modal' data-target='#EditU' onclick='editarU("+json[i][0]+",\""+json[i][1]+"\",\""+json[i][2]+"\",\""+json[i][3]+"\",\""+json[i][4]+"\",\""+json[i][5]+"\",\""+json[i][6]+"\",\""+json[i][7]+"\",\""+json[i][8]+"\" ,\""+json[i][9]+"\",\""+json[i][10]+"\",this);'>Editar</button>"];
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
    function editarU(identificacion, nombre, apellido1, apellido2, est_id, est_nombre, tip_id, tip_nombre, ins_id, ins_nombre, id_,obj)
    {
        $('#t_nombre_usuario').val(nombre);
        $('#t_apellido_1').val(apellido1);
        $('#t_apellido_2').val(apellido2);
        
        $('#t_identificacion').val(identificacion);
        $('#t_ins').val();
        $('#t_estado').val();
        $('#t_tipo').val();
        
       cargarInst();
       cargarTipos();
       cargarEstados();
      document.location.href = "#arriba";
      
       datos = new Array();
       id  = id_; 
       idEstado = est_id;
       idTipo=tip_id;
       idInst=ins_id;
      
    }
    
    
    function cargarEstados()
    {
       var envio = "url=comboEU";
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
    
    
    
    
    function cargarTipos()
    {
       var envio = "url=comboTU";
       procesar(envio,resTipo);   
    }
   function resTipo(arreglo)
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
         cargarOptionCombo($('#t_tipo'),datos);
         cargarCombobox(document.getElementById('t_tipo'),idTipo);
          

  
    }
  function cargarInst()
    {
       var envio = "url=comboI";
       procesar(envio,resInstitucion);   
    }
    
    function resInstitucion(arreglo)
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
         cargarOptionCombo($('#t_ins'),datos);
         cargarCombobox(document.getElementById('t_ins'),idInst);
  
    }
    
   
    
      function  actualizar()
          {
               $('body').loading({message : "Actualizando .."});  
               
               var fd = new FormData();    
                       fd.append('url','updU');
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