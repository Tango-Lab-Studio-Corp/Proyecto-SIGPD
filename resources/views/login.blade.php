<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login y Registro</title>


    <link rel="icon" href="{{ Vite::asset('resources/images/Icono.png') }}" type="image/x-icon">
    
  <!-- Bootstrap CSS para estilos responsivos -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

  <!-- Botón para activar modo claro / oscuro -->
  <div class="text-end p-3">
    <button id="modoToggle" class="btn btn-secondary btn-sm">🌙</button>
  </div>f

  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-6 col-lg-5">

        <!-- Tarjeta Bootstrap que contiene login y registro -->
        <div class="card">
          <div class="card-body">

            <!-- Pestañas para alternar entre login y registro -->
            <ul class="nav nav-pills nav-justified mb-3">
              <li class="nav-item">
                <!-- Pestaña login activa por defecto -->
                <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#login">Iniciar Sesión</button>
              </li>
              <li class="nav-item">
                <!-- Pestaña registro -->
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#register">Registrarse</button>
              </li>
            </ul>

            <div class="tab-content">

              <!-- FORMULARIO LOGIN -->
              <div class="tab-pane fade show active" id="login">
                <form action="login.php" method="POST">
                  <div class="mb-3">
                    <label class="form-label">Correo Electrónico</label>
                    <!-- Campo email -->
                    <input type="email" name="email" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <!-- Campo contraseña -->
                    <input type="password" name="contrasena" class="form-control" required>
                  </div>
                  <!-- Botón para enviar formulario -->
                  <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
                </form>
              </div>

              <!-- FORMULARIO REGISTRO -->
              <div class="tab-pane fade" id="register">
                <form action="register.php" method="POST">
                  <div class="mb-3">
                    <label class="form-label">Nombre completo</label>
                    <!-- Campo nombre -->
                    <input type="text" name="nombre" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Correo Electrónico</label>
                    <!-- Campo email -->
                    <input type="email" name="email" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <!-- Campo contraseña -->
                    <input type="password" name="contrasena" class="form-control" required>
                  </div>
                  <!-- Botón para enviar formulario -->
                  <button type="submit" class="btn btn-primary w-100">Registrarse</button>
                </form>
              </div>

            </div>

          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Scripts de Bootstrap para funcionalidad -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Script externo para controlar el modo claro/oscuro -->
  @vite(['resources/css/login.css', 'resources/js/login.js'])
</body>
</html>
