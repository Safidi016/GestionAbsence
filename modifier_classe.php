<?php 
    require_once "header.php";
    $id_user;
    $classe = getClasseByID($_GET["id"]);
?>

    <div class="container" >
        <div class="row">

            <div class="col-lg-8 col-lg-offset-2">
                <p class="text-center"><h3><i class="fa fa-user-circle-o"></i> Modifier</h3></p>
                <form action="modifier_classe.php" method="POST" autocomplete="off" >
                    <div class="row">
                        <div class="form-group" >
                        <label for="">code classe</label>
                        <input value="<?=$classe["code"] ?>" type="text" name="code" class="form-control" placeholder="Username" >
                    </div>
                    <div class="form-group">
                        <label for="">libellé</label>
                        <input value="<?=$classe["nom_classe"] ?>" type="text" class="form-control" name="nom_classe" placeholder="nom classe" >
                        <br>
                        <input type="hidden" name="id_classe" value="<?=$classe["id_classe"] ?>">

                        <div class="form-group">
                            <button type="submit" name="modifier_classe" class="btn btn-success btn-lg" > Enregistrer </button>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>

<?php require_once "footer.php" ?>