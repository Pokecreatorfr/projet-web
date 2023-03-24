<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
      $pdo = new PDO("mysql:host=$servername;dbname=prosit8", $username, $password);
      // set the PDO error mode to exception
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "DELETE FROM pilote WHERE NoPil='" . $_GET["NoPil"] . "'";

      $pdo->exec($sql);
      header("Location: workspo.php");

      exit;
} catch (PDOException $e) {
      echo "Pas de connexion à la base de donnée: " . $e->getMessage();
} ?>