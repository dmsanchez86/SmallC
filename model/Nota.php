<?php
class Nota 
{
	public  $tablename = "not_asig_cal_alum";
        public  $bd ;
        
        private $not_id = "";
	private $not_fecha_reg = "NOW()";
	private $not_docente_id = "";
        private $not_alumno_id = "";
        private $not_val = "";
        private $cal_id = "";
        private $ins_id = "";
        private $not_observaciones = "";
        
        
        private $nota  = array('_id'=>'not_id' ,'t_alumno_id'=>'not_alumno_id' ,'t_val'=>'not_val','t_cal_id'=> 'cal_id','t_observaciones'=> 'not_observaciones');
        
        public function Nota($bd)
        {
		$this->not_id = "";
		$this->not_fecha_reg = "NOW()";
		$this->not_docente_id = "";
		$this->not_alumno_id = "";
		$this->not_val = "";
                $this->cal_id = "";
		$this->ins_id = "";
                $this->not_observaciones = ""; 
                $this->bd     = $bd;
	}
        public function getDatos()
        {
            return $this->nota ; 
        }
	public function add()
        {
              $ins_id = $_SESSION['datos_usuario'][0]['ins_id'] ; 
              $usu_id = $_SESSION['datos_usuario'][0]['usu_id'] ; 
                if($ins_id ==NULL ||$ins_id==""||$usu_id==NULL||$usu_id=="")
                    return -1;
          $sql = "INSERT INTO :table 
                    (   not_fecha_reg,
                        not_docente_id,
                        not_alumno_id,
                        not_val,
                        cal_id,
                        ins_id,
                        not_observaciones)
                    VALUES
                    (
                        :not_fecha_reg,
                        :not_docente_id,
                        :not_alumno_id,
                        :not_val,
                        :cal_id,
                        :ins_id,
                        :not_observaciones
                    );";
		
		return Ejecucion::insertar($sql,
                        array(
                                ':table'=>self::$tablename,
                                ':not_fecha_reg'=>$this->not_fecha_reg,
                                ':not_docente_id'=>$usu_id,
                                ':not_alumno_id'=>$this->not_alumno_id ,
                                ':not_val'=>$this->not_val,
                                ':cal_id'=>$this->cal_id,
                                ':ins_id'=>$ins_id,
                                ':not_observaciones'=>$this->not_observaciones
                             )); 
	}

	public  function modificar($id,$datos)
        {
                $ins_id = $_SESSION['datos_usuario'][0]['ins_id'] ; 
                if($ins_id ==NULL ||$ins_id=="")
                    return -1;
                $param = array();
                $sql  = "UPDATE :table SET ";
                 foreach($datos as $clave=>$valor)
                     {
                        $sql.= $clave." = :".$clave." , "; 
                        $param[":".$clave]= $valor; 
                     } 

                    $sql = substr($sql,0,strlen($sql)-2);
                    $sql .= " WHERE not_id = :not_id AND ins_id = :ins_id" ; 

                    $param[":not_id"]= $id; 
                    $param[":ins_id"]= $ins_id; 
                    $param[":table"]= self::$tablename; 
                    $resul = Ejecucion::insertar($sql, $param); 
                    return $resul ;   
	}

	public  function getById($id)
        {
		$sql = "select * from ".self::$tablename." where not_id = :not_id ";
		$resul =Ejecucion::buscar($sql, array('not_id'=>$id));
                if(!($resul == null || $resul === "" ))
                      {
                             $resul = json_encode($resul);                         
                      }
                      return $resul  ; 
	}



	public  function getAll(){
		$sql = "select * from ".self::$tablename;
		$resul =Ejecucion::buscar($sql, array());
                if(!($resul == null || $resul === "" ))
                      {
                             $resul = json_encode($resul);                         
                      }
                      return $resul  ; 
	}


	public  function getLike($q)
        {
		$sql = "select * from ".self::$tablename." where not_id like '%:busqueda%'";
	        $resul =Ejecucion::buscar($sql, array(':busqueda'=>$q));
		
		if(!($resul == null || $resul === "" ))
                      {
                             $resul = json_encode($resul);                         
                      }
                      return $resul  ; 
	}
}

?>