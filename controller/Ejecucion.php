<?php
require  'Configuracion.php';
require  'Conexion.php';
class Ejecucion 
{ 
      // public  $readConfig = new Configuracion() ; 
        protected static $configuracion ; 
        private   static $server ;
        private   static $user ;
        private   static $pass ;
        private   static $database ; 
        private   static $dirImagenes ; 
        private   static $conexion ;

     /* public function Ejecucion()
              {
                $this->configuracion= new Configuracion('configuracion.ini');
                $this->server      = $this->configuracion->getLlave("mysql_access", "host");
                $this->user        = $this->configuracion->getLlave("mysql_access", "user");
                $this->pass        = $this->configuracion->getLlave("mysql_access", "pass");
                $this->database    = $this->configuracion->getLlave("mysql_access", "database"); 
                $this->conexion    = new conexion($this->server,$this->user,$this->pass,$this->database);
                $this->dirImagenes = $this->configuracion->getLlave("mysql_access", "images"); 
                $this->cadenaDatos = "" ;
              }  
         public function cerrar()
              {
                $this->conexion = null ; 
              }  
              
    public   function buscar($sql,$datos)
        {
		$resul =$this->conexion->ejecutarConsulta($sql,  Conexion::CON_SEL, $datos);
		return $resul;
	}
    public  function insertar($sql,$datos)
        {
		$resul =$this->conexion->ejecutarConsulta($sql,  Conexion::CON_MOD, $datos);
		return $resul;
	}*/
        
    public static function buscar($sql,$datos)
        {
                $configuracion= new Configuracion('configuracion.ini');
                $server      = $configuracion->getLlave("mysql_access", "host");
                $user        = $configuracion->getLlave("mysql_access", "user");
                $pass        = $configuracion->getLlave("mysql_access", "pass");
                $database    = $configuracion->getLlave("mysql_access", "database"); 
                $conexion    = new conexion($server,$user,$pass,$database);
                $dirImagenes = $configuracion->getLlave("mysql_access", "images"); 
                $cadenaDatos = "" ;
		$resul =$conexion->ejecutarConsulta($sql,  Conexion::CON_SEL, $datos);
                $conexion=null;
		return $resul;
	}
         public static function buscarJ($sql,$datos)
        {
                $configuracion= new Configuracion('configuracion.ini');
                $server      = $configuracion->getLlave("mysql_access", "host");
                $user        = $configuracion->getLlave("mysql_access", "user");
                $pass        = $configuracion->getLlave("mysql_access", "pass");
                $database    = $configuracion->getLlave("mysql_access", "database"); 
                $conexion    = new conexion($server,$user,$pass,$database);
                $dirImagenes = $configuracion->getLlave("mysql_access", "images"); 
                $cadenaDatos = "" ;
		$resul =$conexion->ejecutarConsulta($sql,  Conexion::CON_JSON, $datos);
                $conexion=null;
		return $resul;
	}
    public static function insertar($sql,$datos)
        {      
                $configuracion= new Configuracion('configuracion.ini');
                $server      = $configuracion->getLlave("mysql_access", "host");
                $user        = $configuracion->getLlave("mysql_access", "user");
                $pass        = $configuracion->getLlave("mysql_access", "pass");
                $database    = $configuracion->getLlave("mysql_access", "database"); 
                $conexion    = new conexion($server,$user,$pass,$database);
                $dirImagenes = $configuracion->getLlave("mysql_access", "images"); 
                $cadenaDatos = "" ;
		$resul =$conexion->ejecutarConsulta($sql,  Conexion::CON_MOD, $datos);
                $conexion = null ; 
		return $resul;
	}
}
?>