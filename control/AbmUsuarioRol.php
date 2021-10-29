<?php
class AbmUsuarioRol{
    /**
     * @param array $param
     */
    public function alta($param)
    {
        $resp = false;
        $modOrm = new ModOrm();
        $objUR = $modOrm::for_table('usuariorol')->create();
        $objUR->set($param);
        if ($objUR->save()) {
            $resp = true;
        }
        return $resp;
    }

    public function bajaRoles($param){
        $resp = false;
        $modOrm = new ModOrm();
        $arrObjUR = $modOrm::for_table('usuariorol')->where('idRol', $param['idRol'])->find_result_set();
        if($arrObjUR){
            $arrObjUR->delete_many();
            $resp = true;
        }
        return $resp;
    }

    public function bajaUsuarios($param){
        $resp = false;
        $modOrm = new ModOrm();
        $arrObjUR = $modOrm::for_table('usuariorol')->where('idUsuario', $param['idUsuario'])->find_result_set();
        if($arrObjUR){
            $arrObjUR->delete_many();
            $resp = true;
        }
        return $resp;
    }

    public function bajaUR($param){
        $resp = false;
        $modOrm = new ModOrm();
        $arrObjUR = $modOrm::for_table('usuariorol')->where($param)->find_one();
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
            $objPersona = $modOrm::for_table('usuariorol')->find_result_set();
        }else{
            $objPersona = $modOrm::for_table('usuariorol')->where($param)->find_result_set();
        }
        foreach($objPersona as $obj){
            array_push($result, $obj->as_array());
        }
        return $result;
    }

}
