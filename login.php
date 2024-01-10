
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/stylelogin.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script/confirmar_l.js"></script>
</head>
<body>
    <div class="formulario">
        <h1>Inicio de sesión</h1> 
        <form id="loginForm">
            <div class="error_aviso" id="Error_Aviso"></div>
            <div class="username">
                <input type="text" name="email" required placeholder="Correo Electrónico">
                <label>Correo Electrónico</label>
            </div>
            <div class="username">
                <input type="password" name="contrasena" required placeholder="Ingrese contraseña">
                <label>contraseña</label>   
            </div>
            <div class="recordar">
                <label>
                    <input type="checkbox" name="keep_logged_in" value="true">
                    Mantenerme conectado
                </label>
                <a href="login/olvido.html">¿Olvidó su contraseña?</a>
            </div>
            <input type="submit" name="login_boton" value="Iniciar">
            <div class="registrarse">
                ¿No tienes cuenta? <a href="login/registro.php">Regístrate</a> o
                <a href="index.php">Regresar</a>
            </div>
        </form>
    </div>
    <!-- Esto redirige si el usuario ya ha iniciado sesión al index peues no puede iniciar dos veces -->
    <script>
document.addEventListener('DOMContentLoaded', function() {
    ConfirmarLogin(function(activo) {
      console.log(activo);
      if(activo == true){
        // Aquí si el usuario ha iniciado sesión
        window.location.href = "index.php";
      }else{
        // Aquí código si el usuario no ha iniciado sesión
        console.log("El usuario no ha iniciado sesión");
      }
    });
});
    </script>
<!-- Este script es ejecutado al presionar el botón -->
    <script>
        $(document).ready(function() {
            $('#loginForm').on('submit', function(e) {
                e.preventDefault(); 

                var email = $('input[name="email"]').val();
                var password = $('input[name="contrasena"]').val();
                var keepLoggedIn = $('input[name="keep_logged_in"]').is(':checked');
                var formData = {
                    email: email,
                    contrasena: password,
                    keep_logged_in: keepLoggedIn
                };

                $.ajax({
                    url: 'script/autenticar.php',
                    method: 'post',
                    data: JSON.stringify(formData),
                    contentType: 'application/json',
                    success: function(response) {
                        console.log(response);
                        // Aquí autenticar retorna la respuesta con respecto a los datos ingresados
                        switch(response) {
                            // Si es usuario normal
                            case "Redirigir":
                                window.location.href = "index.php";
                                break;
                                // Si es admin
                            case "Admin":
                                window.location.href = "admin.php";
                                break;
                            case "Contraseña Incorrecta":
                                $("#Error_Aviso").text(response);
                                break;
                            case "No se encontró al usuario":
                                $("#Error_Aviso").text(response);
                                break;
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
</body>
</html>
