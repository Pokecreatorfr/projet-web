<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="favicon.ico"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="FormsCSS.css">
</head>
<body>
   <h1 class="pro">Créer un compte Etudiant</h1>  
 <form action="InsertionCompteEtu.php" method="post" enctype="multipart/form-data" >

   <div class="row"> 
        <div class="col">
        <label for="FormInput" class="form-label" id="Compte">Civilité</label><br>
            <input class="form-check-input form-label" type="radio" name="Sexe" id="flexRadioDefault1">
             <label class="form-check-label" for="flexRadioDefault1">
                Mme
            </label>
            <input class="form-check-input form-label" type="radio" name="Sexe" id="flexRadioDefault2">
            <label class="form-check-label" for="flexRadioDefault2">
                M
            </label>
        </div>  

        <div class="col">
            <img src="" class="profile_img" id="profile_img" alt="Responsive image" id> </img>
            <input class="form-control form-control-sm inpt" id="image_file" type="file" accept="image/*" name="profile_img"/> 
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
       <!-- <img src="" class="profile_img" id="profile_img" alt="Responsive image" id> </img>
        <input class="form-control form-control-sm inpt" id="image_file" type="file" accept="image/*" />-->
    </div>
  




    <div class="row"> 
        
        <div class="col">
            <label for="FormInput" class="form-label" id="Compte">Mot de passe</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="Mot_de_passe"  placeholder="">
        </div>   

        <div class="col colproright">
            <label for="FormInput" class="form-label " id="Compte" >Promotion </label><br>
            <select name="promo" id="promo-select">
            <option value="">--choisissez votre promotion--</option>
            <option value="create" name="create">1</option>
            <option value="update" name="update" >2</option>
        </select>
        </div>   
    </div>




   <br>
    <button type="submit" class="btn btn-primary">Créer l'Etudiant</button>
 </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>    
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