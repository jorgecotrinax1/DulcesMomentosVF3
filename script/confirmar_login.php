<?php
include "conexion.php";

// Chequea si la sesión está activa por lo que no necesita recuperar datos
if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) {
    // Si la sesión está activa
    echo "Sesión ya iniciada";
    exit;
}

// Chequea si existe la cookie de mantener la sesión iniciada para recuperar la sesión anterior
if (isset($_COOKIE['keep_logged_in'])) {
    $userId = $_COOKIE['keep_logged_in'];

    // Valida el login con la base de datos
    $validUserData = validatePersistentLogin($userId);

    if ($validUserData !== false) {

// Las variables de la session
        $_SESSION['user_id'] = $validUserData['user_id'];
        $_SESSION['user_email'] = $validUserData['user_email'];
        echo "Sesión ya iniciada";
        exit;
    }
}
function validatePersistentLogin($userId) {
    global $conn;

    // Usa la base de datos para validar la sesión
    $query = "SELECT id, user_correo FROM usuario WHERE id = '$userId'";
    $result = $conn->query($query);

    if ($result !== false && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $validUserId = $row['id'];
        $validUserEmail = $row['user_correo'];

        return [
            'user_id' => $validUserId,
            'user_email' => $validUserEmail
        ];
    }

    return false;
}

?>








<!-- Cementerio de Backups -->
// include "conexion.php";
// // Chequea si el usuario está en sesión
// if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) {
// // Si está en sesión activa
//     echo "Sesión ya iniciada";
//     exit;
// }
// // cheque si la cookie de mantener sesión iniciada está activo
// if (isset($_COOKIE['keep_logged_in'])) {
//     $userId = $_COOKIE['keep_logged_in'];
//     function validatePersistentLogin($userId) {
//         global $conn; 
//         // Hace consulta a la SQL
//         $query = "SELECT id, user_correo FROM usuario WHERE id = '$userId'";
//         $result = $conn->query($query);

// // Si el query es válido
//         if ($result !== false && $result->num_rows > 0) {
//             $row = $result->fetch_assoc();
//             $validUserId = $row['id'];
//             $validUserEmail = $row['user_correo'];

// // Retora el id y el email para utilizar
//             return [
//                 'user_id' => $validUserId,
//                 'user_email' => $validUserEmail
//             ];
//         }

// // si no falso     
//    return false;
//     }
// }