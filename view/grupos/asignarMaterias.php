<html>
    <head>
        <link href="../../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" /> 
        <link rel="stylesheet" href="../../plugins/loading/loading.css" type="text/css"/>

        <style type="text/css">
            .ui-autocomplete { position: absolute; cursor: default;z-index:10000 !important;}  
        </style>

    </head>
    <body>
        <a name="arriba"></a>
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
                                            <legend>Asignar Materias </legend>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                            <label id="lt_nombre" class="control-label col-xs-3">Docente</label>
                                            <div class="col-xs-9">
                                                <select id="s_docente" class="form-control">
                                                    <option value="">Seleccione</option>
                                                </select>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="control-label col-xs-3">Asignatura</label>
                                            <div class="col-xs-9">

                                              <select class="form-control" id="s_asignatura" required="required">
                                                  <option value="">Seleccione</option>
                                              </select>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>

                        <div class="row">        
                            <div class="col-xs-12 col-sm-6 col-md-6" >
                                <button type="button" id="btnRegistrar" onclick="asignarEstudiante()" class="btn btn-primary btn-block btn-flat">Registrar</button>
                            </div>     
                        </div> 

                        <div class="row">
                            <div class="col-md-12">

                                <table class="table" id="tableDocenteAsignatura">
                                    <thead>
                                        <th>Docente</th>
                                        <th>Asignatura</th>
                                        <th>Opciones</th>
                                    </thead>
                                    <tbody id="">
                                        
                                    </tbody>
                                </table>

                            </div>
                        </div>
 
                </div> 
            </div>
        </div>
        <script src="../../plugins/jQuery/jQuery.js"></script>

        
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

        <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../js/notify.min.js" type="text/javascript"></script>
        <script src="../../plugins/loading/loading.js" type="text/javascript"></script>
        <script src="../../plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../../plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <script type="text/javascript" src="../../js/upload/jquery.uploadfile.min.js"></script>
        <script type="text/javascript" src="../../js/upload/upload.js"></script>

        <script src="../../js/general.js" type="text/javascript"></script>

        <script src="js/asignarMaterias.js" type="text/javascript"></script> 

    </body>
</html>