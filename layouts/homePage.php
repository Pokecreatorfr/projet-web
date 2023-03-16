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
<html>

<head>
      <link rel="stylesheet" href="style.css" />
</head>

<body>
      <div class="sucess">
            <h1>Bienvenue <?php echo $_SESSION['username']; ?>!</h1>
            <p>C'est votre tableau de bord.</p>
            <a href="logout.php">Déconnexion</a>
      </div>
</body>

</html>