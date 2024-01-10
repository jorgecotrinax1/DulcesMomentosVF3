<?php 
$conexion=mysqli_connect('localhost','root','','dulces_momentos');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pastelería</title>
  <!--acceso a los iconos-->
  <link rel="icon" type="image/x-icon" href="img/icono/favicon.ico">
  <script src="https://kit.fontawesome.com/d06af9e14f.js" crossorigin="anonymous"></script>
  <!--acceso a los estilos-->
  <link rel="stylesheet" href="css/styles.css">
  <!--acceso al tipo de letra-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <!--acceso al estilo responsive-->
  <link rel="stylesheet" href="css/responsive.css">
  <link rel="stylesheet" href="css/admin.css">
  <link rel="stylesheet" href="css/styles.css">
  <script src="script/confirmar_l.js"></script>
</head>
<body>

<header class="header">
  <div class="wrapper">
    <div class="logo">
      <img src="img/icono/DulcesMomentos.png" alt="dulces">
    </div>
    <nav>
      <ul class="menu">
        <li><a href="index.php">Inicio</a></li>
        <li><a href="catalogo.php">Catalogo</a></li>
        <li><a href="contacto.php">Contacto</a></li>
        <li><a id="login" href="login.php">Login</a></li>
        <li><a id="salir" href="script/cerrarsesion.php">Logout</a></li>
        <li><a href="#"><img src="img/icono/carrito.png" alt="carrito" class="carrito"></a></li>
      </ul>
      <div class="texto_usuario" id="usuario"><p></p></div>
    </nav>
  </div>
</header>

    <div>-</div>
  <br><br><br><br><br><br><br><br>

  <p class="pe">BIENVENIDO ADMIN</p>
  <h1 class="Titulo">Datos registrados de nuestro servicio web(Usuarios):</h1>
  <br>
<div class="container-admin">
  <table class="tabla" border="2">
    <thead class="thead1">
      <tr class="tr1">
        <th class="th1">id</th> <th class="th1">user_correo</th> <th class="th1">psw</th><th class="th1">admin</th>
      </tr>

    </thead>

<br>

    

<?php

$sql="SELECT * FROM usuario ORDER BY CAST(id AS UNSIGNED) ASC;";
$result=mysqli_query($conexion,$sql);
while ($mostrar=mysqli_fetch_array($result)) {

?>

<tr class="tr1">
  <td class="td1"><?php echo $mostrar['id'] ?></td>
  <td class="td1"><?php echo $mostrar['user_correo'] ?></td>
  <td class="td1"><?php echo $mostrar['psw'] ?></td>
  <td class="td1"><?php echo $mostrar['admin'] ?></td>

</tr>

<?php
}
?>

</table>
  <br><br><br>
  <br>

<h1 class="Titulo">Datos del Producto en stock</h1>


  <table class="tabla" border="2">
    <thead class="thead1">
      <tr class="tr1">
        <th class="th1">id_producto</th> <th class="th1">nombre</th> <th class="th1">Categoria</th><th class="th1">Descrip</th>
        <th class="th1">Medida</th><th class="th1">stock</th><th class="th1">Pre_uni</th>
        <th class="th1">imagen</th>
      </tr>
    </thead>

  <br><br><br>

    </div>



<?php
$sql="SELECT * FROM producto ORDER BY CAST(id_producto AS UNSIGNED) ASC;";
$result=mysqli_query($conexion,$sql);
while ($mostrar=mysqli_fetch_array($result)) {
?>
<tr class="tr1">
  <td class="td1"><?php echo $mostrar['id_producto'] ?></td>
  <td class="td1"><?php echo $mostrar['nombre'] ?></td>
  <td class="td1"><?php echo $mostrar['Categoria'] ?></td>
  <td class="td1"><?php echo $mostrar['Descrip'] ?></td>
   <td class="td1"><?php echo $mostrar['Medida'] ?></td>
    <td class="td1"><?php echo $mostrar['stock'] ?></td>
     <td class="td1"><?php echo $mostrar['Pre_uni'] ?></td>
     <td class="td1"><?php echo $mostrar['imagen'] ?></td>

    <!-- <td class="td1"><img src="(signo menor=?php echo substr($mostrar['imagen'],20)?>" width="120" alt="" srcset=""  ></td>
Botones principales de la cabecera  DUDA-->  

</tr>
<?php
}
?>

</table>
<body> <h3>BIENVENIDO ADMIN</h3></body>
<footer class="pie-de-pagina">
        <div class="grupo-1">
          <div class="box">
            <figure>
              <img src="img/icono/DulcesMomentos.png" width="50%" alt="dulces">
            </figure>
          </div>
          <div class="box">
            <H2>EMAIL Y CONTACTO:</H2>
            <p>dulces_mom@gmail.com</p>
            <p>+51 941405912</p>
            <H2>Dirección:</H2>
            <p> Av. Vasco Núñez de Balboa 770, Miraflores 15074</p>
    
          </div>
          <div class="box">
            <h2>SIGUENOS</h2>
            <div class="red-social">
              <a href="#" class="fa fa-facebook"></a>
              <a href="#" class="fa fa-instagram"></a>
              <a href="#" class="fa fa-twitter"></a>
              <a href="#" class="fa fa-youtube"></a>
            </div>     
          </div>
        </div>
        <div class="grupo-2">
          <small>&copy; 2023 <b>Dulces Momentos</b> - All rights reserved.</small>
        </div>
      </footer>
</body>
</html>
      

<script>
  function getUserId(callback) {
    // Envía un AJAX para recuperar el ID presente si es que hay una sesión activa
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'script/id_usuario.php', true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var userId = xhr.responseText;
        console.log('Logged-in User ID: ' + userId);
        callback(userId); //Retorna el ID de la función
      }
    };
    xhr.send();
  }

  document.addEventListener('DOMContentLoaded', function() {
    var div = document.getElementById('usuario');

    ConfirmarLogin(function(activo) {
      console.log(activo);
      if (activo == true) {
        //si el usuario inició sesión
        document.getElementById("login").style.display = "none";
        document.getElementById("salir").style.display = "inline";
        document.getElementById("usuario").style.display = "inline";
        document.getElementById("usuario").style.color = "#F4F6F6";
        document.getElementById("usuario").style.fontSize = "23px";
        document.getElementById("usuario").style.fontFamily = "Poltawski Nowy";
        getUserId(function(userId) {
          var textNode = document.createTextNode('Usuario: ' + userId);
          div.innerHTML = ''; // Aborra el contenido que está presente en el header
          div.appendChild(textNode);
        });
      } else {
        // Si el usuario no ha iniciado sesión
        document.getElementById("login").style.display = "inline";
        document.getElementById("salir").style.display = "none";
        document.getElementById("usuario").style.display = "none";
        div.innerHTML = ''; // borra el contenido que está presente en el header
      }
    });
  });
</script>

