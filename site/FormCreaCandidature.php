<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="favicon.ico"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création Candidature</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="FormsCSS.css">
</head>
<body>   

    <form action="InsertionCandidature.php" method="post" enctype="multipart/form-data" >
     <h1 class="Poste" name="Titre">Intitulé du poste</h1>

            <!-- en fait ici on affiche plutot l'intituele avec idoffre-->

             <div class="mb-3">
            <input type="Nom" class="form-control" id="exampleFormControlInput1" placeholder="Nom..." name="NomCV">
            </div>

            <div class="mb-3">
            <input type="Prénom" class="form-control" id="exampleFormControlInput1" placeholder="Prénom..." name="PrénomCV">
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

        <button type="submit" class="btn btn-primary candidat">Candidater</button>

    </form>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>    
</body>
</html>