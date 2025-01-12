<!doctype html>
<html lang="es">
  <head>
    <title>Registro - CMS</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{asset('assets/loginestilo.css')}}" rel="stylesheet" />
  </head>

  <body>
    <section class="h-100 gradient-form" style="background-color: #eee;">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-xl-10">
            <div class="card rounded-3 text-black">
              <div class="row g-0">
                <div class="col-lg-6">
                  <div class="card-body p-md-5 mx-md-4">
                    <div class="text-center">
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                        style="width: 185px;" alt="logo">
                      <h4 class="mt-1 mb-5 pb-1">CMS</h4>
                    </div>

                    <!-- Formulario de registro -->
                    <form action="{{ url('register') }}" method="POST">
                      @csrf
                      <p>Crea una cuenta</p>

                      <!-- Campo para nombre completo -->
                      <div class="form-outline mb-4">
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" />
                        <label class="form-label" for="name">Introduce tu nombre completo</label>
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>

                      <!-- Campo para el correo -->
                      <div class="form-outline mb-4">
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" />
                        <label class="form-label" for="email">Introduce tu correo</label>
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>

                      <!-- Campo para la contraseña -->
                      <div class="form-outline mb-4">
                        <input type="password" name="password" class="form-control" />
                        <label class="form-label" for="password">Introduce tu contraseña</label>
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>

                      <!-- Campo para confirmar la contraseña -->
                      <div class="form-outline mb-4">
                        <input type="password" name="password_confirmation" class="form-control" />
                        <label class="form-label" for="password_confirmation">Confirma tu contraseña</label>
                      </div>

                      <!-- Botón de registro -->
                      <div class="text-center pt-1 mb-5 pb-1">
                        <button type="submit" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3">Registrarse</button>
                      </div>

                      <div class="d-flex align-items-center justify-content-center pb-4">
                        <p class="mb-0 me-2">¿Ya tienes cuenta?</p>
                        <a href="{{ route('login') }}" class="btn btn-outline-danger">Inicia sesión</a>
                      </div>
                    </form>
                    <!-- Fin formulario -->
                  </div>
                </div>

                <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                  <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                    <h4 class="mb-4">Somos más que solo una empresa</h4>
                    <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                      exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
  </body>
</html>
