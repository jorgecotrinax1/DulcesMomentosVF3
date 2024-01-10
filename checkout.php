<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <!--acceso a los iconos-->
    <link rel="icon" type="image/x-icon" href="img/icono/favicon.ico">
    <script src="https://kit.fontawesome.com/d06af9e14f.js" crossorigin="anonymous"></script>
    <!--acceso a los estilos-->
     <link rel="stylesheet" href="css/styles.css">
    <!--acceso al tipo de letra-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <!--acceso al estilo responsive-->
    <link rel="stylesheet" href="css/checkout.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="script/confirmar_l.js"></script>
</head>

<body class="checkoutb">
    <div class="checkout-form fade-in">
      <h2>Checkout</h2>
      <!-- slots de los items -->
      <div class="contenedor-item">
        <span>Item 1</span>
        <input type="number" min="0" class="seleccionar-cantidad">
      </div>
  
      <div class="contenedor-item">
        <span>Item 2</span>
        <input type="number" min="0" class="seleccionar-cantidad">
      </div>
  
      <div class="contenedor-item">
        <span>Item 3</span>
        <input type="number" min="0" class="seleccionar-cantidad">
      </div>
  
      <!-- comprar y regresar -->
      <div class="contenedor-boton">
        <button class="boton-compra">Comprar</button>
        <a href="index.php" class="boton-regresar">Regresar</a>
      </div>
    </div>

    <br>
    <br>
    <br>  

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
  
    <!-- pequeño script para animacion chiquita -->
    <script>
      window.addEventListener('DOMContentLoaded', function () {
        var form = document.querySelector('.checkout-form');
        form.classList.add('fade-in');
      });
    </script>
</body>


</html>