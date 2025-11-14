{{-- resources/views/partials/navbar.blade.php --}}
<nav class="py-2 border-bottom">
  <div class="container d-flex justify-content-between align-items-center">
    <div class="mx-auto">
      <a href="{{ route('guide') }}" class="btn btn-outline-secondary mx-1">Guía</a>
      <a href="{{ route('games.index') }}" class="btn btn-outline-secondary mx-1">Juego</a>
      <a href="{{ route('rules') }}" class="btn btn-outline-secondary mx-1">Reglas</a>
    </div>
    <div class="position-absolute end-0 me-3">
      <button id="modeToggle" class="btn btn-dark">Modo Oscuro</button>
    </div>
  </div>
</nav>