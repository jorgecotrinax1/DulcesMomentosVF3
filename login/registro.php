
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="../css/stylelogin.css"> 
	<link rel="stylesheet" href="../css/styles.css">
	<script src="../script/confirmar_l.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
	 
	<div class="formulario2">
		<h1>Registro</h1>
		<form id="loginForm" > 
		<div class="error_aviso" id="Error_Aviso"></div>
			<div class="username2">
			<input type="text" name="email"  required placeholder ="Ingrese su correo electronico">	
			<label>Correo electronico</label>
			</div>
			<div class="username2">
				<input id="login_contrasena" type="password" name="contrasena" required placeholder="Ingrese contraseña">
				<label>Contraseña</label>
			</div>
			<div class="username2">
				<input id="login_repetir"type="password" name="repetir" required placeholder="Repita la Contraseña">
				<label>Confirmar Contraseña</label>
			</div>			
			<input type="submit" value="Crear cuenta">
			<div class="registrarse">
				¿Ya estas registrado? <a href="../login.php"> Inicia sesión</a>
			</div>
			<div class="terminos">
				Sus datos personales se utilizarán para respaldar su experiencia en este sitio web, para administrar el acceso a su cuenta 
				y para otros fines descritos en nuestra <a href="terminos.html"> terminos y condiciones.
			</div>

		</form>
		

	</div>

</body>
</html>
<script>
document.addEventListener('DOMContentLoaded', function() {
    ConfirmarLogin(function(activo) {
      console.log(activo);
      if(activo == true){
        // Aquí si el usuario ha iniciado sesión
        window.location.href = "../index.php";
      }else{
        // Aquí código si el usuario no ha iniciado sesión
        console.log("El usuario no ha iniciado sesión");  
      }
    });
});
    </script>
	    <script>
$(document).ready(function() {
  $('#loginForm').on('submit', function(e) {
    e.preventDefault(); // Evita el envío automático del formulario

    var passwordInput = document.getElementById('login_contrasena');
    var confirmPasswordInput = document.getElementById('login_repetir');

    if (passwordInput.value !== confirmPasswordInput.value) {
      // Las contraseñas no coinciden
      console.log("Las contraseñas deben coincidir.");
      $("#Error_Aviso").text("Las contraseñas deben coincidir");
      return false;
    } else {
      // Las contraseñas coinciden, proceder con la creación del usuario
      var email = $('input[name="email"]').val();
      var password = $('input[name="contrasena"]').val();
      var formData = {
        email: email,
        contrasena: password,
      };

      $.ajax({
        url: '../script/registrar_usuario.php',
        method: 'post',
        data: JSON.stringify(formData),
        contentType: 'application/json',
        success: function(response) {
          console.log(response);
          if (response === "Se insertó un nuevo usuario") {
            console.log("Se ejecutó el response");
            alert("Nuevo usuario creado");
            window.location.href = "../login.php";
          }
        },
        error: function(error) {
          console.log(error);
        }
      });
    }
  });
});
    </script>