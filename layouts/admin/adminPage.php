<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
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
      <title>Profil</title>
      <link rel="stylesheet" href="../../assets/vendors/bootstrap/css/bootstrap.min.css" />
      <link rel="stylesheet" href="../../assets/vendors/fontawesome/css/all.min.css" />
      <link rel="stylesheet" href="../../style.css" type="text/css" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
            integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
      </script>
</head>

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
                                    <li><a class="dropdown-item" href="../comptes/profil.php">Profil</a></li>

                                    <?php

                                    if ($_SESSION['username'] == 'root') {
                                          echo '<li><a class="dropdown-item" href="#">Paramètres</a></li>';
                                    } ?>
                                    <li><a class="dropdown-item" href="../logout.php" class="">Se déconnecter</a></li>
                              </ul>
                        </div>
                  </div>
            </nav>
      </div>

      <div class="bg-secondary">
            <div class="container">
                  <!-- Begin Page Content -->
                  <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                              <h1 class="h1 mb-0">PARAMETRES</h1>
                        </div>
                        <div class="row">
                              <div class="col-xl-3 col-md-6 mb-4">
                                    <a href="../comptes/listComptes.php">
                                          <div class="card border-left-primary shadow h-100 py-2">
                                                <div class="card-body">
                                                      <div class="row no-gutters align-items-center">
                                                            <div class="col mr-2">
                                                                  <div
                                                                        class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                                        Gérer des comptes</div>
                                                                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                                        100
                                                                  </div>
                                                            </div>
                                                            <div class="col-auto">
                                                                  <i class="fas fa-users fa-2x text-gray-300"></i>
                                                            </div>
                                                      </div>
                                                </div>
                                    </a>
                              </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                              <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                          <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                      <div
                                                            class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                            Gérer les entreprises</div>
                                                      <div class="h5 mb-0 font-weight-bold text-gray-800">50
                                                      </div>
                                                </div>
                                                <div class="col-auto">
                                                      <i class="fas fa-building fa-2x text-gray-300"></i>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                              <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                          <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                      <div
                                                            class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                            Gérer les stages</div>
                                                      <div class="h5 mb-0 font-weight-bold text-gray-800">50
                                                      </div>
                                                </div>
                                                <div class="col-auto">
                                                      <i class="fas fa-pin fa-2x text-gray-300"></i>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                              <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                          <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                      <div
                                                            class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                            Gérer les candidatures</div>
                                                      <div class="h5 mb-0 font-weight-bold text-gray-800">50
                                                      </div>
                                                </div>
                                                <div class="col-auto">
                                                      <i class="fas fa-clipboard fa-2x text-gray-300"></i>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>

                  </div>

            </div>
            <!-- /.container-fluid -->
      </div>
      </div>

      <?php
      include '../footer.php';
      ?>

      <script src="./assets/vendors/jquery/jquery-3.6.0.min.js"></script>
      <script src="./assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>