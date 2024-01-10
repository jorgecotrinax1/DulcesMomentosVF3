<div class="ctg-filtro-productos">
            <div class="ctg-filtro">
              <h2>Filtro de productos</h2>                 
             <!-- Filtros y con opciones disponibles, luego lo vinculamos al script -->
             <div class="orden">
              <h3>Orden:</h3>
              <select name="orden" id="orden">
                <option value="ascendente">Precio ascendente</option>
                <option value="descendente">Precio descendente</option>
              </select>
            </div>
              <!-- FITLRO DE PRECIOS -->
              <div class="precio">
  <h3>Precio:</h3>
  <input type="range" id="precio" name="precio" min="0" max="50" value="25">
  <output for="precio" id="precio-output">S/.25</output>
</div>
              <button class="ctg-filtro-btn">Aplicar filtros</button>
              <script>
  // Obtén los elementos del input y el output por su id
  var inputPrecio = document.getElementById('precio');
  var outputPrecio = document.getElementById('precio-output');

  // Agrega un controlador de eventos para el cambio en el input
  inputPrecio.addEventListener('input', function() {
    // Actualiza el valor del output con el valor actual del input
    outputPrecio.textContent = 'S/.' + inputPrecio.value;
  });
</script>
<script>
  // Controlador de eventos para el botón "Aplicar filtros"
  $('.ctg-filtro-btn').click(function() {
  var orden = $('#orden').val();
  var precio = $('#precio').val();
  var categoria = [];
  $('input[name="categoria"]:checked').each(function() {
    categoria.push($(this).val());
  });
  if (categoria.length === 0) {
  // No se ha seleccionado ninguna categoría, asignar un array predeterminado
  categoria.push("Dulces");
  categoria.push("Tartas");
  categoria.push("Galletas");
  categoria.push("Panadería");

}
  var medida = $('#medida').val();

  // Envía la solicitud AJAX para obtener los productos filtrados
  $.ajax({
    url: 'consulta_filtro.php',
    method: 'POST',
    data: {
      orden: orden,
      precio: precio,
      categoria: categoria,
      medida: medida
    },
    success: function(response) {
      $('#product-list').html(response); // Actualiza la lista de productos con los resultados filtrados

      // Actualizar la URL con los parámetros del filtro
      var params = new URLSearchParams(window.location.search);
      params.set('orden', orden);
      params.set('precio', precio);
      params.set('categoria', categoria.join(','));
      params.set('medida', medida);
      var newUrl = window.location.pathname + '?' + params.toString();
      window.history.pushState(null, null, newUrl);
    },
    error: function(error) {
      console.error(error);
    }
  });
});

</script>
              <!-- categoria de filtros, ya veremos por caracteristicas blabla  -->
              <div class="categoria">
                <h3>Categoria:</h3>
                <ul>
                  <li>
                    <input type="checkbox" id="Dulces" name="categoria" value="Dulces">
                    <label for="Dulces">Dulces</label>
                  </li>
                  <li>
                    <input type="checkbox" id="Tartas" name="categoria" value="Tartas">
                    <label for="Tartas">Tartas</label>
                  </li>
                  <li>
                    <input type="checkbox" id="Galletas" name="categoria" value="Galletas">
                    <label for="Galletas">Galletas</label>
                  </li>
                  <li>
                    <input type="checkbox" id="Panadería" name="categoria" value="Panadería">
                    <label for="Panadería">Panadería</label>
                  </li>
                </ul>
              </div>
              
              <!-- medida, habran medidas de productos, ya se me ocurrirán más categorias -->
              <div class="medida">
                <h3>Medida:</h3>
                <select name="medida" id="medida">
                  <option value="pequeño">Pequeño</option>
                  <option value="mediano">Mediano</option>
                  <option value="grande">Grande</option>
                </select>
              </div>

            </div>
          </div>
      
            <!-- Productos -->
            <div id="product-list" class="columna-productos">
              <h2>Productos</h2>
              <div id="product-list">
              <?php
              // Verificar si se proporcionó un número de página en la URL
              if (isset($_GET['filtro_page'])) {
                $currentPage = $_GET['filtro_page'];
              
                // Aplicar el filtro antes de generar la lista de productos
                include "consulta_filtro.php";
              } else {
                // Cargar la lista de productos sin aplicar ningún filtro
                include "consulta.php";

                // Retorna la cantidad de productos en la base de datos
                $queryTotal = "SELECT COUNT(*) AS total FROM Producto";
                $resultTotal = $conn->query($queryTotal);
                $rowTotal = $resultTotal->fetch_assoc();
                $totalProducts = $rowTotal['total'];
                
                // Define el número de páginas
                $productsPerPage = 5;
                
                // Calcula el total de número de páginas
                $totalPages = ceil($totalProducts / $productsPerPage);
                
                // Obtiene la página actual, lo compara con el número y obtiene los productos de esa lista en especifico
                if (isset($_GET['page'])) {
                    $currentPage = $_GET['page'];
                } else {
                    $currentPage = 1;
                }
                
                // Calcula el offset de la base de datos (o sea el rango)
                $offset = ($currentPage - 1) * $productsPerPage;
                
                // Realiza las consultas para obtener los productos
                $query = "SELECT * FROM Producto LIMIT $offset, $productsPerPage";
                $result = $conn->query($query);
                
                // Checa si existen productos en primer lugar
                if ($result->num_rows > 0) {
                    // Ees un bucle, usa el número de productos totales para repetir hasta llenar la página
                    while ($row = $result->fetch_assoc()) {
                        $productId = $row['id_producto'];
                        $productName = $row['nombre'];
                        $productDescription = $row['Descrip'];
                        $productPrice = $row['Pre_uni'];
                        $productImage = $row['imagen'];
                        $productMedida = $row['Medida'];
                
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
                
                    // Genera la paginación
                    echo '<div class="ctg-pagination-container">';
                    echo '<div class="ctg-pagination"></div>';
                    echo '</div>';
                } else {
                    // No se encontraron productos
                    echo 'No hay productos disponibles.';
                }
              }
?>
</div>
</div>
