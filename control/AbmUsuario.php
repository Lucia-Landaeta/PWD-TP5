<?php
class AbmUsuario
{
    /**
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        $param["idUsuario"]=null;
        $param["usDeshabilitado"]=null;
        $modOrm = new ModOrm();
        $objUsuario = $modOrm::for_table('usuario')->create();
        $objUsuario->set($param);
        if ($objUsuario->save()) {
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
            $modOrm = new ModOrm();
            $objUsuario = $modOrm::for_table('usuario')->find_one($param['idUsuario']);
            $abmUR = new AbmUsuarioRol();
            if($abmUR->bajaUsuarios($param)){
                if($objUsuario->delete()){
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
            $modOrm = new ModOrm();
            $objUsuario = $modOrm::for_table('usuario')->find_one($param['idUsuario']);
            $objUsuario->set($param);
            if($objUsuario->save()){
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
        $modOrm = new ModOrm();
        if(!$param){
            $objUsuario = $modOrm::for_table('usuario')->find_result_set();
        }else{
            $objUsuario = $modOrm::for_table('usuario')->where($param)->find_result_set();
        }
        foreach($objUsuario as $obj){
            array_push($result, $obj->as_array());
        }
        return $result;
    }

    private function seteadosCamposClaves($param){
        return isset($param['idUsuario']);
    }
}
