<?php
class Sistema{

  private $request;
  private $session;
  private $model;
  private $rutas = array(
    'cerrar' => './view/login.php',
    'notfount'=> './view/notfount.php', 
    'iniciar' => 2, 
    'ADMINISTRADOR GENERAL' => './view/administrador.php', 
    'ADMINISTRADOR' => './view/adminCol.php', 
    'DOCENTE' => './view/docente.php',
    'ALUMNO'=> './view/alumno.php'
  );
  private $config = array(
    'upload' =>
    [
        'datos' => 
        [
            'carpeta' => './uploads',
            'tipos' => ['image/jpg','image/png','image/jpeg'],
            'peso' => 10 //MB
        ]
    ]
  );
        
  public function Sistema($request){ 
    // var_dump($request);
    $this->estadoSesion();
    $this->request = $request;
  }
        
  public function procesarAccion(){

    switch ($this->verificarParametro('url')){
      case 'cerrar':  
        session_destroy();  // Se destruye la session existente de esta forma no permite el duplicado.
        require "view/login.php";  
        break;
      case 'login':
        $model = new SistemaM();

        $_SESSION['datos_usuario'] =  $model->inicioSesion($this->verificarParametro('txtName'), $this->verificarParametro('txtPass'));
        // var_dump();
        $ll = $_SESSION['datos_usuario']['tip_nombre']; 

        if($_SESSION['datos_usuario']['tip_nombre'] !== null){
          $this->verificarAccesoPagina();  
        }else{
          session_destroy();
          echo "<script language='javascript'>window.location='./error';</script>";
        }       
        break;
      case 'error':
        require "view/login.php";  
        break;
      case 'addI' : 
        $this->addInstitucion();
        break;
      case 'getI':
        echo $this->getInstitucion();
        break;    
      case 'estadosI':
        echo $this->getEstados();
        break;
      case 'updI':
        echo $this->actualizarInstitucion();
        break;        
      case 'comboI':
        echo $this->getInstituciones();
        break; 
      case 'addU' : 
        $this->addUsuario();
        break;
      case 'comboTU':
        echo $this->getTiposUsuario();
        break; 
      case 'comboEU':
        echo $this->getEstadosUsuario();
        break;  
      case 'getU':
        echo $this->getUsuarios();
        break;
      case 'updU':
        echo $this->actualizarUsuario();
        break; 
      case 'getDate':
        echo $this->getDate();
        break;         
      case 'getFestivos':
        echo $this->getFestivos();
        break;  
      case 'addC':
        echo $this->addCalendario();
        break; 
      case 'addA':
        echo $this->addAreas();
        break;
      case 'getA':
        echo $this->getArea();
        break;         
      case 'updA':
        echo $this->actualizarArea();
        break;   
      case 'addM':
        echo $this->addMateria();
        break;  
      case 'updM':
        echo $this->actualizarAsignatura();
        break;
      case 'getM':
        echo $this->getAsignatura();
        break;       
      case 'sugerenciaD':
        $this->getSugerenciaD() ;
        break;
      case 'getGrupos' :
        echo $this->getGrupos();
        break;
      case 'addG' :
        echo $this->creategrupo();
        break;
      case 'getAlumnos' :
        echo $this->getAlumnos();
        break;
      case 'asignarGrupo' :
        echo $this->asignarAlumno();
        break;
      case 'removeEstudianteFromGrupo' :
        echo $this->removeEstudianteFromGrupo();
        break;
      case 'getDocentes' :
        echo $this->getDocentes();
        break;
      case 'getAsignaturas' :
        echo $this->getAsignaturas();
        break;
      case 'getAsignaturasDocente':
        echo $this->getAsignaturasDocente();
        break;
      case 'asignarAsignaturaDocente':
        echo $this->asignarAsignaturaDocente();
        break;
      case 'removerAsignaturaDocente':
        echo $this->removerAsignaturaDocente();
        break;
      default :
        $this->verificarAccesoPagina();  
        break;
    }
                   
  }
 
