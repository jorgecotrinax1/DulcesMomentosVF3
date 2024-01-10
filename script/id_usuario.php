<?php
// Esto obtiene los datos de la sessión YA PRESENTE
session_start();

if (isset($_SESSION['user_email'])) {
    $userEmail = trim($_SESSION['user_email']); // Corta el String para extraer id_usuario.php del String
    echo substr($userEmail, strpos($userEmail, " "));
} else {
    echo 'ID Inválida o no encontrada';
}
?>
