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
<?php
include "consulta.php";
// Verificar si se proporcionó el ID del producto en la URL
if (isset($_GET['id'])) {
  $productId = $_GET['id'];
  // Realiza la consulta para obtener los detalles del producto con el ID especificado
  $query = "SELECT * FROM Producto WHERE id_producto = $productId";
  $result = $conn->query($query);
  // Verifica si se encontró el producto
  if ($result->num_rows > 0) {
    // Obtiene los detalles del producto
    $row = $result->fetch_assoc();
    $productName = $row['nombre'];
    $productDescription = $row['Descrip'];
    $productPrice = $row['Pre_uni'];
    $productImage = $row['imagen'];
    $productMedida = $row['Medida'];
    
    echo '<div class="detalle-producto" style="
    background-image: url(img/fondo_detalle_producto.jpg);
    background-repeat: repeat;
    background-size: cover;">';
    echo '<div class="detalle-producto-imagen">';
    echo '<img src="img/productos/' . $productImage . '" alt="' . $productName . '">';
    echo '</div>';
    echo '<div class="detalle-producto-info">';
    echo '<h2>' . $productName . '</h2>';
    echo '<p>' . $productDescription . '</p>';
    echo '<p>Precio: S/.' . $productPrice . '</p>';
    echo '<p>Medida: ' . $productMedida . '</p>';
    
    // Botón de añadir cantidad con spinner
    echo '<div class="detalle-producto-cantidad">';
    echo '<button class="detalle-producto-btn-minus">-</button>';
    echo '<input type="number" min="1" value="1">';
    echo '<button class="detalle-producto-btn-plus">+</button>';
    echo '</div>';
    
    // Botón de añadir al carrito centrado
    echo '<div class="detalle-producto-btn-carrito">';
    echo '<button class="detalle-producto-btn-add">Añadir al Carrito</button>';
    echo '</div>';
    
    echo '</div>';
    echo '</div>';
    
  } else {
    echo 'Producto no encontrado.';
  }
} else {
  echo 'ID de producto no especificado.';
}

$conn->close();
?>
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
