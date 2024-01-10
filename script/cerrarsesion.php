<?php
session_start(); // Inicia la sesión porque este php no está relacionado a ningún otro que lo haga

// Limpia la data
$_SESSION = array();

// Destruye la sesión
session_destroy();

// destruye la cookie
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600, '/');
}

// Borra la cookie de manetener sesión
setcookie('keep_logged_in', '', time() - 3600, '/');

// Redirige al index de nuevo
header('Location: ../index.php');
exit();
?>