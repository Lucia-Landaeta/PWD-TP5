<?php
include_once("../../configuracion.php");

$abm = new AbmUsuarioRol();
$datos = ["idUsuario" => 2,"idRol"=>2];
echo "* TEST USUARIO-ROL *<br>";

echo "<br>* ALTA <br>*";
if ($abm->alta($datos)) {
    echo "Alta exitosa<br>";
    //verEstructura($obj);
} else
    echo "<br>" . $obj->getmensajeoperacion();

echo "<br>* BUSCAR *";
$lista = $abm->buscar($datos);
if (count($lista) == 1) {
    $obj = $lista[0];
    echo "<br>Elemento encontrado";
    verEstructura($obj);
}else{
    echo"<br>ERROR Buscar<br>";
}

echo "<br>* BAJA *";
if ($abm->baja($datos)) {
    echo "<br> Baja exitosa<br>";
    //verEstructura($obj);
} else
    echo"<br>NO SE PUDO DAR DE BAJA";
    // echo "<br>" . $obj->getmensajeoperacion();
