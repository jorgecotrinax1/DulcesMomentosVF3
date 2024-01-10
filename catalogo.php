<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pastelería</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="img/icono/favicon.ico">
  <!--acceso a los iconos-->
  <script src="https://kit.fontawesome.com/d06af9e14f.js" crossorigin="anonymous"></script>
  <!--acceso a los estilos-->
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/catalogo.css">
  <!--acceso al tipo de letra-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <!--acceso al estilo responsive-->
  <link rel="stylesheet" href="css/responsive.css">
  <!-- Script del jquery para las paginacionese etc etc etc -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.2/jquery.twbsPagination.min.js"></script>
<script src="script/confirmar_l.js"></script>
<!-- No borrar porque te cargas la paginacion de datos eh -->
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
  <div>-</div>
      <main>
        <div class="catalogo">
<?php 
include "lista_productos.php";
?>
            </div>
          </div>
        </div>
      </main>    

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
<script>
$(document).ready(function() {
    // Nümero de páginas totales
    var totalPages = <?php echo $totalPages; ?>;

    // Página actual
    var currentPage = <?php echo $currentPage; ?>;

    // Inicia el plugin
    $('.ctg-pagination').twbsPagination({
        totalPages: totalPages,
        startPage: currentPage,
        visiblePages: 5,
        onPageClick: function(event, page) {
            // Actualiza la página actual
            currentPage = page;

            // Revisa si la página actual clickeada es la misma de aquí
            if (currentPage !== <?php echo $currentPage; ?>) {
                // Refresca la página con el parámetro actual
                var url = 'catalogo.php?page=' + currentPage;
                window.location.href = url;
            }
        },
        first: 'Primero',
        prev: 'Anterior',
        next: 'Siguiente',
        last: 'Último',
        of: 'de {totalPages}'
    });
});
</script>