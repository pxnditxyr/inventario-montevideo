<?php
  require_once './layouts/layout.php';
  require_once '../models/Categoria.php';

  function crearTabla ( $categorias ) {
    $tabla = '';
    $i = 1;
    foreach ( $categorias as $categoria ) {
      $tabla .= '<tr>';
      // $tabla .= '<td>' . $categoria[ 'id' ] . '</td>';
      $tabla .= '<td>' . $i . '</td>';
      $tabla .= '<td>' . $categoria[ 'nombre' ] . '</td>';
      $tabla .= '<td>' . $categoria[ 'detalles' ] . '</td>';
      $tabla .= '<td>' . $categoria[ 'descripcion' ] . '</td>';
      //$tabla .= '<td>' . $categoria[ 'estado' ] . '</td>';
      $tabla .= '<td>';
      $tabla .= '<a href="editarCategoria.php?id=' . $categoria[ 'id' ] . '" class="btn btn-warning">Editar</a>';
      $tabla .= '<a href="actions/eliminarCategoria.php?id=' . $categoria[ 'id' ] . '" class="btn btn-danger">Eliminar</a>';
      $tabla .= '</td>';
      $tabla .= '</tr>';
      $i++;
    }
    return $tabla;
  }

  function categorias () {
    $categoria = new Categoria();
    $categoriasObtenidas = $categoria -> obtenerCategoriasHabilitadas();
    $tabla = crearTabla( $categoriasObtenidas );


    return '
        <div>
          <form action="actions/crearCategoria.php" method="POST">
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
                <th>Numero</th>
                <th>Nombre</th>
                <th>Detalles</th>
                <th>Descripcion</th>
                <!-- <th>Estado</th> -->
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              ' . $tabla . '
            </tbody>
          </table>
        </div>

      ';
  }

  $categorias = categorias();
  echo layout( 'Categorias', $categorias );
?>


