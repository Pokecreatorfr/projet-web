<?php

// Create a new connection to the MySQL database using PDO, $my_Db_Connection is an object
try { 
  $my_Db_Connection = new PDO("mysql:host=localhost;dbname=cesitage", "root", "");;
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

// Set the variables for the person we want to add to the database
$first_Name = $_POST["Nom"];
$last_Name = $_POST["Prenom"];
$Sexe = $_POST["Sexe"];

//set the variable for the ville of the person
$Ville = substr($_POST["Ville"] , 0 , -7);



//set the variable for the compte we want to create
$motdepasse = $_POST["Mot_de_passe"];
$login = $_POST["Login"];
$nom_entreprise=$_POST["Entreprise"];


//set the variable for the type we want to create
$idtype= 4;

$sql="SELECT id_entreprise FROM entreprise WHERE nom='$nom_entreprise'";
if ($my_Db_Connection->query($sql)->fetch()){
 $id_entreprise=$my_Db_Connection->query($sql)->fetch()['id_entreprise'];
}else{echo "l'entreprise existe pas";}





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

$villeid = $my_Db_Connection->prepare("SELECT id_ville FROM ville WHERE ville = :ville");
$villeid->bindParam(":ville", $Ville);
$villeid->execute();
$idville_seleced = $villeid->fetch(PDO::FETCH_ASSOC)['id_ville'];

$validite = 1;

//creation compte etudiant

$compte_pro_creation=$my_Db_Connection->prepare("INSERT INTO compte (login, photo_profil, mdp, validite, id_entreprise, id_personne, id_type) VALUES (:login, :photo_profil, :mdp, :validite, :id_entreprise, :id_personne, :id_type )");
$compte_pro_creation->bindParam(":login", $login);
$compte_pro_creation->bindParam(":photo_profil", $photo_profil);
$compte_pro_creation->bindParam(":mdp", $motdepasse);
$compte_pro_creation->bindParam(":validite", $validite);
$compte_pro_creation->bindParam(":id_entreprise", $id_entreprise);
$compte_pro_creation->bindParam(":id_personne", $idpersonne_created);
$compte_pro_creation->bindParam(":id_type", $idtype);
$compte_pro_creation->execute();





?>