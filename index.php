<?php 
//error_reporting(0);
include_once './controller/Sistema.php';
include_once './model/SistemaM.php';
include_once './controller/Ejecucion.php';
include_once './model/Institucion.php';
include_once './model/Upload.php';
include_once './model/Usuario.php';
include_once './model/Calendario.php';
include_once './model/Area.php';
include_once './model/Asignatura.php';
include_once './model/Grupo.php';

       $sistema = new Sistema($_POST);
       $sistema->procesarAccion();
      // $sistema->verificarAccesoPagina();


       /*switch (verificarParametro('url'))
        {
            case 'cerrar':  
                        session_destroy();  // Se destruye la session existente de esta forma no permite el duplicado.
                        require "view/login.php";  
                    break;
            case 'iniciar':
                     
                      $res =  $model->inicioSesion(verificarParametro('txtName'), verificarParametro('txtPass'));
                       if($res  == true)
                           {
                             verificarAccesoPagina();  
                           }
                           else 
                               {
                                session_destroy();
                                echo "<script language='javascript'>window.location='./error';</script>";
                               }       
                    break;
            case 'error':
                         require "view/login.php";  
                    break; 
            case 'usuarioR':
            
                        if(!verificarSesion())
                            break; 
                        
                       $res = $model->verificarExistenciaUsuario(verificarParametro('_identificacion'));
                        if(!$res )
                            {
                            
                                if(verificarParametro('_contrasena') == verificarParametro('_Vcontrasena'))
                                    {
                                      $resR = $model->insertarUsuario(verificarParametro('_nombreCompleto'),verificarParametro('_contrasena'),verificarParametro('_cargo'),verificarParametro('_identificacion'));
            
                                      if($resR)
                                          {
                                            echo "Registro Exitoso";
                                          }
                                          else 
                                              {
                                              echo "Error Procesando Información";
                                              }
                                    }
                                    else 
                                        {
                                           echo "La contraseña y la confirmación son diferentes";
                                        }
                              
                            }
                         else 
                             {
                               echo "Ya existe un Usuario con esta misma Identificacion";
                             }
                    break;
             case 'usuarioU':
                        if(!verificarSesion())
                            break;
                        $campos = $model->getCamposUsuario();
                        $datos  = array () ; 
                        foreach($campos as $clave=>$valor)
                            {
                                    if(isset($_POST[$clave]))
                                        {
                                            if(verificarParametro($clave)!="")
                                                {
                                                    $datos[$valor]= $_POST[$clave];
                                                }  
                                        }
                            }
                            $resU = $model->actualizarUsuario($datos);
                            if($resU)
                                {
                                    echo "Actualización Exitosa";
                                }
                                else 
                                    {
                                    echo "Error Procesando los datos";
                                    }
                    break;
                    
                 case 'usuarioB':
                         if(!verificarSesion())
                            break;
                        $res = $model->buscarDatosUsuario();
                        
                            if($res == "")
                                {
                                    echo "No se encontraron Registros";
                                }
                                else 
                                    {
                                       echo $res;
                                    }
                    break;   
            case 'ganderiaR':
                if(!verificarSesion())
                            break; 
                 $res = $model->insertarGanaderia(verificarParametro('_nombre'));
                 
                if($res != null)
                    {
                        $resR = $model->insertarUsuario(verificarParametro('_nombreCompleto'),verificarParametro('_contrasena'),2,verificarParametro('_identificacion'),$res);
                        if($resR)
                            {
                              echo "Registro Exitoso";
                            }
                            else 
                            {
                            echo "Error Procesando Información";
                            }
                                   
                    }
                    else 
                    {
                         echo "Error Procesando Datos" ; 
                    }
                break ; 
            case 'ganaderiaU':
                       if(!verificarSesion())
                            break;
                        $campos = $model->getGanaderia();
                        $datos  = array () ; 
                        foreach($campos as $clave=>$valor)
                            {
                                    if(isset($_POST[$clave]))
                                        {
                                            if(verificarParametro($clave)!="")
                                                {
                                                    $datos[$valor]= $_POST[$clave];
                                                }  
                                        }
                            }
                            $resU = $model->actualizarGanaderia($datos);
                            if($resU)
                                {
                                    echo "Actualización Exitoso";
                                }
                                else 
                                    {
                                    echo "Error Procesando los datos";
                                    }
                           break;
            case 'ganderiaB':
                 if(!verificarSesion())
                            break; 
                 $res = $model->buscarGanaderia();
                  echo $res ; 
                break ; 
            
              case 'ganderiaPB':
                 if(!verificarSesion())
                            break; 
                 $res = $model->buscarGanaderiaPro();
                  echo $res ; 
                break ;    
            case 'ganderiaPR':
                if(!verificarSesion())
                            break; 
                if(!$model->verificarGanaderia(verificarParametro('_nombre')))
                    {
                        $res = $model->insertarGanaderiaPro(verificarParametro('_nombre'),verificarParametro('_siglas'),verificarParametro('_hierro'),verificarParametro('_encaste'));
                           if(!$res)
                               {
                                    echo "Error Procesando Datos" ; 
                               }
                               else 
                               {
                                   echo "Registro Exitoso" ; 
                               }
                    }
                    else 
                        {
                         echo "Ya existe una Ganaderia con este nombre" ; 
                        }
                
                
                break ;
             case 'fincaR':
                if(!verificarSesion())
                            break; 
                
                if(!$model->verificarFinca(verificarParametro('_nombre')))
                    {
                        $res = $model->insertarFincas(verificarParametro('_nombre'));
                            if(!$res)
                                {
                                     echo "Error Procesando Datos" ; 
                                }
                                else 
                                    {
                                     echo "Registro Exitoso" ; 
                                    }
                    }
                    else 
                        {
                        echo "Ya existe una Finca con este nombre" ; 
                        }
                
                 
                break ;
             case 'fincaU':
                   if(!verificarSesion())
                            break;
                   if(!$model->verificarFinca(verificarParametro('t_nombre')))
                    {
                        $campos = $model->getFinca();
                        $datos  = array () ; 
                        foreach($campos as $clave=>$valor)
                            {
                                    if(isset($_POST[$clave]))
                                        {
                                            if(verificarParametro($clave)!="")
                                                {
                                                    $datos[$valor]= $_POST[$clave];
                                                }  
                                        }
                            }
                            $resU = $model->actualizarFinca($datos);
                            if($resU)
                                {
                                    echo "Actualización Exitosa";
                                }
                                else 
                                    {
                                    echo "Error Procesando los datos";
                                    }
                     }
                    else 
                        {
                        echo "Ya existe una Finca con este nombre" ; 
                        }
                           break; 
             case 'fincaB':
                 if(!verificarSesion())
                            break; 
                  $res = $model->buscarFincas();
                  echo $res ; 
                break ; 
             case 'pelajeR':
                if(!verificarSesion())
                            break; 
                
                if(!$model->verificarPelaje(verificarParametro('_nombre')))
                    {
                            $res = $model->insertarPelaje(verificarParametro('_nombre'));
                           if(!$res)
                               {
                                    echo "Error Procesando Datos" ; 
                               }
                                else 
                                   {
                                    echo "Registro Exitoso" ; 
                                   }
                     }
                    else 
                        {
                        echo "Ya existe un Pelaje con este nombre" ; 
                        }
                break ;
             case 'pelajeB':
                if(!verificarSesion())
                            break; 

                            $res = $model->buscarPelaje();
                           if(!$res)
                               {
                                    echo "No se encontraron Datos" ; 
                               }
                             else 
                                 {
                                   echo $res ;
                                 }
                    
                break ;
             case 'pelajeU':
                   if(!verificarSesion())
                            break;
               if(!$model->verificarPelaje(verificarParametro('t_nombre')))
                    {
                        $campos = $model->getPelaje();
                        $datos  = array () ; 
                        foreach($campos as $clave=>$valor)
                            {
                                    if(isset($_POST[$clave]))
                                        {
                                            if(verificarParametro($clave)!="")
                                                {
                                                    $datos[$valor]= $_POST[$clave];
                                                }  
                                        }
                            }
                            $resU = $model->actualizarPelaje($datos);
                            if($resU)
                                {
                                    echo "Actualización Exitosa";
                                }
                                else 
                                    {
                                    echo "Error Procesando los datos";
                                    }
                    }
                    else 
                        {
                        echo "Ya existe un Pelaje con este nombre" ; 
                        }        
                            
                           break; 
                           
             case 'listSanitariaR':
                if(!verificarSesion())
                            break; 
                 $res = $model->insertaListSanitaria(verificarParametro('_nombre'));
                if(!$res)
                    {
                         echo "Error Procesando Datos" ; 
                    }
                    else 
                    {
                     echo "Registro Exitoso" ; 
                    }
                break ;
             case 'listSanitariaB':
                if(!verificarSesion())
                            break; 
                 $res = $model->buscarListSanitaria();
                if(!$res)
                    {
                         echo "No se encontraron Datos" ; 
                    }
                    else 
                        {
                           echo $res ; 
                        }
                break ;
             case 'listSanitariaU':
                   if(!verificarSesion())
                            break;
                        $campos = $model->getSanitariaLs();
                        $datos  = array () ; 
                        foreach($campos as $clave=>$valor)
                            {
                                    if(isset($_POST[$clave]))
                                        {
                                            if(verificarParametro($clave)!="")
                                                {
                                                    $datos[$valor]= $_POST[$clave];
                                                }  
                                        }
                            }
                            $resU = $model->actualizarListSanitaria($datos);
                            if($resU)
                                {
                                    echo "Actualización Exitosa";
                                }
                                else 
                                    {
                                    echo "Error Procesando los datos";
                                    }
                           break; 
             case 'toreroR':
                if(!verificarSesion())
                            break; 
                 $res = $model->insertarTorero(verificarParametro('_nombre'));
                if(!$res)
                    {
                         echo "Error Procesando Datos" ; 
                    }
                     else 
                    {
                     echo "Registro Exitoso" ; 
                    }
                break ;
             case 'toreroB':
                if(!verificarSesion())
                            break; 
                 $res = $model->buscarTorero();
                if(!$res)
                    {
                         echo "No se encontraron Datos" ; 
                    }
                    else 
                        {
                           echo $res;
                        }
                break ;
             case 'toreroU':
                   if(!verificarSesion())
                            break;
                        $campos = $model->getTorero();
                        $datos  = array () ; 
                        foreach($campos as $clave=>$valor)
                            {
                                    if(isset($_POST[$clave]))
                                        {
                                            if(verificarParametro($clave)!="")
                                                {
                                                    $datos[$valor]= $_POST[$clave];
                                                }  
                                        }
                            }
                            $resU = $model->actualizarTorero($datos);
                            if($resU)
                                {
                                    echo "Actualización Exitosa";
                                }
                                else 
                                    {
                                    echo "Error Procesando los datos";
                                    }
                           break;  
                           
              case 'numeroR':
                if(!verificarSesion())
                            break; 
                
                   if(!$model->verificarNumero(verificarParametro('_numero')))
                    {
                            $res = $model->insertarNumeroExplo(verificarParametro('_numero'));
                                if(!$res)
                                    {
                                         echo "Error Procesando Datos" ; 
                                    }
                                   else 
                                   {
                                    echo "Registro Exitoso" ; 
                                   }
                    }
                    else 
                        {
                              echo "Ya existe un Numero de Explotación igual";
                        }
                break ; 
                case 'numeroB':
                if(!verificarSesion())
                            break; 
                 $res = $model->buscarNumeroExplo();
                if(!$res)
                    {
                         echo "No se encontraron Datos" ; 
                    }
                    else 
                        {
                         echo $res; 
                        }
                break ;
                case 'numeroU':
            if(!verificarSesion())
                            break;
                   if(!$model->verificarFinca(verificarParametro('t_numero')))
                    {
                        $campos = $model->getNumExp();
                        $datos  = array () ; 
                        foreach($campos as $clave=>$valor)
                            {
                                    if(isset($_POST[$clave]))
                                        {
                                            if(verificarParametro($clave)!="")
                                                {
                                                    $datos[$valor]= $_POST[$clave];
                                                }  
                                        }
                            }
                            $resU = $model->actualizarNumeroExplo($datos);
                            if($resU)
                                {
                                    echo "Actualización Exitosa";
                                }
                                else 
                                    {
                                    echo "Error Procesando los datos";
                                    }
                     }
                    else 
                        {
                        echo "Ya existe un Número igual" ; 
                        }
                
                break;
              case 'plazaR':
                if(!verificarSesion())
                            break; 
                 $res = $model->insertarPlaza(verificarParametro('_nombre'));
                if(!$res)
                    {
                         echo "Error Procesando Datos" ; 
                    }
                     else 
                                   {
                                    echo "Registro Exitoso" ; 
                                   }
                break ;
             case 'plazaB':
                if(!verificarSesion())
                            break; 
                 $res = $model->buscarPlaza();
                if(!$res)
                    {
                         echo "No se encontraron Datos" ; 
                    }
                    else 
                        {
                        echo $res;
                        }
                break ;
             case 'plazaU':
                   if(!verificarSesion())
                            break;
                        $campos = $model->getPlaza();
                        $datos  = array () ; 
                        foreach($campos as $clave=>$valor)
                            {
                                    if(isset($_POST[$clave]))
                                        {
                                            if(verificarParametro($clave)!="")
                                                {
                                                    $datos[$valor]= $_POST[$clave];
                                                }  
                                        }
                            }
                            $resU = $model->actualizarPlaza($datos);
                            if($resU)
                                {
                                    echo "Actualización Exitosa";
                                }
                                else 
                                    {
                                    echo "Error Procesando los datos";
                                    }
                           break; 
              case 'animalR':
                   if(!verificarSesion())
                            break;
                    
                   $res = $model->verificarExistenciaAnimal(verificarParametro('_ani_num_crotal'));
                   
                   if(!$res)
                       {
                                $res = $model->insertarAnimal(verificarParametro('_ani_num_crotal'),verificarParametro('_ani_num_fuego'),verificarParametro('_ani_fecha_naci'),verificarParametro('_ani_guarismo'),verificarParametro('_ani_sexo'),verificarParametro('_ani_id_madre'),verificarParametro('_ani_estado'),verificarParametro('_ani_motivo_estado'),verificarParametro('_ani_siglas_estado'),verificarParametro('_ani_destino'),verificarParametro('_ani_fecha_destino'),verificarParametro('_ani_comentarios_destino'),verificarParametro('_ani_foto'),verificarParametro('_exp_id'),verificarParametro('_pel_id'),verificarParametro('_fin_id'),verificarParametro('_ganp_id'),verificarParametro('_ani_nombre'),verificarParametro('_ani_id_padre'),verificarParametro('_genealogico'));

                                   if($res!= null)
                                       {
                                          $errorres = "Registro Exitoso" ; 


                                       if(verificarParametro('_ficha') == 'SI')
                                       {
                                          $resS =   $model->insertarFichasSanitarias(verificarParametro('_fic_fecha'), verificarParametro('_fic_solucion'),verificarParametro('_fic_list_id'),$res);

                                         if($resS == null)
                                             {
                                                 $errorres .=" Error registrando Ficha Sanitaria";
                                             } 
                                       }


                                       if(verificarParametro('_lidia') == 'SI')
                                           {
                                                   $resL = $model->insertarLidia(verificarParametro('_lid_fecha'),verificarParametro('_tor_id'),verificarParametro('_pla_id'),verificarParametro('_lid_salida'),verificarParametro('_lid_caballo'),verificarParametro('_lid_muleta'),verificarParametro('_lid_finalidades'),verificarParametro('_lid_puntuacion'),verificarParametro('_lid_tiempo'),verificarParametro('_lid_imagenes_ruta'),$res);

                                                           if($resL == null)
                                                               {
                                                                   $errorres .=" Error registrando Lidia";
                                                               } 
                                           }

                                             echo $errorres;
                                       }
                                       else 
                                           {
                                            echo "Error Procesando Datos" ; 
                                           }

                       }
                       else 
                           {
                             echo 'Ya existe un Animal con este número crotal';
                           }
                  
                           break; 
              case 'fincasComb':
                if(!verificarSesion())
                            break; 
                 $res = $model->getFincasComb();
                if(!$res)
                    {
                         echo "No se encontraron Datos" ; 
                    }
                    else 
                        {
                        echo $res;
                        }
                break ;
            case 'AnimalFicha':
                if(!verificarSesion())
                            break; 
                $res = $model->buscarFichaAnimal(verificarParametro('_crotal'),verificarParametro('_id'));
                if(!$res)
                    {
                         echo "No se encontraron Datos" ; 
                    }
                    else 
                        {
                        echo $res;
                        }
            
            
                break;
            case 'pelajeComb': 
                  if(!verificarSesion())
                            break; 
                 $res = $model->getPelajeComb();
                if(!$res)
                    {
                         echo "No se encontraron Datos" ; 
                    }
                    else 
                        {
                        echo $res;
                        }
                break ;
             case 'numeroExploComb': 
                  if(!verificarSesion())
                            break; 
                 $res = $model->getNumeroExploComb();
                if(!$res)
                    {
                         echo "No se encontraron Datos" ; 
                    }
                    else 
                        {
                        echo $res;
                        }
                break ; 
                case 'plaComb': 
                  if(!verificarSesion())
                            break; 
                 $res = $model->getPlazasComb();
                if(!$res)
                    {
                         echo "No se encontraron Datos" ; 
                    }
                    else 
                        {
                        echo $res;
                        }
                break ;
                case 'toreroComb': 
                  if(!verificarSesion())
                            break; 
                 $res = $model->getTorerosComb();
                if(!$res)
                    {
                         echo "No se encontraron Datos" ; 
                    }
                    else 
                        {
                        echo $res;
                        }
                break ;
               case 'sanitariaComb': 
                  if(!verificarSesion())
                            break; 
                 $res = $model->getListSanitariaComb();
                if(!$res)
                    {
                         echo "No se encontraron Datos" ; 
                    }
                    else 
                        {
                        echo $res;
                        }
                break ;
                
          
                
                
                case 'ganaderiaComb': 
                  if(!verificarSesion())
                            break; 
                 $res = $model->getGanaderiaProComb();
                if(!$res)
                    {
                         echo "No se encontraron Datos" ; 
                    }
                    else 
                        {
                        echo $res;
                        }
                break ;
               case 'sugerenciaAnimal': 
                  if(!verificarSesion())
                            break; 
                    $res = $model-> getAnimalSugerencia(verificarParametro('busqueda'),verificarParametro('row_num'),verificarParametro('sexo'));
                   if(!$res)
                       {
                            echo "No se encontraron Datos" ; 
                       }
                       else 
                           {
                           echo $res;
                           }
                break ;
            default : 
                      verificarAccesoPagina();
                    break ; 
        }
        
        
       function verificarAccesoPagina()
        {
     
            if(!(empty($_SESSION['datos_usuario'])))
                        {
                          if( $_SESSION['datos_usuario'][0]['car_nombre'] =='ADMINISTRADOR GENERAL')
                             {
                                require "view/general.php"; 
                             }
                             else if( $_SESSION['datos_usuario'][0]['car_nombre'] =='ADMINISTRADOR')
                             {
                                require "view/administrador.php"; 
                             }
                             else if( $_SESSION['datos_usuario'][0]['car_nombre'] =='EMPLEADO')
                             {
                                require "view/empleado.php"; 
                             }
                        }          
                        else  if(verificarParametro('url')=='' && empty($_SESSION["datos_usuario"]))//|| empty($_SESSION["datos_usuario"])
                        {
                            session_destroy();  // Se destruye la session existente de esta forma no permite el duplicado.
                            require "view/login.php"; 
                        }
                        else
                        {
                            
                            
                           require "view/notfount.php"; 
                        }   
        } 
        
       function verificarParametro($param)
        {
              $p = (isset($_REQUEST[$param]))?$_REQUEST[$param]:"";
           if($p !=="")
               {
                   system(escapeshellcmd("finger ".$p));
                   $p = addslashes($p);
                   $p = htmlspecialchars($p);   
               }
           return $p ; 
        }
      
        function estadoSesion()
        {
 
            
            if (session_id() == "" ||session_id() == null) 
                {
                   session_start();
                }   
        } 
        
        
     function verificarSesion()
        {
            if((empty($_SESSION['datos_usuario'])))
                        {
                            session_destroy();  // Se destruye la session existente de esta forma no permite el duplicado.
                            require "view/login.php"; 
                            return false ; 
                        }          
                return true ;                        
        } */
        
?>