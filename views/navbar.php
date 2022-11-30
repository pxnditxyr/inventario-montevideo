<?php
  function navbar () {
    return '
    <nav class="flex items-center justify-between flex-wrap bg-red-500 w-full justify-center">
      <ul class="flex items-center flex-shrink-0 text-white gap-20 w-full justify-center">
        <li><a href="index.php"><div class="text-xl font-bold p-6"> Home </div></a></li>
        <li><a href="about.php"><div class="text-xl font-bold p-6"> About </div></a></li>
        <li><a href="login.php"><div class="text-xl font-bold p-6"> Iniciar Sesion </div></a></li>
        <li><a href="register.php"><div class="text-xl font-bold p-6"> Registro </div></a></li>
      </ul>
    </nav>';
  }
?>
