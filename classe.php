<?php

    require_once "header.php";
    
    $classe = [];
    $classe = Toutclasse();

   
    if (isset($_POST['btn_ajout'])) {
        $con = new Db();
        $code = $_POST['code'];
        $nom_classe = $_POST['nom_classe'];
        
        if(empty($code) || empty($nom_classe)) {
            $message= "veiller remplir tous les champs !";
        }

        else {
            $req = $con->db->prepare("INSERT INTO classe(nom_classe, code) VALUE(:nom_classe, :code)");
            $req->bindParam('nom_classe', $nom_classe);
            $req->bindParam('code', $code);
            $req->execute();
            $classe = Toutclasse();

        } 
         
    }

?>

<style>
    /* Style pour le modal */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.4);
    }

    /* Style pour le contenu du modal */
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 600px;
        border-radius: 5px;
        position: relative;
    }

    /* Style pour le bouton de fermeture du modal
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    } */

    /* Style pour le bouton de fermeture au survol
    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    } */
</style>

<div class="container">
    <div class="col-md-8">
        <h3>Liste des classe</h3>
        <table class="table">
        <!-- <a href="ajoutclass.php" class="btn btn-success btn-lg " onclick="openModal()">Ajouter classe</a> -->
        <!-- Bouton pour ouvrir le modal -->
<!-- <button onclick="openModal()" class="btn btn-success btn-lg ">Ajouter classe</button> -->

<!-- Le modal -->
 <!-- Professeur -->
 <?php if(isset($_SESSION["type"]) && $_SESSION["type"] == "admin" ): ?>
        <form id="myModal" class="modal" method="POST" >
            <!-- <div class="modal-content"> -->
                <!-- <span class="close" onclick="closeModal()">&times;</span> -->
                <div class="form-group" >
                    <label for="">code classe</label>
                    <input type="text" name="code" class="form-control" placeholder="Username" >
                </div>
                <div class="form-group">
                    <label for="">libellé</label>
                    <input type="text" class="form-control" name="nom_classe" placeholder="nom classe" >
                    <br>
                    <div class="form-group">
                        <button type="submit" name="btn_ajout" class="btn btn-success btn-lg" > Enregistrer </button>
                    </div>

                </div>
            <!-- </div> -->
        </form>
        <?php endif ?>
</div>

<!-- Script JavaScript pour le modal -->
<script>
    // Fonction pour ouvrir le modal
    function openModal() {
        var modal = document.getElementById('myModal');
        modal.style.display = 'block';
    }

    // Fonction pour fermer le modal
    function closeModal() {
        var modal = document.getElementById('myModal');
        modal.style.display = 'none';
    }

    // Fermer le modal si l'utilisateur clique en dehors du modal
    window.onclick = function(event) {
        var modal = document.getElementById('myModal');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }
</script>
        <table class="table">

            <tr>
               
                <th>code classe</th>
                <th>libellé</th>
                
                <?php 
                    if(isset($_SESSION["type"]) && $_SESSION["type"] == "admin"):
                    echo "<th>Modifier</th>";
                    echo "<th></th>"; 
                    endif
                ?>
               <?php foreach($classe as $s): ?>
             </tr>
                <td><?=$s["code"] ?></td>
                <td><?=$s["nom_classe"] ?></td>
                <?php 
                   if(isset($_SESSION["type"]) && $_SESSION["type"] == "admin" ):
                   echo "<td><a href='modifier_classe.php?id=".$s['id_classe']."' class='btn btn-sm btn-primary'><i class='fa fa-cog'></i> </a></td>";
                   echo "<td><a href='supprimer_classe.php?id=".$s['id_classe']."' class='btn btn-sm btn-danger'><i class='fa fa-trash-o'></i></a></td>"; 
                   endif
                ?>
                <?php endforeach; ?>
            
</div>
</table>
