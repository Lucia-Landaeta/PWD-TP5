<?php
include_once "../../configuracion.php";

$sess=new Session();
?>

<html>
    <head></head>
    <body>
        <?php  
    // if($sess->activa()){
        // echo"Entro";
        // if($sess->iniciar($_SESSION["usNombre"],$_SESSION["usPass"])){
        if($sess->iniciar($_POST["usNombre"],$_POST["usPass"])){
            echo"<b>Bienvenido usuario: </b>".$sess->getUsuario()->getUsNombre();
            if(count($sess->getRol())>0){
                foreach($sess->getRol() as $r){
                    echo" - ROL: ".$r->getDescripcionRol()."<br>";
                }                
            }else{
                echo " No hay rol<br>";
            }
            if($sess->activa()){
                echo"La sesion esta activa!!!";
            }
            ?>
            
            <br><a href="cerrarSesion.php"> <button>Cerrar Sesión</button> </a>
            <?php
        }else{
            echo"Usuario no valido";
            ?>
            <a href="formLogin.php"> <button>iniciar Sesion</button> </a>
            <?php
        }
    // }else{
    //     echo"NO Hay una sesion activa";
    // }
        ?>
        </br>
        </br>
       
    </body>
</html>
