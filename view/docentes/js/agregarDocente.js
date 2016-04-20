var uploadedFiles = new Array();
var lidiaUpload   = new Array();
var arr  ;
var arrl ; 
var arrLidia ; 
var arrSanitaria ;
var valLidia     = false;
var valSanitaria = false;
$(document).ready(function() 
 {
         cargarFincas();
         cargarPelaje();
         cargarGanaderia();
         cargarNumeroExplo();
         cargarToreros();
         cargarPlazas();
         cargarToreros();
         cargarLstSanitaria();
          $('#_group_ button').click(function () 
                    {
                    
                      for(var i = 1 ; i<= 4;i++)
                      {
                        if("_btn"+i == this.id)
                        {
                           $("#"+ $(this).attr('rel')).removeClass("hidden");
                           $(this).addClass("active");  
                        }
                        else
                        {
                           $("#_btn"+i).removeClass("active");
                           $("#"+ $("#_btn"+i).attr('rel')).addClass("hidden");
                        }
                      }


                    });
                    
         $('._n_genealogico').change
            (function () 
               {
                   if($('#t_siglas').val() != "" && $('#t_fechanacimiento').val()!= "" && $('#t_sexo').val() != "" && $('#t_fuego').val()!= "")
                   { 
                       var codigoGenealogico = $('#t_siglas').val() + $('#t_fechanacimiento').val().substring(2, 4)+ (($('#t_sexo').val()=='HEMBRA')?'H':'M')+$('#t_fuego').val();
                       $('#t_genealogico').val(codigoGenealogico);
                   }
                   else
                   {
                       $('#t_genealogico').val("");
                   }
               }
            );
         
           
 
         
         
         
         
        $("#fileuploader").uploadFile
              ({
		url:"../../upload.php",
		fileName:"myfile",
		showDone:true,
		dragDropStr : 'Arraste los archivos', 
		onSuccess:function(files,data,xhr)
		{
			uploadedFiles.push(data);
		}
	      });
           $("#lidiaUpload").uploadFile
              ({
		url:"../../upload.php",
		fileName:"myfile",
		showDone:true,
		dragDropStr : 'Arraste los archivos', 
		onSuccess:function(files,data,xhr)
		{
			lidiaUpload.push(data);
		}

	      });
              
               
    
              

       $.datepicker.regional['es'] = 
                 {
                    closeText: 'Cerrar',
                    prevText: ' nextText: Sig>',
                    currentText: 'Hoy',
                    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                    'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                    monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
                    'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                    dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié;', 'Juv', 'Vie', 'Sáb'],
                    dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
                    weekHeader: 'Sm',
                    dateFormat: 'yy-mm-dd',
                    firstDay: 1,
                    isRTL: false,
                    showMonthAfterYear: false,
                    yearSuffix: ''
                 };
  

                 
                $.datepicker.setDefaults($.datepicker.regional['es']);
                $('#t_sexo').change(cambioSexo);
                $('#t_finca').change(cambioFinca);
                $('#t_pelaje').change( cambioPelaje);
                $('#t_ganaderia').change(cambioGanaderia);
                $('#t_estado').change(cambioEstado);
                $('#t_destino').change(cambioDestino);
                $('#t_motivo').change(cambioMotivo);
                $('#t_fecha').datepicker();
                $('#t_fechanacimiento').datepicker();
                $('#t_fecha_lidia').datepicker();
                $('#t_fecha_sanitaria').datepicker();
                     

              

                   $("#btnRegistrar").click(function() 
                        {        
                                 arr          = new Array();
                                 arrl         = new Array();
                                 arrLidia     = new Array();
                                 arrSanitaria = new Array();
                                
                                //////////Lidia/////////////
                                var fecha_lidia = $('#t_fecha_lidia');
                                var torero      = $('#t_torero');  
                                var plaza       = $('#t_plaza');
                                var caballo     = $('#t_caballo');
                                var salida      = $('#t_salida');
                                var muleta      = $('#t_muleta');
                                var notasFinales= $('#t_notas_finales');
                                var puntuacion  = $('#t_puntuacion');
                                var tiempo      = $('#t_tiempo');
                                
  
                                arrLidia.push(fecha_lidia);
                                arrLidia.push(torero);
                                arrLidia.push(plaza);
                                arrLidia.push(caballo);
                                arrLidia.push(salida);
                                arrLidia.push(muleta);
                                arrLidia.push(notasFinales);
                                arrLidia.push(puntuacion);
                                arrLidia.push(tiempo);
                               
                                ///////////////Sanitaria///////////
                                var solucion        = $('#t_solucion');
                                var motivo_          = $('#t_motivo_san');  
                                var fecha_sanitaria = $('#t_fecha_sanitaria');
                                arrSanitaria.push(solucion); 
                                arrSanitaria.push(motivo_);           
                                arrSanitaria.push(fecha_sanitaria);  
                                
                                //////////General////////////////
                                      /////////limpiar
                                       var encaste = $('#t_encaste');
                                       var siglas  = $('#t_siglas');  
                                       var genea   = $('#t_genealogico');
                                       var _madre  = $('#_t_madre');
                                       var _padre  = $('#_t_padre');

                                       arrl.push(encaste) ;
                                       arrl.push(siglas) ;
                                       arrl.push(genea) ;
                                       arrl.push(_madre) ;
                                       arrl.push(_padre) ;
                                       /////////////
                                       var nombre   = $('#t_nombre');  
                                       var explota  = $('#t_explotacion');  
                                       var crotal   = $('#t_crotal');  
                                       var fuego    = $('#t_fuego'); 
                                       var fechana  = $('#t_fechanacimiento'); 
                                       var guarismo = $('#t_guarismo'); 
                                       var sexo     = $('#t_sexo');
                                       var finca    = $('#t_finca');
                                       var pelaje   = $('#t_pelaje'); 
                                       var ganaderia= $('#t_ganaderia'); 
                                       var imagen   = $('#t_imagen_animal'); 
                                       var estado   = $('#t_estado');

                                       var madre    = $('#t_madre');
                                       var padre    = $('#t_padre');
                                       //baja
                                       var comentario   = $('#t_comentario');
                                       var siglas       = $('#t_siglas_motivo');
                                       var motivo       = $('#t_motivo');
                                        ///disponible
                                       var fecha   = $('#t_fecha');
                                       var destino = $('#t_destino');

                                       arrl.push(nombre) ;
                                       arrl.push(explota) ;
                                       arrl.push(crotal) ;
                                       arrl.push(fuego) ;
                                       arrl.push(fechana) ;

                                       arrl.push(guarismo) ;
                                       arrl.push(sexo) ;
                                       arrl.push(finca) ;
                                       arrl.push(pelaje) ;
                                       arrl.push(ganaderia) ;

                                       arrl.push(imagen) ;
                                       arrl.push(estado) ;
                                       arrl.push(madre) ;
                                       arrl.push(padre) ;
                                       arrl.push(comentario) ;

                                       arrl.push(siglas) ;
                                       arrl.push(motivo) ;
                                       arrl.push(fecha) ;
                                       arrl.push(destino) ;

                                       arr.push(nombre) ;
                                       arr.push(explota) ;
                                       arr.push(crotal) ;
                                       arr.push(fuego) ;
                                       arr.push(fechana) ;

                                       arr.push(guarismo) ;
                                       arr.push(sexo) ;
                                       arr.push(finca) ;
                                       arr.push(pelaje) ;
                                       arr.push(ganaderia) ;

                                       //arr.push(imagen) ;
                                       arr.push(estado) ;
                                       arr.push(madre)  ;
                                       arr.push(padre)  ;
                                       if(genea.val()!="")
                                          arr.pusj(genea)  ;
                                      if(_madre.val()!="")
                                      {
                                          
                                          arrl.push(madre) ;
                                      }

                                       if(_padre.val()!="")
                                      {
                                          
                                          arrl.push(padre) ;
                                      }


                                       if(estado.val() == "Baja")
                                         {
                                              arr.push(comentario)  ;
                                              arr.push(siglas)  ;
                                              arr.push(motivo)  ;

                                              arrl.push(comentario)  ;
                                              arrl.push(siglas) ; 
                                              arrl.push(motivo) ;       
                                         }
                                         else if(estado.val() == "Disponible")
                                         {
                                              arr.push(fecha)  ;
                                              arr.push(destino)  ;

                                              arrl.push(fecha)  ;
                                              arrl.push(destino) ;   
                                         }
                               
                              var valGeneral   = validarFormulario(arr); 
                                  valLidia     = validarFormulario(arrLidia);
                                  valSanitaria = validarFormulario(arrSanitaria);
                              
                              
                               if(!valGeneral)
                                {
                                    $('#_btn1').click();
                                    $.notify("Por favor ingrese la información faltante en la sección General!");
                                    return false;
                                }
                              
                               if(hayInformacion(arrLidia) && !valLidia)
                               {
                                  $('#_btn3').click(); 
                                  $.notify("Por favor ingrese la información faltante en la sección Lidia !");
                                  return false;
                               }
                               
                               if(hayInformacion(arrSanitaria) && !valSanitaria)
                               {
                                  $('#_btn4').click(); 
                                  $.notify("Por favor ingrese la información faltante en la sección Sanitaria !");
                                  return false;
                               }
                              
                              
                              
                                

                              if(valGeneral  )
                              {
                                     insertarAnimal();  
                              }
                              else 
                              {
                                    $.notify("Por favor ingrese la información faltante !");
                              }
                              return false;
                        });
                        
                        
                        
                   $('#_t_madre').autocomplete(
                   {
                                    source: function( request, response ) 
                                    {
                                      $('#t_madre').val("");
                                      $.ajax(
                                      {
                                          url : './index.php',
                                          dataType: "json",
                                          data: 
                                          {
                                            busqueda: request.term,
                                            url: 'sugerenciaAnimal',
                                            row_num : 10 ,
                                            sexo    : 'HEMBRA'
                                          },
                                          success: function( data ) 
                                          {
                                                response( $.map( data, function( item ) 
                                                {
                                                      var code = item.split("|");
                                                      return {
                                                        label: code[0] + " " + code[1]+" " + code[2],
                                                        value: code[0],
                                                        data : item
                                                      };
                                                }
                                                ));
                                          }
                                      });
                                    },
                                    autoFocus: false,          
                                    minLength: 1,
                                    select: function( event, ui ) 
                                    {
                                        var names = ui.item.data.split("|");          
                                         $('#t_madre').val(names[3]); 
                                    }           
                    });
                    
                    
                      $('#_t_padre').autocomplete(
                   {
                                    source: function( request, response ) 
                                    {
                                      $('#t_padre').val("");
                                      $.ajax(
                                      {
                                          url : './index.php',
                                          dataType: "json",
                                          data: 
                                          {
                                            busqueda: request.term,
                                            url: 'sugerenciaAnimal',
                                            row_num : 10 ,
                                            sexo    : 'MACHO'
                                          },
                                          success: function( data ) 
                                          {
                                                response( $.map( data, function( item ) 
                                                {
                                                      var code = item.split("|");
                                                      return {
                                                        label: code[0] + " " + code[1]+" " + code[2],
                                                        value: code[0],
                                                        data : item
                                                      };
                                                }
                                                ));
                                          }
                                      });
                                    },
                                    autoFocus: false,          
                                    minLength: 1,
                                    select: function( event, ui ) 
                                    {
                                        var names = ui.item.data.split("|");          
                                         $('#t_padre').val(names[3]); 
                                    }           
                    });

              } );
   
       
          function cambioSexo(e)
          {
               var valor =  $(this).val();
             //  cargarCombobox(,"");
               var opciones = new Array();
                           opciones.push('<option value="">Seleccione --></option>');
                   if(valor === "HEMBRA")
                           opciones.push('<option value="Vaca">Vaca</option>');
                   if(valor === "MACHO")
                           opciones.push('<option value="Semental">Semental</option>');
                       
                           opciones.push('<option value="Cria">Cria</option>');
                           cargarOptionCombo($('#t_destino') ,opciones);
          }
          function cambioFinca(e)
          {
                var input =  e.target;
          }
          function cambioPelaje(e)
          {
                var input =  e.target;
          }
          function cambioGanaderia(e)
          {
               var valor =    $('#t_ganaderia option:selected').attr("datos");
   
               if(valor.indexOf('|')>-1)
               {
                   var datos = valor.split('|');
                    $('#t_siglas').val(datos[1]);
                    $('#t_siglas').change();
                    $('#t_encaste').val(datos[3]);
                    $('#_img_hierro').attr('src',"../../"+datos[2]);        
               } 
               else 
               {
                    $('#t_siglas').val("");
                    $('#t_siglas').change();
                    $('#t_encaste').val("");
                    $('#_img_hierro').attr('src',""); 
               }
          }
          function cambioEstado(e)
          {
                var valor =  $(this).val();
                 if(valor === "Disponible"  )
                 {
                   $("._disponible").attr("style","display:");
                   $("._baja").attr("style","display:none");
                 }
                 else if(valor === "Baja")
                 {
                   $("._baja").attr("style","display:");
                   $("._disponible").attr("style","display:none");
                 }
          }
          function cambioDestino(e)
          {
                var input =  e.target;
          }
          function cambioMotivo(e)
          {
                var input =  $(this).val();
                var sigla = "" ; 
                switch(input)
                {
                    case "Muerte por Lidia": 
                         sigla = "L";
                        break ; 
                    case "Muerte por desecho": 
                          sigla = "D";
                        break ;
                    case "Muerte natural o Accidental": 
                         sigla = "N";
                        break ;
                    case "Venta a particular": 
                         sigla = "V";
                        break ;
                }
                $("#t_siglas_motivo").val(sigla);       
          }

           function ERROR(i)
          {
            alert(i);  
          }
         
          
          function cargarFincas()
          {
             var envio = "url=fincasComb";
             procesar(envio,"./index.php",resCombFin);   
          }
          function resCombFin(arreglo)
          {
              if(arreglo ==""|| arreglo == null || arreglo.indexOf("No se encontraron Datos")>-1|| (arreglo != null && arreglo.indexOf('<br />') != -1 ) )
              {   
                    $.notify("No se encontraron Fincas !");
                  return ; 
              }

               var json = eval('('+arreglo+')');
               var datos  = new Array();
               datos.push('<option value="">Seleccione una Finca</option>');
               for(i=0;i<json.length;i++)
               {  
                     datos.push('<option value="'+json[i][0]+'">'+json[i][1]+'</option>');
               }
               cargarOptionCombo($('#t_finca'),datos);
 
          }
          
           function cargarLstSanitaria()
          {
             var envio = "url=sanitariaComb";
             procesar(envio,"./index.php",resCombSan);   
          }
          function resCombSan(arreglo)
          {
              if(arreglo ==""|| arreglo == null || arreglo.indexOf("No se encontraron Datos")>-1|| (arreglo != null && arreglo.indexOf('<br />') != -1 ) )
              {   
                    $.notify("No se encontraron Datos !");
                  return ; 
              }

               var json = eval('('+arreglo+')');
               var datos  = new Array();
               datos.push('<option value="">Seleccione </option>');
               for(i=0;i<json.length;i++)
               {  
                     datos.push('<option value="'+json[i][0]+'">'+json[i][1]+'</option>');
               }
               cargarOptionCombo($('#t_motivo_san'),datos);
 
          }
      
      
      
          function cargarGanaderia()
          {
             var envio = "url=ganaderiaComb";
             procesar(envio,"./index.php",resCombGan);   
          }
          function resCombGan(arreglo)
          {
              if(arreglo ==""|| arreglo == null || arreglo.indexOf("No se encontraron Datos")>-1|| (arreglo != null && arreglo.indexOf('<br />') != -1 ) )
              {   
                    $.notify("No se encontraron Ganaderìa !");
                  return ; 
              }

               var json = eval('('+arreglo+')');
               var datos  = new Array();
               datos.push('<option value="">Seleccione una Ganadería</option>');
               for(i=0;i<json.length;i++)
               {  
                     datos.push('<option value="'+json[i][0]+'" datos="'+json[i][0]+"|"+json[i][2]+"|"+json[i][3]+"|"+json[i][4]+'">'+json[i][1]+'</option>');
               }
               cargarOptionCombo($('#t_ganaderia'),datos);
 
          }
          
   
         function cargarPlazas()
          {
             var envio = "url=plaComb";
             procesar(envio,"./index.php",resCombPlaza);   
          }
          function resCombPlaza(arreglo)
          {
              if(arreglo ==""|| arreglo == null || arreglo.indexOf("No se encontraron Datos")>-1|| (arreglo != null && arreglo.indexOf('<br />') != -1 ) )
              {   
                    $.notify("No se encontraron Plazas !");
                  return ; 
              }

               var json = eval('('+arreglo+')');
               var datos  = new Array();
               datos.push('<option value="">Seleccione una Plaza</option>');
               for(i=0;i<json.length;i++)
               {  
                     datos.push('<option value="'+json[i][0]+'">'+json[i][1]+'</option>');
               }
               cargarOptionCombo($('#t_plaza'),datos);
 
          }
 
          function cargarToreros()
          {
             var envio = "url=toreroComb";
             procesar(envio,"./index.php",resCombNumeroTorero);   
          }
          function resCombNumeroTorero(arreglo)
          {
              if(arreglo ==""|| arreglo == null || arreglo.indexOf("No se encontraron Datos")>-1|| (arreglo != null && arreglo.indexOf('<br />') != -1 ) )
              {   
                    $.notify("No se encontraron Torero !");
                  return ; 
              }

               var json = eval('('+arreglo+')');
               var datos  = new Array();
               datos.push('<option value="">Seleccione un Torero</option>');
               for(i=0;i<json.length;i++)
               {  
                     datos.push('<option value="'+json[i][0]+'">'+json[i][1]+'</option>');
               }
               cargarOptionCombo($('#t_torero'),datos);
 
          }







         function cargarNumeroExplo()
          {
             var envio = "url=numeroExploComb";
             procesar(envio,"./index.php",resCombNumeroExplo);   
          }
          function resCombNumeroExplo(arreglo)
          {
              if(arreglo ==""|| arreglo == null || arreglo.indexOf("No se encontraron Datos")>-1|| (arreglo != null && arreglo.indexOf('<br />') != -1 ) )
              {   
                    $.notify("No se encontraron Números de Explotación !");
                  return ; 
              }

               var json = eval('('+arreglo+')');
               var datos  = new Array();
               datos.push('<option value="">Seleccione un  Números de Explotación</option>');
               for(i=0;i<json.length;i++)
               {  
                     datos.push('<option value="'+json[i][0]+'">'+json[i][1]+'</option>');
               }
               cargarOptionCombo($('#t_explotacion'),datos);
 
          }
          
          
         function cargarPelaje()
          {
             var envio = "url=pelajeComb";
             procesar(envio,"./index.php",resCombPelaje);   
          }
          function resCombPelaje(arreglo)
          {
              if(arreglo ==""|| arreglo == null || arreglo.indexOf("No se encontraron Datos")>-1|| (arreglo != null && arreglo.indexOf('<br />') != -1 ) )
              {   
                    $.notify("No se encontraron Pelaje !");
                  return ; 
              }

               var json = eval('('+arreglo+')');
               var datos  = new Array();
               datos.push('<option value="">Seleccione un Pelaje</option>');
               for(i=0;i<json.length;i++)
               {  
                     datos.push('<option value="'+json[i][0]+'">'+json[i][1]+'</option>');
               }
               cargarOptionCombo($('#t_pelaje'),datos);
 
          }
          
          
          
          
          
          
          
          function asignarClaseElemento(elemento,estilo)
          {
              elemento.setAttribute("style", estilo);
              
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
           
           
           
           
         



function validarFormulario(arr)
{
    var val = true ; 
    for(var i in arr)
    {
         if(arr[i].val() ==="")
         {
              $('#l'+arr[i].attr('id')).attr('style','color:red;'); 
              val = false; 
         }
         else 
             $('#l'+arr[i].attr('id')).attr('style','color:black;'); 
    }
 return val ; 
    
}

function  insertarAnimal()
          {
              var datosGeneral  = new Array();
              var datosLidia    = new Array();
              var datosSanitaria= new Array();
               $('body').loading({message : "Guardando .."});    
               var  envio = "url=animalR";
              
              for(var i in arr )
              {
                  datosGeneral.push(arr[i].attr('rel')+"="+arr[i].val());
              }
                 envio +="&"+datosGeneral.join("&");
              if(valLidia)
              {
                  envio +="&_lidia=SI";
                   for(var j in arrLidia )
                    {
                        datosLidia.push(arrLidia[j].attr('rel')+"="+arrLidia[j].val());
                    }
                    if(datosLidia.length>0)
                     envio += "&"+datosLidia.join("&");
              }
              else 
              {
                 envio +="&_lidia=NO"; 
              }
             
              if(valSanitaria)
              {
                  envio +="&_ficha=SI";
                  for(var k in arrSanitaria )
                    {
                        datosSanitaria.push(arrSanitaria[k].attr('rel')+"="+arrSanitaria[k].val());
                    }
                    if(arrSanitaria.length>0)
                     envio += "&"+datosSanitaria.join("&");
              }
              else 
              {
                  envio +="&_ficha=NO"; 
              }
              if(uploadedFiles.length>0)
                    envio +="&_ani_foto="+uploadedFiles[uploadedFiles.length-1];
              if(lidiaUpload.length>0)
                   envio +="&_lid_imagenes_ruta="+lidiaUpload.join(";");

                      procesar(envio,"./index.php",resInsertar ); 
      
          }
          
           function resInsertar(i)
                {
                    if(i.indexOf("Registro Exitoso")>-1)
                    {
                        limpiar(arrl);
                        limpiar(arrLidia); 
                        limpiar(arrSanitaria) ;
                    }
                      
                    alert(i);
                         $('body').loading('stop');
                         
                }
                function ERROR(i)
               {
                       $('body').loading('stop');
                  alert(i);
               }
function limpiar(arr)
{
    for(var i in arr)
    {
       arr[i].val("");
    }
}

function hayInformacion(arr)
{
    for(var i in arr)
    {
       if(arr[i].val() !="")
       {
           return true ;  
       }
    }
}



          
       
            
           

                   