<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    <title>Colegio</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="../images/logo.png"/>

  <!-- Google Analytics -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-71564095-1', 'auto');
      ga('send', 'pageview');

    </script>

    <style>
      center .img-responsive{
        -webkit-animation: rotateAtom 50s infinite linear;
        -moz-animation: rotateAtom 50s infinite linear;
        -ms-animation: rotateAtom 50s infinite linear;
        -o-animation: rotateAtom 50s infinite linear;
        animation: rotateAtom 50s infinite linear;
      }

      @-webkit-keyframes rotateAtom{
        from{
          -webkit-transform: rotate(0deg);
          -moz-transform: rotate(0deg);
          -ms-transform: rotate(0deg);
          -o-transform: rotate(0deg);
          transform: rotate(0deg);
        }
        to{
          -webkit-transform: rotate(360deg);
          -moz-transform: rotate(360deg);
          -ms-transform: rotate(360deg);
          -o-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }
      @-moz-keyframes rotateAtom{
        from{
          -webkit-transform: rotate(0deg);
          -moz-transform: rotate(0deg);
          -ms-transform: rotate(0deg);
          -o-transform: rotate(0deg);
          transform: rotate(0deg);
        }
        to{
          -webkit-transform: rotate(360deg);
          -moz-transform: rotate(360deg);
          -ms-transform: rotate(360deg);
          -o-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }
      @-ms-keyframes rotateAtom{
        from{
          -webkit-transform: rotate(0deg);
          -moz-transform: rotate(0deg);
          -ms-transform: rotate(0deg);
          -o-transform: rotate(0deg);
          transform: rotate(0deg);
        }
        to{
          -webkit-transform: rotate(360deg);
          -moz-transform: rotate(360deg);
          -ms-transform: rotate(360deg);
          -o-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }
      @-o-keyframes rotateAtom{
        from{
          -webkit-transform: rotate(0deg);
          -moz-transform: rotate(0deg);
          -ms-transform: rotate(0deg);
          -o-transform: rotate(0deg);
          transform: rotate(0deg);
        }
        to{
          -webkit-transform: rotate(360deg);
          -moz-transform: rotate(360deg);
          -ms-transform: rotate(360deg);
          -o-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }
      @keyframes rotateAtom{
        from{
          -webkit-transform: rotate(0deg);
          -moz-transform: rotate(0deg);
          -ms-transform: rotate(0deg);
          -o-transform: rotate(0deg);
          transform: rotate(0deg);
        }
        to{
          -webkit-transform: rotate(360deg);
          -moz-transform: rotate(360deg);
          -ms-transform: rotate(360deg);
          -o-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }
    </style>

  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        
        
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <div class="row">
          <div class="col-md-7 col-md-offset-2">
            <div class="container_img">
                <center><img src="images/logo.png" class="img-responsive"> </center> 
            </div>
          </div>
        </div>  
        <p class="login-box-msg">Ingresa tus datos para iniciar sesion</p>
        <form action="index.php" method="post" id="formLogin">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Identificación" name="txtName" id="txtName"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="txtPass" id="txtPass"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <button type="button" id="btnLogin" class="btn btn-primary btn-block" style="display:inline-block;vertical-align:top;margin:0">Ingresar</button>
             
            </div><!-- /.col -->
          </div>
          <input type="hidden" name="url" value="login">
         </form>
         <br>
       
        <!--<a href="forgot_password.php" target="_blank">Olvidaste tus credenciales?<a/>-->

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script src="js/scriptLogin.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>

<!--<html>
    <head>
            <meta charset="UTF-8">
            <title>GC: Gestión Campera</title>
            <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
         
            <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
            <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
            <link href="plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    </head>
        <body class="login-page">
                  <div class="login-box">
                        <div class="login-box-body">
                              <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-md-offset-3 col-sm-offset-3 col-xs-offset-3">    
                                    <img src="images/admin/logo.png" class="img-responsive"/>        
                                </div>
                              </div>  
                            <p class="login-box-msg "><center><h4><b>Ingresa los datos para iniciar sesión</b></h4></center></p>
                              <form action="index.php" method="post" id="formLogin">
                                  <div class="form-group has-feedback">
                                    <input type="text" class="form-control" placeholder="Código" name="txtName" id="txtName"/>
                                    <input type="hidden"  name="url" value="iniciar" />
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                   
                                  </div>
                                  <div class="form-group has-feedback">
                                    <input type="password" class="form-control" placeholder="Password" name="txtPass" id="txtPass"/>
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                  </div>
                                  <div class="row">
                                     
                                              <div class="col-xs-12 col-sm-12 col-md-12" >
                                                  <button type="button" id="btnLogin" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                                              </div>
                                  </div>
                                  <input type="hidden" name="opc" value="login">
                               </form>
                        </div>
                  </div>
                  <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
                  <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
                  <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
                  <script src="js/scriptLogin.js" type="text/javascript"></script>
                  <script>
                    $(function () {
                      $('input').iCheck({
                        checkboxClass: 'icheckbox_square-blue',
                        radioClass: 'iradio_square-blue',
                        increaseArea: '20%' // optional
                      });
                    });
                  </script>
        </body>
</html>-->