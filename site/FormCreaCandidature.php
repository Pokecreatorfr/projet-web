<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création Candidature</title>
    <link rel="stylesheet" href="./assets/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="FormsCSS.css">
</head>
<body>  
        <h1 class="Poste">Intitulé du poste</h1>

        <div class="mb-3">
            <input type="Nom" class="form-control" id="exampleFormControlInput1" placeholder="Nom..." name="NomCV">
        </div>

        <div class="mb-3">
            <input type="Prénom" class="form-control" id="exampleFormControlInput1" placeholder="Prénom..." name="PrénomCV">
        </div>

        <div class="mb-3">
            <input type="description" class="form-control" id="exampleFormControlInput1" placeholder="Parlez nous de vous..." name="descriptionCV">
        </div>
        <div class="row">

            <div class="col lettre">
                <div class="input-group">
                    <input type="file" class="form-control" id="inputGroupFile02">
                    <label class="input-group-text" for="inputGroupFile02" name="lettre">Charger Lettre</label>
                </div>
            </div>

            <div class="col cv ">
                <div class="input-group">
                    <input type="file" class="form-control" id="inputGroupFile02">
                    <label class="input-group-text" for="inputGroupFile02" name="cv" >Charger CV</label>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-primary candidat">Candidater</button>
    
    <script src="./assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="./assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>    
</body>
</html>