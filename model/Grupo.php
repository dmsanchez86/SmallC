<?php
class Grupo 
{
  public static $tablename = "grupos";
  public $gru_id= "";
  public $gru_nombre= "";
  public $gru_fecha_reg= "now()";
  public $usu_reg_id= "6";
  public $ins_id= "";
  public $gru_estado= "Activo";
  public $cal_id= "0";
  public $grupo   = array('_id'=>'gru_id' ,'t_nombre'=>'gru_nombre' ,'t_ins_id'=>'ins_id','t_cal_id'=> 'cal_id');
      
  public function Grupo()
  {
      $this->gru_id= "";
      $this->gru_nombre= "";
      $this->gru_fecha_reg= "NOW()";
      $this->usu_reg_id= "";
      $this->ins_id= "";
      $this->gru_estado= "";
      $this->cal_id= "";
  }

  public function getDatos()
  {
    return $this->usuario ; 
  }

	public function add($nombre_grupo)
  {

    $ins_id = $_SESSION['datos_usuario'][0]['ins_id']; 
    $usu_id = $_SESSION['datos_usuario'][0]['id']; 

		$sql = "INSERT INTO grupos
                    (
                        gru_id,
                        gru_nombre,
                        gru_fecha_reg,
                        usu_reg_id,
                        ins_id,
                        gru_estado,
                        cal_id
                    )
                       VALUES
                       (NULL,
                        '$nombre_grupo',
                        now(),
                        $usu_id,
                        $ins_id, 
                        'activo',
                        0)";
		
		return Ejecucion::insertar($sql,array());       
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
      $sql .= " WHERE gru_id = :gru_id AND ins_id = :ins_id" ; 
      $param[":gru_id"]= $id; 
      $param[":ins_id"]= $ins_id; 
      $param[":table"]= self::$tablename; 
      $resul = Ejecucion::insertar($sql, $param); 
      return $resul ;                 
  }

	public  function getById($id)
  {
		$sql = "select * from ".self::$tablename." where gru_id = :gru_id ";
		$resul =Ejecucion::buscar($sql, array('gru_id'=>$id));
    if(!($resul == null || $resul === "" ))
    {
       $resul = json_encode($resul);                         
    }
    return $resul; 
	}
        
	public  function getAll()
  {
		$sql = "select * from ".self::$tablename;
		$resul =Ejecucion::buscar($sql, array());
    if(!($resul == null || $resul === "" ))
    {
           $resul = json_encode($resul);                         
    }
    return $resul; 
	}


	public  function getLike($q)
        {
		$sql = "select * from ".self::$tablename." where gru_nombre  like '%:busqueda%'";
		$resul =Ejecucion::buscar($sql, array(':busqueda'=>$q));
		
		if(!($resul == null || $resul === "" ))
                      {
                             $resul = json_encode($resul);                         
                      }
                      return $resul; 
	}
}
?>