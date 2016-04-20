<html>
    <head>
        <link href="../../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" /> 
        <link rel="stylesheet" href="../../plugins/loading/loading.css" type="text/css"/>
       
        <style>
            .btn-file 
             {
                 position: relative;
                 overflow: hidden;
                 width: 100%;
             }
             .btn-file input[type=file] 
             {
                 position: absolute;
                 top: 0;
                 right: 0;
                 min-width: 100%;
                 min-height: 100%;
                 font-size: 100px;
                 text-align: right;
                 filter: alpha(opacity=0);
                 opacity: 0;
                 outline: none;
                 background: white;
                 cursor: inherit;
                 display: block;
             }
         </style>
    </head>
    <body>
        <div class="wrapper">
            <div class="content-wrapper">
                <div class="container">      
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6  ">
                                 <br/>
                               <form role="form" action="" class="form-horizontal" >
                                    <fieldset>
                                        <div class="row">          
                                          <div class="col-xs-12">
                                            <legend>Datos Institución </legend>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-3">
                                                <image style='width:100px;height:100px'  id='_image_1'   src='' />
                                            </div>
                                            <div class="col-xs-9"><center><input id="t_nombre" type="text" class="form-control" placeholder="Nombre" style="width:90%" ></center><br><label id="lt_image_1" class="control-label col-xs-12"> <span class='btn btn-default btn-file '>Cargar Imagén <input id='file_1' name='file_1' onchange='change_file(this)' type='file' class='file' pos='1'></span></label>
                                            </div>
                                       </div>
                                       
                                      
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                        <div class="row">        
                            <div class="col-xs-12 col-sm-6 col-md-6" >
                                <button type="button" id="btnRegistrar" class="btn btn-primary btn-block btn-flat">Registrar</button>
                            </div>     
                        </div>

                        
                </div> 
            </div>
        </div>
        <script src="../../plugins/jQuery/jQuery.js" type="text/javascript"></script>
        <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../js/notify.min.js" type="text/javascript"></script>
        <script src="../../plugins/loading/loading.js" type="text/javascript"></script>
        <script src="../../js/general.js" type="text/javascript"></script>
        <script type="text/javascript" src="../../js/upload/jquery.uploadfile.min.js"></script>
        <script type="text/javascript" src="../../js/upload/upload.js"></script>
        <script src="js/agregarInstituciones.js" type="text/javascript"></script>
    </body>
</html>
          

		
