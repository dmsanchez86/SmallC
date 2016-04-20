<?php
class Usuario
{
    public static $tablename = "usuarios";
    private $usu_id = "";
    private $usu_nombre = "";
    private $usu_pellido1 = "";
    private $usu_pellido2 = "";
    private $est_id = "";
    private $tip_id = "";
    private $usu_fecha_reg = "NOW()";
    private $usu_contrasena = "";
    private $usu_identificacion = "";
    private $usu_id_reg = "";
    private $ins_id = "";
    private $usuario = array('_id' => 'usu_id', 't_nombre_usuario' => 'usu_nombre', 't_apellido_1' => 'usu_apellido1', 't_apellido_2' => 'usu_apellido2', 't_estado' => 'est_id', 't_tipo' => 'tip_id', 't_identificacion' => 'usu_identificacion', 't_ins' => 'ins_id');
    
    
    public function Usuario()
    {
        $this->usu_id             = "";
        $this->usu_nombre         = "";
        $this->usu_pellido1       = "";
        $this->usu_pellido2       = "";
        $this->est_id             = "";
        $this->tip_id             = "";
        $this->usu_fecha_reg      = "NOW()";
        $this->usu_contrasena     = "";
        $this->usu_identificacion = "";
        $this->usu_id_reg         = "";
        $this->ins_id             = "";
    }
    public function getDatos()
    {
        return $this->usuario;
    }
    public function add($datos)
    {
        $usu_id = $_SESSION['datos_usuario']['id'];
        $param  = array();
        $sql    = "INSERT INTO " . self::$tablename . " ( ";
        $datosR = "";
        foreach ($datos as $clave => $valor) {
            $sql .= $clave . "   , ";
            $datosR .= ":" . $clave . ",";
            $param[":" . $clave] = $valor;
        }
        $sql .= "usu_fecha_reg"; //substr($sql,0,strlen($sql)-2);
        $sql .= ",usu_id_reg";
        $sql .= ",usu_contrasena";
        $sql .= ",est_id";
        $datosR .= "now()"; //substr($datosR,0,strlen($datosR)-2);
        $datosR .= "," . $usu_id;
        $datosR .= ",SHA(1234)";
        $datosR .= ",1";
        $sql = $sql . ") VALUES (" . $datosR . ")";
        
        $resul = Ejecucion::insertar($sql, $param);
        return $resul;
    }
    
    public function modificar($datos)
    {
        $param = array();
        $sql   = "UPDATE " . self::$tablename . " SET ";
        foreach ($datos as $clave => $valor) {
            $sql .= $clave . " = :" . $clave . " , ";
            $param[":" . $clave] = $valor;
        }
        
        $sql = substr($sql, 0, strlen($sql) - 2);
        $sql .= " WHERE usu_id = :usu_id ";
        
        
        
        $resul = Ejecucion::insertar($sql, $param);
        return $resul;
    }
    
    public function getById($id)
    {
        $sql   = "select * from " . self::$tablename . " where usu_id = :usu_id ";
        $resul = Ejecucion::buscar($sql, array(
            'usu_id' => $id
        ));
        if (!($resul == null || $resul === "")) {
            $resul = json_encode($resul);
        }
        return $resul;
    }
    
    public function getAll()
    {
        $sql   = "SELECT us.usu_identificacion,us.usu_nombre,us.usu_apellido1,us.usu_apellido2,est.est_id,est.est_nombre,tip.tip_id,tip.tip_nombre,ins.ins_id,ins.ins_nombre,us.usu_id
                        FROM " . self::$tablename . " us
                        INNER JOIN tipos_usuarios tip ON tip.tip_id = us.tip_id
                        INNER JOIN estados_usuarios est ON est.est_id = us.est_id
                        INNER JOIN instituciones ins ON ins.ins_id = us.ins_id
                        WHERE us.usu_id != 1";

        $resul = Ejecucion::buscar($sql, array());
        if (!($resul == null || $resul === "")) {
            $resul = json_encode($resul);
        }
        return $resul;
    }

