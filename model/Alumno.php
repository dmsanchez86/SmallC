<?php
class Institucion 
{
	     public static $tablename         = "usuarios";
        public static $alumno           = 4;
        
        private $ins_id="";
        public $ins_nombre="";

        private $usu_id="";
        public $est_ins_id="";
        private $ins_ultima_mod="";
        public $ins_imagen ="";

        private $institucion  = array('_id'=>'ins_id' ,'t_nombre'=>'ins_nombre' ,'t_estado'=>'est_ins_id','file'=>'ins_imagen');
        
        public function Institucion()
        {
		            $this->ins_id="";
                $this->ins_nombre="";
                
                $this->usu_id="";
                $this->est_ins_id="1";
                $this->ins_ultima_mod="";
                $this->ins_imagen ="";
	}
        public function getDatos()
        {
            return $this->institucion ; 
        }
	public function add()
        {
             
              $usu_id = $_SESSION['datos_usuario']['id'] ; 
               if($usu_id==NULL||$usu_id=="")
                    return -1;
          $sql = "INSERT INTO ".self::$tablename."
                    (   
                        ins_nombre,
                        ins_fecha_reg,
                        usu_id,
                        est_ins_id,
                        ins_imagen)
                    VALUES
                    (
                        :ins_nombre,
                        now(),
                        :usu_id,
                        :est_ins_id,
                        :ins_imagen
                    );";
		
		$l= Ejecucion::insertar($sql,
                        array(
                                ':ins_nombre'=>$this->ins_nombre,
                               
                                ':usu_id'=>$usu_id ,
                                ':est_ins_id'=>$this->est_ins_id,
                                ':ins_imagen'=>$this->ins_imagen
                             )); 
                return $l ; 
	}

	public  function modificar($datos)
        {    
               
                $param = array();
                $sql  = "UPDATE ".self::$tablename." SET ";
                 foreach($datos as $clave=>$valor)
                     {
                        $sql.= $clave." = :".$clave." , "; 
                        $param[":".$clave]= $valor; 
                     } 

                    $sql = substr($sql,0,strlen($sql)-2);
                    $sql .= " WHERE ins_id = :ins_id " ; 
                   
                    $param[":ins_id"]= $datos['ins_id'];  
   
                    $resul = Ejecucion::insertar($sql, $param); 
                    return $resul ;   
	}

	public  function getById($id)
        {
		$sql = "select * from ".self::$tablename." where ins_id = :ins_id ";
		$resul =Ejecucion::buscar($sql, array('ins_id'=>$id));
                if(!($resul == null || $resul === "" ))
                      {
                             $resul = json_encode($resul);                         
                      }
                      return $resul  ; 
	}



	public  function getAll(){
		$sql = "select i.ins_nombre,CONCAT('../../',i.ins_imagen),i.est_ins_id,es.est_ins_nombre,i.ins_id from ".self::$tablename." i
                         inner join estados_instituciones es on es.est_ins_id =  i.est_ins_id AND ins_id !=1";
		$resul =Ejecucion::buscar($sql, array());
                if(!($resul == null || $resul === "" ))
                      {
                             $resul = json_encode($resul);                         
                      }
                      return $resul  ; 
	}
        public  function getComboAll(){
		$sql = "select i.ins_id, i.ins_nombre from ".self::$tablename." i
                        WHERE ins_id !=1";
		$resul =Ejecucion::buscar($sql, array());
                if(!($resul == null || $resul === "" ))
                      {
                             $resul = json_encode($resul);                         
                      }
                      return $resul  ; 
	}



	public  function getLike($q)
        {
		$sql = "select * from ".self::$tablename." where ins_nombre like '%:busqueda%'";
		 $resul =Ejecucion::buscar($sql, array(':busqueda'=>$q));
		
		if(!($resul == null || $resul === "" ))
                      {
                             $resul = json_encode($resul);                         
                      }
                      return $resul  ; 
	}
        public function getEstado()
                {   
                   
                    $sql  = "SELECT DISTINCT * 
                             FROM estados_instituciones";   
                    $resul =Ejecucion::buscar($sql, array());
                    $js = "";        
                    if($resul == null || $resul === "" )
                        {
                             return $js  ;  
                        }     
                        else 
                        {
                               return   json_encode($resul);                         
                        }
                
                }
                
        
        
        public  function getAreas($q)
        {
		$sql = "SELECT ar.* FROM ".self::$tableAreas." ar  INNER JOIN instituciones ins ON ins.ins_id = :ins_id" ;
		 $resul =Ejecucion::buscar($sql, array(':ins_id'=>$q));
		
		if(!($resul == null || $resul === "" ))
                      {
                             $resul = json_encode($resul);                         
                      }
                      return $resul  ; 
	}
         public  function getAsignaturas($q)
        {
		$sql = "SELECT asig.* FROM ".self::$tableAsignaturas." asig INNER JOIN instituciones ins ON ins.ins_id = :ins_id" ;
		 $resul =Ejecucion::buscar($sql, array(':ins_id'=>$q));
		
		if(!($resul == null || $resul === "" ))
                      {
                             $resul = json_encode($resul);                         
                      }
                      return $resul  ; 
	}
         public  function getDocentes($q)
        {
		$sql = "SELECT asig.* FROM ".self::$tableUsuarios." asig INNER JOIN instituciones ins ON ins.ins_id = :ins_id WHERE tip_id = ".self::$docente ;
	        $resul =Ejecucion::buscar($sql, array(':ins_id'=>$q));
		if(!($resul == null || $resul === "" ))
                      {
                         $resul = json_encode($resul);                         
                      }
                      return $resul  ; 
	}
          public  function getAlumnos($q)
        {
		$sql = "SELECT asig.* FROM ".self::$tableUsuarios." asig INNER JOIN instituciones ins ON ins.ins_id = :ins_id WHERE tip_id = ".self::$alumno ;
	        $resul =Ejecucion::buscar($sql, array(':ins_id'=>$q));
		if(!($resul == null || $resul === "" ))
                      {
                         $resul = json_encode($resul);                         
                      }
                      return $resul  ; 
	}
        
}

?>