<?php 
    session_start();
    
    $_SESSION["noticia"] = "Se modifico el usuario mentalmente";

    header("Location: ../vistas/inicio.php");
?>