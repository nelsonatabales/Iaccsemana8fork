<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agencia de Viajes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
        <header class="text-center mb-4">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand ms-5" href="#"> Viajes</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Paquetes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Destinos</a>
                    </li>
                </ul>
                <div class="ms-auto me-5">
                    <ul class="navbar-nav ml-auto">
                        <?php if ($logged_in) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Bienvenido, <?php echo $_SESSION['username']; ?></a>
                            </li>
                            <li class="nav-item">
                                <form action="logout.php" method="POST">
                                    <button type="submit" class="btn btn-primary">Salir</button>
                                </form>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">Iniciar Sesión</button>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link btn btn-secondary" href="#" data-bs-toggle="modal" data-bs-target="#cartModal">
                                Carrito <span class="badge bg-light text-dark" id="cart-count"><?php echo isset($_SESSION['carrito']) ? count($_SESSION['carrito']) : 0; ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
            <h1 class="mt-4">Agencia de Viajes</h1>
            <p class="lead">Seleccione una opción para comenzar</p>
        </header>
       <main class="d-flex justify-content-center">
            <div class="row container ">
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/56CREYNAXJCCJB4THNLJ7XSS6U.avif" class="card-img-top" alt="Agregar Vuelo">
                        <div class="card-body text-center">
                            <h5 class="card-title">Agregar Vuelo</h5>
                            <a href="reservas/agregar_vuelo.php" class="btn btn-primary">Ir a Agregar Vuelo</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/Bellagio-Hotel-Casino-Las-Vegas.webp" class="card-img-top" alt="Agregar Hotel">
                        <div class="card-body text-center">
                            <h5 class="card-title">Agregar Hotel</h5>
                            <a href="reservas/agregar_hotel.php" class="btn btn-primary">Ir a Agregar Hotel</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/Como-vender-paquetes-turisticos.jpg.webp" class="card-img-top" alt="Consulta Avanzada">
                        <div class="card-body text-center">
                            <h5 class="card-title">Disponibles para mi </h5>
                            <a href="reservas/consulta_avanzada.php" class="btn btn-primary">quiero viajar</a>
                        </div>
                    </div>
                </div>
            </div>
       </main>
       <footer class="mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h5>Avisos Legales</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Política de Privacidad</a></li>
                            <li><a href="#">Términos y Condiciones</a></li>
                            <li><a href="#">Aviso Legal</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5>Contacto</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Email: info@viajes.com</a></li>
                            <li><a href="#">Teléfono: +123 456 7890</a></li>
                            <li><a href="#">Dirección: Calle Falsa 123, Ciudad</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5>Síguenos</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Instagram</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5>Enlaces Útiles</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Sobre Nosotros</a></li>
                            <li><a href="#">Preguntas Frecuentes</a></li>
                            <li><a href="#">Ayuda</a></li>
                        </ul>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <p>&copy; 2024 Viajes.com. Todos los derechos reservados.</p>
                </div>
            </div>
        </footer>
    
</body>
</html>
