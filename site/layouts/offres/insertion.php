<?php

session_start();

if (isset($_POST['insertOffre'])) {
      
      var_dump($_POST);

      require_once "../../config.php";

      $validite = 1;
      
      $titre = $_POST["Titre"];
      $competences = $_POST["competences"];
      $duree = $_POST["Durée_de_Stage"];
      $date_offre = $_POST["Date_offre"];
      $nombre_de_places = $_POST["Nombre_de_places"];
      $remuneration = $_POST["Rémunération"];
      $idVille = substr($_POST["ville"], 0,-7 ) ;
      $idEntreprise = $_POST["entreprise"];

      $villeid = $pdo->prepare("SELECT id_ville FROM ville WHERE ville = :ville");
      $villeid->bindParam(":ville", $idVille);
      $villeid->execute();
      $idVille = $villeid->fetch(PDO::FETCH_ASSOC)['id_ville'];


      //recupération de l'id du site 
      $Sitereq = "SELECT id_site FROM 
      site s
      INNER JOIN entreprise e ON e.id_entreprise = s.id_entreprise
      INNER JOIN ville v ON v.id_ville = s.id_ville
      WHERE e.id_entreprise = '".$idEntreprise."' and v.id_ville = '".$idVille."' ";

      $idSite = $pdo->query($Sitereq);
      $idSite->execute();
      
      $id_s= $idSite->fetch()['id_site'];

      echo $id_s;

      if($id_s == null){
            $sql = "INSERT INTO site (id_entreprise, id_ville) VALUES('$idEntreprise','$idVille')";
            $stmt = $pdo->exec($sql);
            $site = $pdo->lastInsertId();
      };
            
      $sql = "INSERT INTO offre (Titre, Description , Durée, Date_post, nombre_places, Remuneration, valide, id_site) VALUES('$titre','$competences','$duree', '$date_offre', '$nombre_de_places', '$remuneration', '$validite', '$id_s')";
      
      $stmt = $pdo->exec($sql);
      
      if ($stmt) {
            $_SESSION['status'] = "Offre ajoutée";
            header("Location: listOffre.php");
      } else {
            echo "erreur";
      }
}