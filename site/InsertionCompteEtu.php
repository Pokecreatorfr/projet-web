<?php

// Create a new connection to the MySQL database using PDO, $my_Db_Connection is an object
try { 
  $my_Db_Connection = new PDO("mysql:host=localhost;dbname=cesi", "root", "");;
  echo "Connexion réussie";
} catch (PDOException $error) {
  echo 'Échec de la connexion : ' . $error->getMessage();
}

// Set the variables for the person we want to add to the database
$first_Name = $_POST["Nom"];
$last_Name = $_POST["Prenom"];
$Sexe = $_POST["Sexe"];

//set the variable for the ville of the person
$PostalCode = $_POST["CodePostal"];
$Ville = $_POST["Ville"];
$Region = $_POST["Région"];


//set the variable for the compte we want to create
$motdepasse = $_POST["motdepasse"];
$login = $_POST["login"];
$id_entreprise="";


//set the variable for the type we want to create
$idtype= 3;


//the photo of profil part of the projet






// Here we create a variable that calls the prepare() method of the database object
// The SQL query you want to run is entered as the parameter, and placeholders are written like this :placeholder_name
$person_creation= $my_Db_Connection->prepare("INSERT INTO personne (Nom, Prenom, sexe ) VALUES (:first_name, :last_name, :sexe)");

// Now we tell the script which variable each placeholder actually refers to using the bindParam() method
// First parameter is the placeholder in the statement above - the second parameter is a variable that it should refer to
$person_creation->bindParam(":first_name", $first_Name);
$person_creation->bindParam(":last_name", $last_Name);
$person_creation->bindParam(":sexe", $Sexe);


//recuperating personne id
if($person_creation->execute()){
    $idpersonne_created=$my_Db_Connection->lastInsertId();
}




//creating the ville compte
$ville_creation= $my_Db_Connection->prepare("INSERT INTO ville (ville	, code_postal, région) VALUES (:ville, :postalcode, :region)");
$ville_creation->bindParam(":libellé", $Ville);
$ville_creation->bindParam(":postalcode", $PostalCode );
$ville_creation->bindParam(":region", $Region);


//recuperating the ville id
if($ville_creation->execute()){
   
    $idville_created=$my_Db_Connection->lastInsertId();}

//creation compte etudiant

$compte_etudiant_creation=$my_Db_Connection->prepare("INSERT INTO compte (login, photo_profil, mdp, validité, id_personne, id_type,) VALUES (:login, :photo_profil, :mdp, validité, id_personne, id_type )");
$compte_etudiant_creation->bindParam(":login", $login);
$compte_etudiant_creation->bindParam(":photo_profil", $photo_profil);
$compte_etudiant_creation->bindParam(":mdp", $motdepasse);
$compte_etudiant_creation->bindParam(":validité", $validité);
$compte_etudiant_creation->bindParam(":id_personne", $idpersonne_created);
$compte_etudiant_creation->bindParam(":id_type", $idtype);

if($compte_etudiant_creation->execute()){
   
  $id_etudiant_created=$my_Db_Connection->lastInsertId();}



//relying compte w his locality whit the table "centre"
$compte_centre_creation=$my_Db_Connection->prepare("INSERT INTO compte (id_c, id_ville ) VALUES ( :id_c, :id_ville )");
$compte_centre_creation->bindParam(":id_c", $id_etudiant_created);
$compte_centre_creation->bindParam(":id_ville", $idville_created);
$compte_centre_creation->execute();





?>