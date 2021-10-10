<?php 
include_once '../../configuracion.php';

echo"<br> TEST <br>";
$objU = new Usuario();
$objU->setear(["idUsuario"=>'1', "usNombre" => "LA", "usPass" => 4321, "usMail" => "la@mail.com", "usDeshabilitado" => NULL]);
$objR = new Rol();
$objR->setear(["idRol"=>'2', "descripcionRol"=>"Administrador"]);

$obj=new UsuarioRol();
$obj->setear(["objUsuario"=>$objU,"objRol"=>$objR]);

if($obj->insertar()){
    echo "<br> El registro se inserto correctamente";
    verEstructura($obj);
}else 
    echo "<br>".$obj->getmensajeoperacion();

// ------------------------------------------------  
if($obj->eliminar())
     echo "<br> El registro se elimino correctamente<br>";
else
    echo "<br>".$obj->getmensajeoperacion();

// ----------------------------------------------
echo"<br> RECUPERAR REGISTRO ";
$obj=new UsuarioRol();
$objU = new Usuario();
$objR = new Rol();
$objR->setIdRol(1);
$objU->setIdUsuario(1);

$obj->setObjUsuario($objU);
$obj->setObjRol($objR);
if($obj->cargar()){
     echo "<br> El registro se recupero correctamente";
     verEstructura($obj);
}else
    echo "<br>".$obj->getmensajeoperacion();
// ---------------------------------------------
echo"LISTAR USUARIOS-ROL";
$arr=$obj->listar(null);
foreach($arr as $a){
    verEstructura($a);
}
echo"LISTAR Usuario-Rol";
$arr=$obj->listar("idUsuario=1");
foreach($arr as $a){
    verEstructura($a);
}
?>