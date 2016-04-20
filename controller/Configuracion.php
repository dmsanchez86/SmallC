<?php
class Configuracion
{
	private $file;
	
	public function __construct($file)
        {
		$this->file = $file;
	}
	
	public function getLlave($grupo, $llave)
        {				
		$ini = parse_ini_file($this->file, true);
		return $ini[$grupo][$llave];
	}
}

	

             