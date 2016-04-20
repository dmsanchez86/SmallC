function procesar(envio,funcion )
          {
               $.ajax
                    ({
                       type:"POST",
                       ContentType: "application/x-www-form-urlencoded",
                       url:"index.php",
                       data:envio,
                       success:funcion,
                       error: ERROR
                     });              
          }
 function processData(data,method )
          {
              $.ajax({
                        url: "index.php",
                        data: data,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        success: method,
                        error: ERROR
                      });             
          }
          
  function ERROR(i)
 {
     alert(i);
     // $.notify("Error Procesando información "+i);
 } 
  function cargarOptionCombo(element ,datos)
           {
               var select = element ; 
                   select.find('option').remove().end();
                   
                   for(var key in datos)
                   {
                       select.append(datos[key]);
                   }
                select.val('');
           }
  function cargarCombobox(element , cod)
           {
               var options = element.options;
               for(var i = 0 ; i< options.length;i++)
               {
                   if(options[i].value === cod)
                   {
                       options[i].setAttribute("selected", "");
                       return ; 
                   }
                   else
                   {
                       options[i].removeAttribute("selected");
                   }
               }
           }