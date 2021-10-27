<?php
date_default_timezone_set('America/Araguaina');
include_once("../../configuracion.php");
$datos = data_submitted();
if ($datos["seg"] == "true") {
    include_once("../estructura/headerSeg.php");
} else {
    include_once("../estructura/header.php");
}
$abmUs = new AbmUsuario();
$objUs = NULL;
//  print_r($datos);
if (isset($datos['idUsuario'])) {
    $lista = $abmUs->buscar(['idUsuario' => $datos['idUsuario']]);
    if ($lista) {
        $objUs = $lista[0];
        /*$datos["usNombre"] = $objUs->getUsNombre();
        $datos["usPass"] = $objUs->getUsPass();
        $datos["usMail"] = $objUs->getUsMail();*/
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="card border p-1 rounded shadow p-4">
                <h4>Borrar sesión</h4>
                <?php

                if ($objUs != null) {
                    $objUs["usDeshabilitado"] = date('Y-m-d H:i:s');
                    $exito = $abmUs->modificacion($objUs);
                } else {
                    echo "La persona ingresada no se encontro";
                ?>

                <?php }
                if ($exito) {
                    echo "El borrado se hizo con exito";
                } else {
                    echo "no se pudo realizar el borrado";
                }
                ?>
                <?php
                if ($datos["seg"] == "true") { ?>
                    <a href="../ejercicios/paginaSegura.php"><button type="button" class="btn btn-outline-primary mt-3">Volver</button></a>
                <?php } else { ?>
                    <a href="../ejercicios/listarUsuarios.php"><button type="button" class="btn btn-outline-primary mt-3">Volver</button></a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php
include_once("../../vista/estructura/footer.php");
?>