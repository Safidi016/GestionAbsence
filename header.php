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
     

   <button class="toggle-button" onclick="toggleDarkMode()">🌙/☀️</button>

  <h1>Bienvenue sur mon site PHP</h1>

  <script>
    // Appliquer le mode stocké au chargement
    window.onload = function () {
      if (localStorage.getItem("theme") === "dark") {
        document.body.classList.add("dark-mode");
      }
    };

    // Fonction pour basculer entre les thèmes
    function toggleDarkMode() {
      document.body.classList.toggle("dark-mode");

      // Sauvegarde du choix utilisateur
      if (document.body.classList.contains("dark-mode")) {
        localStorage.setItem("theme", "dark");
      } else {
        localStorage.setItem("theme", "light");
      }
    }
  </script>
    <style>
        nav .container{
            display: flex;
            justify-content: space-between;
            /* background-color: red; */
        }

        #deconect{
            display: flex;
            align-items: center;
            text-decoration: none;
            background-color: #999999;
            padding: 15px ;
            margin-top: 5px;
            border-radius: 10px;
            color: white;
        }
        #deconect:hover{
            background-color: gray;
        }
    .nom{
        background-color: orange ;
        border-radius: 5px;

        }
    </style>
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top"style="background-color: black;font-size:  25px;">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header" >   
            <a class="navbar-brand" href="index.php"  style="font-weight: 700;font-size:30px;padding:5px 0 0 0;"><span style="color: white;">Ny  </span><span style="color: black;" class="nom" > Sekoliko</span></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Accueil</a></li>
                <?php if(isset($_SESSION["login"]) && $_SESSION["type"] == "admin" ): ?>
                    <li><a href="index.php"> <i class="fa fa-dashboard"></i> <b>ADMIN</b></a></li>
                <?php elseif(isset($_SESSION["type"]) && $_SESSION["type"] == "etudiant" ): ?>
                    <li><a href="etudiant.php?id=<?=$_SESSION['id_etudiant'] ?>"> <i class="fa fa-dashboard"></i> Mes absences</a></li>
                <?php elseif(isset($_SESSION["type"]) && $_SESSION["type"] == "professeur" ): ?>
                    <li><a href="index.php"> <i class="fa fa-dashboard"></i> <?=$_SESSION["nom"] ?></a></li>
                <?php endif; ?>
                
                <?php if(!isset($_SESSION["login"])): ?>
                    <li><a href="signup.php">Inscription</a></li>
                    <li><a href="login.php">Connexion</a></li>
                <?php endif ?>
            </ul>
        </div>

        <div>
            <?php if(isset($_SESSION["id"])): ?>
                <a href="disconnect.php" id="deconect" style="margin-top: 0;"><i class="fa fa-sign-out" ></i> Se déconnecter</a>
            <?php endif ?>
        </div>
    </div>
</nav>
<?php if(isset($_SESSION["message"])): ?>
    <div class="container">
        <div class="row">
            <div class="alert alert-info" >
                <?php echo $_SESSION["message"] ?>
            </div>
        </div>
    </div>
    
<?php endif ?>
