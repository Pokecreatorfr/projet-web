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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q==" crossorigin="anonymous"
  referrerpolicy="no-referrer" />
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
                  <h1 class="Offre card-header"> Postuler</h1>
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
                        <form action="postpostuler.php" method="post" enctype="multipart/form-data">
                                    <?php
                                    $id_o = $_POST['id_offre'];
                                    echo '<input type="hidden" id="id_offre" name="id_offre" value="' . $id_o .'"> ';
                                    ?>
                                    <div class="col-md-6 mb-3">
                                          <label class="form-label">CV</label>
                                          <input class="form-control form-control-sm inpt" id="cv" type="file" accept=".pdf" name="cv"/>
                                          <label class="form-label">Lettre de motivation</label>
                                          <input class="form-control form-control-sm inpt" id="ldm" type="file" accept=".pdf" name="ldm"/>
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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js" integrity="sha512-FHZVRMUW9FsXobt+ONiix6Z0tIkxvQfxtCSirkKc5Sb4TKHmqq1dZa8DphF0XqKb3ldLu/wgMa8mT6uXiLlRlw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    img_file = document.getElementById("image_file");
profile_img = document.getElementById("profile_img");

img_file.addEventListener("change", function() {
  let file = this.files[0];
  let reader = new FileReader();
  reader.readAsDataURL(file);
  
  reader.onload = function(event) {
    let img = new Image();
    img.src = event.target.result;
    img.onload = function() {
      let canvas = document.createElement('canvas');
      let size = Math.min(img.width, img.height);
      canvas.width = size;
      canvas.height = size;
      let ctx = canvas.getContext('2d');
      ctx.drawImage(img, (img.width - size) / 2, (img.height - size) / 2, size, size, 0, 0, size, size);
      profile_img.src = canvas.toDataURL('image/jpeg');
    }
  }
   

});
</script>


</body>

</html>