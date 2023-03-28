<!DOCTYPE html>
<html lang="fr">

<head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0 " />
      <title>suppression</title>
</head>

<body>
      <div class="container">
            <div class="wrapper">
                  <div class="container-fluid">
                        <div class="row">

                              <?php
                              $servername = "localhost";
                              $username = "root";
                              $password = "";

                              try {
                                    $pdo = new PDO("mysql:host=$servername;dbname=prosit8", $username, $password);
                                    // set the PDO error mode to exception
                                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                              } catch (PDOException $e) {
                                    echo "Connection failed: " . $e->getMessage();
                              }

                              // Attempt select query execution
                              $sql = "SELECT * FROM pilote";
                              if ($result = $pdo->query($sql)) {
                                    if ($result->rowCount() > 0) {
                                          echo '<div class="col-md-12">';
                                          echo '<table id="dataList" class="table table-bordered table-striped">';
                                          echo "<thead>";
                                          echo "<tr>";
                                          echo "<th>#</th>";
                                          echo "<th>Nom</th>";
                                          echo "<th>Nationnalité</th>";
                                          echo "<th>no</th>";
                                          echo "<th>Action</th>";
                                          echo "</tr>";
                                          echo "</thead>";
                                          echo "<tbody>";
                                          while ($row = $result->fetch()) {
                                                echo "<tr>";
                                                echo "<td>" . $row['NoPil'] . "</td>";
                                                echo "<td>" . $row['NomPil'] . "</td>";
                                                echo "<td>" . $row['NatPil'] . "</td>";
                                                echo "<td>" . $row['NoTV'] . "</td>";
                                                echo "<td>";
                                                echo '<a href="workDelete.php?NoPil='. $row['NoPil'] .'"> Supprimer</a>';
                                                echo "</td>";
                                                echo "</tr>";
                                          }
                                          echo "</tbody>";
                                          echo "</table>";
                                          echo "</div>";
                                          // Free result set
                                          unset($result);
                                    } else {
                                          echo '<div class="alert alert-danger"><em>Aucune donnée</em></div>';
                                    }
                              } else {
                                    echo "Oops! Réessayer plus tard.";
                              }
                              // Close connection
                              unset($pdo);
                              ?>
                        </div>
                  </div>
            </div>
      </div>


</body>

</html>