<?php

require_once "header.php";
if(deleteEtudiant($_GET["id"])):
    $_SESSION["message"] = "L'etudiant a était bien supprimer";
    if($_SESSION["type"] == "admin"):
        header("Location: etudiants.php");
        exit();
    else:
        header("Location: absences.php");
        exit();
    endif;

endif;

?>


 