var datos  = new Array();
$(document).ready(function() 
 {
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
 
    function  registrar()
          {
               $('body').loading({message : "Registrando .."});  
               
               var fd = new FormData();    
                       fd.append('url','addA');
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