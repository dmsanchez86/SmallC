<?php
   $ruta   = $_SESSION['datos_usuario']['ins_imagen'];
   $nombre = $_SESSION['datos_usuario']['nombre']." ".$_SESSION['datos_usuario']['apellido1']." ".$_SESSION['datos_usuario']['apellido2'];
   $tipo_usuario =   $_SESSION['datos_usuario']['tip_nombre'];
?>
<!DOCTYPE>
<html>
   <head>
      <meta charset="UTF-8">
      <title>Administrador Colegio</title>
      <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
      <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
      <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
      <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
      <link href="dist/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />
   </head>
   <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">
         <header class="main-header">
            <a  class="logo">
               <span class="logo-lg">
                  <h4><b><?php  echo $tipo_usuario;?></b></h4>
               </span>
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
               <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" id="_btn_ocul">
               <span class="sr-only"></span>
               </a>
               <div class="navbar-custom-menu">
                  <ul class="nav navbar-nav">
                     <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src=<?php  echo $ruta;?>  class="user-image" alt="Imagena Admin" id="tumbUserImage"/>
                        <span class="hidden-xs" id="spNameUser"></span>
                        </a>
                        <ul class="dropdown-menu">
                           <li class="user-header">
                              <img src=<?php echo $ruta;?> class="img-circle" alt="User Image" id="imageUser"/>
                              <p id="pNameUser">
                                 <?php echo $nombre ; ?>
                              </p>
                              <small id="smEspecialidad"></small>
                           </li>
                           <li class="user-body">
                           </li>
                           <li class="user-footer">
                              <div class="pull-right">
                                 <a href="./cerrar" class="btn btn-default btn-flat">Cerrar Sesion</a>
                              </div>
                           </li>
                        </ul>
                     </li>
                  </ul>
               </div>
            </nav>
         </header>
         <aside class="main-sidebar">
            <section class="sidebar">
               <div class="user-panel">
                  <div class="pull-left info">
                     <p id="user_name"></p>
                  </div>
               </div>
               <ul class="sidebar-menu" id="sidebar-menu">
                  <li class="treeview active">
                     <a >
                     <i class="glyphicon glyphicon  glyphicon-calendar "></i>
                     <span>Config. Ini - Fin Año</span>
                     <i class="fa fa-angle-left pull-right"></i>
                     </a>
                     <ul class="treeview-menu">
                        <li class="active" rel="./view/calendario/agregarCalendario.php"    id="_li1" style="cursor:pointer"><a><i class="fa fa-circle-o li__"></i><span>Agregar</span></a></li>
                     </ul>
                  </li>
                  <li class="treeview active">
                     <a >
                     <i class="glyphicon glyphicon  glyphicon-tasks "></i>
                     <span>Areas</span>
                     <i class="fa fa-angle-left pull-right"></i>
                     </a>
                     <ul class="treeview-menu">
                        <li class="active" rel="./view/areas/agregarAreas.php"    id="_li2" style="cursor:pointer"><a><i class="fa fa-circle-o li__"></i><span>Agregar</span></a></li>
                        <li rel="./view/areas/buscaAreas.php"     id="_li3" style="cursor:pointer"><a><i class="fa fa-circle-o li__"></i><span>Buscar</span></a></li>
                     </ul>
                  </li>
                  <li class="treeview active">
                     <a >
                     <i class="glyphicon glyphicon  glyphicon-edit "></i>
                     <span>Materias</span>
                     <i class="fa fa-angle-left pull-right"></i>
                     </a>
                     <ul class="treeview-menu">
                        <li class="active" rel="./view/materias/agregarMateria.php"    id="_li4" style="cursor:pointer"><a><i class="fa fa-circle-o li__"></i><span>Agregar</span></a></li>
                        <li rel="./view/materias/buscarMateria.php"     id="_li5" style="cursor:pointer"><a><i class="fa fa-circle-o li__"></i><span>Buscar</span></a></li>
                     </ul>
                  </li>
                  <li class="treeview active">
                     <a >
                     <i class="glyphicon glyphicon  glyphicon-edit "></i>
                     <span>Asignar Materia</span>
                     <i class="fa fa-angle-left pull-right"></i>
                     </a>
                     <ul class="treeview-menu">
                        <li class="active" rel="./view/docenteMateria/agregarDocenteMateria.php"    id="_li6" style="cursor:pointer"><a><i class="fa fa-circle-o li__"></i><span>Agregar</span></a></li>
                        <!-- <li rel="./view/docenteMateria/buscarDocenteMateria.php"     id="_li6" style="cursor:pointer"><a><i class="fa fa-circle-o li__"></i><span>Buscar</span></a></li>-->
                     </ul>
                  </li>
                  <li class="treeview">
                     <a >
                     <i class="glyphicon glyphicon-user"></i>
                     <span>Usuarios</span>
                     <i class="fa fa-angle-left pull-right"></i>
                     </a>
                     <ul class="treeview-menu">
                        <li  rel="./view/usuarios/agregarUsuario.php"    id="_li6" style="cursor:pointer"><a><i class="fa fa-circle-o li__"></i><span>Agregar</span></a></li>
                        <li rel="./view/usuarios/buscarUsuario.php"     id="_li7" style="cursor:pointer"><a><i class="fa fa-circle-o li__"></i><span>Buscar</span></a></li>
                     </ul>
                  </li>

                  <li class="treeview active">
                     <a >
                     <i class="glyphicon glyphicon  glyphicon-edit "></i>
                     <span>Grupos</span>
                     </a>
                     <ul class="treeview-menu">
                        <li class="active" rel="./view/grupos/crearGrupos.php"    id="_li10" style="cursor:pointer"><a><i class="fa fa-circle-o li__"></i><span>Crear grupos</span></a></li>
                        <li class="active" rel="./view/grupos/asignarEstudiantes.php"    id="_li8" style="cursor:pointer"><a><i class="fa fa-circle-o li__"></i><span>Asignar Estudiantes</span></a></li>
                        <li rel="./view/grupos/asignarMaterias.php"     id="_li9" style="cursor:pointer"><a><i class="fa fa-circle-o li__"></i><span>Asignar Materias</span></a></li>
                     </ul>
                  </li>
                  s
               </ul>
            </section>
         </aside>
         <div class="content-wrapper">
            <section  >
               <iframe width="100%"  height="1000px" src="" frameborder="0"  id="iframe" ></iframe>
            </section>
         </div>
         <footer class="main-footer">
            <div class="pull-right hidden-xs">
            </div>
         </footer>
      </div>
      <script src="plugins/jQuery/jQuery.js"></script>
      <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      <script src="dist/js/app.min.js" type="text/javascript"></script>
      <script  type="text/javascript" src="js/menuPrincipal.js" ></script>
   </body>
</html>