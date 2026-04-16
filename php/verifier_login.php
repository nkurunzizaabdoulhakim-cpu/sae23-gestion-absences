<?php
$req = $pdo->prepare("SELECT * FROM enseignants WHERE login = ? AND motdepasse = ?");
$req->execute([$login, $mdp]);
$user = $req->fetch();

if ($user) {
    $_SESSION['role'] = 'enseignant';
    $_SESSION['nom'] = $user['nom'];
    header('Location: ../index.php');
} else {
    // 2. Si non trouvé, on cherche dans les étudiants
    $req = $pdo->prepare("SELECT * FROM etudiants WHERE login = ? AND motdepasse = ?");
    $req->execute([$login, $mdp]);
    $etudiant = $req->fetch();

    if ($etudiant) {
        $_SESSION['role'] = 'etudiant';
        $_SESSION['id_etudiant'] = $etudiant['id']; // Très important pour filtrer ses absences plus tard
        $_SESSION['nom'] = $etudiant['prenom'] . " " . $etudiant['nom'];
        header('Location: ../index.php');
    } else {
        header('Location: ../login.php?erreur=1');
    }
}