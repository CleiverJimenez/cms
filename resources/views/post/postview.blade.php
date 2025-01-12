<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>CMS - Publicaciones</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets/home.css') }}" rel="stylesheet" />
    <style>
        /* Estilo del modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 800px;
        }

        .close {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            position: absolute;
            right: 15px;
            top: 5px;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Estilo para las tarjetas de las publicaciones */
        .post-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 10px;  /* Esquinas redondeadas */
        }

        /* Efecto al pasar el mouse sobre la tarjeta */
        .post-card:hover {
            transform: scale(1.05);  /* Aumenta ligeramente el tamaño */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);  /* Sombra */
        }
    </style>
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
                    <li class="nav-item"><a class="nav-link" href="#!">Contactanos</a></li>
                    <!-- Botones de Login y Registro solo si no están autenticados -->
                    @if (Auth::check())
                        <li class="nav-item"><a class="nav-link" href="{{ route('post') }}">Crear Publicación</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">Cerrar sesión</a></li>
                    @else
                        <div class="d-flex ms-lg-3">
                            <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Login</a>
                            <a href="{{ route('register') }}" class="btn btn-primary">Registro</a>
                        </div>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="py-5 bg-image-full" style="background-image: url('https://source.unsplash.com/wfh8dDlNFOk/1600x900')">
        <div class="text-center my-5">
            <h1 class="text-white fs-3 fw-bolder">Bienvenido a CMS</h1>
            @if(Auth::check())
                <p class="text-white-50 mb-0">Hola, {{ Auth::user()->name }}</p>
            @endif
        </div>
    </header>

    <!-- Content section -->
    <section class="py-5">
        <div class="container my-5">
            <h2 class="mb-4">Publicaciones Recientes</h2>
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-lg-4 mb-4">
                        <div class="card post-card" data-id="{{ $post->id }}" data-title="{{ $post->title }}" data-content="{{ $post->content }}" data-image="{{ Storage::url($post->image_path) }}">
                            @if ($post->image_path)
                                <img src="{{ Storage::url($post->image_path) }}" alt="Imagen de la publicación" class="card-img-top" style="max-width: 100%; height: auto;">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                                <!-- Botón para eliminar la publicación -->
                                <form action="{{ route('publicaciones.destroy', $post->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div id="postModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="modalTitle"></h2>
            <img id="modalImage" src="" alt="Imagen de la publicación" style="max-width: 100%; height: auto;">
            <p id="modalContent"></p>
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; CMS 2023</p>
        </div>
    </footer>

    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script para visualizar la publicación en grande -->
    <script>
        var modal = document.getElementById('postModal');
        var span = document.getElementsByClassName('close')[0];

        // Seleccionamos todas las tarjetas de publicación
        var posts = document.querySelectorAll('.post-card');
        
        posts.forEach(function(post) {
            post.addEventListener('click', function() {
                // Obtenemos los datos de la publicación
                var title = post.getAttribute('data-title');
                var content = post.getAttribute('data-content');
                var image = post.getAttribute('data-image');

                // Actualizamos el contenido del modal
                document.getElementById('modalTitle').textContent = title;
                document.getElementById('modalContent').textContent = content;
                document.getElementById('modalImage').src = image;

                // Mostramos el modal
                modal.style.display = "block";
            });
        });

        // Cerrar el modal cuando el usuario haga clic en el botón de cerrar
        span.onclick = function() {
            modal.style.display = "none";
        }

        // Cerrar el modal si el usuario hace clic fuera del modal
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>

</html>
