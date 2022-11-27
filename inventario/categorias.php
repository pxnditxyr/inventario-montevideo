<?php 
  require_once './layouts/layout.php';
function categorias () {
  return '
      <div>
        <form action="actions/crearCategoria.php" method="POST">
          <input type="text" name="nombre" placeholder="Nombre">
          <input type="text" name="detalles" placeholder="Detalles">
          <input type="text" name="descripcion" placeholder="Descripcion">
          <input type="submit" name="crear" value="Crear">
        </form>
      </div>
    ';
  }
  $categorias = categorias();
  echo layout( 'Categorias', $categorias );
?>
