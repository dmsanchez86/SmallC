<html>
    <head>
        <link href="../../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" /> 
        <link rel="stylesheet" href="../../plugins/loading/loading.css" type="text/css"/>
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
                                            <legend>Crear grupos</legend>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                            <label id="lt_nombre" class="control-label col-xs-3">Nombre grupo</label>
                                            <div class="col-xs-9">
                                                <input id="nombre_grupo" type="text" class="form-control _t" required="required" >
                                            </div>
                                        </div>
                                        <div class="row">        
                                            <div class="col-xs-12 col-sm-6 col-md-6" >
                                                <button type="button" id="btnRegistrarGrupo" class="btn btn-primary btn-block btn-flat">Registrar</button>
                                            </div>     
                                        </div>  
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                        <div class="row">        
                            <div class="col-xs-12 col-sm-6 col-md-12" >

                                <table class="table" id="tableGroups">
                                    <thead>
                                        <th>Código grupo</th>
                                        <th>Nombre grupo</th>
                                    </thead>
                                    <tbody id="bodyGrupos">
                                        
                                    </tbody>
                                </table>

                            </div>     
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
        <script src="js/crearGrupo.js" type="text/javascript"></script> 
    </body>
</html>



		
