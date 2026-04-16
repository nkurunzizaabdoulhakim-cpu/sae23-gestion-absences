<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

/* Seuls les enseignants peuvent saisir les absences */
if (!isset($_SESSION["user_role"]) || $_SESSION["user_role"] !== "enseignant") {
    die("Accès refusé : cette page est réservée aux enseignants.");
}

require_once "php/connexion_bd.php";
require_once "php/fonctions.php";

$groupes = $pdo->query("SELECT * FROM groupes")->fetchAll(PDO::FETCH_ASSOC);
$modules = $pdo->query("SELECT * FROM modules")->fetchAll(PDO::FETCH_ASSOC);

$etudiants = [];
$groupeChoisi = "";
$moduleChoisi = "";
$dateChoisie = date("Y-m-d");
$heureChoisie = date("H:i");

if (isset($_GET["groupe"]) && $_GET["groupe"] != "") {
    $groupeChoisi = $_GET["groupe"];
    $moduleChoisi = $_GET["module"] ?? "";
    $dateChoisie = $_GET["date_seance"] ?? date("Y-m-d");
    $heureChoisie = $_GET["heure_seance"] ?? date("H:i");

    $sql = "SELECT * FROM etudiants WHERE groupe_id = ? ORDER BY nom, prenom";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$groupeChoisi]);
    $etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$creneaux = ["08-10", "10-12", "13-15", "15-17"];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des absences</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h1>Gestion des absences</h1>
    <p>
        Connecté : <strong><?php echo proteger($_SESSION["user_nom"]); ?></strong>
        (<?php echo proteger($_SESSION["user_role"]); ?>)
    </p>

    <div class="card">
        <form method="get" class="form-grid">
            <div>
                <label>Groupe</label>
                <select name="groupe" required>
                    <option value="">Choisir</option>
                    <?php foreach ($groupes as $groupe): ?>
                        <option value="<?php echo $groupe["id"]; ?>" <?php if ($groupeChoisi == $groupe["id"]) echo "selected"; ?>>
                            <?php echo proteger($groupe["nom"]); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label>Module</label>
                <select name="module" required>
                    <option value="">Choisir</option>
                    <?php foreach ($modules as $module): ?>
                        <option value="<?php echo $module["id"]; ?>" <?php if ($moduleChoisi == $module["id"]) echo "selected"; ?>>
                            <?php echo proteger($module["code"]) . " - " . proteger($module["libelle"]); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label>Date</label>
                <input type="date" name="date_seance" value="<?php echo $dateChoisie; ?>" required>
            </div>

            <div>
                <label>Heure</label>
                <input type="time" name="heure_seance" value="<?php echo $heureChoisie; ?>" required>
            </div>

            <div class="full-row">
                <button type="submit">Afficher les étudiants</button>
            </div>
        </form>
    </div>

    <?php if (!empty($etudiants)): ?>
        <div class="card">
            <form method="post" action="php/sauvegarder_absences.php" id="formAbsences">
                <input type="hidden" name="groupe_id" value="<?php echo $groupeChoisi; ?>">
                <input type="hidden" name="module_id" value="<?php echo $moduleChoisi; ?>">
                <input type="hidden" name="date_seance" value="<?php echo $dateChoisie; ?>">
                <input type="hidden" name="heure_seance" value="<?php echo $heureChoisie; ?>">

                <table>
                    <thead>
                        <tr>
                            <th>Étudiant</th>
                            <?php foreach ($creneaux as $creneau): ?>
                                <th><?php echo $creneau; ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($etudiants as $etudiant): ?>
                            <tr>
                                <td><?php echo proteger($etudiant["nom"]) . " " . proteger($etudiant["prenom"]); ?></td>
                                <?php foreach ($creneaux as $creneau): ?>
                                    <td>
                                        <div class="case-absence"
                                             data-etudiant="<?php echo $etudiant["id"]; ?>"
                                             data-creneau="<?php echo $creneau; ?>"
                                             data-type="AUCUNE">-</div>

                                        <input type="hidden"
                                               name="absences[<?php echo $etudiant["id"]; ?>][<?php echo $creneau; ?>]"
                                               value="AUCUNE">
                                    </td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <div class="legend">
                    <span class="badge abi">ABI</span>
                    <span class="badge abj">ABJ</span>
                    <span class="badge neutre">Double clic = annuler</span>
                </div>

                <button type="submit">Valider les absences</button>
            </form>
        </div>
    <?php endif; ?>

    <div class="actions-bottom">
        <a class="btn" href="consultation.php">Consultation</a>
        <a class="btn secondary" href="index.php">Retour accueil</a>
    </div>
</div>

<script src="js/absences.js"></script>
</body>
</html>