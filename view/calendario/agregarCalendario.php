<html>
    <head>
            <link href="../../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" /> 
            <link href="../../plugins/loading/loading.css" rel="stylesheet" type="text/css"/>
            <link href="../../plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
            <link href="../../js/jquery-ui/timepicker/jquery.ui.timepicker.css" rel="stylesheet" />    
            <link href="../../plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
            <link href="../../plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet"/>
        <style>
            .festivos span 
           {
            color: red !important; //muestra rojos los festivos
           }
           .ui-datepicker-week-end span 
           {
            color: #333 !important; //muestra grises los fines de semana
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
                                            <legend>Datos Calendario </legend>
                                          </div>
                                        </div>
                                        <div class="modal-body">
                                                <div class="row">
                                                    <div class="row">          

                                                    </div>
                                                    
                                                  <div class="form-group">
                                                      <label id="lt_ano" class="control-label col-sm-6 col-md-3 col-lg-3">Año</label>
                                                      <div class="col-sm-6 col-md-9 col-lg-9">
                                                          <select class="form-control _t" id="t_ano" required="required">
                                                              
                                                          </select>
                                                      </div>
                                                  </div>
 
                                                  <div class="form-group">
                                                      <label id="lt_fecha" class="control-label col-sm-6 col-md-3 col-lg-3">Inicio - Fin</label>
                                                      <div class="col-sm-6 col-md-9 col-lg-9"><input type="text" class="form-control pull-right form _t" id="t_fecha" readonly="readonly" data-required="true" validate="notEmpty"  required="required"/></div>
                                                  </div>
                                                  
                                                </div>
                                        </div>
                                      
                                    </fieldset>
                                    <fieldset>
                                        <div class="row">          
                                          <div class="col-xs-12">
                                            <legend>Periodos</legend>
                                          </div>
                                        </div>
                                        <div class="modal-body">
                                                <div class="row">
                                                    <div class="row">          

                                                    </div>
                                                  <div class="form-group">
                                                      <label id="lt_ano" class="control-label col-xs-12">Primer Periodo</label>
                                                  </div>
 
                                                  <div class="form-group">
                                                      <label id="lt_fecha_p1" class="control-label col-sm-6 col-md-3 col-lg-3">Inicio - Fin</label>
                                                      <div class="col-sm-6 col-md-9 col-lg-9"><input type="text" class="form-control pull-right form _t" id="t_fecha_p1" readonly="readonly" data-required="true" validate="notEmpty"  required="required"/></div>
                                                  </div>  
                                                   <div class="form-group">
                                                       <label id="lt_por_p1" class="control-label col-sm-6 col-md-3 col-lg-3">Porcentaje</label>
                                                       <div class="col-sm-6 col-md-9 col-lg-9"><input id="t_por_p1" type="number" class="form-control _t" required="required"></div>
                                                   </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="row">          

                                                    </div>
                                                  <div class="form-group">
                                                      <label id="lt_ano" class="control-label col-xs-12">Segundo Periodo</label>
                                                  </div>
 
                                                  <div class="form-group">
                                                      <label id="lt_fecha_p2" class="control-label col-sm-6 col-md-3 col-lg-3">Inicio - Fin</label>
                                                      <div class="col-sm-6 col-md-9 col-lg-9"><input type="text" class="form-control pull-right form _t" id="t_fecha_p2" readonly="readonly" data-required="true" validate="notEmpty"  required="required"/></div>
                                                  </div>  
                                                   <div class="form-group">
                                                       <label id="lt_por_p2" class="control-label col-sm-6 col-md-3 col-lg-3">Porcentaje</label>
                                                       <div class="col-sm-6 col-md-9 col-lg-9"><input id="t_por_p2" type="number" class="form-control _t" required="required"></div>
                                                   </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="row">          

                                                    </div>
                                                  <div class="form-group">
                                                      <label id="lt_ano" class="control-label col-xs-12">Tercer Periodo</label>
                                                  </div>
 
                                                  <div class="form-group">
                                                      <label id="lt_fecha_p3" class="control-label col-sm-6 col-md-3 col-lg-3">Inicio - Fin</label>
                                                      <div class="col-sm-6 col-md-9 col-lg-9"><input type="text" class="form-control pull-right form _t" id="t_fecha_p3" readonly="readonly" data-required="true" validate="notEmpty"  required="required"/></div>
                                                  </div>  
                                                   <div class="form-group">
                                                       <label id="lt_por_p3" class="control-label col-sm-6 col-md-3 col-lg-3">Porcentaje</label>
                                                       <div class="col-sm-6 col-md-9 col-lg-9"><input id="t_por_p3" type="number" class="form-control _t" required="required"></div>
                                                   </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="row">          

                                                    </div>
                                                  <div class="form-group">
                                                      <label id="lt_ano" class="control-label col-xs-12">Cuarto Periodo</label>
                                                  </div>
 
                                                  <div class="form-group">
                                                      <label id="lt_fecha_p4" class="control-label col-sm-6 col-md-3 col-lg-3">Inicio - Fin</label>
                                                      <div class="col-sm-6 col-md-9 col-lg-9"><input type="text" class="form-control pull-right form _t" id="t_fecha_p4" readonly="readonly" data-required="true" validate="notEmpty"  required="required"/></div>
                                                  </div>  
                                                   <div class="form-group">
                                                       <label id="lt_por_p4" class="control-label col-sm-6 col-md-3 col-lg-3">Porcentaje</label>
                                                       <div class="col-sm-6 col-md-9 col-lg-9"><input id="t_por_p4" type="number" class="form-control _t" required="required"></div>
                                                   </div>
                                                    
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
            <script src="../../plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
            <script src="../../js/jquery-ui/jquery-ui.js"></script>
            <script src="../../plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
            <script src="../../plugins/daterangepicker/moment.js" type="text/javascript"></script>
           
            <!-- date-range-picker -->
            <script src="../../plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
            <!-- bootstrap color picker -->
           
            <script src="../../js/general.js" type="text/javascript"></script>
            <script src="js/agregarCalendario.js" type="text/javascript"></script>
    </body>
</html>
          

    
   

