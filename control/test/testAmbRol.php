<?php
include_once("../../configuracion.php");

$abm = new AbmRol();
$datos = ["descripcionRol" => "Contable"];

echo "* ALTA *";
if ($abm->alta($datos)) {
    echo "<br>Alta exitosa<br>";
    //verEstructura($obj);
} else
    echo "<br>" . $obj->getmensajeoperacion();

$datos = ["idRol"=>9,"descripcionRol" => "Contador"];
echo "<br>* MODIFICACION *";
if ($abm->modificacion($datos)) {
    echo "<br> Modificacion exitosa<br>";
} else{
    echo "<br>Hubo un error<br>";
}

echo "<br>* BUSCAR *";
$lista = $abm->buscar($datos);
if (count($lista) == 1) {
    $obj = $lista[0];
    echo "<br>Elemento encontrado";
    verEstructura($obj);
}else{
    echo"<br>ERROR";
}

echo "* BAJA *";
if ($abm->baja($datos)) {
    echo "<br> Baja exitosa<br>";
    //verEstructura($obj);
} else
    echo"<br>NO SE PUDO DAR DE BAJA";
    // echo "<br>" . $obj->getmensajeoperacion();
