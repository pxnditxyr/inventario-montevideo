<?php
  require_once './layouts/layout.php';
  require_once '../models/Categoria.php';

  function crearTabla ( $categorias ) {
    $tabla = '';
    $i = 1;
    foreach ( $categorias as $categoria ) {
      $tabla .= '<tr>';
      // $tabla .= '<td>' . $categoria[ 'id' ] . '</td>';
      $tabla .= '<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">' . $i . '</td>';
      $tabla .= '<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">' . $categoria[ 'nombre' ] . '</td>';
      $tabla .= '<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">' . $categoria[ 'detalles' ] . '</td>';
      $tabla .= '<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">' . $categoria[ 'descripcion' ] . '</td>';
      //$tabla .= '<td>' . $categoria[ 'estado' ] . '</td>';
      $tabla .= '<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">';
      $tabla .= '<a href="editarCategoria.php?id=' . $categoria[ 'id' ] . '" class="text-indigo-600 hover:text-indigo-900">Editar</a>';
      $tabla .= '<a href="actions/eliminarCategoria.php?id=' . $categoria[ 'id' ] . '" class="text-indigo-600 hover:text-indigo-900 ml-4">Eliminar</a>';
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
        <div class="flex flex-col p-5">
          <form action="actions/crearCategoria.php" method="POST" class="flex flex-col gap-4">
            <input class="border border-gray-300 p-2 rounded-md" type="text" name="nombre" placeholder="Nombre">
            <input class="border border-gray-300 p-2 rounded-md" type="text" name="detalles" placeholder="Detalles">
            <input class="border border-gray-300 p-2 rounded-md" type="text" name="descripcion" placeholder="Descripcion">
            <input class="border border-gray-300 p-2 rounded-md" type="submit" name="crear" value="Crear">
          </form>
        </div>
        <div class="flex flex-col p-5">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="border-b">
              <tr>
                <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Numero</th>
                <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Nombre</th>
                <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Detalles</th>
                <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Descripcion</th>
                <!-- <th>Estado</th> -->
                <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Acciones</th>
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


