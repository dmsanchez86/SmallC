
                 function readImage(file , pos)
               {
                    var reader = new FileReader();
                    var image  = new Image();
                    var extensiones_permitidas = new Array( "data:image/png;", "data:image/jpg;","data:image/jpeg;"); 
                    reader.readAsDataURL(file);  
                    reader.onload = function(_file) 
                    {
                        var archivosValidos =false; 
                        for(var i =0;i<extensiones_permitidas.length;i++)
                        {
                           if((_file.target.result).indexOf(extensiones_permitidas[i])>-1)
                           {
                               archivosValidos=true;
                               break;
                           }
                        }
                        if(!archivosValidos)
                        {
                            $.notify("Extensión de archivo invalida se permiten (png,jpg,jpeg)");
                            return ; 
                        }
                        image.src    = _file.target.result;              // url.createObjectURL(file);
                        image.onload = function() 
                          {
                             $('#_image_'+pos).attr("src",this.src);
                          };
                        image.onerror= function() {
                            //alert('Invalid file type: '+ file.type);
                        };      
                    };
                }
                $(".file").change(function (e) 
                {
                    var F = this.files;
                    if(F && F[0]) for(var i=0; i<F.length; i++) readImage( F[i] , $(this).attr('pos') );
                });
                
                function change_file(obj) 
                {
                    var F = this.files;
                    if(F && F[0]) for(var i=0; i<F.length; i++) readImage( F[i] , $(obj).attr('pos') );
                };




