<?php
  function navbar () {
    return '
<nav class="flex flex-row items-center justify-between bg-gray-800 text-white p-4">
  <ul class="flex flex-row items-center">
    <!-- class for links -->
    <li class="flex flex-row items-center justify-center p-2 rounded-md hover:bg-gray-700 cursor-pointer"><a href="index.php"> Home </a></li>
    <li class="flex flex-row items-center justify-center p-2 rounded-md hover:bg-gray-700 cursor-pointer"><a href="categorias.php"> Categorias </a></li>
    <li class="flex flex-row items-center justify-center p-2 rounded-md hover:bg-gray-700 cursor-pointer"><a href="productos.php"> Productos </a></li>
    <li class="flex flex-row items-center justify-center p-2 rounded-md hover:bg-gray-700 cursor-pointer"><a href="usuarios.php"> Usuarios </a></li>
  </ul>
    <!-- class for logout -->
    <ul class="flex flex-row items-center">
      <!-- class for @user -->
      <li class="flex flex-row items-center justify-center p-2"> ' . $_SESSION[ 'apellidos' ] . ' </li>
      <li class="flex flex-row items-center justify-center p-2"> ' . $_SESSION[ 'nombres' ] . ' </li>
      <li class="flex flex-row items-center justify-center p-2"> ' . $_SESSION[ 'email' ] . ' </li>
      <li> <a href="logout.php"> <div class="flex flex-row items-center justify-center p-2 rounded-md hover:bg-gray-700 cursor-pointer"> Cerrar sesion </div></a> </li>
    </ul>
</nav>';
  }
?>
