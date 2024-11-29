<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <style>
        /* Estilos para maximizar el espacio y mover contenido a la izquierda */
       body {
        Background: 100%;
        right: 100px;
        left: 1000%;

       }
     
       
        .main-container {
            padding: 0; /* Elimina padding innecesario */
            margin: 0 auto; /* Centra el contenido horizontalmente */
            max-width: 80%; /* Reduce el ancho total para aprovechar el espacio */
        }

        .pd-ltr-20 {
            padding: 20px; /* Márgenes laterales más pequeños */
        }

          /* Ajustes de fondo para las imágenes */
        .card-img-container {
            background-color: #f7f7f7; /* Color de fondo para las imágenes */
            padding: 10px; /* Espaciado alrededor de la imagen */
            border-radius: 10px; /* Bordes redondeados para mejor apariencia */
            display: flex;
            justify-content: center; /* Centra la imagen horizontalmente */
            align-items: center; /* Centra la imagen verticalmente */
        }

        .card-img-top {
            max-width: 100%; /* Limita el ancho de la imagen */
            max-height: 100%; /* Limita la altura de la imagen */
        }

        .card {
            transition: transform 0.2s ease; /* Efecto visual al pasar el mouse */
        }

        .card:hover {
            transform: scale(1.05); /* Aumenta el tamaño de la tarjeta al pasar el mouse */
        }
          /* Ajustes para pantallas pequeñas */
          @media (max-width: 768px) {
            header {
                padding: 30px 10px;
            }

            .main-container {
                padding: 10px;
            }

            .card {
                max-width: 100%;
            }
        }
    </style>
  <body>
    
    <div class="main-container">
        <div class="pd-ltr-20">
            <!-- Bienvenida -->
            <div class="card-box pd-20 height-100-p mb-30">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <img src="vendors/images/banner.png" alt="Banner" class="img-fluid" />
                    </div>
                    <div class="col-md-8">
                        <h4 class="font-20 weight-500 mb-10 text-capitalize">
                            BIENVENIDO/A
                            <div class="weight-600 font-30 text-blue">
                                {{ Auth::user()->name }}!
                            </div>
                        </h4>
                        <p class="font-18 max-width-600">
                            Nos alegra que hayas elegido NUTRIA para acompañarte en tu camino hacia una vida más saludable. En nuestro sistema, te proporcionamos planes de nutrición y ejercicio personalizados, adaptados a tus necesidades y objetivos.
                            <br>
                            Ya sea que estés buscando mejorar tu alimentación, perder peso, ganar músculo, o simplemente mantenerte saludable, estamos aquí para ayudarte en cada paso. Explora nuestras recomendaciones, realiza un seguimiento de tus progresos y optimiza tu bienestar de manera fácil y efectiva.
                            <br>
                            ¿Listo para empezar? ¡Tu viaje hacia un estilo de vida más saludable comienza ahora! Recuerda, en NUTRIA, cada paso cuenta.
                        </p>
                    </div>
                </div>
            </div>
    

            <!-- Sección de imágenes con texto -->
            <div class="row g-4">
                <!-- Imagen 1 -->
                <div class="col-md-4">
                    <div class="card h-100 shadow">
                        <img src="vendors/images/alimentos.jpg" class="card-img-top" alt="Plan Nutricional">
                        <div class="card-body text-center">
                            <h5 class="card-title">Plan Nutricional</h5>
                            <p class="card-text">
                                Personaliza tu plan nutricional y sigue las recomendaciones para alcanzar tus metas.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Imagen 2 -->
                <div class="col-md-4">
                    <div class="card h-100 shadow">
                        <img src="vendors/images/ejercicioss.png" class="card-img-top" alt="Ejercicios">
                        <div class="card-body text-center">
                            <h5 class="card-title">Ejercicios</h5>
                            <p class="card-text">
                                Descubre ejercicios adaptados a tu nivel y condición física para mejorar tu bienestar.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Imagen 3 -->
                <div class="col-md-4">
                    <div class="card h-100 shadow">
                        <img src="vendors/images/progreso.jpg" class="card-img-top" alt="Progreso">
                        <div class="card-body text-center">
                            <h5 class="card-title">Progreso</h5>
                            <p class="card-text">
                                Visualiza tu progreso en tiempo real y celebra cada logro alcanzado.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Segunda fila de imágenes -->
            <div class="row g-4 mt-4">
                <!-- Imagen 4 -->
                <div class="col-md-6">
                    <div class="card h-100 shadow">
                        <img src="vendors/images/recetas.jpg" class="card-img-top" alt="Recetas Saludables">
                        <div class="card-body text-center">
                            <h5 class="card-title">Recetas Saludables</h5>
                            <p class="card-text">
                                Encuentra recetas deliciosas y saludables que complementan tu plan nutricional.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Imagen 5 -->
                <div class="col-md-6">
                    <div class="card h-100 shadow">
                        <img src="vendors/images/periodo.jpg" class="card-img-top" alt="Periodo">
                        <div class="card-body text-center">
                            <h5 class="card-title">Periodo</h5>
                            <p class="card-text">
                                Cumple a cabalidad los periodos de tiempo adecuados para tus dietas y rutinas de ejercicios.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie de página -->
            <footer class="mt-5 text-center text-muted">
                <p>&copy; 2024 NUTRIA. Todos los derechos reservados.</p>
            </footer>
        </div>
    </div>
    </body>
</x-layout>
