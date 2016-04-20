<?php
class Log 
{

        public static $tablename = "log";
        public  $bd ;
        private $log_id ;
	private $log_fecha ;
	private $log_tabla ;
	private $usu_id ;
	private $log_campo_valor ;
        private $ins_id ;
	private $reg_id;
        private $usu_contrasena ;
        private $usu_identificacion ;
        private $usu_id_reg;

public function __construct()
        {
        $this->bd ;
        $this->log_id = "";
	$this->log_fecha = "NOW()";
	$this->log_tabla = "";
	$this->usu_id = "";
	$this->log_campo_valor = "";
        $this->ins_id = "";
	$this->reg_id = "NOW()";
        $this->usu_contrasena = "";
        $this->usu_identificacion = "";
        $this->usu_id_reg = "";
        }	
 
}