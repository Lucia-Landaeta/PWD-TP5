<?php
class Session{

    /**
     * Constructor de la clase que inicia la sesión
     */
    public function __construct(){
        session_start();
    }

    /**
     * Actualiza las variables de sesión con los valores ingresados
     */
    public function iniciar($usNombre,$psw){  
        $ini=false;
        $psw=md5($psw);
        if($this->validar($usNombre,$psw)){
            $ini=true;
        }   
        return $ini;
    }

    /**
     *  Valida si la sesión actual tiene usuario y psw válidos. Devuelve true o false.
     */
    public function validar($usNombre,$psw){
        $valido=false;
        $abmUs=new AbmUsuario();
        $list = $abmUs->buscar(["usNombre" => $usNombre, "usPass" => $psw]);
        if($list){
            if($list[0]['usDeshabilitado']==NULL || $list[0]['usDeshabilitado']=="0000-00-00 00:00:00"){
                $_SESSION["idUsuario"]=$list[0]['idUsuario'];
                $valido=true;
            }            
        }
        return $valido;
    }

    /**
     * Devuelve true o false si la sesión está activa o no.
     */
    public function activa(){
        $activa=false;
        if(isset($_SESSION["idUsuario"])){
            $activa=true;
        }
        return $activa;
    }

    /**
     * Devuelve el usuario logeado
     */
    public function getUsuario(){
        $usuario=null;
        $abmUs=new AbmUsuario();
        $list=$abmUs->buscar(["idUsuario"=>$_SESSION["idUsuario"]]); 
        if($list){
            $usuario = $list[0];
        }
        return $usuario;
    }

    /**
     * Devuelve el rol del usuario logeado
     */
    public function getRol(){
        $roles=array();
        $abmUR=new AbmUsuarioRol();
        $abmR=new AbmRol();
        $uss=$this->getUsuario();
        $list = $abmUR->buscar(["idUsuario"=>$uss['idUsuario']]);
        if($list){
            foreach($list as $UR){
                $objRol = $abmR->buscar(["idRol"=>$UR['idRol']]);
                array_push($roles, $objRol[0]);
            }
        }
        return $roles;
    }


    /**
     * Cierra la sesión actual
     */
    public function cerrar(){
        $close=false;
        if(session_destroy()){
            $close=true;
        }
        return $close;
    }
}
