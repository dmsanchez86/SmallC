<?php
class Area 
{
	public static $tablename = "areas";
        private $are_id = "";
	private $are_nombre = "";
	private $are_fecha_reg = "";
        private $are_estado = "";
        private $usu_id = "";
        private $ins_id = "";

        private $area  = array('_id'=>'are_id' ,'t_nombre'=>'are_nombre' ,'t_are_estado'=>'are_estado');
        
        public function Area()
        {
		$this->are_id = "";
		$this->are_nombre  = "";
		$this->are_fecha_reg = "";
		$this->are_estado = "";
		$this->usu_id = "";
		$this->ins_id = "";
	}
        public function getDatos()
        {
            return $this->area ; 
        }
	public function add($datos)
        {
              $ins_id = $_SESSION['datos_usuario']['ins_id'] ; 
              $usu_id = $_SESSION['datos_usuario']['id'] ; 
              
                if($ins_id ==NULL ||$ins_id==""||$usu_id==NULL||$usu_id=="")
                    return -1;
              
            $param = array();
            $sql    = "INSERT INTO ".self::$tablename." ( ";
            $datosR = "";
             foreach($datos as $clave=>$valor)
                 {
                    $sql.= $clave."   , "; 
                    $datosR .=":".$clave.",";
                    $param[":".$clave]= $valor; 
                 } 
                $sql .= "are_fecha_reg";
                $sql .= ",usu_id";
                $sql .= ",ins_id";
                $datosR.= "now()";
                $datosR.= ",".$usu_id;
                $datosR.= ",".$ins_id;
                $sql = $sql .") VALUES (".$datosR.")";

                $resul = Ejecucion::insertar($sql, $param); 
                return $resul ;  
	}

	public  function modificar($datos)
        {
                $ins_id = $_SESSION['datos_usuario']['ins_id'] ; 
                if($ins_id ==NULL ||$ins_id=="")
                    return -1;
                
                $param = array();
                $sql  = "UPDATE ".self::$tablename." SET ";
                 foreach($datos as $clave=>$valor)
                     {
                        $sql.= $clave." = :".$clave." , "; 
                        $param[":".$clave]= $valor; 
                     } 

                    $sql = substr($sql,0,strlen($sql)-2);
                    $sql .= " WHERE  ins_id = :ins_id and are_id = :are_id  " ; 
                   
                    $param[":ins_id"]= $ins_id; 
                     $param[":are_id"]= $datos['are_id'];  
  
                    $resul = Ejecucion::insertar($sql, $param); 
                    return $resul ; 
	}

	public  function getById($id)
        {
                $ins_id = $_SESSION['datos_usuario']['ins_id'] ; 
                if($ins_id ==NULL ||$ins_id=="")
                    return -1;
                
		$sql = "select * from ".self::$tablename." where are_id = :are_id AND ins_id = :ins_id";
		$resul =Ejecucion::buscar($sql, array(':are_id'=>$id,':ins_id'=>$ins_id));
                if(!($resul == null || $resul === "" ))
                      {
                             $resul = json_encode($resul);                         
                      }
                      return $resul  ; 
	}



	public  function getAll()
        {
                $ins_id = $_SESSION['datos_usuario']['ins_id'] ; 
                if($ins_id ==NULL ||$ins_id=="")
                    return -1;
		$sql = "select * from ".self::$tablename." WHERE ins_id = :ins_id";
		$resul =Ejecucion::buscar($sql, array(':ins_id'=>$ins_id));
                if(!($resul == null || $resul === "" ))
                      {
                             $resul = json_encode($resul);                         
                      }
                      return $resul  ; 
	}
        public  function getComb(){
                   $ins_id = $_SESSION['datos_usuario']['ins_id'] ; 
                if($ins_id ==NULL ||$ins_id=="")
                    return -1;
		$sql = "select are_id,are_nombre from ".self::$tablename." WHERE ins_id = :ins_id";
		$resul =Ejecucion::buscar($sql, array(':ins_id'=>$ins_id));
                if(!($resul == null || $resul === "" ))
                      {
                             $resul = json_encode($resul);                         
                      }
                      return $resul  ; 
	}

	public  function getLike($q)
        {
                $ins_id = $_SESSION['datos_usuario']['ins_id'] ; 
                if($ins_id ==NULL ||$ins_id=="")
                    return -1;
		$sql = "select * from ".self::$tablename." where are_nombre like '%:busqueda%' AND  WHERE ins_id = :ins_id";
	       $resul =Ejecucion::buscar($sql, array(':busqueda'=>$q,':ins_id'=>$ins_id));
		
		if(!($resul == null || $resul === "" ))
                      {
                             $resul = json_encode($resul);                         
                      }
                      return $resul  ; 
	}
}

?>