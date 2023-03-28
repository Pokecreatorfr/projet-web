<?php
require_once "../../config.php";

if (isset($_POST["rating_data"])) {

      $data = array(
            ':user_name' => $_POST["user_name"],
            ':id_entreprise' => $_POST["id_entreprise"],
            ':note' => $_POST["note"],
            ':commentaire' => $_POST["commentaire"],
      );

      $query = "INSERT INTO evaluation (user_name, id_entreprise, note, c) VALUES (:user_name, :id_entreprise, :note, :commentaire)";

      $statement = $pdo->prepare($query);

      $statement->execute($data);

      echo "Your Review & Rating Successfully Submitted";
}