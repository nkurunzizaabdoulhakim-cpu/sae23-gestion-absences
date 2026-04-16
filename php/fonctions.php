<?php
function proteger($texte) {
    return htmlspecialchars($texte, ENT_QUOTES, 'UTF-8');
}
?>