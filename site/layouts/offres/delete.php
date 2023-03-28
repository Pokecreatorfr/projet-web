<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
      header("Location: ../../login.php");
      exit;
}

require_once "../../config.php";

if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];

    $sql = "DELETE FROM offre WHERE id_offre = '$id'";
    $pdo->query($sql);

    if($pdo->query($sql))
    {
          echo '<script> alert("Suppression réussie"); </script>';
          header("Location: listOffre.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

?>