  public function verificarAccesoPagina(){

    if(!(empty($_SESSION['datos_usuario']))){
      switch ($_SESSION['datos_usuario']['tip_nombre']){
        case 'ADMINISTRADOR GENERAL':
          require_once $this->rutas['ADMINISTRADOR GENERAL']; 
          break;
        case 'ADMINISTRADOR':
          require_once $this->rutas['ADMINISTRADOR']; 
          break;
        case 'DOCENTE':
          require_once  $this->rutas['DOCENTE'];  
          break;
        case 'ALUMNO':
          require_once  $this->rutas['ALUMNO'];  
          break;
        default :
          session_destroy();
          require_once  $this->rutas['cerrar'];  
          break;
      }
    }else if($this->verificarParametro('url') =='' && empty($_SESSION["datos_usuario"])){//|| empty($_SESSION["datos_usuario"])
        session_destroy();  // Se destruye la session existente de esta forma no permite el duplicado.
        require_once  $this->rutas['cerrar'];  
    }else{
       require $this->rutas['notfount']; 
    }   
  } 
        
        
function getSugerenciaD()
{
   $ins = new Usuario();   
   $res= $ins->getSugerencia(strtoupper($this->verificarParametro('search')),$this->verificarParametro('row_num'));   
   echo $res;
}

        
private function verificarParametro($param){
  $p = "" ;
  $l = $_REQUEST;
  $p = (isset($this->request[$param])) ? $this->request[$param] : "";

  if($p == "" && ($param === 'url'|| $param === 'search') ){//strrpos($mystring, "b")                  
    $p = (isset($_GET[$param]))?$_GET[$param]:"";
  }
    
  if($p !==""){
    //system(escapeshellcmd("finger ".$p));
    $p = addslashes($p);
    $p = htmlspecialchars($p);   
  }
  return $p ; 
}
      
private function estadoSesion(){
  if (session_id() == "" || session_id() == null) {
    session_start();
  }   
} 

        
private function verificarSesion(){
  if((empty($_SESSION['datos_usuario']))){
    session_destroy();  // Se destruye la session existente de esta forma no permite el duplicado.
    require "./view/login.php"; 
    return false ; 
  }          
  return true ;                        
} 


private function   uploadImage()
{
   $imag = isset($_FILES['file'])?$_FILES['file']:null;
        if($imag!=null)
            {
                 $Upload = new Upload
                     (
                       $this->config['upload']['datos']['carpeta']
                       ,$this->config['upload']['datos']['tipos'] 
                       ,$imag
                       ,$this->config['upload']['datos']['peso'] 
                       ,1
                     );
                     $res = $Upload -> fileUpload();
                     $msj ="";
                     switch ($res)
                     {
                         case 1 : 
                             $msj = "E¬ El archivo supera el peso limite ( ".$this->config['upload']['datos']['peso']." MB)";
                             break ;
                         case 2 : 
                              $msj ="E¬ El archivo no posee una extensión vàlida (".join(";",$this->config['upload']['datos']['tipos']).")";
                             break ;
                         case 3 : 
                             $msj = "E¬ Ha superado la cantidad maxima de archivos";
                             break ;
                         default :
                              $msj=$res;               
                             break;
                     }
                     return $msj;
            }
   return "" ;                       
}
     /////////////////Materias//////////////////
     
     private  function addMateria()
              {
               $ins = new Asignatura();
                    $campos = $ins->getDatos();
                        $datos  = array () ; 
                        foreach($campos as $clave=>$valor)
                            {
                                    if(isset($_POST[$clave]))
                                        {
                                            if($this->verificarParametro($clave)!="")
                                                {
                                                    $datos[$valor]=  $_POST[$clave];       
                                                }  
                                        }
                            }
                         echo $ins->add($datos);                       
              }
              
              
              
              
         private function actualizarAsignatura()
                {
                    $ins = new Asignatura();
                    $campos = $ins->getDatos();
                        $datos  = array () ; 
                        foreach($campos as $clave=>$valor)
                            {
                                    if(isset($_POST[$clave]))
                                        {
                                            if($this->verificarParametro($clave)!="")
                                                {
                                                    $datos[$valor]= $_POST[$clave];
                                                }  
                                        }
                            } 
                         echo $ins->modificar($datos); 
                } 
                
           
              
