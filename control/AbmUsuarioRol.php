<?php
class AbmUsuarioRol{
    /**
     * @param array $param
     */
    public function alta($param)
    {
        $resp = false;
        $modOrm = new ModOrm();
        $objUR = $modOrm::factory('UsuarioRol')->create();
        $objUR->set($param);
        if ($objUR->save()) {
            $resp = true;
        }
        return $resp;
    }

    public function bajaRoles($param){
        $resp = false;
        $modOrm = new ModOrm();
        $arrObjUR = $modOrm::factory('UsuarioRol')->where('idRol', $param['idRol'])->find_result_set();
        if($arrObjUR){
            $arrObjUR->delete_many();
            $resp = true;
        }
        return $resp;
    }

    public function bajaUsuarios($param){
        $resp = false;
        $modOrm = new ModOrm();
        $arrObjUR = $modOrm::factory('UsuarioRol')->where('idUsuario', $param['idUsuario'])->find_result_set();
        if($arrObjUR){
            $arrObjUR->delete_many();
            $resp = true;
        }
        return $resp;
    }

    public function bajaUR($param){
        $resp = false;
        $modOrm = new ModOrm();
        $arrObjUR = $modOrm::factory('UsuarioRol')->where($param)->find_one();
        if($arrObjUR->delete()){
            $resp = true;
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
            $objPersona = $modOrm::factory('UsuarioRol')->find_result_set();
        }else{
            $objPersona = $modOrm::factory('UsuarioRol')->where($param)->find_result_set();
        }
        foreach($objPersona as $obj){
            array_push($result, $obj->as_array());
        }
        return $result;
    }

}
