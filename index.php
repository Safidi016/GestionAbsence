
<?php

    require_once "header.php";

    $alerts = alertsAbsence();
    $df = calculerEtTotal();
    $dg = calculerProfTotal(); 

?>
<div class="container">

    <div class="text-center">
        <h1><i class="fa fa-graduation-cap"></i></h1>
        <h2>Gestion de presence </h2>
        <h3>2024</h3>
    </div>

    <!-- Professeur -->
    <?php if(isset($_SESSION["type"]) && $_SESSION["type"] == "professeur" ): ?>
        <div class="row text-center">
            <div class="form-group">
                <a href="etudiants.php" class="btn btn-primary btn-lg"><i class="fa fa-user-circle-o"></i> Liste des étudiants</a>
            </div>
            <div class="form-group">
                <a href="modifier_prof.php?id=<?=$_SESSION['id']?>" class="btn btn-primary btn-lg"><i class='fa fa-cog'></i> Modifier mon profil</a>
            </div>
            <!-- <div class="form-group">
                <a href="classe.php" class="btn btn-primary btn-lg"><i class="fa fa-user-circle-o"></i> Liste des classes</a>
            </div> -->
        </div>
        <div class="row text-center">
            <div class="form-group">
                <a href="absences_par_prof.php" class="btn btn-warning btn-lg"><i class="fa fa-check-circle-o"></i>Liste des absences que j'ai marqué</a>
            </div>
        </div>
        <div class="row text-center">
            <div class="form-group">
                <a href="absences.php" class="btn btn-default btn-lg"><i class="fa fa-list"></i> Les absences</a>
            </div>
        </div>
        <div class="row text-center">
            <div class="form-group">
                <a href="oldAbsences.php" class="btn btn-default btn-lg">Les anciennes absences</a>
            </div>
        </div>
        <?php include "alerts.php"; ?>
    <?php endif ?>

    <!-- Administrateur -->
    <?php if(isset($_SESSION["type"]) && $_SESSION["type"] == "admin" ): ?>
        <div class="row text-center">
            <div class="form-group">
                <a href="etudiants.php" class="btn btn-primary btn-lg"><i class="fa fa-user-circle-o"></i> Liste des étudiants</a>
            </div>
            <div class="form-group">
                <a href="classe.php" class="btn btn-primary btn-lg"><i class="fa fa-user-circle-o"></i> Liste des classes</a>
            </div>
            <div class="form-group">
                <a href="graphe.php" class="btn btn-primary btn-lg"><i ></i> Graphique</a>
            </div>
        </div>
        <div class="row text-center">
            <div class="form-group">
                <a href="absences_par_prof.php" class="btn btn-warning btn-lg"><i
                            class="fa fa-check-circle-o"></i>
                    Liste des absences que j'ai marqué</a>
            </div>
        </div>
        <div class="row text-center">
            <div class="form-group">
                <a href="absences.php" class="btn btn-default btn-lg"><i class="fa fa-list"></i> Les absences</a>
            </div>
        </div>
        <div class="row text-center">
            <div class="form-group">
                <a href="zeroAbsences.php" class="btn btn-default btn-lg">Remettre a zéro les absences</a>
            </div>
        </div>
        <div class="row text-center">
            <div class="form-group">
                <a href="oldAbsences.php" class="btn btn-default btn-lg">Les anciennes absences</a>
            </div>
        </div>

        <?php include "alerts.php"; ?>
    <?php endif ?>

    <!-- Etudiant -->
    <?php if(isset($_SESSION["type"]) && $_SESSION["type"] == "etudiant" ): ?>
        <a href="etudiant.php?id=<?=$_SESSION['id_etudiant'] ?>" class="btn btn-lg btn-primary">Mes absences</a>
    <?php endif ?>

    <?php if(isset($_SESSION["type"]) && $_SESSION["type"] == "etudiant" ): ?>
        <a href="modiferpar_etu.php?id=<?=$_SESSION['id_etudiant'] ?>" class="btn btn-sm btn-danger"><i class='fa fa-cog'></i>Modifier mon profil</a>
    <?php endif ?>

    <?php if(!isset($_SESSION["id"])) :?>
        <div class="text-center">
            <a href="login.php" class="btn btn-lg btn-primary">Se connecter</a>
            <a href="signup.php" class="btn btn-lg btn-default">S'inscrire</a>
        </div>
    <?php endif ?>

</div>

