var datos  = new Array();







$(document).ready(function() 
 {
       cargarInst();
       cargarTipos();
       
     $('._t').change
     (function () 
        {
           datos.push(this);
        }
     );
     
      $("#btnRegistrar").click(function() 
          {
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
       
  
    }
  function cargarInst()
    {
       var envio = "url=comboI";
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
         cargarOptionCombo($('#t_ins'),datos);
       
  
    }
    
    function  registrar()
          {
               $('body').loading({message : "Registrando .."});  
               
               var fd = new FormData();    
                       fd.append('url','addU');
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