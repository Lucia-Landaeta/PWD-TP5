<?php
class AbmUsuarioRol{
    /**
     * @param array $param
     */
    public function alta($param)
    {
        $resp = false;
        $DB = new DB();
        $objUR = $DB::factory('UsuarioRol')->create();
        $objUR->set($param);
        if ($objUR->save()) {
            $resp = true;
        }
        return $resp;
    }

    public function bajaRoles($param){
        $resp = false;
        $DB = new DB();
        $arrObjUR = $DB::factory('UsuarioRol')->where('idRol', $param['idRol'])->find_result_set();
        if($arrObjUR){
            $arrObjUR->delete_many();
            $resp = true;
        }
        return $resp;
    }

    public function bajaUsuarios($param){
        $resp = false;
        $DB = new DB();
        $arrObjUR = $DB::factory('UsuarioRol')->where('idUsuario', $param['idUsuario'])->find_result_set();
        if($arrObjUR){
            $arrObjUR->delete_many();
            $resp = true;
        }
        return $resp;
    }

    public function bajaUR($param){
        $resp = false;
        $DB = new DB();
        $arrObjUR = $DB::factory('UsuarioRol')->where($param)->find_one();
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
        $DB = new DB();
        if(!$param){
            $objPersona = $DB::factory('UsuarioRol')->find_result_set();
        }else{
            $objPersona = $DB::factory('UsuarioRol')->where($param)->find_result_set();
        }
        foreach($objPersona as $obj){
            array_push($result, $obj->as_array());
        }
        return $result;
    }

}
