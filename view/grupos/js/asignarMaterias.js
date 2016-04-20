$(document).ready(function(){

    loadDocentes();
    loadAsignatura();
    loadAsignaturaDocente();

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


function loadAsignaturaDocente()
{
    var envio = "url=getAsignaturasDocente";
    procesar(envio,function(arreglo){


       var contenido = ""; 
      if(arreglo ==""|| arreglo == null || arreglo.indexOf("No se encontraron Datos")>-1|| (arreglo != null && arreglo.indexOf('<br />') != -1 ) )
      {
          $.notify("No se encontraron Datos");
          var table = $('#tableDocenteAsignatura').dataTable();
          table._fnReDraw();
          return ; 
      }

       var json = eval('('+arreglo+')');
       var dataSet = new Array();
       for(i=0;i<json.length;i++)
       {  
            var datos  = [json[i]["usu_nombre"],json[i]["asi_nombre"],"<a href='javascript:void()' onclick='removeAsignacion(" + json[i]["id"] + ")'>Remover</a>"];
            dataSet.push(datos);  
       }

       poblarTabla(dataSet); 

    });
}


function poblarTabla(data)
{
    var table = $('#tableDocenteAsignatura').dataTable();  
    var oSettings = table.fnSettings();
        table.fnClearTable(this);
      for (var i=0; i<data.length; i++){
        table.oApi._fnAddData(oSettings, data[i]);//JSON.stringify(
      }
      oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
      table.fnDraw();
}

function loadDocentes()
{
    var envio = "url=getDocentes";
    procesar(envio,function(arreglo){

        var contenido = ""; 
        if(arreglo ==""|| arreglo == null || arreglo.indexOf("No se encontraron Datos")>-1|| (arreglo != null && arreglo.indexOf('<br />') != -1 ) )
        {
            $.notify("No se encontraron Datos");
            return ; 
        }

         var json = eval('('+arreglo+')');
         var dataSet = new Array();
         for(i=0;i<json.length;i++)
         { 
            var option ="<option value='" + json[i][0] + "'>" + json[i][1] + "</option>";
            s_docente.innerHTML += option;
         }
    });  
}


function loadAsignatura()
{
    var envio = "url=getAsignaturas";
    procesar(envio,function(arreglo){

        var contenido = ""; 
        if(arreglo ==""|| arreglo == null || arreglo.indexOf("No se encontraron Datos")>-1|| (arreglo != null && arreglo.indexOf('<br />') != -1 ) )
        {
            $.notify("No se encontraron Datos");
            return ; 
        }

         var json = eval('('+arreglo+')');
         var dataSet = new Array();
         for(i=0;i<json.length;i++)
         {  
            var option ="<option value='" + json[i][0] + "'>" + json[i][1] + "</option>";
            s_asignatura.innerHTML += option;
         }
    });  
}

function asignarEstudiante()
{
	var docente = s_docente.value;
	var asignatura = s_asignatura.value;


  if(docente == "" || asignatura == "")
  {
    $.notify("Por favor ingrese los datos faltantes");
    return;
  }

	var envio = "url=asignarAsignaturaDocente&docente=" + docente + "&asignatura=" + asignatura;

    procesar(envio,function(arreglo){

    	$.notify("El docente ha sido asignado.", "success");
		  loadAsignaturaDocente();
      s_docente.value = "";
      s_asignatura.value = "";


    });
}

function removeAsignacion(id)
{
  var idAsignacion = id;
  var envio = "url=removerAsignaturaDocente&id=" + id;

    procesar(envio,function(arreglo){

      $.notify("La asignación ha sido removida", "success");
      loadAsignaturaDocente();

    });


}