              private  function getAsignatura()
              {
               
                $ins = new Asignatura();
                $res = $ins->getCombo();
                echo $res;                     
              }
     /////////////////Areas////////////////////
     
          private  function addAreas()
              {
               $ins = new Area();
                    $campos = $ins->getDatos();
                        $datos  = array () ; 
                        foreach($campos as $clave=>$valor)
                            {
                                    if(isset($_POST[$clave]))
                                        {
                                            if($this->verificarParametro($clave)!="")
                                                {
                                                    $datos[$valor]=  $_POST[$clave];       
                                                }  
                                        }
                            }
                         echo $ins->add($datos);                       
              }
              
              
              
              
              private  function getArea()
              {
               
                $ins = new Area();
                $res = $ins->getComb();
                echo $res;                     
              }
                 
                                     
    private function actualizarArea()
                {
                    $ins = new Area();
                    $campos = $ins->getDatos();
                        $datos  = array () ; 
                        foreach($campos as $clave=>$valor)
                            {
                                    if(isset($_POST[$clave]))
                                        {
                                            if($this->verificarParametro($clave)!="")
                                                {
                                                    $datos[$valor]= $_POST[$clave];
                                                }  
                                        }
                            } 
                         echo $ins->modificar($datos); 
                }             
     /////////////////Calendario//////////////////////
             private  function addCalendario()
              {
               $ins = new Calendario();
                    $campos = $ins->getDatos();
                        $datos  = array () ; 
                        foreach($campos as $clave=>$valor)
                            {
                                    if(isset($_POST[$clave]))
                                        {
                                            if($this->verificarParametro($clave)!="")
                                                {
                                                        if(strrpos($clave, "fecha")!==false)
                                                        {
                                                            $date=date_create($_POST[$clave]);
                                                            $f   =date_format($date,"Y-m-d");
                                                            $datos[$valor]=  $f;  
                                                        }else
                                                            {
                                                               $datos[$valor]=  $_POST[$clave];
                                                            }           
                                                }  
                                        }

    
                            }
                         echo $ins->add($datos);                       
              }


      //////////////// Grupos /////////////////////

     function getGrupos()
     {
        $grupo = new Grupo();
        $res = $grupo->getAll();
        echo $res;
     }

     function creategrupo()
     {
        $grupo = new Grupo();
        $nombre_grupo =  $this->verificarParametro('nombre_grupo');
        $res = $grupo->add($nombre_grupo);
        echo $res; 
     }


     ////////////// Alumnos /////////////

    function getAlumnos()
    {
      $usu = new Usuario();
      $res = $usu->getAlumnos($this->verificarParametro('grupo'));
      echo $res; 
    }

    function asignarAlumno()
    {
      $usu = new Usuario();
      $grupo = $this->verificarParametro('grupo');
      $estudiante = $this->verificarParametro('estudiante');
      $res = $usu->asignarAlumno($grupo, $estudiante);
      echo $res; 
    }

    function removeEstudianteFromGrupo()
    {
      $usu = new Usuario();
      $id = $this->verificarParametro('id');
      $res = $usu->removeEstudianteFromGrupo($id);
      echo $res; 
    }

    //////// DOCENTE //////////////

    function getDocentes()
    {
      $usu = new Usuario();
      $res = $usu->getDocentes();
      echo $res; 
    }

    function asignarAsignaturaDocente()
    {
      $usu = new Usuario();
      $asignatura =  $this->verificarParametro('asignatura');
      $docente =  $this->verificarParametro('docente');
      $res = $usu->asignarAsignaturaDocente($asignatura,$docente);
      echo $res;
    }

    function removerAsignaturaDocente()
    {
      $usu = new Usuario();
      $id =  $this->verificarParametro('id');
      $res = $usu->removerAsignaturaDocente($id);
      echo $res;
    }

    /////// Asignaturas /////
    function getAsignaturas()
    {
      $asign = new Asignatura();
      $res = $asign->getAll();
      echo $res; 
    }

