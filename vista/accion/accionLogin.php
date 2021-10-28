<?php
include_once("../../configuracion.php");
include_once("../estructura/header.php");
$datos = data_submitted();
$seg = false;
if(isset($datos["accion"])){
    if($datos["accion"] == "seg"){
        $seg = true;
    }
    unset($datos["accion"]);
}
$respRol=false;
$abmUs = new AbmUsuario();
$abmUR = new AbmUsuarioRol();
$roles = null;
if (isset($datos['idUsuario'])) {
    $userRol = $abmUR->buscar(["idUsuario" => $datos["idUsuario"]]);
    $arrRoles = array();
    $objUs = $abmUs->buscar(["idUsuario" => $datos["idUsuario"]]);
    $datos["usPass"] = $objUs[0]['usPass'];
    $datos["usDeshabilitado"] = $objUs[0]['usDeshabilitado'];
    if(isset($datos["roles"])){
        $roles = $datos["roles"];
        unset($datos["roles"]);
    } 
    $resp = $abmUs->modificacion($datos);
    if ($resp || !is_null($roles)) {
        if ($userRol) {
            foreach ($userRol as $rol) {
                array_push($arrRoles, $rol['idRol']);
            }
            foreach ($arrRoles as $idRol) {
                if (!in_array($idRol, $roles)) {
                    $abmUR->bajaUR(['idUsuario' => $datos['idUsuario'], 'idRol' => $idRol]);
                    $respRol=true;
                }
            }
        }
        if (!is_null($roles)) {
            foreach ($roles as $idRol) {
                if (!in_array($idRol, $arrRoles)) {
                    $abmUR->alta(['idUsuario' => $datos['idUsuario'], 'idRol' => $idRol]);
                    $respRol=true;
                }
            }
        }
    }
    if ($resp || $respRol) {
        $mensaje = "La modificación se realizo correctamente.";
    } else{
        $mensaje = "La modificación no pudo concretarse.";
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="card border p-1 rounded shadow p-4">
                <?php
                echo $mensaje;
                if ($seg) { ?>
                    <a href="../ejercicios/paginaSegura.php"><button type="button" class="btn btn-outline-primary mt-3">Volver</button></a>
                <?php } else { ?>
                    <a href="../ejercicios/listarUsuarios.php"><button type="button" class="btn btn-outline-primary mt-3">Volver</button></a>
                <?php }
                ?>
            </div>
        </div>
    </div>
</div>
<html>
<?php
include_once("../../vista/estructura/footer.php");
?>
