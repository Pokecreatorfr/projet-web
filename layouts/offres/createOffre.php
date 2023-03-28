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
      <div class="container mt-5">
            <div class="card">
                  <h1 class="Offre card-header"> Créer une Offre</h1>
                  <?php
            $req = "SELECT * from entreprise";
            $entSel = $pdo->query($req);

            $req = "SELECT * from ville";
            $villeSel = $pdo->query($req);

            if ($entSel && $villeSel) {

            ?>
                  <div class="card-body">
                        <form action="insertion.php" method="post">
                              <div class="row">
                                    <div class="col-md-6">
                                          <div class="form-group">
                                                <div class="mb-3">
                                                      <label for="FormInput" class="form-label Offre">Titre</label>
                                                      <input type="Text" class="form-control"
                                                            id="exampleFormControlInput1" name="Titre" placeholder="">
                                                </div>
                                          </div>
                                    </div>

                                    <div class="col-md-6">
                                          <div class="form-group">
                                                <div class="mb-3">
                                                      <label for="FormInput" class="form-label Offre">Nom
                                                            Entreprise</label>
                                                      <select name="entreprise" id="SelectEntreprise"
                                                            class="form-select" aria-label="Default select example">
                                                            <?php 
                                          while($tab = $entSel->fetch()){
                                                echo '<option value="'.$tab[0].'">'.$tab[1].' '.$tab[2].'</option>';
                                          }
                                          ?>
                                                      </select>
                                                </div>
                                          </div>
                                    </div>

                                    <div class="col-md-6">
                                          <div class="form-group">
                                                <div class="mb-3">
                                                      <label for="FormInput" class="form-label Offre">Durée de
                                                            Stage</label>
                                                      <input type="Text" class="form-control"
                                                            id="exampleFormControlInput1" name="Durée_de_Stage"
                                                            placeholder="">
                                                </div>
                                          </div>
                                    </div>

                                    <div class="col-md-6">
                                          <div class="form-group">
                                                <div class="mb-3">
                                                      <label for="FormInput"
                                                            class="form-label Offre">Rémunération</label>
                                                      <input type="Text" class="form-control"
                                                            id="exampleFormControlInput1" name="Rémunération"
                                                            placeholder="">
                                                </div>
                                          </div>
                                    </div>

                                    <div class="col-md-6">
                                          <div class="form-group">
                                                <div class="mb-3">
                                                      <label for="FormInput" class="form-label Offre">Date de
                                                            l'Offre</label>
                                                      <input type="date" class="form-control"
                                                            id="exampleFormControlInput1" name="Date_offre"
                                                            placeholder="">
                                                </div>
                                          </div>
                                    </div>

                                    <div class="col-md-6">
                                          <div class="form-group">
                                                <div class="mb-3">
                                                      <label for="FormInput" class="form-label Offre">Nombre de
                                                            places</label>
                                                      <input type="Text" class="form-control"
                                                            id="exampleFormControlInput1" name="Nombre_de_places"
                                                            placeholder="">
                                                </div>
                                          </div>
                                    </div>

                                    <div class="col-md-6">
                                          <div class="form-group">
                                                <div class="mb-3">
                                                      <label for="FormInput Description"
                                                            class="form-label Offre">Description</label>
                                                      <input type="Text" class="form-control Description"
                                                            id="exampleFormControlInput1" name="description"
                                                            placeholder="">
                                                </div>
                                          </div>
                                    </div>

                                    <div class="mb-3">
                                          <label for="FormInput" class="form-label Offre">Site</label>
                                          <div class="row">

                                                <div class="col loc">
                                                      <div class="mb-3">
                                                            <select name="ville" id="SelectVille" class="form-select"
                                                                  aria-label="Default select example">
                                                                  <?php 
                                          while($tab = $villeSel->fetch()){
                                                echo '<option value="'.$tab[0].'">'.$tab[1].' '.$tab[2].'</option>';
                                          }
                                          ?>
                                                            </select>
                                                      </div>
                                                </div>

                                          </div>
                                    </div>
                              </div>
                              <button type="submit" name="insertOffre" class="btn btn-primary">Soumettre</button>
                              <a href="listOffre.php" class="btn btn-outline-danger">Annuler</a>

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