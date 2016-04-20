<?php
class SistemaM{

	public  $tableUsuarios         = "usuarios";
  public  $tableInstutiociones   = "instuciones";
  public  $tableTiposUsuarios    = "tipos_usuarios";

  public function SistemaM(){}
     
  public function inicioSesion($identificacion , $contrasena){
          
    if($identificacion === "" || $contrasena === ""){
      return false ;  
    }else {
      $res =  $this->consultarUsuario($identificacion,$contrasena);
      return $res ; 
    }
  }
                
                
                
  public  function getTiposUsuarios(){
    $sql = "select * from ".self::$tableTiposUsuarios;
    $resul = Ejecucion::buscar($sql, array());

    if(!($resul == null || $resul === "" )){
      $resul = json_encode($resul);                         
    }
    
    return $resul  ; 
	}
        
        
        
  private function consultarUsuario($identificacion,$contrasena){  
    $sql  = "
      SELECT DISTINCT u.usu_id id ,u.usu_nombre nombre ,u.usu_apellido1 apellido1,u.usu_apellido2 apellido2,tip.tip_nombre , u.ins_id,inst.ins_imagen
      FROM usuarios u 
      INNER JOIN tipos_usuarios tip ON tip.tip_id = u.tip_id
      INNER JOIN instituciones  inst ON inst.ins_id = u.ins_id AND inst.est_ins_id = 1
      WHERE u.est_id = 1 
      AND   u.usu_contrasena = SHA(:contrasena)
      AND   u.usu_identificacion = :identificacion";   
    
    $resul = Ejecucion::buscar($sql, array(':contrasena'=>$contrasena ,':identificacion'=>$identificacion ));
            
    if($resul == null && $resul != 0 ){
      return false;                  
    }else {
      return $resul[0];                        
    }	
	}
        public function getDiasFestivos()
                {
                    $sql  = "SELECT GROUP_CONCAT(dia_fecha SEPARATOR ',')  FROM dias_festivos;";   
                    $resul =Ejecucion::buscarJ($sql, array());
                    array_push($resul,[$this->getDateSer()]);
                    $js = ""; 
                    if( $resul != "")
                        {
                           $l = $resul[0];
                           $js= json_encode($resul);
                        }
                    return $js;	  
                }
        
        private function  getDateSer()
        {
            return date("Y-m-d"); 
        }  
        
       
        
        
        
        
        
        
}


?>