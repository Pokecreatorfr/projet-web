<?php

// Create a new connection to the MySQL database using PDO, $my_Db_Connection is an object
try { 
  $my_Db_Connection = new PDO("mysql:host=localhost;dbname=cesi", "root", "");;
  echo "Connexion réussie";
} catch (PDOException $error) {
  echo 'Échec de la connexion : ' . $error->getMessage();
}


var_dump($_POST);
var_dump($_FILES);

$tmpName = $_FILES['profile_img']['tmp_name'];
$name = $_FILES['profile_img']['name'];
$size = $_FILES['profile_img']['size'];
$error = $_FILES['profile_img']['error'];
$tabExtension = explode('.', $name);
$extension = strtolower(end($tabExtension));
$uniqueName = uniqid('', true);
$file = $uniqueName.".".$extension;
move_uploaded_file($tmpName, './upload/profile_pics/'.$file);

$photo_profil = './upload/profile_pics/'.$file;

if ($size == 0) {
    $photo_profil = './upload/profile_pics/default.png';
}

// Set the variablesfor the entreprise
$Nom_entreprise = $_POST["Nom_entreprise"];
$Secteur_dactivité = $_POST["Secteur_dactivité"];
$validite = 1;
$Nombre_etudiants = $_POST["Nombre_etudiants"];

$Ville = substr($_POST["Ville"] , 0 , -7);



//cretion secteur d'activités
$Secteur_dactivité = $_POST["Secteur_dactivité"];

$secteur_id = $my_Db_Connection->prepare("SELECT id_secteur FROM secteur_activité WHERE secteur = :secteur");
$secteur_id->bindParam(":secteur", $Secteur_dactivité);
$secteur_id->execute();
$id_secteur_seleced = $secteur_id->fetch(PDO::FETCH_ASSOC)['id_secteur'];

if ($id_secteur_seleced == null) {
    $creation_secteur_activite= $my_Db_Connection->prepare("INSERT INTO secteur_activité( secteur ) VALUES (:secteur )");
    $creation_secteur_activite->bindParam(":secteur", $Secteur_dactivité);
    $creation_secteur_activite->execute();
    $id_secteur_seleced = $my_Db_Connection->lastInsertId();
}






$entreprise_creation= $my_Db_Connection->prepare("INSERT INTO entreprise ( nom, photo_profil, validite, nombre_etudiant  ) VALUES (:nom, :photo_profil , :validite , :nombre_etudiant  )");
$entreprise_creation->bindParam(":nom", $Nom_entreprise);
$entreprise_creation->bindParam(":photo_profil", $photo_profil);
$entreprise_creation->bindParam(":validite", $validite);
$entreprise_creation->bindParam(":nombre_etudiant", $Nombre_etudiants);
$entreprise_creation->execute();
$id_entreprise_created = $my_Db_Connection->lastInsertId();


//creating avoir 
$avoir_creation=$my_Db_Connection->prepare("INSERT INTO avoir( id_secteur, id_entreprise  ) VALUES ( :id_secteur,:id_entreprise )");
$avoir_creation->bindParam(":id_secteur", $id_secteur_seleced);
$avoir_creation->bindParam(":id_entreprise", $id_entreprise_created);
$avoir_creation->execute();


$villeid = $my_Db_Connection->prepare("SELECT id_ville FROM ville WHERE ville = :ville");
$villeid->bindParam(":ville", $Ville);
$villeid->execute();
$idville_seleced = $villeid->fetch(PDO::FETCH_ASSOC)['id_ville'];


//creating site
$site_creation= $my_Db_Connection->prepare("INSERT INTO site (id_ville, id_entreprise) VALUES (:ville, :id_entreprise)");
$site_creation->bindParam(":ville", $idville_seleced);
$site_creation->bindParam(":id_entreprise", $id_entreprise_created);
$site_creation->execute();

?>