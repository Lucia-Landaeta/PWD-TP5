<?php 
include_once '../../configuracion.php';

echo"<br> TEST <br>";
$obj = new Rol();
$obj->setear(["idRol"=>'', "descripcionRol"=>"Administrador"]);

if($obj->insertar()){
    echo "<br> El registro se inserto correctamente";
    verEstructura($obj);
}else 
    echo "<br>".$obj->getmensajeoperacion();

// ---------------------------------------
echo"MODIFICAR DESCRIPCION<br>";
$obj->setDescripcionRol("Operario");
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
$obj=new Rol();
$obj->setIdRol(1);
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
$arr=$obj->listar("idRol=7");
foreach($arr as $a){
    verEstructura($a);
}
?>