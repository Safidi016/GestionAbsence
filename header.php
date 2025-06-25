<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestion Absence</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/styles.css">

    <style>
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
        }

        .badge-custom {
            background-color: #ffc107;
            color: #212529;
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
        }
    </style>
</head>

<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();
    require "./files/database.php";
    require "./files/functions.php";
?>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="padding: 12px 0;">
  <div class="container">
    <!-- Logo -->
    <a class="navbar-brand" href="index.php" style="font-weight: bold; font-size: 28px;">
      <i class="fa fa-graduation-cap"></i> Ny <span class="badge-custom">Sekoliko</span>
    </a>

    <!-- Bouton responsive -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu -->
    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
        <?php if(isset($_SESSION["login"]) && $_SESSION["type"] == "admin" ): ?>
            <li class="nav-item"><a class="nav-link" href="index.php"><i class="fa fa-dashboard"></i> <b>ADMIN</b></a></li>
        <?php elseif(isset($_SESSION["type"]) && $_SESSION["type"] == "etudiant" ): ?>
            <li class="nav-item"><a class="nav-link" href="etudiant.php?id=<?= $_SESSION['id_etudiant'] ?>"><i class="fa fa-dashboard"></i> Mes absences</a></li>
        <?php elseif(isset($_SESSION["type"]) && $_SESSION["type"] == "professeur" ): ?>
            <li class="nav-item"><a class="nav-link" href="index.php"><i class="fa fa-dashboard"></i> <?= $_SESSION["nom"] ?></a></li>
        <?php endif; ?>

        <?php if(!isset($_SESSION["login"])): ?>
            <li class="nav-item"><a class="nav-link" href="signup.php">Inscription</a></li>
            <li class="nav-item"><a class="nav-link" href="login.php">Connexion</a></li>
        <?php endif ?>
      </ul>

      <!-- Partie droite -->
      <div class="d-flex align-items-center">
        <?php if(isset($_SESSION["id"])): ?>
          <a href="disconnect.php" class="btn btn-outline-light me-2" id="deconect"><i class="fa fa-sign-out"></i> Déconnexion</a>
        <?php endif ?>
        <button id="theme-toggle" class="btn btn-light">🌓</button>
      </div>
    </div>
  </div>
</nav>

<!-- Message flash -->
<?php if(isset($_SESSION["message"])): ?>
  <div class="container mt-3">
    <div class="alert alert-info">
      <?php echo $_SESSION["message"] ?>
    </div>
  </div>
<?php endif; ?>

<!-- JS thème sombre/clair -->
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
