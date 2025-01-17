<!doctype html>
<html lang="es">
  <head>
    <title>Inicio de Sesión</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('assets/loginestilo.css') }}" rel="stylesheet" />
  </head>
  <section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">
                  <div class="text-center">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp" style="width: 185px;" alt="logo">
                    <h4 class="mt-1 mb-5 pb-1">CMS</h4>
                  </div>
  
                  <form action="{{ url('login') }}" method="POST">
                    @csrf
                    <p>Inicia sesión</p>
  
                    <div data-mdb-input-init class="form-outline mb-4">
                      <input type="email" name="email" id="form2Example11" class="form-control" value="{{ old('email') }}" />
                      <label class="form-label" for="form2Example11">Introduce tu correo</label>
                      @error('email')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
  
                    <div data-mdb-input-init class="form-outline mb-4">
                      <input type="password" name="password" id="form2Example22" class="form-control" />
                      <label class="form-label" for="form2Example22">Introduce tu contraseña</label>
                      @error('password')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
  
                    <div class="text-center pt-1 mb-5 pb-1">
                      <button type="submit" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3">Iniciar sesión</button>
                    </div>
  
                    <div class="d-flex align-items-center justify-content-center pb-4">
                      <p class="mb-0 me-2">¿No tienes cuenta?</p>
                      <a href="{{ route('register') }}" class="btn btn-outline-danger">Crea una</a>
                    </div>
                  </form>
  
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
</html>
