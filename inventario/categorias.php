<?php 
  require_once './layouts/layout.php';
public function categorias () {
  return '
    <div>
      <h1> Categorias </h1>
      <div>
        <form action="categorias.php" method="POST">
          <input type="text" name="nombre" placeholder="Nombre">
          <input type="text" name="detalles" placeholder="Detalles">
          <input type="text" name="descripcion" placeholder="Descripcion">
          <input type="submit" name="crear" value="Crear">
        </form>
      </div>
      <div>
        <table>
          <thead>
            <tr>
              <th> Nombre </th>
              <th> Detalles </th>
              <th> Descripcion </th>
              <th> Acciones </th>
            </tr>
          </thead>
          <tbody>
            <?php
              $categorias = new Categoria();
              $categorias = $categorias -> obtenerCategoriasHabilitadas();
              foreach ( $categorias as $categoria ) {
                echo '
                  <tr>
                    <td> ' . $categoria[ 'nombre' ] . ' </td>
                    <td> ' . $categoria[ 'detalles' ] . ' </td>
                    <td> ' . $categoria[ 'descripcion' ] . ' </td>
                    <td>
                      <form action="categorias.php" method="POST">
                        <input type="hidden" name="id" value=" ' . $categoria[ 'id' ] . ' ">
                        <input type="submit" name="editar" value="Editar">
                        <input type="submit" name="eliminar" value="Eliminar">
                      </form>
                    </td>
                  </tr>
                ';
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    ';
}
  echo layout( 'Categorias', 'Welcome to the categorias' );
?>
