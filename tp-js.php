<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>TP JavaScript</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h1>TP JavaScript - Interactions utilisateur</h1>

    <div class="card">
        <h2>Exercice 1 : Afficher / masquer</h2>
        <button id="btnMessage">Afficher / Masquer le message</button>
        <p id="messageCache" style="display:none;">Bonjour, ceci est un message affiché par JavaScript.</p>
    </div>

    <div class="card">
        <h2>Exercice 2 : Ajouter une tâche</h2>
        <input type="text" id="tacheInput" placeholder="Entrer une tâche">
        <button id="btnAjouter">Ajouter</button>
        <p id="erreurTache" class="erreur"></p>
        <ul id="listeTaches"></ul>
    </div>

    <div class="card">
        <h2>Exercice 3 : Filtrer les tâches</h2>
        <input type="text" id="filtreTache" placeholder="Filtrer une tâche">
    </div>

    <div class="actions-bottom">
        <a class="btn secondary" href="index.php">Retour accueil</a>
    </div>
</div>

<script src="js/tp.js"></script>
</body>
</html>