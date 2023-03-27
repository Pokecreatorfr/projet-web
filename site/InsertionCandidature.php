<?php

// Create a new connection to the MySQL database using PDO, $my_Db_Connection is an object
try { 
  $my_Db_Connection = new PDO("mysql:host=localhost;dbname=cesi", "root", "");;
  echo "Connexion réussie";
} catch (PDOException $error) {
  echo 'Échec de la connexion : ' . $error->getMessage();
}



// Set the variablesfor the candidature
$CV = $_POST["cv"];
$Lettre = $_POST["lettre"];
$titre = $_POST["Titre"];

//systeme pour recuperer l'id compte avec la session(???) 
$_SESSION["id_compte"] =  $stmt->fetch()['id_c'];


//recuperating id offre
$identifiant_offre=$my_Db_Connection->prepare("SELECT into offre (id_offre) WHERE Titre==$titre");
$identifiant_offre->execute();

// Here we create a variable that calls the prepare() method of the database object
// The SQL query you want to run is entered as the parameter, and placeholders are written like this :placeholder_name
$person_creation= $my_Db_Connection->prepare("INSERT INTO postule (id_c, id_offre, cv, ldm ) VALUES (:id_c, :id_offre, :cv, :lettre)");

// Now we tell the script which variable each placeholder actually refers to using the bindParam() method
// First parameter is the placeholder in the statement above - the second parameter is a variable that it should refer to
$person_creation->bindParam(":id_c", $first_Name);
$person_creation->bindParam(":id_offre", $identifiant_offre);
$person_creation->bindParam(":cv", $CV);
$person_creation->bindParam(":lettre", $Lettre);


?>