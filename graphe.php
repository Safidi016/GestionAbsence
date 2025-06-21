<?php
require_once "header.php";

$nombreAbsences = 0;

$db = database();

$sttm = $db->prepare("SELECT count(id_etudiant) FROM absence where id_etudiant=:id and is_old=0 ");
$sttm->bindParam(':id', $id);
$sttm->execute();
$nombreAbsences = $sttm->fetch(PDO::FETCH_ASSOC);

$students = [];

$db = database();

$sttm = $db->prepare("SELECT COUNT(absence.id_etudiant) AS nb_absences, etudiant.nom 
                      FROM etudiant 
                      LEFT JOIN absence ON etudiant.id = absence.id_etudiant 
                      GROUP BY etudiant.nom");
$sttm->execute();

$etudiants = array();

foreach ($sttm as $student) {
    $nom_etudiant = $student['nom'];
    $nb_absences = $student['nb_absences'];

    $etudiants[] = array(
        'nom' => $nom_etudiant,
        'nb_absences' => $nb_absences
    );
}

// $etudiants est maintenant un tableau contenant le nom des étudiants et leur nombre d'absences


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="chart.js"></script>
</head>
<style>

</style>
<body>
        
    <div>
  <canvas id="myChart"></canvas>
</div>

<script src="chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  // Extraire les données des étudiants et des absences depuis PHP
  const etudiants = <?php echo json_encode(array_column($etudiants, 'nom')); ?>;
  const absences = <?php echo json_encode(array_column($etudiants, 'nb_absences')); ?>;

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: etudiants,
      datasets: [{
        label: 'Nombre d\'absences',
        data: absences,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
          stepSize: 1 // Pour des valeurs entières sur l'axe Y
        }
      }
    }
  });
</script>


    <!-- <p>helllllo</p> -->
</body>
</html>