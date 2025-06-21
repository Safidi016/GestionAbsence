<?php

require_once "header.php";
if(deleteClasse($_GET["id"])){
    $_SESSION["message"] = "La classe a était bien supprimer";
    if($_SESSION["type"] == "admin"){
        header("Location: classe.php");
        exit();
    }
    else{
        header("Location: absences.php");
        exit();
    }
}
?>


 