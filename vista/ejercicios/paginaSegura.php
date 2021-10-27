<?php
include_once("../../configuracion.php");
include_once("../estructura/headerSeg.php");

$colR = $objSess->getRol();

$abmUs = new AbmUsuario();
$colUsuarios = $abmUs->buscar(array());
?>

<div class="container">
    <div class="row">
        <div class="col-md-7">
            <div class="card border rounded shadow p-3">
                <h2>Lista de usuarios</h2><br>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($colUsuarios) > 0) {
                            foreach ($colUsuarios as $us) {
                                // if ($us['usDeshabilitado'] == NUll || $us['usDeshabilitado'] == "0000-00-00 00:00:00") {
                        ?>
                                <tr>
                                    <td><?php echo $us['idUsuario'] ?></td>
                                    <td><?php echo $us['usNombre'] ?></td>
                                    <td><?php echo $us['usMail'] ?></td>
                                    <td>
                                        <?php
                                        $edit=false;
                                    foreach($colR as $objR){
                                        if (($objR['descripcionRol'] == "Administracion" || $objR['descripcionRol'] == "Editor")&& !$edit && ($us['usDeshabilitado'] == NUll || $us['usDeshabilitado'] == "0000-00-00 00:00:00")) { ?>
                                            <a class="btn btn-success" href="../accion/actualizarLogin.php?idUsuario=<?php echo $us['idUsuario'] ?>&seg=true">editar</a>
                                        <?php $edit=true;} ?>
                                        <?php if ($objR['descripcionRol'] == "Administracion" && ($us['usDeshabilitado'] == NUll || $us['usDeshabilitado'] == "0000-00-00 00:00:00")) { ?>
                                            <a class="btn btn-warning" href="../accion/eliminarLogin.php?idUsuario=<?php echo $us['idUsuario'] ?>&seg=true">borrar</a>
                                        <?php } ?>
                                        <?php if ($objR['descripcionRol'] == "Administracion" && !($us['usDeshabilitado'] == NUll || $us['usDeshabilitado'] == "0000-00-00 00:00:00")) { ?>
                                            <a class="btn btn-info" href="../accion/habilitarLogin.php?idUsuario=<?php echo $us['idUsuario'] ?>&seg=true">habilitar</a>
                                        <?php }
                                        }
                                        ?>
                                    </td>
                                </tr>

                        <?php
                            }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-4">
            <p>
            </p>
        </div>
    </div>
</div>
<?php
include_once("../estructura/footer.php");
?>