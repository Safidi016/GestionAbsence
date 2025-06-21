<h2><i class="fa fa-bell-o"></i> Alerts</h2>
<?php foreach ($alerts as $a): ?>
    <?php if($a["count(a.id)"] >= 4): ?>
<p>l'étudiant(e) <a href="etudiant.php?id=<?=$a['id_etudiant'] ?>" ><b><?=$a["prenom"] ?> <?=$a["nom"] ?></b></a> a atteigné plus de<?=$a["count(a.id)"] ?> absences !</p>
    <?php endif; ?>
<?php endforeach; ?>
  <!-- tableau de bord -->
  <?php if(isset($_SESSION["type"]) && $_SESSION["type"] == "admin" ): ?>
<h4>Nombre total d'etudiants: <span class="label label-info"><?=$df?></span></h4>

<h4>Nombre total de personnel: <span class="label label-info"><?=$dg?></span></h4>
<?php endif ?>