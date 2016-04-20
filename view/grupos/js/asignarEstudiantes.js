$(document).ready(function(){
	loadGrupos();

	s_grupos.addEventListener("change", function(){
		loadAlumnos();
	});


	var dataEstudents = [];
	procesar('url=getAlumnos', function(data){

		var json = eval('(' + data + ')');

		for(var i=0;i<json.length;i++)
		{
			dataEstudents.push(json[i]["nombre"]);
		}

		$('#txtEstudiante').autocomplete(
			{
		        source: dataEstudents,
		        minLength: 0,
		        select: function( event, ui ) 
		        {
		        	console.log(ui.item);
		            var names = ui.item.label.split("-");          
		            $('#txtCodeEstudiante').val(names[0]);
		        }           
			});

	});
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
          var option ="<option value='" + json[i][0] + "'>" + json[i][1] + "</option>";
          s_grupos.innerHTML += option;
       }

       loadAlumnos();
}

function loadAlumnos()
{
	grupo = s_grupos.value;
	var envio = "url=getAlumnos&grupo=" + grupo;
    procesar(envio,function(arreglo){

	bodyestudiantes.innerHTML = "";
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
          var option ="<tr id='" + json[i][0] + "'><td>" + json[i][4] + "  " + json[i][5] + "</td><td><a href='javascript:void()' onclick='removeEstudianteFromGrupo(" + json[i][0] + ")'>Remover</a></td></tr>";
          bodyestudiantes.innerHTML += option;
       }
    });  
}

function asignarEstudiante()
{
	var grupo = s_grupos.value;
	var estudiante = txtCodeEstudiante.value;
	var envio = "url=asignarGrupo&grupo=" + grupo + "&estudiante=" + estudiante;
    procesar(envio,function(arreglo){

    	$.notify("El estudiante ha sido asignado.", "success");
		loadAlumnos();

    });
}

function removeEstudianteFromGrupo(id)
{
  var idAsignacion = id;
  var envio = "url=removeEstudianteFromGrupo&id=" + idAsignacion;

    procesar(envio,function(arreglo){

      $.notify("La asignación ha sido removida", "success");
      loadAlumnos();

    });
}