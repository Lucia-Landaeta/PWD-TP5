<?php 
include_once '../../configuracion.php';
date_default_timezone_set('America/Araguaina');
echo"<br> TEST <br>";
$obj = new Usuario();
$obj->setear(["idUsuario"=>'', "usNombre" => "Dilan.P", "usPass" => 1568, "usMail" => "D.P@mail.com", "usDeshabilitado" => NULL]);

if($obj->insertar()){
    echo "<br> El registro se inserto correctamente";
    verEstructura($obj);
}else 
    echo "<br>".$obj->getmensajeoperacion();

// ---------------------------------------
echo"MODIFICAR US-DESHABILITADO<br>";
// $unixTime = time();
// $timeZone = new \DateTimeZone('America/Araguaina');
// $desha = new \DateTime();
// $desha->setTimestamp($unixTime)->setTimezone($timeZone);

// $obj->setUsDeshabilitado($desha->format('Y/m/d H:i:s'));
$desh=date('Y-m-d H:i:s');
$obj->setUsDeshabilitado($desh);
// echo $desh;
verEstructura($obj);
// --------------------------------------------
echo"MODIFICAR CONTRASEÑA<br>";
$obj->setUsPass(333333);
verEstructura($obj);
// --------------------------------------
if($obj->modificar()){
    echo "<br> El registro se actualizo correctamente";
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
$obj=new Usuario();
$obj->setIdUsuario(43);
if($obj->cargar()){
     echo "<br> El registro se recupero correctamente";
     verEstructura($obj);
}else
    echo "<br>".$obj->getmensajeoperacion();
// ---------------------------------------------
echo"LISTAR USUARIOS";
$arr=$obj->listar(null);
foreach($arr as $a){
    verEstructura($a);
}
echo"LISTAR Usuario";
$arr=$obj->listar("idUsuario=65");
foreach($arr as $a){
    verEstructura($a);
}
?>