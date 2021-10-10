<?php
include_once("../../configuracion.php");
include_once("../estructura/headerSeg.php");
$datos = data_submitted();
$resp = false;
$abmP = new AbmUsuario();
if (isset($datos['accion'])) {
    if ($datos['accion'] == "editar") {
        //  echo"<br>Entro al accion<br>";
        //  print_r($datos);
        $objUs=$abmP->buscar("idUsuario=".$datos["idUsuario"]);
        $datos["usPass"]=$objUs[0]->getUsPass();
        $datos["usDeshabilitado"]=$objUs[0]->getUsDeshabilitado();
        if ($abmP->modificacion($datos)) {
            $resp = true;
        }
        if ($resp) {
            $mensaje = "La modificación se realizo correctamente.";
        } else {
            $mensaje = "La modificación no pudo concretarse.";
        }
    } 
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="card border p-1 rounded shadow p-4">
                <?php
                echo $mensaje;
                ?>
                <a href="../ejercicios/paginaSegura.php"><button type="button" class="btn btn-outline-primary mt-3">Volver</button></a>
            </div>
        </div>
    </div>
</div>
<html>
<?php
include_once("../../vista/estructura/footer.php");
?>