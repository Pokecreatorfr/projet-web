<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to home page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
      header("Location: layouts/homePage.php");
      exit;
}

// Include config file
require_once "./config.php";
// Prepare a select statement
$sql = "SELECT * FROM users WHERE username = 'root'";
$stmt = $pdo->prepare($sql);
$stmt->bindParam('root', $param_username, PDO::PARAM_STR);
// Attempt to execute the prepared statement
$stmt->execute(
      array(
            'username' =>  $username,
      )
);
$count = $stmt->rowCount();

if ($count) {
      // Store data in session variables
      $_SESSION["loggedin"] = true;
      $_SESSION["username"] =  $username;
}
// Close statement
unset($stmt);
// Close connection
unset($pdo);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0 " />
      <title>Welcome</title>
      <link rel="stylesheet" href="../../assets/vendors/bootstrap/css/bootstrap.min.css" />
      <link rel="stylesheet" href="../../assets/vendors/fontawesome/css/all.min.css" />
      <link rel="stylesheet" href="../../style.css" type="text/css" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
      </script>
</head>

<body>

      <?php
      if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            $role = $username['0'];
            if ($role == 1) {
      ?>
                  <li><a class="dropdown-item" href="#">Gestion</a></li>
      <?php
            }
      }
      ?>

      <script src="./assets/vendors/jquery/jquery-3.6.0.min.js">
      </script>
      <script src="./assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>