
$(document).ready(function() 
 {
     $("#btnRegistrar").click(function() 
          {
                $('body').loading({message : "Guardando .."});  
                   var fd = new FormData();    
                       fd.append('url','addI');
                       fd.append('file',document.getElementById('file_1').files[0] );
                       fd.append('tnombre',$("#t_nombre").val());
                 processData(fd,resInsertar ); 
                return false;
          });
 });
 
 function resInsertar(i)
 {
     if($.isNumeric(i))
     {
       $.notify("Registro Exitoso", "success");
       
       $("#t_nombre").val("");  
       $("#_image_1").attr("src","");  
       
     }
     else 
     {
        $.notify("Ocurrió un error Procesando los datos"); 
     }
     $('body').loading('stop');
     //$.notify(i);
 }

 
   
              
 
  
              