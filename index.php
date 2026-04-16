<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>SAE23 - Accueil</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h1>SAE23 - Web Dynamique</h1>
    <p>Projet principal : Gestion des absences</p>

    <?php if (isset($_SESSION['user_nom'])): ?>
        <div class="card">
            <p>
                Connecté : <strong><?php echo $_SESSION['user_nom']; ?></strong>
                (<?php echo $_SESSION['user_role']; ?>)
            </p>

            <ul class="menu">
                <?php if ($_SESSION['user_role'] === 'enseignant'): ?>
                    <li><a href="absences.php">Gestion des absences</a></li>
                <?php endif; ?>

                <li><a href="consultation.php">Consultation</a></li>
                <li><a href="puzzle.php">Slide Puzzle</a></li>
                <li><a href="yoda.php">Jeu Yoda</a></li>
                <li><a href="tp-js.php">TP JavaScript</a></li>
                <li><a href="logout.php">Déconnexion</a></li>
            </ul>
        </div>
    <?php else: ?>
        <div class="card">
            <p>Bienvenue. Connectez-vous pour accéder au projet.</p>
            <a class="btn" href="login.php">Se connecter</a>
        </div>
    <?php endif; ?>
</div>

</body>
</html>