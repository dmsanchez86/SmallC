var datos  = new Array();
$(document).ready(function() 
 {
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
              
     
     
       cargarPeriodo();
       cargarDias();
       
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

  function cargarDias()
  {
       var envio = "url=getFestivos";
       procesar(envio,resDias); 
  }
  
  function resDias(i)
  {
               if(i!=null && i != "")
               {
                
                   var json = eval('('+i+')');
                   festivos = json[0][0];           
                   festivos = festivos.split(',');
                   
                   cargarFecha('t_fecha',festivos);
                   cargarFecha('t_fecha_p1',festivos);
                   cargarFecha('t_fecha_p2',festivos);
                   cargarFecha('t_fecha_p3',festivos);
                   cargarFecha('t_fecha_p4',festivos);
                   
                   
                   
                   
            
                   
               }
           
  }
  function cargarFecha(id,festivos)
  {
             $('#'+id).daterangepicker
                   ({
                        initialText : 'Seleccione una fecha...',
                        dateFormat: "yy-mm-dd",
                        presetRanges: 
                                [
                                    {
                                        text: 'Hoy',
                                        dateStart: function() { return moment() },
                                        dateEnd: function() { return moment() }
                                    }, 
                                    {
                                        text: 'Mañana',
                                        dateStart: function() { return moment().add('days', 1) },
                                        dateEnd: function() { return moment().add('days', 1) }
                                    }, 
                                    {
                                        text: 'Los próximos 7 Días',
                                        dateStart: function() { return moment() },
                                        dateEnd: function() { return moment().add('days', 6) }
                                    }, 
                                    {
                                        text: 'la próxima semana',
                                        dateStart: function() { return moment().add('weeks', 1).startOf('week') },
                                        dateEnd: function() { return moment().add('weeks', 1).endOf('week') }
                                    }
                                  ],
                        applyOnMenuSelect: false,
                        datepickerOptions: 
                                {
                                    numberOfMonths : 2,
                                    minDate: 0 ,
                                    maxDate: null,
                                    format: 'YYYY-MM-DD h:mm A',
                                    beforeShowDay: function (date)
                                    {
                                        var year = date.getFullYear(), month = date.getMonth(), day = date.getDate();
                                        for (var i=0; i < festivos.length; ++i)
                                        {
                                            var ArrFech =  festivos[i].split('-');

                                             if (year == ArrFech[0] && month == ArrFech[1] - 1 &&  day == ArrFech[2])
                                                return [true, 'ui-state-highlight ui-state-error'];

                                        }


                                        return [true];
                                    }
                            }
    
                    });
  }
  
  
  function cargarPeriodo()
    {  
       var envio = "url=getDate";
       procesar(envio,resPeriodo);   
    }
   function resPeriodo(arreglo)
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
               datos.push('<option value="'+json[i][1]+'">'+json[i][1]+'</option>');
         }
         cargarOptionCombo($('#t_ano'),datos);
       
  
    }
    
    function  registrar()
          {
               $('body').loading({message : "Registrando .."});  
               
              
             var fecha      = document.getElementById('t_fecha').value;
             var df         = fecha.split('-');
             var fini       = df[0];
             var ffin       = df[1];  
             
             var fechap      = document.getElementById('t_fecha_p1').value;
             var dfp         = fechap.split('-');
             var finip       = dfp[0];
             var ffinp       = dfp[1]; 
             
             var fechap2      = document.getElementById('t_fecha_p2').value;
             var dfp2         = fechap2.split('-');
             var finip2       = dfp2[0];
             var ffinp2       = dfp2[1];  
            
             var fechap3      = document.getElementById('t_fecha_p3').value;
             var dfp3         = fechap3.split('-');
             var finip3       = dfp3[0];
             var ffinp3       = dfp3[1]; 
               
             
             var fechap4      = document.getElementById('t_fecha_p4').value;
             var dfp4         = fechap4.split('-');
             var finip4       = dfp4[0];
             var ffinp4       = dfp4[1]; 

               var fd = new FormData();    
                       fd.append('url','addC');
                       fd.append('t_fecha_ini' ,finip);
                       fd.append('t_fecha_fin' ,ffinp);
                       
                       fd.append('t_fecha_p1' ,fini);
                       fd.append('t_fecha_p1_' ,ffin);
                       
                       fd.append('t_fecha_p2'  ,finip2);
                       fd.append('t_fecha_p2_' ,ffinp2);
                       
                       fd.append('t_fecha_p3' ,finip3);
                       fd.append('t_fecha_p3_' ,ffinp3);
                       
                       fd.append('t_fecha_p4' ,finip4);
                       fd.append('t_fecha_p4_' ,ffinp4);
                       
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