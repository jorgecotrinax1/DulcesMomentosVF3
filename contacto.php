<?php include "script/conexion.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pastelería</title>
  <link rel="icon" type="image/x-icon" href="img/icono/favicon.ico">
  <!--acceso a los iconos-->
  <script src="https://kit.fontawesome.com/d06af9e14f.js" crossorigin="anonymous"></script>
  <!--acceso a los estilos-->
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/stylecontacto.css">

  <!--acceso al tipo de letra-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <!--acceso al estilo responsive-->
  <link rel="stylesheet" href="css/responsive.css">
  <script src="script/confirmar_l.js"></script>
</head>

<body>
  <!-- ESTE  ES EL HEADER -->
  <!-- AHORA CONTIENE LOGIN, DATOS DEL USUARIO Y ESO -->
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

  <!-- ESTE ES EL HEADER -->
  <h1 class="forheader">Contactanos</h1>
  
<!-- Contiene los productos en vertical -->
<div class="grid">

  <div class="col1">
  	<img class="img1" loading="lazy" width="450" height="550" src="https://panpepanaderiapasteleria.com/wp-content/uploads/2021/10/Visitanos-en-el-local.jpg" alt="" title="Visitanos en el local" srcset="https://panpepanaderiapasteleria.com/wp-content/uploads/2021/10/Visitanos-en-el-local.jpg 700w, https://panpepanaderiapasteleria.com/wp-content/uploads/2021/10/Visitanos-en-el-local-480x549.jpg 480w" sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) 700px, 100vw">
  </div>
  <div class="col1" id="ground">
    <center>
    <h1>Dirección: <img src="img\icono\marcador.png" alt=""></h1> 
    <p>Av. Vasco Núñez de Balboa 770, Miraflores 15074.</p>
    <h1>Teléfono: <img src="img\icono\telefono.png" alt=""></h1>
    <p>+51 941405912</p>
    <p>01 345-4567</p>
    <h1>Horarios: <img src="img\icono\hora.png" alt=""></h1>
    <p>Lunes a Viernes desde las 7:30am hasta 20:00pm</p>
    <p>Sábado y Domingo desde las 9:00am hasta las 18:00pm</p>
  </center>
  </div>

  </div>

  </div>
    <!--Formulario para correo-->
    <section id="email">
      <div class="contacto-contenedor" class="espaciado">
        <center>
             <h1>Ubicanos en <img src="img/icono/mapa.png" alt=""></h1> 
            
                  <form class="formc">
            <iframe id="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3900.7441125951063!2d-77.02617238463866!3d-12.129652646751762!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c81d64ebef2f%3A0x538baadf63cca807!2sPasteler%C3%ADa%20San%20Antonio%20-%20Miraflores!5e0!3m2!1ses-419!2spe!4v1680320622925!5m2!1ses-419!2spe" width="700" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </form>  
              </center> 
              
      </div>  <!--Formulario para correo-->
  </section>
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
      <small>&copy; 2023 <b>Dulces Momentos</b></small>
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

