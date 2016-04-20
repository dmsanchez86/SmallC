

var datos  = new Array();
$(document).ready(function(){

	 $('._t').change
     (function () 
        {
           datos.push(this);
        }
     );

	btnRegistrarGrupo.addEventListener("click", function(){


        if(nombre_grupo.value == "")
        {
          $.notify("Ingrese un nombre para el grupo");
          return;
        }

         $('body').loading({message : "Registrando .."});  
         
         var fd = new FormData();    
          fd.append('url','addG');
          for(var i in datos){
               fd.append(datos[i].id ,datos[i].value);
          }

          processData(fd,function(){

  			if($.isNumeric(i)){
              $.notify("Registro Exitoso", "success");	
              loadGrupos();	              
            }
            else {
               $.notify("Ocurrió un error Procesando los datos"); 
            }

            $('body').loading('stop');

          }); 

          $('#tableGroups').dataTable({
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


});


  loadGrupos();




});


 function loadGrupos()
{
    var envio = "url=getGrupos";
    procesar(envio,resBus);  
}

function resBus(arreglo)
{
      var contenido = ""; 
      if(arreglo ==""|| arreglo == null || arreglo.indexOf("No se encontraron Datos")>-1|| (arreglo != null && arreglo.indexOf('<br />') != -1 ) )
      {
          $.notify("No se encontraron Datos");
          var table = $('#tableGroups').dataTable();
           table._fnReDraw();
          return ; 
      }

       var json = eval('('+arreglo+')');
       var dataSet = new Array();
       for(i=0;i<json.length;i++)
       {  
            var datos  = [json[i][0],json[i][1]];
            dataSet.push(datos);  
       }

       poblarTabla(dataSet); 
}

function poblarTabla(data)
{
    var table = $('#tableGroups').dataTable();  
    var oSettings = table.fnSettings();
        table.fnClearTable(this);
      for (var i=0; i<data.length; i++)
      {
        table.oApi._fnAddData(oSettings, data[i]);//JSON.stringify(

      }
      oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
      table.fnDraw();
}