<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CréationEntreprise</title>
    <link rel="stylesheet" href="./assets/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="FormsCSS.css">
</head>
<body>  
        <h1> Créer une Entreprise</h1>
    <form action="InsertionEntreprise.php" method="post" enctype="multipart/form-data" >
        <div class="mb-3">
            <label for="FormInput" class="form-label" id="NbEtu">Nom de l'entreprise</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="Nom_entreprise">
        </div>


        <div class="mb-3 Ent">
            <img src="logo.png" class="profile_img" id="profile_img" alt="Responsive image" id> </img>
            <input class="form-control form-control-sm inpt" id="image_file" type="file" accept="image/*" />  
        </div>


        <div class="mb-3">
            <label for="FormInput" class="form-label" >Localité</label>
            <div class="row">
                <div class="col loc ">
                 <input type="text" class="form-control mr-1 w-60 " id="exampleFormControlInput2" name="CodePostal" placeholder="CodePostal">
                </div>
                <div class="col loc">
                <input type="text" class="form-control mr-1 w-60" id="exampleFormControlInput2" name="Ville" placeholder="Ville">
                </div>
                <div class="col loc">
                <input type="text" class="form-control mr- w-60" id="exampleFormControlInput2" name="Region" placeholder="Region">
                </div>
            </div>
        </div>



        <div class="mb-3">
            <label for="FormInput" class="form-label" id="secAc">Secteur d'activité</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="Secteur_dactivité">
        </div>


        <div class="mb-3">
            <label for="FormInput" class="form-label Cent" id="NbEtu">Nombre d'etudiants CESI</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="Nombre_etudiants">
        </div>


        <button type="submit" class="btn btn-primary">Soumettre</button>

    </form>
    <script src="./assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="./assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>    
</body>

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

</html>