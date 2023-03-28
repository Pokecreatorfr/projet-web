<?php

// Create a new connection to the MySQL database using PDO, $my_Db_Connection is an object
require_once "../../config.php";

var_dump($_FILES);

// Set the variablesfor the entreprise
$Nom_entreprise = $_POST["Nom_entreprise"];
$Secteur_dactivité = $_POST["Secteur_dactivité"];
$validite = $_POST["1"];
$Nombre_etudiants = $_POST["Nombre_etudiants"];


//$logo = $_POST["logo"];


//cretion secteur d'activités
$Secteur_dactivité = $_POST["Secteur_dactivité"];

$creation_secteur_activite= $pdo->prepare("INSERT INTO secteur_activité( secteur ) VALUES (:secteur )");

if($creation_secteur_activite->execute()){
$id_secteur_created->lastinsertid();
}

//creation entreprise
$creation_secteur_activite= $pdo->prepare("INSERT INTO ( nom, photo_profil, validite, nombre_etudiant  ) VALUES (:nom, :photo_profil , :validite , :nombre_etudiant  )");

//linking w the form params 
$entreprise_creation->bindParam(":nom", $Nom_entreprise);
$entreprise_creation->bindParam(":photo_profil", $Secteur_dactivité);
$entreprise_creation->bindParam(":validite", $validite);
$entreprise_creation->bindParam(":nombre_etudiant", $Nombre_etudiants);


if($entreprise_creation->execute()){
    $id_entreprise_created->lastinsertid();
}

//creating avoir 
$avoir_creation=$pdo->prepare("INSERT INTO ( id_secteur, id_entreprise  ) VALUES ( :id_secteur,:id_entreprise )");
$avoir_creation->bindParam(":id_secteur", $id_secteur_created);
$avoir_creation->bindParam(":id_entreprise", $id_entreprise_created);
$avoir_creation->execute();


//set the variable for the ville of the entreprise
$PostalCode = $_POST["CodePostal"];
$Ville = $_POST["Ville"];
$Region = $_POST["Région"];


//creating the ville entreprise
$ville_creation= $pdo->prepare("INSERT INTO ville (ville	, code_postal, région) VALUES (:ville, :postalcode, :region)");
$ville_creation->bindParam(":libellé", $Ville);
$ville_creation->bindParam(":postalcode", $PostalCode );
$ville_creation->bindParam(":region", $Region);


//recuperating the ville id
 if($ville_creation->execute())
 {
   
    $id_ville_created=$pdo->lastInsertId();
}

//creating site
$site_creation= $pdo->prepare("INSERT INTO site (id_ville, id_entreprise) VALUES (:ville, :id_entreprise)");
$site_creation->bindParam(":id_ville", $idville_created);
$site_creation->bindParam(":id_entreprise", $id_entreprise_created );
$site_creation->execute();



?>