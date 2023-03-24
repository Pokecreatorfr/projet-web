<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
      header("Location: ../../login.php");
      exit;
}

require_once "../../config.php";

if(isset($_GET['id'])) {
      $sql = "DELETE FROM entreprise WHERE id_entreprise = ".$_GET['id'];
      $pdo->query($sql);
      header("Location: listEntreprise.php");
  }
?>