<!DOCTYPE html>


<meta charset="utf-8">
<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();
    require "./files/database.php";
    require "./files/functions.php";
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestion Absence</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css" >
    <link rel="stylesheet" href="./css/font-awesome.min.css" >
    <link rel="stylesheet"  href="./css/styles.css" >

    <style>
        nav .container{
            display: flex;
            justify-content: space-between;
        }

        #deconect {
            display: flex;
            align-items: center;
            text-decoration: none;
            background-color: #999999;
            padding: 15px;
            margin-top: 5px;
            border-radius: 10px;
            color: white;
        }

        #deconect:hover {
            background-color: gray;
        }

        .nom {
            background-color: orange;
            border-radius: 5px;
        }

        body.light-mode {
            background-color: #ffffff;
            color: #000000;
        }

        body.dark-mode {
            background-color: #121212;
            color: #ffffff;
        }

        .navbar.dark-mode {
            background-color: #1f1f1f !important;
        }

        #deconect.dark-mode {
            background-color: #333333;
        }

        #deconect.dark-mode:hover {
            background-color: #444444;
        }

        #theme-toggle {
            margin-left: 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top" style="background-color: black;font-size:  25px;">
    <div class="container">
        <!-- Brand -->
        <div class="navbar-header">   
            <a class="navbar-brand" href="index.php" style="font-weight: 700;font-size:30px;padding:5px 0 0 0;">
                <span style="color: white;">Ny  </span><span style="color: black;" class="nom"> Sekoliko</span>
            </a>
        </div>

        <!-- Liens -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Accueil</a></li>
                <?php if(isset($_SESSION["login"]) && $_SESSION["type"] == "admin" ): ?>
                    <li><a href="index.php"> <i class="fa fa-dashboard"></i> <b>ADMIN</b></a></li>
                <?php elseif(isset($_SESSION["type"]) && $_SESSION["type"] == "etudiant" ): ?>
                    <li><a href="etudiant.php?id=<?= $_SESSION['id_etudiant'] ?>"> <i class="fa fa-dashboard"></i> Mes absences</a></li>
                <?php elseif(isset($_SESSION["type"]) && $_SESSION["type"] == "professeur" ): ?>
                    <li><a href="index.php"> <i class="fa fa-dashboard"></i> <?= $_SESSION["nom"] ?></a></li>
                <?php endif; ?>

                <?php if(!isset($_SESSION["login"])): ?>
                    <li><a href="signup.php">Inscription</a></li>
                    <li><a href="login.php">Connexion</a></li>
                <?php endif ?>
            </ul>
        </div>

        <!-- Partie droite : Déconnexion + Thème -->
        <div style="display: flex; align-items: center;">
            <?php if(isset($_SESSION["id"])): ?>
                <a href="disconnect.php" id="deconect"><i class="fa fa-sign-out"></i> Se déconnecter</a>
            <?php endif ?>
            <button id="theme-toggle" class="btn btn-sm btn-default">🌓 Thème</button>
        </div>
    </div>
</nav>

<!-- Message flash -->
<?php if(isset($_SESSION["message"])): ?>
    <div class="container">
        <div class="row">
            <div class="alert alert-info">
                <?php echo $_SESSION["message"] ?>
            </div>
        </div>
    </div>
<?php endif ?>

<!-- JS pour thème -->
<script>
  window.onload = function () {
    const savedTheme = localStorage.getItem("theme") || "light";
    document.body.classList.add(savedTheme + "-mode");

    if (savedTheme === "dark") {
      document.querySelector("nav").classList.add("dark-mode");
      const deconectBtn = document.getElementById("deconect");
      if (deconectBtn) deconectBtn.classList.add("dark-mode");
    }
  };

  document.getElementById("theme-toggle").addEventListener("click", function () {
    const isDark = document.body.classList.contains("dark-mode");

    document.body.classList.toggle("dark-mode", !isDark);
    document.body.classList.toggle("light-mode", isDark);

    document.querySelector("nav").classList.toggle("dark-mode", !isDark);
    const deconectBtn = document.getElementById("deconect");
    if (deconectBtn) deconectBtn.classList.toggle("dark-mode", !isDark);

    localStorage.setItem("theme", isDark ? "light" : "dark");
  });
</script>
