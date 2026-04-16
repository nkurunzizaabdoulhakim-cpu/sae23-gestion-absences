<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

require_once "php/connexion_bd.php";
require_once "php/fonctions.php";

$filtreNom = $_GET["nom"] ?? "";
$filtreDate = $_GET["date_seance"] ?? "";

$sql = "SELECT e.nom, e.prenom, g.nom AS groupe_nom, m.code,
               s.date_seance, s.heure_seance, a.creneau, a.type_absence
        FROM absences a
        JOIN etudiants e ON a.etudiant_id = e.id
        JOIN seances s ON a.seance_id = s.id
        JOIN groupes g ON s.groupe_id = g.id
        JOIN modules m ON s.module_id = m.id
        WHERE 1=1";

$params = [];

if ($filtreNom != "") {
    $sql .= " AND e.nom LIKE ?";
    $params[] = "%" . $filtreNom . "%";
}

if ($filtreDate != "") {
    $sql .= " AND s.date_seance = ?";
    $params[] = $filtreDate;
}

$sql .= " ORDER BY s.date_seance DESC, e.nom ASC";

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$absences = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Consultation des absences</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h1>Consultation des absences</h1>

    <?php if (isset($_GET["ok"])): ?>
        <p class="success">Absences enregistrées avec succès.</p>
    <?php endif; ?>

    <div class="card">
        <form method="get" class="form-grid">
            <div>
                <label>Nom étudiant</label>
                <input type="text" name="nom" value="<?php echo proteger($filtreNom); ?>">
            </div>

            <div>
                <label>Date</label>
                <input type="date" name="date_seance" value="<?php echo proteger($filtreDate); ?>">
            </div>

            <div class="full-row">
                <button type="submit">Filtrer</button>
            </div>
        </form>
    </div>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Étudiant</th>
                    <th>Groupe</th>
                    <th>Module</th>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Créneau</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($absences) > 0): ?>
                    <?php foreach ($absences as $absence): ?>
                        <tr>
                            <td><?php echo proteger($absence["nom"]) . " " . proteger($absence["prenom"]); ?></td>
                            <td><?php echo proteger($absence["groupe_nom"]); ?></td>
                            <td><?php echo proteger($absence["code"]); ?></td>
                            <td><?php echo proteger($absence["date_seance"]); ?></td>
                            <td><?php echo proteger($absence["heure_seance"]); ?></td>
                            <td><?php echo proteger($absence["creneau"]); ?></td>
                            <td><?php echo proteger($absence["type_absence"]); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">Aucune absence trouvée.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="actions-bottom">
        <a class="btn" href="absences.php">Retour saisie</a>
        <a class="btn secondary" href="index.php">Accueil</a>
    </div>
</div>

</body>
</html>