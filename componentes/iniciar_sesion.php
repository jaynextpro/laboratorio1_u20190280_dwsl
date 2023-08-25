<?php 
    include "usuarios.php";
    session_start();

    if(isset($_POST["login"])) {
        if(verificar_usuario($usuarios, $_POST["codigo_o_email"], $_POST["password"]) == false) {
            $_SESSION["noticia"] = "Datos incorrectos";

            header("Location: ../index.php");
        } else {
            $_SESSION["noticia"] = "Ha iniciado session correctamente";
            $_SESSION["usuario_sesion_id"] = verificar_usuario($usuarios, $_POST["codigo_o_email"], $_POST["password"])["id"];

            header("Location: ../vistas/inicio.php");
        }
    }
?>