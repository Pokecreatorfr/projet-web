<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="favicon.ico"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte</title>
    <link rel="stylesheet" href="./assets/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="FormsCSS.css">
</head>
<body>
   <h1 class="pro">Créer un compte Pilote</h1>  
 <form action="InsertionComptePilote.php" method="post" enctype="multipart/form-data" >

   <div class="row"> 
        <div class="col">
        <label for="FormInput" class="form-label" id="Compte">Civilité</label><br>
            <input class="form-check-input form-label" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
             <label class="form-check-label" for="flexRadioDefault1">
                Mme
            </label>
            <input class="form-check-input form-label" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
            <label class="form-check-label" for="flexRadioDefault2">
                M
            </label>
        </div>  
        <div class="col">
        <img src="" class="profile_img" id="profile_img" alt="Responsive image" id> </img>
        <input class="form-control form-control-sm inpt" id="image_file" type="file" accept="image/*" />
        </div>
    </div>
  

    <div class="row"> 
        <div class="col">
        <label for="FormInput" class="form-label" id="Compte">Nom</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="Nom" placeholder="">
        </div>   

        <div class="col colproright ">
            <label for="FormInput" class="form-label" id="Compte">Localité</label>
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
    </div>



    <div class="row"> 
        <div class="col">
        <label for="FormInput" class="form-label" id="Compte">Prenom</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="Prenom" placeholder="">
        </div>   
        <div class="col colproright">
            <label for="FormInput" class="form-label" id="Compte">Login</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="Login" placeholder="">
        </div>   
      
    </div>
  




    <div class="row"> 
        
        <div class="col">
            <label for="FormInput" class="form-label" id="Compte">Mot de passe</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="Mot_de_passe"  placeholder="">
        </div> 

        <div class="col colproright">
            <label for="FormInput" class="form-label " id="Compte" >Promotion Enseignées</label><br>
            <select name="promo" id="promo-select">
            <option value="">--choisissez votre promotion--</option>
            <option value="create" name="create">1</option>
            <option value="update" name="update" >2</option>
        </select>
        </div>   

    </div>




   <br>
    <button type="submit" class="btn btn-primary">Créer le Pilote</button>
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