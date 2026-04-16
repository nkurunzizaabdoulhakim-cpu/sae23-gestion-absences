<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Slide Puzzle</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h1>Slide Puzzle 4x4</h1>
    <div class="card">
        <p>Nombre de coups : <span id="compteur">0</span></p>
        <div id="grille" class="grille-puzzle"></div>
        <button onclick="melanger()">Mélanger</button>
    </div>

    <div class="actions-bottom">
        <a class="btn secondary" href="index.php">Retour accueil</a>
    </div>
</div>

<script src="js/puzzle.js"></script>
</body>
</html>