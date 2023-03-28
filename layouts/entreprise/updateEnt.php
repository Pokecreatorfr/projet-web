<?php
session_start();

if (isset($_POST['updateEnt'])) {
      require_once "../../config.php";
      
      $validite = 1;
      
      $id_entreprise = $_POST['id_entreprise'];
      
      $nomEnt = $_POST["nomEnt"];
      $logoEnt = $_POST["logoEnt"];
      $nbreEtu = $_POST["nbreEtu"];

      $sql = "UPDATE entreprise SET nom='$nomEnt', photo_profil='$logoEnt', validite = '$validite', nombre_etudiant = '$nbreEtu'
       WHERE id_entreprise = '$id_entreprise' ";

      $stmt = $pdo->exec($sql);
      
      if ($stmt) {
            $_SESSION['status'] = "Modification réussie";
            header("Location: listEntreprise.php");
      } else {
            echo "erreur";
      }
}