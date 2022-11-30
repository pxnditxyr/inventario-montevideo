<?php
  function navbar () {
    return '
    <nav class="flex items-center justify-between flex-wrap bg-teal-500 p-6">
      <ul class="flex items-center flex-shrink-0 text-white gap-20">
        <li class="text-sm font-bold tracking-tight"><a href="index.php"> Home </a></li>
        <li class="text-sm font-bold tracking-tight"><a href="about.php"> About </a></li>
        <li class="text-sm font-bold tracking-tight"><a href="login.php"> Iniciar Sesion </a></li>
        <li class="text-sm font-bold tracking-tight"><a href="register.php"> Registro </a></li>
      </ul>
    </nav>';
  }
?>
