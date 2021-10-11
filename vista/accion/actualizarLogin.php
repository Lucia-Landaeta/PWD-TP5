<?php
include_once("../../configuracion.php");

$datos = data_submitted();
if ($datos["seg"] == "true") {
    include_once("../estructura/headerSeg.php");
    $var = "seg";
} else {
    include_once("../estructura/header.php");
    $var = "noSeg";
}
$abmUs = new AbmUsuario();
$abmR = new AbmRol();
$abmUR = new AbmUsuarioRol();
$objUs = NULL;
$arrayRoles=array();
if (isset($datos['idUsuario'])) {
    $listaUs = $abmUs->buscar($datos);
    if (count($listaUs) > 0) {
        $objUs = $listaUs[0];

        $userRol = $abmUR->buscar(["idUsuario"=>$objUs->getIdUsuario()]);
        if (count($userRol) > 0) {
            foreach ($userRol as $obj) {
                array_push($arrayRoles, $obj->getObjRol()->getIdRol());
            }
        }
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-5">
            <div class="card border p-1 rounded shadow p-4">
                <h4 class="title m-0">Actualizar Sesión</h4>
                <hr>
                <?php
                if ($objUs != null) { ?>
                    <form id="actualizarLog" name="actualizarLog" method="POST" action="accionLogin.php" data-toggle="validator" novalidate>
                        <div class="row mb-3">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label>ID</label><br />
                                    <input class="form-control" style="width: 200px" id="idUsuario:" readonly name="idUsuario" type="text" value="<?php echo $objUs->getIdusuario() ?>"><br />
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <textarea class="form-control" id="usNombre" name="usNombre" cols="25" rows="1"><?php echo $objUs->getUsNombre() ?></textarea><br />
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label>Email</label>
                                    <textarea class="form-control" id="usMail" name="usMail" cols="25" rows="1"><?php echo $objUs->getusMail() ?></textarea><br />
                                </div>
                            </div>
                            <div class="row pe-2">
                            <label>Roles del usuario</label>
                                <?php
                                $rolesDisp = $abmR->buscar(null);
                                if (count($rolesDisp) != 0) {
                                    echo '<div class="col-md-6">
                                            <div class="form-group">';
                                    foreach ($rolesDisp as $rol) {
                                        $checked = "";
                                        if (in_array($rol->getIdRol(), $arrayRoles)) {
                                            $checked = "checked";
                                        }
                                        echo '<div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="roles" name="roles[]" value="' . $rol->getIdRol() . '" ' . $checked . '> ' . $rol->getDescripcionRol() . '
                                            </div>';
                                    }
                                    echo '</div>
                                        </div>';
                                }
                                ?>
                            </div>
                        </div>
                        <input id="accion" name="accion" value="<?php echo $var ?>" type="hidden">
                        <div class="row mb-2">
                            <div class="d-grid gap-2 d-md-flex ">
                                <button class="btn btn-primary me-md-2" type="submit">Guardar</button>
                            </div>
                        </div>
                    </form>
                <?php
                } else {
                    echo "La persona ingresada no se encontro";
                ?>
                    <a href="paginaSegura.php"><button type="button" class="btn btn-outline-primary mt-3">Volver</button></a>
                <?php }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
include_once("../../vista/estructura/footer.php");
?>