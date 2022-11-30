<?php
  include_once 'layouts/layout.php';
  if ( !isset( $_GET[ 'id' ] ) ) {
  echo '
    <div class="w-full h-screen flex justify-center items-center">
      <div class="w-1/2 bg-white rounded-lg shadow-lg p-4">
        <h1 class="text-2xl font-bold text-center">No se ha seleccionado una categoría</h1>
        <a href="categorias.php" class="block text-center text-blue-500">Volver a categorías</a>
      </div>
    </div>';
    header( 'Refresh: 3; URL=categorias.php' );
    return;
  }

  include_once '../models/Categoria.php';
  $id = $_GET[ 'id' ];
  $categoria = new Categoria();

  $categoriaActual = $categoria -> obtenerCategoriaPorId( $id );

  if ( !isset( $categoriaActual[ 'id' ] ) ) {
  echo '
    <div class="w-full h-screen flex justify-center items-center">
      <div class="w-1/2 bg-white rounded-lg shadow-lg p-4">
        <h1 class="text-2xl font-bold text-center">No se ha encontrado la categoría</h1>
        <a href="categorias.php" class="block text-center text-blue-500">Volver a categorías</a>
      </div>
    </div>';
    header( 'Refresh: 3; URL=categorias.php' );
    return;
  }

  function crearFormulario ( $categoria ) {
    $inputs = '';
    foreach ( $categoria as $key => $value ) {
      if ( strcmp( $key, 'id' ) != 0 && strcmp( $key, 'estado' ) != 0 && strcmp( $key, 'created_at' ) != 0 && strcmp( $key, 'updated_at' ) != 0 ) {

      $inputs .= '
        <div class="flex flex-col">
          <label for="' . $key . '" class="text-gray-700 text-sm font-bold mb-2">' . $key . '</label>
          <input class="border border-gray-300 p-2 rounded-lg focus:outline-none focus:border-indigo-500" type="text" class="form-control" id="' . $key . '" name="' . $key . '" value="' . $value . '">
        </div>';
      }
    }
    return $inputs;
  }
  function editarCategoria ( $categoriaActual ) {
    return '
      <form action="actions/editarCategoria.php" method="POST" class="w-full max-w-lg flex flex-col gap-4">
        <input type="hidden" name="id" value="' . $categoriaActual[ 'id' ] . '" class="border border-gray-300 p-2 rounded-lg focus:outline-none focus:border-indigo-500">
        ' . crearFormulario( $categoriaActual ) . '
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Editar</button>
      </form>';
  }
  $editarCategoria = editarCategoria( $categoriaActual );
  echo layout( 'Editar categoria', $editarCategoria );
?>
