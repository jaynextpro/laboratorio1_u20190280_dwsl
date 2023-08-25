<?php 
    session_start();
    
    $_SESSION["noticia"] = "Se elimino el usuario mentalmente";

    header("Location: ../vistas/inicio.php");
?>