    function getAsignaturasDocente()
    {
      $asign = new Asignatura();
      $res = $asign->getAsignaturasDocente();
      echo $res; 
    }





     ///////////////////Institucion///////////////////
    private  function addInstitucion()
    {
      $ruta =  $this->uploadImage() ; 
      if(strrpos($ruta, "E¬")!==false)
          {
             echo $ruta;
             return;
          }
      $ins = new Institucion();
      $ins->ins_nombre = $this->verificarParametro('tnombre');
      $ins->ins_imagen = $ruta;
      $res = $ins->add();
      echo $res;                     
    }

    private  function getInstitucion()
    {
     
      $ins = new Institucion();
      $res = $ins->getAll();
      echo $res;                     
    }

    private  function getEstados()
    {
     
      $ins = new Institucion();
      $res = $ins->getEstado();
      echo $res;                     
    }
       
    private function actualizarUsuario()
                {
                    $ins = new Usuario();
                    $campos = $ins->getDatos();
                        $datos  = array () ; 
                        foreach($campos as $clave=>$valor)
                            {
                                    if(isset($_POST[$clave]))
                                        {
                                            if($this->verificarParametro($clave)!="")
                                                {
                                                    $datos[$valor]= $_POST[$clave];
                                                }  
                                        }
                            }
                         $ruta =$this->uploadImage() ; 
                         
                        if($ruta!=="")
                            {
                                if(strrpos($ruta, "E¬")!==false)
                                   {
                                      echo $ruta;
                                      return;
                                   }
                                $datos[$campos['file']]=$ruta;
                            }
                         echo $ins->modificar($datos); 
                }          
    private function actualizarInstitucion()
                {
                    $ins = new Institucion();
                    $campos = $ins->getDatos();
                        $datos  = array () ; 
                        foreach($campos as $clave=>$valor)
                            {
                                    if(isset($_POST[$clave]))
                                        {
                                            if($this->verificarParametro($clave)!="")
                                                {
                                                    $datos[$valor]= $_POST[$clave];
                                                }  
                                        }
                            }
                         $ruta =$this->uploadImage() ; 
                         
                        if($ruta!=="")
                            {
                                if(strrpos($ruta, "E¬")!==false)
                                   {
                                      echo $ruta;
                                      return;
                                   }
                                $datos[$campos['file']]=$ruta;
                            }
                         echo $ins->modificar($datos); 
                }
     private  function getInstituciones()
              {
                $ins = new Institucion();
                $res = $ins->getComboAll();
                echo $res;                     
              }
    //////////////////////////////////////usuario///////////////
      private  function addUsuario()
              {
                $ins = new Usuario();
                    $campos = $ins->getDatos();
                        $datos  = array () ; 
                        foreach($campos as $clave=>$valor)
                            {
                                    if(isset($_POST[$clave]))
                                        {
                                            if($this->verificarParametro($clave)!="")
                                                {
                                                    $datos[$valor]= $_POST[$clave];
                                                }  
                                        }
                            }
                         echo $ins->add($datos);                 
              }
     private  function getTiposUsuario()
              {
                $ins = new Usuario();
                $res = $ins->getTipos();
                echo $res;              
              }   
    private function getUsuarios()
            {
               $ins = new Usuario();
                $res = $ins->getAll();
                echo $res; 
            }
    private  function getEstadosUsuario()
              {
               
                $ins = new Usuario();
                $res = $ins->getEstados();
                echo $res;                     
              }
    private  function getDate()
            {
                $fecha = date('Y-m-j');
                $nuevafecha = strtotime ( '+1 year' , strtotime ( $fecha ) ) ;
                $nuevafecha = date ( 'Y' , $nuevafecha );
                $fecha = date ('Y');
                $actual = array(1=>$fecha,1=>$fecha);
                $siguiente = array(1=>$nuevafecha,1=>$nuevafecha);
                $nuevafecha = array($actual , $siguiente);
            echo json_encode($nuevafecha);
            }
    private function getFestivos()
            {
             $model = new SistemaM();
             $res =$model->getDiasFestivos();
             return $res;
            }
}