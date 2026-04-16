<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: ../login.php");
    exit();
}

require_once "connexion_bd.php";

$groupe_id = $_POST["groupe_id"];
$module_id = $_POST["module_id"];
$date_seance = $_POST["date_seance"];
$heure_seance = $_POST["heure_seance"];
$enseignant_id = $_SESSION["user_id"];

$sql = "INSERT INTO seances (module_id, groupe_id, date_seance, heure_seance, enseignant_id)
        VALUES (?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$module_id, $groupe_id, $date_seance, $heure_seance, $enseignant_id]);

$seance_id = $pdo->lastInsertId();

if (isset($_POST["absences"])) {
    foreach ($_POST["absences"] as $etudiant_id => $listeCreneaux) {
        foreach ($listeCreneaux as $creneau => $type) {
            if ($type != "AUCUNE") {
                $sql = "INSERT INTO absences (seance_id, etudiant_id, creneau, type_absence)
                        VALUES (?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$seance_id, $etudiant_id, $creneau, $type]);
            }
        }
    }
}

header("Location: ../consultation.php?ok=1");
exit();
?>