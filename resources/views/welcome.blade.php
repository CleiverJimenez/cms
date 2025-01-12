<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>CMS</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets/home.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">CMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">Contáctanos</a></li>
                    <!-- Botones de Login y Registro -->
                    <div class="d-flex ms-lg-3">
                        <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-primary">Registro</a>
                    </div>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header - Imagen profesional en la parte superior-->
    <header class="py-5 bg-image-full" style="background-image: url('https://source.unsplash.com/wfh8dDlNFOk/1600x900')">
        <div class="text-center my-5">
            <img class="img-fluid rounded-circle mb-4" src="https://staticg.sportskeeda.com/editor/2023/08/59ce5-16908736943886-1920.jpg?w=840" alt="..." />
            <h1 class="text-white fs-3 fw-bolder">Bienvenido a CMS</h1>
            <p class="text-white-50 mb-0">Transforma tu contenido de manera profesional</p>
        </div>
    </header>

    <!-- Contenido más detallado abajo -->
    <section class="py-5">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2 class="mb-4">¿Qué es CMS?</h2>
                    <p class="lead mb-4">CMS (Content Management System) es la solución perfecta para gestionar el contenido de tu sitio web de forma rápida y eficiente.</p>
                    <p class="mb-0">Con nuestra plataforma, podrás crear, editar y administrar tu contenido sin complicaciones, ¡todo desde una interfaz sencilla y profesional!</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de fondo con imagen -->
    <div class="py-5 bg-image-full" style="background-image: url('https://source.unsplash.com/4ulffa6qoKA/1200x800')">
        <div style="height: 20rem"></div>
    </div>

    <!-- Otras secciones informativas -->
    <section class="py-5">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2 class="mb-4">Explora más características</h2>
                    <p class="lead mb-4">Nuestro CMS no solo te permite gestionar publicaciones, sino también personalizar el diseño y la estructura de tu sitio para que se ajuste a tus necesidades.</p>
                    <p class="mb-0">Con herramientas avanzadas, soporte de multimedia y optimización para SEO, tu sitio web estará preparado para destacar en el entorno digital.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; CMS 2023</p>
        </div>
    </footer>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>