    public function getAlumnos($grupo_id)
    {
        if($grupo_id != "")
        {
            $sql = "SELECT * from estudiante_grupo estgrup
            INNER JOIN usuarios users ON users.usu_id = estgrup.id_estudiante
            WHERE  estgrup.id_grupo = $grupo_id";
        }
        else
        {
            $sql = "SELECT CONCAT(usu_id,'-',usu_nombre) nombre from usuarios where tip_id = 4";
        }
        
        $resul =Ejecucion::buscar($sql, array());
        if(!($resul == null || $resul === "" )){
            $resul = json_encode($resul);                         
        }

        return $resul; 
    }

    public function asignarAlumno($grupo, $estudiante)
    {
        $sql = "INSERT INTO estudiante_grupo(id,id_estudiante,id_grupo) VALUES (NULL,$estudiante,$grupo)";
        $l= Ejecucion::insertar($sql,array()); 
        return $l ; 
    }

    public function removeEstudianteFromGrupo($id)
    {
        $sql = "DELETE FROM estudiante_grupo WHERE id = $id";
        $l= Ejecucion::insertar($sql,array()); 
        return $l;
    }

    public function getDocentes()
    {
        $sql = "SELECT * from usuarios where tip_id = 3";
        
        $resul =Ejecucion::buscar($sql, array());
        if(!($resul == null || $resul === "" ))
        {
            $resul = json_encode($resul);                         
        }
        return $resul; 
    }

    public function asignarAsignaturaDocente($asignatura, $docente)
    {
        $sql = "INSERT INTO asignatura_docente(id,id_docente,id_asignatura) VALUES (NULL,$docente,$asignatura)";
        $l= Ejecucion::insertar($sql,array()); 
        return $l ; 
    }

    public function removerAsignaturaDocente($id)
    {
        $sql = "DELETE FROM asignatura_docente WHERE id = $id";
        $l= Ejecucion::insertar($sql,array()); 
        return $l ; 
    }
    
    public function getLike($q)
    {
        $sql   = "select * from " . self::$tablename . " where (usu_nombre || usu_identificacion ) like '%:busqueda%'";
        $resul = Ejecucion::buscar($sql, array(
            ':busqueda' => $q
        ));
        
        if (!($resul == null || $resul === "")) {
            $resul = json_encode($resul);
        }
        return $resul;
    }
    
    public function getTipos()
    {
        $sql   = "SELECT * FROM tipos_usuarios WHERE  tip_id !=1";
        $resul = Ejecucion::buscar($sql, array());
        
        if (!($resul == null || $resul === "")) {
            $resul = json_encode($resul);
        }
        return $resul;
    }
    public function getEstados()
    {
        $sql   = "SELECT * FROM estados_usuarios ";
        $resul = Ejecucion::buscar($sql, array());
        
        if (!($resul == null || $resul === "")) {
            $resul = json_encode($resul);
        }
        return $resul;
    }


    public function getSugerencia($busqueda, $row_num)
    {
        $ins_id = $_SESSION['datos_usuario']['ins_id'];
        if ($ins_id == NULL || $ins_id == "")
            return -1;
        $data  = array();
        $where = " (CONCAT(us.usu_nombre," . "' '" . ", us.usu_apellido1) LIKE :busqueda  OR us.usu_identificacion LIKE :busqueda ) AND ins_id = :ins_id AND tip_id = 3 AND est_id =1 ";

        $sql   = "SELECT us.usu_id id ,CONCAT(us.usu_nombre," . "' '" . ", us.usu_apellido1," . "' '" . ", us.usu_apellido2) nombre_completo,us.usu_identificacion identificacion FROM usuarios us";

        $sql .= " WHERE " . $where;
        
        $resultados = Ejecucion::buscar($sql, array(
            ':busqueda' => '%' . $busqueda . '%',
            ':ins_id' => intval($ins_id),
            ':cantidad' => intval($row_num)
        ));
        
        foreach ($resultados as $item => $value) {
            $items[] = array(
                'uid' => $resultados[$item]['id'],
                'username' => $resultados[$item]['nombre_completo'],
                'identificacion' => $resultados[$item]['identificacion'],
                'country' => '',
                'media' => ''
            );
        }
        if (count($resultados) < 1) {
            
            return json_encode('No se encontrarón datos');
        }
        return json_encode($items);
    }
}

?>