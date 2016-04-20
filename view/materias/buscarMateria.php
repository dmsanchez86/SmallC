<?php ?>
<html>
    <head>
        <link href="../../bootstrap/css/bootstrap.css" type="text/css" rel="stylesheet"/> 
        <link href="../../plugins/loading/loading.css" type="text/css" rel="stylesheet"/>
        <link href="../../plugins/datatables/dataTables.bootstrap.css" rel="stylesheet"/>
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
                                                            <td>Nombre</td>
                                                            <td></td>
                                                            <td>Area</td>
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
        <div class="modal fade" id="EditA" role="dialog">
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
                                            <div class="col-xs-3">
                                                <b>Nombre</b>
                                            </div>
                                            <div class="col-xs-9">
                                                <input id="t_nombre" type="text" class="form-control _t" placeholder="Nombre" style="width:90%" >
                                            </div>
                                       </div>
                                        <div class="form-group">
                                            <label id="lt_are_id" class="control-label col-xs-3">Area</label>
                                            <div class="col-xs-9">
                                              <select class="form-control _t" id="t_are_id" required="required">

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
         <script src="../../js/general.js" type="text/javascript"></script>
         <script src="js/buscarMateria.js" type="text/javascript"></script>
        

    </body>
</html>


          

		

		

