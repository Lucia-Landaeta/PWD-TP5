<?php
class Rol
{
    //Atributos de clase
    /** 
     * @var int $idRol
     * @var string $descripcionRol
     */

    private $idRol;
    private $descripcionRol;
    private $mensajeoperacion;

    /** Constructor de la clase */
    public function __construct()
    {
        $this->idRol = 0;
        $this->descripcionRol = "";
    }

    /** 
     * Setea un on objeto
     * @param array
     */
    public function setear($datos)
    {
        $this->setIdRol($datos["idRol"]);
        $this->setDescripcionRol($datos["descripcionRol"]);
    }

    //METODOS DE ACCESO
    //Retornan el valor de los atributos de la clase 
    /** @return int */
    public function getIdRol()
    {
        return $this->idRol;
    }
    /** @return string*/
    public function getDescripcionRol()
    {
        return $this->descripcionRol;
    }
    /** @return string  */
    public function getMensajeOperacion()
    {
        return $this->mensajeoperacion;
    }

    //Modifican los atributos de clase
    /** @param int $idR */
    public function setIdRol($idR)
    {
        $this->idRol = $idR;
    }
    /** @param string $desc */
    public function setDescripcionRol($desc)
    {
        $this->descripcionRol = $desc;
    }
    /** @param string $menaje */
    public function setMensajeOperacion($menaje)
    {
        $this->mensajeoperacion = $menaje;
    }

    public function cargar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM rol WHERE idRol = " . $this->getIdRol();
        // echo "<br>CONSULTA ".$sql."<br>";
        if ($base->Iniciar()) {
            // echo"Entro al INICIAR<br>";
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    // echo"Encontro registro <br>";
                    $row = $base->Registro();
                    $this->setear(["idRol" => $row["idRol"], "descripcionRol" => $row["descripcionRol"]]);
                    $resp=true;
                }
            }
        } else {
            $this->setmensajeoperacion( $base->getError());
        }
        // if($resp){
        //     echo"True";
        // }else{
        //     echo"False";
        // }
        return $resp;
    }

    /**
     * Inserta una funcion en la BD
     * @return boolean 
     */
    public function insertar()
    {
        /**
         * @var object $base
         * @var boolean $resp
         * @var string $sql
         */
        $base = new BaseDatos();
        $resp = false;
        $sql = "INSERT INTO rol (descripcionRol) 
				VALUES (" . "'" . $this->getDescripcionRol() . "')";
                //echo"<br> Consulta insertar ".$sql;
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setIdRol($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion($base->getError());
            }
        } else {
            $this->setmensajeoperacion($base->getError());
        }
        return $resp;
    }

    /**
     * Realiza una modificacion de un registro de la BD
     * @return boolean 
     */
    public function modificar()
    {
        /**
         * @var boolean $resp
         * @var object $base
         * @var string $sql
         */
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE rol SET descripcionRol='" . $this->getDescripcionRol() ."' WHERE idRol=" .  $this->getIdRol();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp =  true;
            } else {
                $this->setmensajeoperacion($base->getError());
            }
        } else {
            $this->setmensajeoperacion($base->getError());
        }
        return $resp;
    }

    /**
     * Elimina un registro de la BD
     * @return boolean 
     */
    public function eliminar()
    {
        /**
         * @var object $base
         * @var boolean $resp
         * @var string $sql
         */
        $base = new BaseDatos();
        $resp = false;
        $sql = "DELETE FROM rol WHERE idRol='"  . $this->getIdRol()."'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp =  true;
            } else {
                $this->setmensajeoperacion($base->getError());
            }
        } else {
            $this->setmensajeoperacion($base->getError());
        }
        return $resp;
    }


    /**
     * Retorna un array de funciones que cumplan con una determinada condicion
     * @param string 
     * @return array
     */
    public static function listar($condicion = "")
    {
        /**
         * @var string $sql
         * @var object $base
         * @var array $arrR
         */
        $arrR = array();
        $base = new BaseDatos();
        $sql = "Select * from rol";
        if ($condicion != "") {
            $sql = $sql . ' where ' . $condicion;
        }
        $sql .= " order by idRol ";
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    while ($row = $base->Registro()) {
                        $obj = new Rol();
                        $obj->setear(["idRol" => $row["idRol"], "descripcionRol" => $row["descripcionRol"]]);
                        array_push($arrR, $obj);
                    }
                }
            } else {
                $this->setmensajeoperacion($base->getError());
            }
        } else {
            $this->setmensajeoperacion($base->getError());
        }
        return $arrR;
    }
}
