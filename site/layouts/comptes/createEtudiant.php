<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
      header("Location: ../../login.php");
      exit;
}
// Include config file
require_once "../../config.php";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Création Offre</title>
      <link rel="stylesheet" href="../../assets/vendors/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="../../assets/vendors/bootstrap/css/bootstrap.min.css">
</head>

<body>
      
      <style>
            .profile_img{
    margin-left: 35%;
    width: 40%;
}
      </style>
      <div class="container mt-5">
            <div class="card">
                  <h1 class="Offre card-header"> Créer un étudiant</h1>
                  <?php
                  $req = "SELECT * from entreprise";
                  $entSel = $pdo->query($req);

                  $req = "SELECT * from ville";
                  $villeSel = $pdo->query($req);

                  $req = "SELECT * from promotion";
                  $promoSel = $pdo->query($req);

                  if ($entSel && $villeSel && $promoSel) {

                  ?>
                  <div class="card-body">
                        <form action="insertEtudiant.php" method="post">
                              <div class="row">
                                    <input type="hidden" name="id_type" id="id_type">
                                    <div class="col-md-6">
                                          <label class="form-label" id="civilite">Civilité</label><br>
                                          <div class="rdiomme">
                                                <input class="form-check-input form-label" type="radio" name="sexe"
                                                      id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                      Mme
                                                </label>
                                          </div>
                                          <div class="rdiom">
                                                <input class="form-check-input form-label" type="radio" name="sexe"
                                                      id="flexRadioDefault2">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                      M
                                                </label>
                                          </div>
                                    </div>

                                    <div class="col-md-6">
                                          <label for="FormInput" class="form-label Offre">Photo de profil
                                          </label>
                                          <img src="\upload\profile_pics\default.png" class="profile_img" id="profile_img" alt="Responsive image" > </img>
                                          <input class="form-control form-control-sm inpt" id="image_file" type="file" accept="image/*" name="profile_img"/> 
                                    </div>

                                    <div class="col-md-6">
                                          <div class="form-group">
                                                <div class="mb-3">
                                                      <label for="FormInput" class="form-label Offre">Nom
                                                      </label>
                                                      <input type="text" class="form-control" id="nom" name="nom"
                                                            placeholder="">
                                                </div>
                                          </div>
                                    </div>

                                    <div class="col-md-6">
                                          <div class="form-group">
                                                <div class="mb-3">
                                                      <label for="FormInput" class="form-label Offre">Prenom
                                                      </label>
                                                      <input type="text" class="form-control" id="prenom" name="prenom"
                                                            placeholder="">
                                                </div>
                                          </div>
                                    </div>

                                    <div class="col-md-6">
                                          <div class="form-group">
                                                <div class="mb-3">
                                                      <label for="Description" class="form-label Offre">Login</label>
                                                      <input type="Text" class="form-control Description" id="login"
                                                            name="login" placeholder="">
                                                </div>
                                          </div>
                                    </div>

                                    <div class="col-md-6">
                                          <div class="form-group">
                                                <div class="mb-3">
                                                      <label for="FormInput Description" class="form-label Offre">Mot de
                                                            passe</label>
                                                      <input type="Text" class="form-control Description" id="mdp"
                                                            name="mdp" placeholder="">
                                                </div>
                                          </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                          <div class="form-group">
                                                <label class="form-label" id="promo">Promotion</label>
                                                <select name="promo" id="SelectPromo" class="form-select"
                                                      aria-label="Default select example">
                                                      <?php
                                                                  while ($tab = $promoSel->fetch()) {
                                                                        echo '<option selected>Promotion</option>';
                                                                        echo '<option value="' . $tab[0] . '">' . $tab[1] . ' ' . $tab[2] . '</option>';
                                                                  }
                                                                  ?>
                                                </select>
                                          </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                          <label class="form-label">Site</label>
                                          <div class="row">
                                                <div class="mb-3">
                                                <input class="form-control" list="datalistOptions" id="exampleDataList" name="ville" placeholder="Commencez à ecrire...">
                                                <datalist id="datalistOptions">
                                                            <?php
                                                                  while ($tab = $villeSel->fetch()) {
                                                                        echo '<option value="' . $tab[1] . '(' . $tab[2]. ')' . '">'  . '</option>';
                                                                  }
                                                            ?>
                                                </datalist>
                                                </div>
                                          </div>
                                    </div>

                              </div>
                              <button type="submit" name="insertEtudiant" class="btn btn-primary">Soumettre</button>
                              <a href="listComptes.php" class="btn btn-outline-danger">Annuler</a>

                        </form>
                  </div>
                  <?php
                  } ?>
            </div>
      </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
      </script>



</body>

</html>