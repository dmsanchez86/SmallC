<?php

class Conexion
{
	private $server     = "";
	private $user       = "";
	private $password   = "";
	private $database   = "";
        private $dsn        = "" ;
        const CON_SEL       = '1'; 
        const CON_MOD       = '2';
        const CON_JSON      = '3';
        const CON_SELENCAB  = '4';

	function conexion($server, $user, $password, $database)
	{
		$this->server   = $server;
		$this->user     = $user;
		$this->password = $password;
		$this->database = $database;
                $this->dsn      =  "mysql:dbname=".$this->database.";host=".$this->server;
	}

	function conectarBD()
	{
            try
            {
                $mysqli = new PDO($this->dsn , $this->user, $this->password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING  ));
            }
             catch (PDOException $e)
            {
                 $mysqli  = null; 
                 $e->getMessage();
            }	
		return $mysqli;    
	}

        private function  conSeleccion($sql , $datos)
     	{
     		$mysqli  = $this->conectarBD();
                $mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                if($mysqli != null)
                    { 
                        try
                       {
                           if($datos !==  NULL)
                               {
                               $stmt = $mysqli->prepare($sql); 
                                 foreach($datos as $param => $value)
                                    {
                                            if (is_int($value) || ctype_digit($value))
                                            {
                                                    $value = intval($value);
                                                    $type = PDO::PARAM_INT;

                                            } elseif ($value === NULL) {

                                                    $type = PDO::PARAM_NULL;

                                            } else {

                                                    $type = PDO::PARAM_STR;
                                            }

                                            if (is_int($param) || ctype_digit($param))
                                            {
                                                    $param++;
                                            }

                                            $stmt->bindValue($param, $value, $type);
                                    }
                                $stmt->execute();
                                $this->res = $stmt->fetchAll(); 
                               }
                               else
                                   {
                                        $stmt = $mysqli->prepare($sql);
                                        $stmt->execute();
                                        $this->res = $stmt->fetchAll();
                                   }
                           
                           if (!$stmt) 
                               {
                                       print_r($mysqli->errorInfo());
                               }
                       }  
                       catch (PDOException $e)
                       {
                          $e->getMessage();     
                       } 
                    }

                return $this->res;                   
        }
      
        
                             
       private function  conSeleccionEncabezado($sql,$datos)
     	{
     		$mysqli  = $this->conectarBD();

                 try
                       {  
                           $stmt = $mysqli->prepare($sql);
                           $stmt->setFetchMode(PDO::FETCH_BOTH);
                           
                           if($datos !==  NULL)
                               {
                                 $stmt->execute($datos);
                               }
                               else
                                   {
                                   $stmt->execute();
                                   }
                           if ($stmt) 
                               {
                                    $datos = '';
                                    $array= array(); 
                                    $raw_column_data =  $stmt;
                                    $encabezado = true ; 
                                     foreach($raw_column_data as $outer_key => $array_)
                                     { 
                                         if($encabezado)
                                             {
                                                foreach($array_ as $inner_key => $value)
                                                  { 
                                                      $encabezado = false ; 
                                                      if (!is_numeric($inner_key))
                                                      { 
                                                          $datos[]=  $inner_key; 
                                                      } 
                                                  } 
                                             }
                                           array_push($array, $array_);
                                     }
                                     array_unshift($array, $datos);
                                    
                                     $this->res = $array;
                                     return  $this->res = $array; 
                               }
                               else 
                                {
                                   print_r($mysqli->errorInfo());
                                }    
                       }  
                       catch (PDOException $e)
                       {
                          $e->getMessage();     
                       } 
             return null ;                           
        }
        
      

        private function  conModificacion ($sql,$datos)
		{
		   $mysqli  = $this->conectarBD();
                   try
                       {  
                           $stmt = $mysqli->prepare($sql);
                           $stmt->setFetchMode(PDO::FETCH_BOTH);

                          if($datos !==  NULL)
                               {
                              
                                    foreach($datos as $param => $value)
                                    {
                                            if (is_int($value) || ctype_digit($value))
                                            {
                                                    $value = intval($value);
                                                    $type = PDO::PARAM_INT;

                                            } elseif ($value === NULL) {

                                                    $type = PDO::PARAM_NULL;

                                            } else {

                                                    $type = PDO::PARAM_STR;
                                            }

                                            if (is_int($param) || ctype_digit($param))
                                            {
                                                    $param++;
                                            }

                                            $stmt->bindValue($param, $value, $type);
                                    }
                              
                              
                              
                                 $stmt->execute();
                               }
                               else
                                   {
                                   $stmt->execute();
                                   }
                           if ($stmt) 
                               {
                                    ob_start();
                                    $stmt->debugDumpParams();
                                    $r = ob_get_contents();
                                    ob_end_clean(); 
                               
                               
                                      $id = $mysqli->lastInsertId();

                                      return $id ; 
                               }
                               else 
                                {
                                   $mysqli->errorInfo();
                                }    
                       }  
                       catch (PDOException $e)
                       {
                          $e->getMessage();   
                          return null ; 
                       }      
		}
		
		public function ejecutarConsulta($sql,$tipo,$datos)
		{ 

		        switch($tipo)
		        {
				       case '1':
					         $this->res = $this->conSeleccion($sql,$datos);

                                                    break;
				       case '2':
				                  $this->res =  $this->conModificacion($sql,$datos);
				                  break;
                                       case '3':
				                 $this->res = $this->json($sql,$datos);
				                  break;
                                              
                                       case '4':
				                 $this->res = $this->conSeleccionEncabezado($sql,$datos);
				                  break;      
                                              
				}
            return $this->res;
		}





	     public function procedimiento ($nombre,$arra1,$arra2)
	       {
	             $mysqli  = $this->conectarBD();
	                    mysqli_query($mysqli,"call ".$nombre."(".$arra1.",".$arra2.");")or die("Error");
	                    $res = mysqli_query($this->mysqli,"select".$arra2);

	                    while($dato = mysqli_fetch_array($res,MYSQLI_NUM))
	                    {
	                        foreach($dato as $valor )
	                        {

	                             $dato[] = $valor;

	                        }
	                       return $dato;
	                    }         
	                       
	        }
				                         
                        	
			
                 public function json($sql,$datos)
                {
                        $mysqli  = $this->conectarBD(); 
                        $mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                       try
                       {  
                           $stmt = $mysqli->prepare($sql);
                           $stmt->setFetchMode(PDO::FETCH_NUM);

                           if($datos !==  NULL)
                               {
                                        foreach($datos as $param => $value)
                                            {
                                                    if (is_int($value) || ctype_digit($value))
                                                    {
                                                            $value = intval($value);
                                                            $type = PDO::PARAM_INT;

                                                    } elseif ($value === NULL) {

                                                            $type = PDO::PARAM_NULL;

                                                    } else {

                                                            $type = PDO::PARAM_STR;
                                                    }

                                                    if (is_int($param) || ctype_digit($param))
                                                    {
                                                            $param++;
                                                    }

                                                    $stmt->bindValue($param, $value, $type);
                                            }
                               
                               
                                 $stmt->execute();
                               }
                               else
                                   {
                                   $stmt->execute();
                                   }
                           if ($stmt) 
                               {
                               $arreglo= []; 
                                     foreach($stmt as $outer_key => $array_)
                                     { 
                                       
                                           array_push($arreglo, $array_);
                                     }
   
                                       return $arreglo;      
                               }
                               else 
                                {
                                   $mysqli->errorInfo();
                                   return null ; 
                                } 
                                  
                       }  
                       catch (PDOException $e)
                       {
                          $e->getMessage();   
                          return null ; 
                       }   
                }
                
 
                
                
                
                       
}



?>