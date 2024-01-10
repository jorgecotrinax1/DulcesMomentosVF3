<?php
include "conexion.php";
// Obtiene el formulario en JSON, array
$inputData = file_get_contents('php://input');
$formData = json_decode($inputData, true);

$email = $formData['email'];
$password = $formData['contrasena'];
// Realiza la consulta
$query = "SELECT * FROM usuario WHERE user_correo = '$email' LIMIT 1";
$result = $conn->query($query);

if ($result === false) {
    echo "Error en la consulta: " . $conn->error;
} else {
    // Aquí selecciona el usuario que brindó la tabla, obviamente al ser 
    // el unico usuario se encuentra en la fila 1
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedPassword = $row["psw"];
        if ($password == $storedPassword) {
            // Si es admin inicia una sesión
            $admin = $row["admin"];
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            // Retorna el id del usuario
            $_SESSION['user_id'] = $row['id'];
            // Email del usuario
            $_SESSION['user_email'] = $row['user_correo'];
            // Si el botón de mantener la sesión iniciada está activo
            // crea una cookie que almacena los datos de la sesión, incluso si se cierra el navegador
            // funciona por 30 días
            if (isset($formData['keep_logged_in']) && $formData['keep_logged_in'] === true) {
                $expiry = time() + (30 * 24 * 60 * 60); // 30 días
                setcookie('keep_logged_in', $row['id'], $expiry, '/');
            } else {
                setcookie('keep_logged_in', '', time() - 3600, '/');
            }
            // Aquí el código retorna la respuesta
            if ($admin == 1) {
                echo "Admin";
            } else {
                echo "Redirigir";
            }
        } else {
            echo "Contraseña Incorrecta";
        }
    } else {
        echo "No se encontró al usuario";
    }
}
?>
