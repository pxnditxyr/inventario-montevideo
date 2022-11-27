<?php
  function navbar () {
    return '
<nav>
  <ul>
    <li> ' . $_SESSION[ 'apellidos' ] . ' </li>
    <li> ' . $_SESSION[ 'nombres' ] . ' </li>
    <li> ' . $_SESSION[ 'email' ] . ' </li>
    <li><a href="index.php"> Home </a></li>
    <li><a href="categorias.php"> Categorias </a></li>
    <li><a href="productos.php"> Productos </a></li>
    <li><a href="usuarios.php"> Usuarios </a></li>
  </ul>
  <ul>
    <li> <a href="logout.php"> Cerrar sesion </a> </li>
  </ul>
</nav>';
  }
?>
