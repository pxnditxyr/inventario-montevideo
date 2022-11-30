<?php 
  require_once './layouts/layout.php';
  
  function register () {
    return '

<div style="background-image: url( assets/images/auth-image-2.jpg )" class="flex items-center h-full w-full bg-cover bg-center">
      <div class="w-1/3 h-full flex flex-col-reverse p-10 gap-5" style="background: rgba(0,0,0, 0.5);">
        <span class="text-sm text-white"> Copyright @ 2022 </span>
        <p class="text-3xl font-bold text-white">
          Tienda Jannet S.R.L.
        </p>
      </div>
      <div class="w-1/3 h-full" style="background: rgba(0,0,0, 0.5);"></div>
      <div class="w-1/3 h-full">

    <form action="actions/register.php" method="post"
      class="flex flex-col items-center justify-center w-full h-full bg-white shadow-lg p-6">
    >
      <div class="flex flex-col items-center justify-center w-full p-4 bg-white rounded-lg shadow-lg">
        <h1 class="text-4xl font-bold text-slate-700"> Sistema de Inventario </h1>
        <p class="text-xl font-bold text-slate-600 justify-start"> Inicio de sesion </p>
      </div>

    <div
      class="flex flex-col justify-start w-full bg-white rounded-lg shadow-lg gap-3"
    >
      <label for="apellidos"> Apellidos: </label>
      <input type="text" name="apellidos" id="apellidos" placeholder="Lima" value="Lima"/>
    </div>
    <div>
      <label for="nombres"> Nombres: </label>
      <input type="text" name="nombres" id="nombres" placeholder="Dennis" value="Dennis"/>
    </div>
  <div>
    <label for="ci"> C.I.: </label>
    <input type="number" name="ci" id="ci" placeholder="12345678" value="12345678"/>
  </div>
  <div>
    <label for="fecha_nac"> Fecha de nacimiento: </label>
    <input type="date" name="fecha_nac" id="fecha_nac" value="' . date( 'Y-m-d' ) . '"/>
  </div>
  <div>
    <label for="email"> Email: </label>
    <input type="email" name="email" id="email" placeholder="example@example.com" value="dennis@dennis.com"/>
  </div>
  <div>
    <label for="password"> Contraseña: </label>
    <input type="password" name="password" id="password" placeholder="" value="12345" />
  </div>
  <div>
    <label for="password2"> Confirmar Contraseña: </label>
    <input type="password" name="password2" id="password2" placeholder="" value="12345" />
  </div>
  <div>
    <button> Ingresar </button>
  </div>
</form>';
  }
  $register = register();
  echo layout( 'Registro', $register );
?>
