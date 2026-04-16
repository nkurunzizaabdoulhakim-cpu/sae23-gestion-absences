<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Jeu de mots Yoda</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h1>Jeu de mots Yoda</h1>

    <div class="card">
        <p>
            Règle : les <strong>3 dernières lettres</strong> d’un mot doivent être les
            <strong>3 premières lettres</strong> du mot suivant.
        </p>

        <button id="btnYodaSimple">Afficher la solution exemple</button>

        <div id="resultatYoda" class="result-box" style="margin-top:15px;">
            Clique sur le bouton pour afficher une chaîne correcte.
        </div>
    </div>

    <div class="card">
        <h2>Exemple simple</h2>
        <p>
            stabilimètre → treillage → agençant → antagoniste → steamer
        </p>
    </div>

    <div class="actions-bottom">
        <a class="btn secondary" href="index.php">Retour accueil</a>
    </div>
</div>

<script src="js/yoda.js"></script>
</body>
</html>