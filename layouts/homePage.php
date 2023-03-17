<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
      header("Location: ../login.php");
      exit;
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0 " />
      <title>Welcome</title>
      <link rel="stylesheet" href="../assets/vendors/bootstrap/css/bootstrap.min.css" />
      <link rel="stylesheet" href="../assets/vendors/fontawesome/css/all.min.css" />
      <link rel="stylesheet" href="../style.css" type="text/css" />
</head>

<body>

      <!-- Navbar -->
      <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-white">
                  <!-- Container wrapper -->
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
                                    <a class="nav-link" href="./offres/createOffre.php">Offres</a>
                                    <a class="nav-link" href="./Entreprise/createEntreprise.php">Entreprises</a>
                              </div>
                        </div>

                        <!-- Right elements -->
                        <div class="">
                              <!-- Avatar -->
                              <div class="btn btn-outline-info">
                                    <h4>Bonjour,
                                          <b>
                                                <?php echo htmlspecialchars($_SESSION["username"]); ?>
                                          </b>
                                    </h4>
                              </div>
                              <a href="logout.php" class=""><i class="fas fa-power-off fa-2x"></i></a>
                        </div>
                  </div>
            </nav>
      </div>

      <?php
      include 'home.php';
      ?>
      <?php
      include 'footer.php';
      ?>

      <script src="./assets/vendors/jquery/jquery-3.6.0.min.js"></script>
      <script src="./assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>