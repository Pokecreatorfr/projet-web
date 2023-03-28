<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if ($_SESSION["loggedin"]!==4 || $_SESSION["loggedin"] !== true) {
      header("Location: ../../login.php");
      exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0 " />
      <title>Liste des étudiants</title>
      <link rel="stylesheet" href="../../assets/vendors/bootstrap/css/bootstrap.min.css" />
      <link rel="stylesheet" href="../../style.css" type="text/css" />

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.css" />
</head>

<body>

      <body>
            <!-- Navbar -->
            <div class="container">
                  <nav class="navbar navbar-expand-lg navbar-light">

                        <div class="container-fluid">
                              <!-- Toggle button -->
                              <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                                    data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <i class="fas fa-bars"></i>
                              </button>

                              <!-- Collapsible wrapper -->
                              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <!-- Navbar brand -->
                                    <a class="navbar-brand logo">CESITAGE</a>
                              </div>
                              <!-- Collapsible wrapper -->
                              <div class="" id="navbarNavAltMarkup">
                                    <div class="navbar-nav">
                                          <a class="nav-link" href="../homePage.php">Acceuil</a>
                                          <a class="nav-link" href="../offres/listOffre.php">Offres</a>
                                          <a class="nav-link" href="../entreprise/listEntreprise.php">Entreprises</a>
                                    </div>
                              </div>

                              <div class="dropdown">
                                    <button class="btn btn-outline-info dropdown-toggle" type="button"
                                          id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                          <?php echo htmlspecialchars($_SESSION["username"]); ?>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                          <li><a class="dropdown-item" href="./profil.php">Profil</a></li>
                                          <?php
                                          if ($_SESSION['id'] == 1) {
                                                echo '<li><a class="dropdown-item" href="../admin/adminPage.php">Paramètres</a></li>';
                                          } ?>
                                          <li><a class="dropdown-item" href="../logout.php" class="">Se déconnecter</a>
                                          </li>
                                    </ul>
                              </div>
                        </div>
                  </nav>
            </div>

            <div class="container">
                  <div class="wrapper">
                        <div class="container-fluid">
                              <div class="row">
                                    <div class="col-12">
                                          <h1>Liste des étudiants</h1>
                                          <div class="mt-5 mb-3">
                                                <h2 class="pull-left">
                                                      <?php
                                                      if ($_SESSION['id'] == 4) {
                                                            echo '<a href="createCompte.php" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>Créer un étudiant</a>';
                                                      } ?>

                                                </h2>
                                          </div>
                                    </div>
                                    <?php
                                    // Include config file
                                    require_once "../../config.php";

                                    // Attempt select query execution
                                    $sql = "SELECT p.id_personne, p.Nom, p.Prenom, p.sexe FROM compte c
                                    INNER JOIN personne p
                                    ON c.id_personne = p.id_personne
                                    WHERE id_type = 3";
                                    if ($result = $pdo->query($sql)) {
                                          if ($result->rowCount() > 0) {
                                                echo '<div class="col-md-12">';
                                                echo '<table id="dataList" class="table table-bordered table-striped">';
                                                echo "<thead>";
                                                echo "<tr>";
                                                echo "<th>#</th>";
                                                echo "<th>Nom</th>";
                                                echo "<th>Prénom</th>";
                                                echo "<th>Sexe</th>";
                                                echo "<th>Action</th>";
                                                echo "</tr>";
                                                echo "</thead>";
                                                echo "<tbody>";
                                                while ($row = $result->fetch()) {
                                                      echo "<tr>";
                                                      echo "<td>" . $row['id_personne'] . "</td>";
                                                      echo "<td>" . $row['Nom'] . "</td>";
                                                      echo "<td>" . $row['Prenom'] . "</td>";
                                                      echo "<td>" . $row['sexe'] . "</td>";
                                                      echo "<td>";
                                                      echo '<a href="viewProfil.php?id=' . $row['id_personne'] . '" title="Details"
                                                      data-bs-target="#compte"><span class="fa fa-eye"></span></a>';
                                                      echo '<a href="update.php?id=' . $row['id_personne'] . '" class="ms-3" title="Modifier" data-toggle="tooltip" data-bs-toggle="modal"
                                                      data-bs-target="#ModificationProfil"><span class="fa fa-pencil"></span></a>';
                                                      echo '<a href="delete.php?id=' . $row['id_personne'] . '" class="ms-3" title="Supprimer" data-toggle="tooltip" data-bs-toggle="modal"
                                                      data-bs-target="#Supprimerprofil"><span class="fa fa-trash"></span></a>';
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

            <?php
            include '../footer.php';
            ?>

            <script src="./assets/vendors/jquery/jquery-3.6.0.min.js"></script>
            <script src="./assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Script datatable -->
            <?php
            include '../../datatable.php'
            ?>
      </body>

</html>

<div class="modal fade" id="ModificationProfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modification du profil</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                        ...
                  </div>
                  <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-primary">Sauvegarder</button>
                  </div>
            </div>
      </div>
</div>

<div class="modal fade" id="Supprimerprofil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Suppression</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                        Voulez-vous vraiment supprimer ce profil?
                  </div>
                  <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-danger">Supprimer</button>
                  </div>
            </div>
      </div>
</div>