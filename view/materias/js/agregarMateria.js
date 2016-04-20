var datos  = new Array();
$(document).ready(function() 
 {
    cargarAreas();
     $('._t').change
     (function () 
        {
           datos.push(this);
        }
     );
     
      $("#btnRegistrar").click(function() 
          {

            if(lt_are_id.value == "" || lt_nombre.value == "")
            {
              $.notify("Ingrese los datos para registrar.");
              return;
            }

            if(datos.length>0)
            {
                registrar();
            }  
            else
            {
                 $.notify("No se han suministrado datos");
            }
            return false;
          });
       
});


function cargarAreas()
    {
       var envio = "url=getA";
       procesar(envio,resAreas);   
    }
   function resAreas(arreglo)
    {
        if(arreglo ==""|| arreglo == null || arreglo.indexOf("No se encontraron Datos")>-1|| (arreglo != null && arreglo.indexOf('<br />') != -1 ) )
        {   
              $.notify("No se encontraron Datos !");
            return ; 
        }

         var json = eval('('+arreglo+')');
         var datos  = new Array();
         datos.push('<option value="">Seleccione una Opción</option>');
         datos.push('<option value="0">Sin Area</option>');
         for(i=0;i<json.length;i++)
         {  
               datos.push('<option value="'+json[i][0]+'">'+json[i][1]+'</option>');
         }
         cargarOptionCombo($('#t_are_id'),datos);
       
  
    }
  
    
    function  registrar()
          {
               $('body').loading({message : "Registrando .."});  
               
               var fd = new FormData();    
                       fd.append('url','addM');
                for(var i in datos)
                {
                     fd.append(datos[i].id ,datos[i].value);
                }
                processData(fd,resR );   
          }
       function resR(i)
       {
           if($.isNumeric(i))
            {
              $.notify("Registro Exitoso", "success");
              
            }
            else 
            {
               $.notify("Ocurrió un error Procesando los datos"); 
            }
            $('body').loading('stop');
       }