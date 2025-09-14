<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>High Card Enjoyer</title>

  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


  

  
  <link rel="icon" href="<?php echo e(Vite::asset('resources/images/Icono.png')); ?>" type="image/x-icon">

</head>

  

<body class="light-mode"
      data-dark-img="<?php echo e(Vite::asset('resources/images/Titulo_Blanco.png')); ?>"
      data-light-img="<?php echo e(Vite::asset('resources/images/Titulo-Negro.png')); ?>">
  

      <!-- HEADER -->
  <header class="py-3 border-bottom">
    <div class="container d-flex justify-content-between align-items-center">
      <div class="flex-grow-1 text-center">
        <h1 class="m-0">High Card Enjoyer</h1>
      </div>
      <div class="position-absolute end-0 me-3">
        <button onclick="window.location='<?php echo e(route('login')); ?>'" class="btn btn-primary">Iniciar Sesion</button>
      </div>
    </div>
  </header>

  <!-- NAVBAR -->
  <nav class="py-2 border-bottom">
    <div class="container d-flex justify-content-between align-items-center">
      <div class="mx-auto">
        <button class="btn btn-outline-secondary mx-1">Guia</button>
        <button class="btn btn-outline-secondary mx-1">Juego</button>
        <button class="btn btn-outline-secondary mx-1">Reglas</button>
      </div>
      <div class="position-absolute end-0 me-3">
        <button id="modeToggle" class="btn btn-dark">Modo Oscuro</button>
      </div>
    </div>
  </nav>

  <!-- TITULO -->
  <main class="container text-center my-5">
    <img id="mainImage" src="<?php echo e(Vite::asset('resources/images/Titulo-Negro.png')); ?>" class="img-fluid main-img mb-4" alt="Imagen principal">

    <div class="row g-4">
      <div class="col-md-7">
        <div class="card h-100 shadow">
          <img src="" class="card-img-top" alt="Opción 1">
          <div class="card-body">
            <h5 class="card-title">Opción 1</h5>
            <p class="card-text">Descripción de la primera opción.</p>
            <button class="btn btn-primary">Ver más</button>
          </div>
        </div>
      </div>

      <div class="col-md">
        <div class="card h-100 shadow">
          <img src="" class="card-img-top" alt="Opción 3">
          <div class="card-body">
            <h5 class="card-title">Opción 3</h5>
            <p class="card-text">Descripción de la tercera opción.</p>
            <button class="btn btn-primary">Ver más</button>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- FOOTER -->
  <footer class="py-3 border-top text-center">
    <p class="mb-0">&copy; 2025 High Card Enjoyer. Todos los derechos reservados.</p>
  </footer>

    

  <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
  
</body>
</html>
<?php /**PATH C:\Users\57121372\Desktop\ProyectoUtu\resources\views/welcome.blade.php ENDPATH**/ ?>