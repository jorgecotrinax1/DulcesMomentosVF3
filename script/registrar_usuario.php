<?php
include "conexion.php";
$inputData = file_get_contents('php://input');
$formData = json_decode($inputData, true);

$email = $formData['email'];
$password = $formData['contrasena'];

// Check if the user already exists
$existingUserQuery = "SELECT * FROM usuario WHERE user_correo = '$email'";
$result = $conn->query($existingUserQuery);

if ($result->num_rows > 0) {
    // SI es que existe
    echo "El usuario ya existe en la base de datos";
} else {
    // Retorna la ID más alta de la base de datos, para crear un número siguiente
    $maxIdQuery = "SELECT MAX(id) AS max_id FROM usuario";
    $result = $conn->query($maxIdQuery);
    $row = $result->fetch_assoc();
    $maxId = $row['max_id'];

    // Genera la id
    $newId = $maxId + 1;

    // Inserta en la tabla con la ID creada aquí
    $query = "INSERT INTO usuario (id, user_correo, psw, admin) VALUES ('$newId', '$email', '$password', 0)";

    if ($conn->query($query) === TRUE) {
        echo "Se insertó un nuevo usuario";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Cierra la conexión
$conn->close();
?>
