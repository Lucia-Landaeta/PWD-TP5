<?php
include_once("../../configuracion.php");
include_once("../estructura/header.php");
$datos = data_submitted();

$objSess = new Session();
?>
<div class="container">
	<div class="row">
		<div class="col-sm-6">
			<div class="card border p-1 rounded shadow p-4">
				<?php
				if ($objSess->iniciar($datos['usNombre'], $datos['usPass'])) {
					if (count($objSess->getRol()) > 0) {
						header('location:../ejercicios/paginaSegura.php');
						exit();
					} else {
						echo "El usuario necesita un rol para ingresar<br>";
						$objSess->cerrar();
						exit("<a href='../ejercicios/login.php'>Login</a>");
					}
				} else {
					echo"Usuario o contraseña incorrectos<br>";
					exit("<a href='../ejercicios/login.php'>Login</a>");
				}
				?>
				<a href="../ejercicios/paginaSegura.php"><button type="button" class="btn btn-outline-primary mt-3">Volver</button></a>
			</div>
		</div>
	</div>
</div>
<?php
include_once("../../vista/estructura/footer.php");
?>