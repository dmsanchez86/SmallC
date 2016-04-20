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
                                                            <td>Identificación</td>
                                                            <td>Nombre </td>
                                                            <td>Primer Apellido</td>
                                                            <td>Segudo Apellido</td>
                                                            <td></td>
                                                            <td>Estado</td>
                                                            <td></td>
                                                            <td>Tipo</td>
                                                            <td></td>
                                                            <td>Institución</td>
                                                            <td></td>
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
           <div class="modal fade" id="EditU" role="dialog">
            <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Datos Administrador Institución</h4>
                    </div>
                    <div class="modal-body">
                              <div class="row">
                  
                                <div class="form-group">
                                    <label id="lt_nombre_usuario" class="control-label col-sm-6 col-md-3 col-lg-3">Nombre</label>
                                    <div class="col-sm-6 col-md-9 col-lg-9"><input id="t_nombre_usuario" type="text" class="form-control _t" required="required" ></div>
                                </div>
                                <div class="form-group">
                                    <label id="lt_pellido_1" class="control-label col-sm-6 col-md-3 col-lg-3">Primer Apellido</label>
                                    <div class="col-sm-6 col-md-9 col-lg-9"><input id="t_apellido_1" type="text" class="form-control _t" required="required"></div>
                                </div>
                                 <div class="form-group">
                                    <label id="lt_pellido_2" class="control-label col-sm-6 col-md-3 col-lg-3">Segundo Apellido</label>
                                    <div class="col-sm-6 col-md-9 col-lg-9"><input id="t_apellido_2" type="text" class="form-control _t" required="required"></div>
                                </div>
                                 <div class="form-group">
                                    <label id="lt_identificacion" class="control-label col-sm-6 col-md-3 col-lg-3">Identificación</label>
                                    <div class="col-sm-6 col-md-9 col-lg-9"><input id="t_identificacion" type="number" class="form-control _t" required="required"></div>
                                </div>
                                <div class="form-group">
                                    <label id="lt_tipo" class="control-label col-sm-6 col-md-3 col-lg-3">Tipo</label>
                                    <div class="col-sm-6 col-md-9 col-lg-9">
                                      <select class="form-control _t" id="t_tipo" required="required">

                                      </select>
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <label id="lt_estado" class="control-label col-sm-6 col-md-3 col-lg-3">Estado</label>
                                    <div class="col-sm-6 col-md-9 col-lg-9">
                                      <select class="form-control _t" id="t_estado" required="required">

                                      </select>
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <label id="lt_ins" class="control-label col-sm-6 col-md-3 col-lg-3">Institución</label>
                                    <div class="col-sm-6 col-md-9 col-lg-9">
                                      <select class="form-control _t" id="t_ins" required="required">

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
         <script src="js/buscarUsuario.js" type="text/javascript"></script>
        

    </body>
</html>


          

		

		



		

		

