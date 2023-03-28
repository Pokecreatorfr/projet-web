<?php
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
      header("Location: ../../login.php");
      exit;
}


$servername = "localhost";
$username = "root";
$password = "";

try {
      $pdo = new PDO("mysql:host=$servername;dbname=projetWeb", $username, $password);
      // set the PDO error mode to exception
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "UPDATE `compte` SET  `validite`= 0 WHERE `id_c` = '" . $_GET["id_c"] . "'";
     
      if( $pdo->exec($sql)) {
            $_SESSION['supp'] = "Suppression réussie";
            header("Location: listComptes.php");
      }

} catch (PDOException $e) {
      echo "Pas de connexion à la base de donnée: " . $e->getMessage();
}