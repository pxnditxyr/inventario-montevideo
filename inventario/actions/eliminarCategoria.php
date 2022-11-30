
<?php
  require_once '../../models/Categoria.php';
  if ( !isset( $_GET[ 'id' ] ) ) {
    echo '<div class="flex justify-center">
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">No se han recibido los datos necesarios.</span>
      </div>
    </div>';
    header( 'Refresh: 3; URL=categorias.php' );
    return;
  }

  $id = $_GET[ 'id' ];

  $categoria = new Categoria();
  $existeCategoria = $categoria -> obtenerCategoriaPorId( $id );

  if ( !isset( $existeCategoria[ 'id' ] ) ) {
    echo '<div class="flex justify-center">
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">La categoría no existe.</span>
      </div>
    </div>';
    header( 'refresh: 5; url=../categorias.php' );
    return;
  }

  $categoria -> eliminarCategoria( $id );
  $existeCategoria = $categoria -> obtenerCategoriaPorId( $id );
  if ( isset( $existeCategoria[ 'id' ] ) ) {
    echo '<div class="flex justify-center">
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">No se ha podido eliminar la categoría.</span>
      </div>
    </div>';
    header( 'refresh: 5; url=../categorias.php' );
    return;
  }
  header( 'Location: ../categorias.php' );
?>
