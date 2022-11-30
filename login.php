<?php
  require_once './layouts/layout.php';

  function login () {
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
        <form action="actions/login.php" method="post"
        class="flex flex-col items-center justify-center w-full h-full bg-white shadow-lg p-6">
          <div class="flex flex-col items-center justify-center w-full p-4 bg-white rounded-lg shadow-lg">
            <h1 class="text-4xl font-bold text-slate-700"> Sistema de Inventario </h1>
            <p class="text-xl font-bold text-slate-600 justify-start"> Inicio de sesion </p>
          </div>
          <div class="flex flex-col justify-start w-full bg-white rounded-lg shadow-lg gap-3">
            <label for="email" class="text-gray-700 text-lg font-semibold"> Email: </label>
            <input class="w-full p-2 border border-gray-300 rounded-lg mb-4" type="email" name="email" id="email" placeholder="example@example.com" value="dennis@dennis.com"/>
          </div>
          <div class="flex flex-col justify-start w-full bg-white rounded-lg shadow-lg gap-3" >
            <label for="password" class="text-gray-700 text-lg font-semibold"> Contraseña: </label>
            <input class="w-full p-2 border border-gray-300 rounded-lg mb-4" type="password" name="password" id="password" placeholder="" value="12345" />
          </div>
          <div class="flex items-center justify-center w-full p-4 bg-white rounded-lg shadow-lg">
            <button type="submit" class="w-full p-2 bg-blue-500 text-white rounded-lg shadow-lg">Iniciar sesión</button>
          </div>
        </form>
      </div>
    </div>
      ';
  }
  $login = login();
  echo layout( '', $login );
?>
