<?php
$usr = 'root';
$pass = '';
$dbname = 'dulces_momentos';

// Crea la conexión
$conn = new mysqli('localhost', $usr, $pass, $dbname) or die("No se pudo conectar a la base de datos");

// Checa la conexión
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}
?>
