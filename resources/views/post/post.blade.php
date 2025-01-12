<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Publicación</title>
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">Contactanos</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="py-5 bg-image-full" style="background-image: url('https://source.unsplash.com/wfh8dDlNFOk/1600x900')">
        <div class="text-center my-5">
            @isset($post)
                <h1 class="text-white fs-3 fw-bolder">{{ $post->title }}</h1>
                <p class="text-white-50 mb-0">{{ $post->created_at->diffForHumans() }}</p>
            @else
                <h1 class="text-white fs-3 fw-bolder">Crear una Nueva Publicación</h1>
            @endisset
        </div>
    </header>

    <!-- Content section-->
    <section class="py-5">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @isset($post)
                        <!-- Mostrar detalles de la publicación -->
                        <h4>{{ $post->title }}</h4>
                        <p>{{ $post->content }}</p>
                        @if ($post->image_path)
                            <img src="{{ Storage::url($post->image_path) }}" alt="Imagen de la publicación" class="img-fluid mb-3" style="max-width: 100%;">
                        @endif
                        <div class="text-center mt-3">
                            <a href="{{ route('publicaciones.edit', $post->id) }}" class="btn btn-warning">Editar Publicación</a>
                        </div>
                    @else
                        <!-- Formulario de creación de publicación -->
                        <h2 class="mb-4">Formulario de Publicación</h2>
                        <form action="{{ route('publicaciones.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="titulo" class="form-label">Título</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Escribe el título de la publicación" required>
                            </div>
                            <div class="mb-3">
                                <label for="contenido" class="form-label">Contenido</label>
                                <textarea class="form-control" id="contenido" name="contenido" rows="5" placeholder="Escribe el contenido de la publicación" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="imagen" class="form-label">Imagen (opcional)</label>
                                <input type="file" class="form-control" id="imagen" name="imagen">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Crear Publicación</button>
                                <a href="{{ route('home') }}" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </form>
                    @endisset

                    <!-- Comprobar si $posts está definido y no está vacío -->
@if (isset($posts) && $posts->isEmpty())
<p>No tienes publicaciones aún.</p>
@elseif (isset($posts))
@foreach ($posts as $post)
    <div class="post">
        <h3>{{ $post->title }}</h3>
        <p>{{ $post->content }}</p>
        @if($post->image_path)
            <img src="{{ Storage::url($post->image_path) }}" alt="Imagen de la publicación" class="img-fluid">
        @endif
        <a href="{{ route('publicaciones.show', $post->id) }}" class="btn btn-info">Ver publicación</a>
        <hr>
    </div>
@endforeach
@endif

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
