<?php
class AbmRol
{
    /**
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        $param["idRol"]=null;
        $param["usDeshabilitado"]=null;
        $DB = new DB();
        $objRol = $DB::factory('Rol')->create();
        $objRol->set($param);
        if ($objRol->save()) {
            $resp = true;
        }
        return $resp;
    }

    
    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $DB = new DB();
            $objRol = $DB::factory('Rol')->find_one($param['idRol']);
            $abmUR = new AbmUsuarioRol();
            if($abmUR->bajaRoles($param)){
                if($objRol->delete()){
                    $resp = true;
                }
            }
        }
        return $resp;
    }

    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $DB = new DB();
            $objRol = $DB::factory('Rol')->find_one($param['idRol']);
            $objRol->set($param);
            if($objRol->save()){
                $resp = true;
            }
        }
        return $resp;
    }

    /**
     * permite buscar un objeto
     * @param array $param
     * @return boolean
     */
    public function buscar($param){
        $result = array();
        $DB = new DB();
        if(!$param){
            $objRol = $DB::factory('Rol')->find_result_set();
        }else{
            $objRol = $DB::factory('Rol')->where($param)->find_result_set();
        }
        foreach($objRol as $obj){
            array_push($result, $obj->as_array());
        }
        return $result;
    }

    private function seteadosCamposClaves($param){
        return isset($param['idRol']);
    }
}
