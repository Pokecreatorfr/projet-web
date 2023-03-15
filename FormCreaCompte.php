<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte</title>
    <link rel="stylesheet" href="./assets/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="FormsCSS.css">
</head>
<body>
   <h1>Créer un compte</h1>
    <div class="row"> 
        <div class="col">
            <label for="FormInput" class="form-label" >Adresse E-mail</label>
            <input type="Adresse E-mail" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>   
        <div class="col ">
            <label for="FormInput" class="form-label" id="Compte">Localité</label>
            <input type="Localité" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>   
    </div>
  
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
            <label for="FormInput" class="form-label" id="Compte">Métier Recherché</label>
            <input type="Métier Recherché" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>   
    </div>

    <div class="row"> 
        <div class="col">
            <label for="FormInput" class="form-label" id="Compte">Nom</label>
            <input type="Nom" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>   
        <div class="col">
            <label for="FormInput" class="form-label" id="Compte">Contrat</label>
            <input type="Contrat" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>   
    </div>
  
    <div class="row"> 
        <div class="col">
            <label for="FormInput" class="form-label" id="Compte">Prenom</label>
            <input type="Prenom" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>   
        <div class="col">
            <br>
            <br>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
             J'accepte les conditions d'adhésion
                </label>
            </div>
        </div>   
    </div>
  
    <div class="row"> 
        <div class="col">
            <label for="FormInput" class="form-label" id="Compte">Mot de passe</label>
            <input type="Mot de passe" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>   
        <div class="col">
        </div>   
    </div>
   <br>
    <button type="button" class="btn btn-primary">Je m'inscris</button>
    <script src="./assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="./assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>    
</body>
</html>