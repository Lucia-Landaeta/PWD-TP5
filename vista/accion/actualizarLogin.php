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
unset($datos['seg']);
$abmUs = new AbmUsuario();
$abmR = new AbmRol();
$abmUR = new AbmUsuarioRol();
$objUs = NULL;
$arrayRoles=array();
if (isset($datos['idUsuario'])) {
    $listaUs = $abmUs->buscar($datos);
    if ($listaUs) {
        $objUs = $listaUs[0];
        $userRol = $abmUR->buscar(["idUsuario"=>$objUs['idUsuario']]);
        if ($userRol) {
            foreach ($userRol as $obj) {
                array_push($arrayRoles, $obj['idRol']);
            }
        }
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <div class="card border p-1 rounded shadow p-4">
                <h4 class="title m-0">Actualizar Sesión</h4>
                <hr>
                <?php
                if ($objUs != null) { ?>
                    <form id="actualizarLog" name="actualizarLog" method="POST" action="accionLogin.php" data-toggle="validator" novalidate>
                        <div class="row mb-3">
                            <div class="col-sm-5 m-2">
                                <div class="form-group">
                                    <label>ID</label><br />
                                    <input class="form-control" id="idUsuario:" readonly name="idUsuario" type="text" value=<?=$objUs['idUsuario']?>>
                                </div>
                            </div>
                            <div class="col-sm-5 m-2">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input class="form-control" id="usNombre" type="text" name="usNombre" value=<?=$objUs['usNombre']?> required>
                                </div>
                            </div>
                        <div class="row mb-3">
                            <div class="col-sm-5 m-2">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" id="usMail" name="usMail" value=<?=$objUs['usMail']?> required>
                                </div>
                            </div>
                            <div class="col-sm-5 m-2">
                                <label>Roles del usuario</label>
                                    <?php
                                    $rolesDisp = $abmR->buscar(array());
                                    if ($rolesDisp) {
                                        echo '<div class="form-group">
                                                <div class="input-group">';
                                        foreach ($rolesDisp as $rol) {
                                            $checked = "";
                                            if (in_array($rol['idRol'], $arrayRoles)) {
                                                $checked = "checked";
                                            }
                                            echo '<label class="form-check-label ms-1 me-2 fw-light">
                                            <input class="form-check-input" type="checkbox" id="roles" name="roles[]" value="' . $rol['idRol'] . '" ' . $checked . ' required> ' . $rol['descripcionRol'].'
                                            </label>';
                                        }
                                        echo '</div>
                                            </div>
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