<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création Offre</title>
    <link rel="stylesheet" href="./assets/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="FormsCSS.css">
</head>
<body>  
    <h1 class="Offre"> Créer une Offre</h1>
    <form action="insertion.php" method="post">
    <div class="mb-3">
            <label for="FormInput" class="form-label Offre" >Titre</label>
            <input type="Text" class="form-control" id="exampleFormControlInput1" name="Titre" placeholder="">
        </div>
        <div class="mb-3">
            <label for="FormInput" class="form-label Offre" >Promotion</label>
            <input type="Text" class="form-control" id="exampleFormControlInput1" name="Promotion" placeholder="">
        </div>
        <div class="mb-3">
            <label for="FormInput" class="form-label Offre" >Durée de Stage</label>
            <input type="Text" class="form-control" id="exampleFormControlInput1"  name="Durée_de_Stage" placeholder="">
        </div>
        <div class="mb-3">
            <label for="FormInput" class="form-label Offre" >Rémunération</label>
            <input type="Text" class="form-control" id="exampleFormControlInput1" name="Rémunération"  placeholder="">
        </div>
        <div class="mb-3">
            <label for="FormInput" class="form-label Offre">Date de l'Offre</label>
            <input type="Text" class="form-control" id="exampleFormControlInput1" name="Date_de_lOffre" placeholder="">
        </div>
        <div class="mb-3">
            <label for="FormInput" class="form-label Offre" >Nombre de places</label>
            <input type="Text" class="form-control" id="exampleFormControlInput1" name="Nombre_de_places" placeholder="">
        </div>
        
        <div class="mb-3">
            <label for="FormInput Description" class="form-label Offre">Description</label>
            <input type="Text" class="form-control Description" id="exampleFormControlInput1" name="Description" placeholder="">
        </div>


        <div class="mb-3">
            <label for="FormInput" class="form-label Offre">Site</label>
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
        <button type="submit" class="btn btn-primary">Soumettre</button>
    </form>
    <script src="./assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="./assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>    
</body>
</html>