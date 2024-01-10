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
  <script src="script/confirmar_l.js"></script>
  <script src="https://cdn.emailjs.com/dist/email.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
</  >
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
<div class="carousel">
  <div class="carousel-container">
    <img src="img/slider1.png"  alt="Imagen 1">
    <img src="img/slider1.png" alt="Imagen 2">
    <img src="img/slider1.png" alt="Imagen 3">
  </div>
  <button class="carousel-prev">&#10094;</button>
  <button class="carousel-next">&#10095;</button>
  
  <p><br></p>
  <div class="contenedor">
    <h1>Sobre Dulces Momentos</h1>
       <div class="fila" >
        <div class="columna" class="wrapper">
          <h2>Nuestra Historia </h2>
          Dulces Momentos, una querida pastelería local, fue fundada por las amigas Rachel y Emily,
           que compartían la pasión por la repostería. Convirtieron su afición en negocio y abrieron
         una acogedora tienda en la ciudad. Con sus deliciosos pasteles, sus ingredientes de alta
          calidad y su cálida hospitalidad, Dulces Momentos se ganó rápidamente la reputación de destino 
          favorito de lugareños y turistas. Hoy es una pastelería próspera conocida por sus deliciosos
           dulces y su ambiente acogedor, apreciado por la comunidad. La dedicación de Rachel y Emily a 
          la repostería y su compromiso con la calidadhan convertido a Dulces Momentos en un destino 
          de dulces recuerdos para cualquiera que tenga antojo de postres deliciosos.
        </div>
       <div class="columna">
        <img src="img/Pastelhistoria.jpg" alt="ssss">
       </div> 
       </div>
       <div class="fila">
       <div class="columna" class="pastelero" >
        <img src="img/pastelero.webp" alt="ssss">
       </div> 
       <div class="columna">
        <h2>Nuestra Vision</h2>
        <p>Ser la personificación del placer, donde cada tarta es una obra de arte 
          elaborada con pasión, creatividad y los mejores ingredientes. Nos esforzamos
           por ser el destino ideal para celebraciones, haciendo que los momentos más 
           preciados sean aún más dulces con nuestros deliciosos pasteles y un servicio excepcional.</p>
      </div>
       </div>
  </div>
<div class="razones">
  <h1>¿Por qué somos buena elección?</h1>
  <div class="buena_elección">
         <div class="columnaB">
             <img src="img/icono/pastel1.png" alt="Image 1">
             <h2>Deliciosas delicias:</h2>
             <p>Dulces Momentos es 
               una pastelería especializada en postres
                deliciosos que te harán la boca agua. 
                Si eres goloso, esta tienda 
                será un auténtico paraíso para ti</p>
         </div>
         <div class="columnaB">
             <img src="img/icono/pastel2.png" alt="Image 2">
             <h2>Variedad de opciones</h2>
             <p>Tanto si prefieres
               los pasteles clásicos como el chocolate
                o la vainilla, como si quieres probar 
                algo único y nuevo, Dulces Momentos tiene 
                una amplia gama de opciones para elegir.
                Ofrecen de todo, desde cupcakes a pasteles
                y tartas especiales.</p>
         </div>
         <div class="columnaB">
             <img src="img/icono/harina.png" alt="Image 3">
             <h2>Ingredientes de calidad</h2>
             <p> Dulces Momentos 
                utiliza sólo ingredientes de la más alta
               calidad en sus postres, asegurando que
               cada delicia no sólo sea deliciosa, sino
               que también esté hecha con cuidado y atención
               al detalle.</p>
         </div>
     </div>
