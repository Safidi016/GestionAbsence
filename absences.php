<?php

require_once "header.php";

$absences = listAbsences();

?>


<div class="container">
    <h3>Liste des absences des étudiants</h3>
    <h4><a href="absences_etudiants_pdf.php" class="btn btn-primary btn-lg"><i class="fa fa-file-pdf-o"></i> Compte rendu des absences</a></h4>
    <hr>
    <!-- <form action="" >
            <div class="row">
            <div class="col-md-3">
                <label for="date">Date:</label>
                <input type="date" class="form-control" id="date">
            </div>
           <div class="col-md-3">
                <label for="prof">professeur:</label>
                <input type="texte" class="form-control" id="prof" placeholder="nom du professeur">
           </div>
            <div class="col-md-3">
                <label for="matier">matier:</label>
                <input type="texte" id="matier" class="form-control" placeholder="nom du matier">
            </div>
           <div class="col-md-3">
            <label for="">dure</label>
            <select class="form-control" >
                    <option value="">1h</option>
                    <option value="">2h</option>
                    <option value="">3h</option>
                </select>

           </div>
            
            </div>
           
        </form> 
        <p>   </p>-->
    <table class="table">
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>CNE</th>
            <th>Module</th>
            <th>Date absence</th>
            <th>Justification</th>
            <th>Marquée par</th>
            <?php if($_SESSION["type"] == "admin"): ?>
                <th><i class="fa fa-trash-o"></i> Suppr.</th>
            <?php endif; ?>
        </tr>
        <?php foreach($absences as $a): ?>
            <tr>
                <td><?=$a["nom"] ?></td>
                <td><?=$a["prenom"] ?></td>
                <td><?=$a["email"] ?></td>
                <td><?=$a["cne"] ?></td>
                <td><?=$a["module"] ?></td>
                <td><?=$a["date_absence"] ?></td>
                <td><?=$a["type_absence"] ?></td>
                <td><?=$a["nom_prof"] ?> <?=$a["prenom_prof"] ?></td>
                <?php if($_SESSION["type"] == "admin"): ?>
                    <td><a href="deleteAbsence.php?id=<?=$a['id'] ?>"><i class="fa fa-trash-o"></i></a></td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php require_once "footer.php"?>
