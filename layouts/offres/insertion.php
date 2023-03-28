<?php

session_start();

if (isset($_POST['insertOffre'])) {
      
      require_once "../../config.php";

      $validite = 1;
      
      $titre = $_POST["Titre"];
      $description = $_POST["description"];
      $duree = $_POST["Durée_de_Stage"];
      $date_offre = $_POST["Date_offre"];
      $nombre_de_places = $_POST["Nombre_de_places"];
      $remuneration = $_POST["Rémunération"];
      $idVille = $_POST["ville"];
      $idEntreprise = $_POST["entreprise"];

      //recupération de l'id du site 
      $Sitereq = "SELECT id_site FROM 
      site s
      INNER JOIN entreprise e ON e.id_entreprise = s.id_entreprise
      INNER JOIN ville v ON v.id_ville = s.id_ville
      WHERE e.id_entreprise = '".$idEntreprise."' and v.id_ville = '".$idVille."' ";

      $idSite = $pdo->query($Sitereq);
      
      if($idSite->fetch()){
            $site = $pdo->query($Sitereq)->fetch()['id_site'];
      };
            
      $sql = "INSERT INTO offre (Titre, Description, Durée, Date_post, nombre_places, Remuneration, valide, id_site) 
      VALUES('$titre','$description','$duree', '$date_offre', '$nombre_de_places', '$remuneration', '$validite', '$site')";
      
      $stmt = $pdo->exec($sql);
      
      if ($stmt) {
            $_SESSION['status'] = "Offre ajoutée";
            header("Location: listOffre.php");
      } else {
            echo "erreur";
      }
}
else {
      echo "remplir tous les champs";
}