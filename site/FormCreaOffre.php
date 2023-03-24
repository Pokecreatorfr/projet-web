<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="favicon.ico"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création Offre</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
            <label for="FormInput" class="form-label Offre">Compétences</label>
            <input type="Text" class="form-control" id="exampleFormControlInput1" name="Compétences" placeholder="">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>    
</body>
</html>