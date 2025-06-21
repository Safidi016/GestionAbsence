<?php  
    require_once "header.php";
    // $prof = "";
    $professeur = getProfToModify($_GET["id"]);   

?>


<div class="container">
<div class="col-lg-8 col-lg-offset-2">
          <form action="modifier_prof.php" method="GET" autocomplete="off" >
                      <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nom</label>
                                <!-- <input type="text" name="nom" class="form-control" placeholder="Nom"> -->
                                <input type="text" value="<?=$professeur["nom"] ?>" name="nom" class="form-control" placeholder="Nom">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Prénom</label>
                                <!-- <input type="text" name="prenom" class="form-control" placeholder="Prénom"> -->
                                <input type="text" value="<?=$professeur["prenom"] ?>" name="prenom" class="form-control" placeholder="Prénom">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Téléphone</label>
                                <!-- <input type="text" name="telephone" class="form-control" placeholder="Téléphone"> -->
                                <input type="text" value="<?=$professeur["telephone"] ?>" name="telephone" class="form-control" placeholder="Téléphone">
                            </div>
                        </div>
                    </div>
                        <label for="">SOM</label>
                        <!-- <input type="number" min="1111111" max="9999999" name="som" class="form-control" placeholder="SOM" > -->
                        <input type="number" min="1111111" max="9999999" value="<?=$professeur["som"] ?>" name="som" class="form-control" placeholder="SOM">
                    
                    <div class="form-group">
                        <label for="">Email</label>
                        <!-- <input type="email" class="form-control" name="email" placeholder="Email" > -->
                        <input type="email" value="<?=$professeur["email"] ?>" class="form-control" name="email" placeholder="Email" >
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <!-- <input type="text" name="username" class="form-control" placeholder="Username" > -->
                        <input type="text" value="<?=$professeur["login"] ?>" name="username" class="form-control" placeholder="Username" >
                    </div>
                    <div class="form-group">
                        <label for="">Mot de passe : </label>
                        <input type="password" class="form-control" name="password" placeholder="Mot de passe" >
                    </div>
                    <input type="hidden" name="id" value="<?=$professeur["id"] ?>">
                    <div class="form-group">
                        <button type="submit" name="modifier_prof" class="btn btn-success btn-lg" >modifier</button>
                    </div>
                    </form>
                </div>
 
                    
                   
  
    
