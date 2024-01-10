<?php
include "consulta.php";

$orden = $_POST['orden'];
$precio = $_POST['precio'];
$categoria = $_POST['categoria'];
$medida = $_POST['medida'];
// Verificar si $categoria es una cadena de texto en lugar de un array
if (!is_array($categoria)) {
  $categoria = array($categoria); // Convertirlo a un array
}
// Construir la consulta SQL con los filtros aplicados
$query = "SELECT * FROM Producto WHERE categoria IN ('" . implode("','", $categoria) . "') AND medida = '$medida'";

if ($orden === 'ascendente') {
  $query .= " ORDER BY Pre_uni ASC";
} elseif ($orden === 'descendente') {
  $query .= " ORDER BY Pre_uni DESC";
} 

// Realizar la consulta para obtener el número total de productos que cumplen con los filtros
$resultTotal = $conn->query($query);
$totalProducts = $resultTotal->num_rows;

// Define el número de productos por página
$productsPerPage = 5;

// Calcula el número total de páginas
$totalPages = ceil($totalProducts / $productsPerPage);

// Obtiene la página actual, verifica si se proporcionó el parámetro "page" en la solicitud AJAX
if (isset($_POST['page'])) {
    $currentPage = $_POST['page'];
} else {
    $currentPage = 1;
}

// Calcula el offset de la base de datos (rango de resultados)
$offset = ($currentPage - 1) * $productsPerPage;

// Agrega el límite y offset a la consulta SQL principal
$query .= " LIMIT $offset, $productsPerPage";

// Realiza la consulta para obtener los productos filtrados con la paginación aplicada
$result = $conn->query($query);

// Verifica si la consulta se ejecutó correctamente
if ($result === false) {
  echo 'Error en la consulta: ' . $conn->error;
} else {
  // Genera el HTML de los productos filtrados
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $productId = $row['id_producto'];
      $productName = $row['nombre'];
      $productDescription = $row['Descrip'];
      $productPrice = $row['Pre_uni'];
      $productImage = $row['imagen'];
      $productMedida = $row['Medida'];
if($productPrice>$precio){

}else{
      echo '<div class="ctg-producto">';
      echo '<div class="ctg-producto-imagen">';
      echo '<a href="detalle_producto.php?id=' . $productId . '">';
      echo '<img src="img/productos/' . $productImage . '" alt="' . $productName . '">';
      echo '</div>';
      echo '<div class="ctg-producto-info">';
      echo '<h4 class="ctg-producto-nombre">' . $productName . '</h4>';
      echo '<p class="ctg-producto-descripcion">' . $productDescription . '</p><br>'.'Medida: ' . $productMedida;
      ;
      echo '</a>';  
      echo '<div class="ctg-producto-precio">';
      echo 'S/.' . $productPrice;
      echo '</div>';
      echo '<button class="ctg-producto-añadir">Añadir al Carrito</button>';
      echo '</div>';
      echo '</div>';
    }          
    }

    // Genera la paginación
    echo '<div class="ctg-pagination-container">';
    echo '<div class="ctg-pagination"></div>';
    echo '</div>';
  } else {
    // No se encontraron productos filtrados
    echo $categoria;
    echo 'No hay productos disponibles.';
  }
}

$conn->close();
?>
<script>
$(document).ready(function() {
  // Número total de páginas
  var totalPages = <?php echo $totalPages; ?>;

  // Página actual
  var currentPage = <?php echo $currentPage; ?>;

  // Inicializa el plugin de paginación
  $('.ctg-pagination').twbsPagination({
    totalPages: totalPages,
    startPage: currentPage,
    visiblePages: 5,
    onPageClick: function(event, page) {
      // Actualiza la página actual
      currentPage = page;

      // Comprueba si la página actual es diferente a la página actual en la URL
      if (currentPage !== <?php echo $currentPage; ?>) {
        // Actualiza la URL con el parámetro de página actual
        var url = 'catalogo.php?filtro_page=' + currentPage;
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
