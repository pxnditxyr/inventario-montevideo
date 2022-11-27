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
    </ul>
    <ul>
        <li> <a href="logout.php"> Cerrar sesion </a> </li>
    </ul>
</nav>';
    }
?>