</div>
  


 <!--Testimonios-->
  <section id="testimonios">
    <h1>Algunos Testimonios</h1>
    <div class="testimonios-contenedor">
      <div class="testimonios">
        <img src="img/icono/Testimonial1.png" alt="Testimonio 1">
        <p class="texts">"Los pasteles de Dulces Momentos son sencillamente increíbles. Los sabores son celestiales, y los diseños son impresionantes. ¡Muy recomendables!"</p>
        <p class="nombre">- Jane Smith</p>
      </div>
      <div class="testimonios">
        <img src="img/icono/Testimonial1.png" alt="Testimonio 2">
        <p class="texts">"Encargué una tarta personalizada para el cumpleaños de mi hija a Dulces Momentos, ¡y superó mis expectativas! La atención al detalle y el sabor fueron excepcionales. ¡Gracias!"</p>
        <p class="nombre">- John Doe</p>
      </div>
      <div class="testimonios">
        <img src="img/icono/Testimonial2.png" alt="Testimonio 2">
        <p class="texts">"Dulces Momentos es una joya escondida con pasteles bellamente elaborados y sabores impresionantes."</p>
        <p class="nombre">- John Doe</p>
      </div>
      <!-- Add more testimonials here -->
    </div>
    <div class="testimonios-contenedor">
      <div class="testimonios">
        <img src="img/icono/Testimonial1.png" alt="Testimonio 1">
        <p class="texts">"¡Dulces Momentos hace los pasteles más increíbles! Su atención al detalle y deliciosos sabores son inmejorables. ¡5 estrellas!"</p>
        <p class="nombre">- Jane Smith</p>
      </div>
      <div class="testimonios">
        <img src="img/icono/Testimonial2.png" alt="Testimonio 2">
        <p class="texts">"Encargué un pastel impresionante a Dulces Momentos para una celebración. Tenía un aspecto y un sabor increíbles."</p>
        <p class="nombre">- John Doe</p>
      </div>
      <div class="testimonios">
        <img src="img/icono/Testimonial2.png" alt="Testimonio 2">
        <p class="texts">"¡Los pasteles de Dulces Momentos son una delicia! Diseños creativos y sabores deliciosos"</p>
        <p class="nombre">- John Doe</p>
      </div>
      <!-- Add more testimonials here -->
    </div>
  </section>

    <!--Formulario para correo-->
    <div class="EMAIL">
  <h2>Subscríbete para más información</h2>
  <form class="subscripcion" id="ajax-form" action="" method="post">
    <input type="email" name="email" placeholder="Introduce tu correo electrónico" required>
    <input type="submit" value="Subscríbete">
  </form>
</div>

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
        (function(){
            emailjs.init("HMGyred1JrkLOyN3v");
        })();
    </script>
<script>
  document.getElementById('ajax-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Evita que el formulario se envíe de forma predeterminada
    // Recopila los datos del formulario
    var form = document.getElementById('ajax-form');
    var email = form.elements.email.value;
    var message = "Esta es información de la pastelería, una información muy informativa que te puede ser util saber por motivos informaciosos.";
    // Configura los parámetros para el correo electrónico
    var params = {
      email: email,
      message: message
    };

    // Envía el formulario utilizando EmailJS
    emailjs.send('service_n8xrhpe', 'template_qmxpvwn', params)
      .then(function(response) {
        console.log('El formulario se ha enviado correctamente', response);
        alert("Se ha enviado el correo");
        // Aquí puedes agregar tu propia lógica después de enviar el formulario
      }, function(error) {
        console.error('Error al enviar el formulario', error);
        alert("No se ha enviado el correo");
        // Aquí puedes agregar tu propia lógica en caso de error
      });
  });
</script>
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
  document.addEventListener('DOMContentLoaded', function() {
  var carouselContainer = document.querySelector('.carousel-container');
  var prevButton = document.querySelector('.carousel-prev');
  var nextButton = document.querySelector('.carousel-next');
  var slideWidth = carouselContainer.clientWidth;
  var currentPosition = 0;

  prevButton.addEventListener('click', function() {
    currentPosition += slideWidth;
    if (currentPosition > 0) {
      currentPosition = -slideWidth * (carouselContainer.children.length - 1);
    }
    carouselContainer.style.transform = 'translateX(' + currentPosition + 'px)';
  });

  nextButton.addEventListener('click', function() {
    currentPosition -= slideWidth;
    if (currentPosition < -slideWidth * (carouselContainer.children.length - 1)) {
      currentPosition = 0;
    }
    carouselContainer.style.transform = 'translateX(' + currentPosition + 'px)';
  });
});
</script>