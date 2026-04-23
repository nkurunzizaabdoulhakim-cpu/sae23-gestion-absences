<?php
session_start();
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once "php/connexion_bd.php";

    $login = trim($_POST["login"]);
    $motdepasse = trim($_POST["motdepasse"]);

    // 1. Chercher dans enseignants
    $sql = "SELECT id, nom, motdepasse, 'enseignant' AS role
            FROM enseignants
            WHERE login = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$login]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Si enseignant trouvé et mot de passe correct
    if ($user && $motdepasse === $user["motdepasse"]) {
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["user_nom"] = $user["nom"];
        $_SESSION["user_role"] = $user["role"];
        header("Location: index.php");
        exit();
    }

    // 2. Sinon chercher dans étudiants
    $sql = "SELECT id, nom, prenom, motdepasse, 'etudiant' AS role
            FROM etudiants
            WHERE login = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$login]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Si étudiant trouvé et mot de passe correct
    if ($user && $motdepasse === $user["motdepasse"]) {
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["user_nom"] = $user["nom"] . " " . $user["prenom"];
        $_SESSION["user_role"] = $user["role"];
        header("Location: index.php");
        exit();
    }

    $message = "Identifiants incorrects";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <div class="card login-box">
        <h1>Connexion</h1>

        <?php if ($message != ""): ?>
            <p class="erreur"><?php echo $message; ?></p>
        <?php endif; ?>

        <form method="post">
            <label>Login</label>
            <input type="text" name="login" required>

            <label>Mot de passe</label>
            <input type="password" name="motdepasse" required>

            <button type="submit">Connexion</button>
        </form>

    </div>
</div>

</body>
</html>