<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("Location: layouts/homePage.php");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $login_err = "Identifiant ou mot de passe incorrect";
    } else {
        $sql = "SELECT * FROM users WHERE username = :username and password = :password";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            array(
                'username' => $_POST['username'],
                'password' => $_POST['password'],
            )
        );
        $count = $stmt->rowCount();
        if ($count) {
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $_POST["username"];
            header("Location: layouts/homePage.php");
        } else {
            $login_err = "Identifiant ou mot de passe incorrect";
        }
    }
}

// Processing form data when form is submitted
/* if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty($_POST["username"])) {
        $username_err = "Renseigner identifiant";
    } else {
        $username = trim($_POST['username']);
    }

    // Check if password is empty
    if (empty($_POST["password"])) {
        $password_err = "Renseigner le mot de passe";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (!empty($username_err) && !empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT * FROM users WHERE username = :username";

        if ($stmt = $conn->prepare($sql)) {
            // Set parameters
            $param_username = trim($_POST["username"]);

            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(':username', $param_username, PDO::PARAM_STR);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Check if username exists, if yes then verify password
                if ($stmt->rowCount() > 1) {
                    // Bind result variables
                    if ($row = $stmt->fetch()) {
                        $id = $row["id"];
                        $username = $row["username"];
                        $hashed_password = $row["password"];

                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirect user to welcome page

                            header('Location: Location: layouts/homePage.php.php');
                            exit();
                        }
                    } else {
                        // Password is not valid, display a generic error message
                        $login_err = "Identifiant ou mot de passe incorrect";
                    }
                } else {
                    // Username doesn't exist, display a generic error message
                    $login_err = "Identifiant ou mot de passe ";
                }
            } else {
                echo "Veuillez réessayer plus tard";
            }
            // Close statement
            unset($stmt);
        }
    }

    // Close connection
    unset($pdo);
} */

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Connexion</title>
    <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./assets/vendors/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>
    <div class="form-container">
        <h2 class="login-name">AUTHENTIFICATION</h2>
        <div class="row g-3 align-items-center">
            <div>
                <?php
                if (!empty($login_err)) {
                    echo '<div class="alert alert-danger">' . $login_err . '</div>';
                }
                ?>
            </div>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label">Identification</label>
                    <div class="col-sm-4">
                        <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" />

                    </div>

                </div>
                <div class="row mb-4">
                    <label class="col-sm-6 col-form-label">Mot de passe</label>
                    <div class="col-sm-4">
                        <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" />
                        <span class="invalid-feedback"><?php echo $password_err; ?></span>
                        <span class="invalid-feedback"><?php echo $username_err; ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" name="login" class="btn btn-primary btn-header" value="Se connecter" />
                </div>
                <p>Pas encore inscrit? <a href="register.php">S'inscrire</a></p>
            </form>
        </div>
    </div>

    <script src="./assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="./assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>