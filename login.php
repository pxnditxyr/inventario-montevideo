<?php
  require_once './layouts/layout.php';

  function login () {
    return '
    <div style="background-image: url( assets/images/auth-image-1.jpg )" class="flex flex-col items-center justify-center h-full w-full bg-cover bg-center">
      <form action="actions/login.php" method="post" class="flex flex-col items-center justify-center w-1/2 bg-white rounded-lg shadow-lg">
        <div class="flex flex-col items-center justify-center w-full p-4 bg-white rounded-lg shadow-lg">
          <label for="email" class="text-gray-700 text-lg font-semibold mb-2" > Email: </label>
          <input class="w-full p-2 border border-gray-300 rounded-lg mb-4" type="email" name="email" id="email" placeholder="example@example.com" value="dennis@dennis.com"/>
        </div>
        <div class="flex flex-col items-center justify-center w-full p-4 bg-white rounded-lg shadow-lg" >
          <label for="password" class="text-gray-700 text-lg font-semibold mb-2" > Contraseña: </label>
          <input class="w-full p-2 border border-gray-300 rounded-lg mb-4" type="password" name="password" id="password" placeholder="" value="12345" />
        </div>
        <div class="flex flex-col items-center justify-center w-full p-4 bg-white rounded-lg shadow-lg">
          <button type="submit" class="w-full p-2 bg-blue-500 text-white rounded-lg shadow-lg">Iniciar sesión</button>
        </div>
      </form>
    </div>
      ';
  }
  $login = login();
  echo layout( '', $login );
?>
