<?php

// Create a new connection to the MySQL database using PDO, $my_Db_Connection is an object
require_once "../../config.php";

// Set the variablesfor the entreprise
$Nom_entreprise = $_POST["Nom_entreprise"];

//affiche le nombre d'offre 
$sql="SELECT COUNT (*) AS nombre_offres
FROM offre o 
JOIN site s ON o.id_site = s.id_site 
JOIN entreprise e ON s. id_entreprise = e.id_entreprise
WHERE e.nom = '$Nom_entreprise'";

if ($pdo->query($sql)->fetch()){
    $nboffre= $pdo->query($sql)->fetch()['nombre_offres'];
    echo 'le nombre doffres est '. $nboffre;
}

//affiche le nombre d'etudiants 
$sql2="SELECT  nombre_etudiant  
FROM entreprise
WHERE nom = '$Nom_entreprise'";

if ($pdo->query($sql2)->fetch()){
    $nbetu= $pdo->query($sql2)->fetch()['nombre_offres'];
    echo 'le nombre detudiants cesi dans cette entreprise  est: '. $nbetu;
}
?>