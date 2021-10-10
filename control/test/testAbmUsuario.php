<?php
include_once("../../configuracion.php");

$abm = new AbmUsuario();
$pass=md5("jv3333");
$datos = ["usNombre" => "Jose.V","usPass"=>$pass,"usMail"=>"J.V@mail.com"];
echo"TEST ABM USUARIO<br>";
echo "<br>* ALTA *";
if ($abm->alta($datos)) {
    echo "<br>Alta exitosa<br>";
    //verEstructura($obj);
} else
    echo"<br>ERROR en el alta";
    // echo "<br>" . $obj->getmensajeoperacion();

// $datos = ["idUsuario"=>18,"usNombre" => "Raul.S","usPass"=>5555,"usMail"=>"R.S@mail.com","usDeshabilitado"=>NULL];
// $datos = ["idUsuario"=>19,"usNombre" => "Sonia.J","usPass"=>4321,"usMail"=>"S.J@mail.com","usDeshabilitado"=>NULL];
// echo "<br>* MODIFICACION *";
// if ($abm->modificacion($datos)) {
//     echo "<br> Modificacion exitosa<br>";
// } else{
//     echo "<br>Hubo un error<br>";
// }

// echo "<br>* BUSCAR *";
// $lista = $abm->buscar(null);
// if (count($lista) > 0) {
//     $obj = $lista[0];
//     echo "<br>Elemento encontrado";
//     verEstructura($obj);
// }else{
//     echo"<br>ERROR";
// }

// echo "* BAJA *";
// if ($abm->baja($datos)) {
//     echo "<br> Baja exitosa<br>";
//     //verEstructura($obj);
// } else
//     echo"<br>NO SE PUDO DAR DE BAJA";
    // echo "<br>" . $obj->getmensajeoperacion();
