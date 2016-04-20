<?php ?>
<html>
    <head>
    <link href="../../bootstrap/css/bootstrap.css" type="text/css" rel="stylesheet"/> 
    <link href="../../plugins/loading/loading.css" type="text/css" rel="stylesheet"/>
    <link href="../../plugins/datatables/dataTables.bootstrap.css" rel="stylesheet"/>
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
        <a name="arriba"></a>
        <div class="wrapper">
            <div class="content-wrapper">
                <div class="container">      
                        <div class="row">
                            <div class="col-xs-12">
                                <br/>
                                <div class="table-responsive">
                                    
                                   
                                   <table id="tableData" class="table table-bordered table-hover">
                                                       <thead>
                                                         <tr>
                                                            <td>Imagen</td>
                                                            <td>Nombre </td>
                                                            <td></td>
                                                            <td>Estado</td>
                                                            <td>Editar</td>
                                                         </tr>
                                                       </thead>
                                 
                                    </table>
                                     <a href="#arriba" id="_arriba">SUBIR</a>
                                </div>
                            </div>
                        </div> 
                </div> 
            </div>
        </div>
        <div class="modal fade" id="EditI" role="dialog">
            <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Actualizar</h4>
                    </div>
                    <div class="modal-body">
                              <div class="row">
                                  <div class="row">          

                                  </div>
                                    <div class="form-group">
                                            <div class="col-xs-12">
                                                <center><image style='width:200px;height:200px' class='img-responsive img-circle' id='_image_1'   src='' /></center>
                                            </div>
                                      
                                  </div> 
                                  <div class="form-group">      
                                      <div class="col-xs-12"><label id="lt_image_1" class="control-label col-xs-12"> <span class='btn btn-default btn-file '>Cargar Imagén <input id='file_1' name='file_1' onchange='change_file(this)' type='file' class='file _t' pos='1'></span></label> </div>
                                  </div> 
                                 
                                       
                                    <div class="form-group">
                                       <label id="lt_sexo" class="control-label col-xs-3">Nombre</label>
                                       <div class="col-xs-9">
                                          <input id="t_nombre" type="text" class="form-control _t" placeholder="Nombre" > 
                                       </div> 
                                    </div>
                                    <div class="form-group">
                                       <label id="lt_estado" class="control-label col-xs-3">Estado</label>
                                       <div class="col-xs-9">
                                         <select class="form-control _t" id="t_estado" >
             
                                         </select>
                                       </div> 
                                    </div>
                              </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal" id="btn_actualizar">Actualizar</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal" id="btn_close">Close</button>
                    </div>
                  </div>
                </div>
           </div>
        <script src="../../plugins/jQuery/jQuery.js"></script>
        <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../js/notify.min.js" type="text/javascript"></script>
        <script src="../../plugins/loading/loading.js" type="text/javascript"></script>
        <script src="../../plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../../plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <script type="text/javascript" src="../../js/upload/jquery.uploadfile.min.js"></script>
        <script type="text/javascript" src="../../js/upload/upload.js"></script>
         <script src="../../js/general.js" type="text/javascript"></script>
        <script src="js/buscarInstituciones.js" type="text/javascript"></script>
        

    </body>
</html>


          

		

		

