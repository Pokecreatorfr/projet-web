<?php

// Create a new connection to the MySQL database using PDO, $my_Db_Connection is an object
try { 
  $my_Db_Connection = new PDO("mysql:host=localhost;dbname=cesi", "root", "");;
  echo "Connexion réussie";
} catch (PDOException $error) {
  echo 'Échec de la connexion : ' . $error->getMessage();
}

// Set the variablesfor the candidature
$Titre = $_POST["Titre"];
$Promotion = $_POST["Promotion"];
$Durée_de_Stage = $_POST["Durée_de_Stage"];
$Rémunération = $_POST["Rémunération"];
$Date_de_lOffre = $_POST["Date_de_lOffre"];
$Nombre_de_places = $_POST["Nombre_de_places"];
$Compétences = $_POST["Compétences"];
$Ville = $_POST["Ville"];
$Nom_entreprise = $_POST["nom_entreprise"];



//recupération de l'id du site 
$identifiant_site=$my_Db_Connection->prepare("SELECT (id_site) from site inner join (entreprise and ville) WHERE nom==$Nom_entreprise and ville==$Ville ");

// Here we create a variable that calls the prepare() method of the database object
// The SQL query you want to run is entered as the parameter, and placeholders are written like this :placeholder_name
$offre_creation= $my_Db_Connection->prepare("INSERT INTO postule (Titre, Compétences, Durée, Date_post, nombre_places, Remuneration, valide, id_site  ) VALUES (:Titre, :Compétences, :Durée, :Date_post, :nombre_places, :Remuneration, :valide, :id_site  )");

// Now we tell the script which variable each placeholder actually refers to using the bindParam() method
// First parameter is the placeholder in the statement above - the second parameter is a variable that it should refer to
$offre_creation->bindParam(":Titre", $Titre);
$offre_creation->bindParam(":Compétences", $Compétences);
$offre_creation->bindParam(":Durée", $Durée_de_Stage);
$offre_creation->bindParam(":Date_post", $Date_de_lOffre);
$offre_creation->bindParam(":nombre_places", $Nombre_de_places);
$offre_creation->bindParam(":Remuneration", $Rémunération);
$offre_creation->bindParam(":valide", $Lettre);
$offre_creation->bindParam(":id_site", $Lettre);


$offre_creation->execute();


?>