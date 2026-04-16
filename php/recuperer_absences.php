<?php
require_once "connexion_bd.php";

$sql = "SELECT * FROM absences";
$stmt = $pdo->query($sql);
$liste = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($liste);
?>