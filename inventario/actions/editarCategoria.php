<script src="https://cdn.tailwindcss.com"></script>
<?php
  require_once '../../models/Categoria.php';
  if ( !isset( $_POST[ 'id' ] ) || !isset( $_POST[ 'nombre' ] ) || !isset( $_POST[ 'descripcion' ] ) || !isset( $_POST[ 'detalles' ] ) ) {
  echo '<div class="flex justify-center">
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">No se han recibido los datos necesarios.</span>
          </div>
        </div>';
    header( 'refresh: 5; url=../categorias.php' );
    return;
  }
  $nombre = $_POST[ 'nombre' ];
  $descripcion = $_POST[ 'descripcion' ];
  $detalles = $_POST[ 'detalles' ];

  $categoria = new Categoria();

  $existeCategoria = $categoria -> existeCategoria( $nombre );

  if ( isset( $existeCategoria[ 'id' ] ) && strcmp( $existeCategoria[ 'id' ], $_POST[ 'id' ] ) != 0 ) {
    echo '<div class="flex justify-center">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
              <strong class="font-bold">Error!</strong>
              <span class="block sm:inline">La categoría ya existe.</span>
            </div>
          </div>';
    header( 'refresh: 5; url=../categorias.php' );
    return;
  }

  $categoria -> actualizarCategoria( $_POST[ 'id' ], $nombre, $descripcion, $detalles );

  $categoriaCreada = $categoria -> obtenerCategoriaPorNombre( $nombre );
  if ( !isset( $categoriaCreada[ 'id' ] ) ) {
    echo '<div class="flex justify-center">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
              <strong class="font-bold">Error!</strong>
              <span class="block sm:inline">No se ha podido crear la categoría.</span>
            </div>
          </div>';
    header( 'refresh: 5; url=../categorias.php' );
    return;
  }
  header( 'Location: ../categorias.php' );
?>
