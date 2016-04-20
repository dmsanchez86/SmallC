<?php
class Calendario 
{
            public static $tablename = "calendarios_academicos";
            private $aca_id= "";
            private $aca_nombre= "";
            private $aca_fecha_reg= "NOW()";
            private $usu_id= "";
            private $ins_id= "";
            private $aca_periodo= "";
            private $aca_pri_fecha_inicio= "";
            private $aca_pri_fecha_fin= "";
            private $aca_sec_fecha_inicio= "";
            private $aca_sec_fecha_fin= "";
            private $aca_ter_fecha_inicio= "";
            private $aca_ter_fecha_fin= "";
            private $aca_cua_fecha_inicio= "";
            private $aca_cua_fecha_fin ="";

        private $calendario  = array('_id'=>'aca_id' ,'t_ano'=>'aca_periodo' ,
            't_fecha_ini'=>'aca_fecha_inicio','t_fecha_fin'=>'aca_fecha_fin',
            't_fecha_p1'=>'aca_pri_fecha_inicio','t_fecha_p1_'=>'aca_pri_fecha_fin','t_por_p1'=>'aca_pri_por',
            't_fecha_p2'=>'aca_sec_fecha_inicio','t_fecha_p2_'=>'aca_sec_fecha_fin','t_por_p2'=>'aca_seg_por',
            't_fecha_p3'=>'aca_ter_fecha_inicio','t_fecha_p3_'=>'aca_sec_fecha_fin','t_por_p3'=>'aca_ter_por',
            't_fecha_p4'=>'aca_cua_fecha_inicio','t_fecha_p4_'=>'aca_sec_fecha_fin','t_por_p4'=>'aca_cua_por');


        
        public function Calendario()
        {
		$this->aca_id= "";
                $this->aca_nombre= "";
                $this->aca_fecha_reg= "";
                $this->usu_id= "";
                $this->ins_id= "";
                $this->aca_periodo= "";
                $this->aca_pri_fecha_inicio= "";
                $this->aca_pri_fecha_fin= "";
                $this->aca_sec_fecha_inicio= "";
                $this->aca_sec_fecha_fin= "";
                $this->aca_ter_fecha_inicio= "";
                $this->aca_ter_fecha_fin= "";
                $this->aca_cua_fecha_inicio= "";
                $this->aca_cua_fecha_fin ="";
	}
        public function getDatos()
        {
            return $this->calendario ; 
        }
	public function add($datos)
        {
            $ins_id = $_SESSION['datos_usuario']['ins_id'] ; 
            $usu_id = $_SESSION['datos_usuario']['id'] ;   
            $param = array();
            $sql    = "INSERT INTO ".self::$tablename." ( ";
            $datosR = "";
             foreach($datos as $clave=>$valor)
                 {
                    $sql.= $clave."   , "; 
                    $datosR .=":".$clave.",";
                    $param[":".$clave]= $valor; 
                 } 
                $sql .= "aca_fecha_reg";//substr($sql,0,strlen($sql)-2);
                $sql .= ",usu_id";
                $sql .= ",ins_id";
                $datosR.= "now()";//substr($datosR,0,strlen($datosR)-2);
                $datosR.= ",".$usu_id;
                $datosR.= ",".$ins_id;
                $sql = $sql .") VALUES (".$datosR.")";

                $resul = Ejecucion::insertar($sql, $param); 
                return $resul ;  
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
                    $sql .= " WHERE aca_id = :aca_id AND ins_id = :ins_id" ; 
                    $param[":ins_id"]= $ins_id; 
                    $param[":aca_id"]= $id;   
                    $param[":table"]= self::$tablename; 
                    $resul = Ejecucion::insertar($sql, $param); 
                    return $resul ;   
	}

	public  function getById($id)
        {
                 $ins_id = $_SESSION['datos_usuario']['ins_id'] ; 
                if($ins_id ==NULL ||$ins_id=="")
                    return -1;
		$sql = "select * from ".self::$tablename." where cal_id = :cal_id AND ins_id = :ins_id ";
		$resul =Ejecucion::buscar($sql, array(':cal_id'=>$id,':ins_id'=>$ins_id));
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


	public  function getLike($q)
        {
                 $ins_id = $_SESSION['datos_usuario']['ins_id'] ; 
                if($ins_id ==NULL ||$ins_id=="")
                    return -1;
		$sql = "select * from ".self::$tablename." where cal_id like '%:busqueda%' AND ins_id = :ins_id";
		$resul =Ejecucion::buscar($sql, array(':busqueda'=>$q,':ins_id'=>$ins_id));
		
		if(!($resul == null || $resul === "" ))
                      {
                             $resul = json_encode($resul);                         
                      }
                      return $resul  ; 
	}
}

?>