<!DOCTYPE html>
<html lang="fr">

<head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0 " />
      <title>Accueil</title>
      <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css" />
      <link rel="stylesheet" href="./assets/vendors/fontawesome/css/all.min.css" />
      <link rel="stylesheet" href="assets/style.css" type="text/css" />
      <?php
      echo '<link rel="stylesheet" href="./style.css" type="text/css"/>';
      ?>
</head>

<body>
      <header>
            <nav class="navbar navbar-expand-lg">
                  <div class="container">
                        <a class="navbar-brand logo">CESITAGE</a>
                        <button class=" navbar-toggler" type="button" data-bs-toggle="collapse"
                              data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                              aria-expanded="false" aria-label="Toggle navigation">
                              <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="" id="navbarNavAltMarkup">
                              <div class="navbar-nav">
                                    <a class="nav-link active" aria-current="page" href="">Offres</a>
                                    <a class="nav-link" href="">Entreprises</a>
                                    <a class="nav-link" href=""><button
                                                class="btn btn-primary btn-header">S'inscrire</button></a>
                                    <a class="nav-link " href="login.php">
                                          <button class="btn btn-primary btn-header">Se connecter</button></a>
                              </div>
                        </div>
                  </div>
            </nav>
      </header>

      <script src="./assets/vendors/jquery/jquery-3.6.0.min.js"></script>
      <script src="./assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>