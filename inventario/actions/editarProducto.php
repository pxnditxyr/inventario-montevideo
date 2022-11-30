<?php
  require_once '../../models/Producto.php';
  if ( !isset( $_POST[ 'id' ] ) || !isset( $_POST[ 'nombre' ] ) || !isset( $_POST[ 'codigo' ] ) || !isset( $_POST[ 'detalles' ] ) || !isset( $_POST[ 'fecha_adquirido' ] ) || !isset( $_POST[ 'cantidad' ] ) || !isset( $_POST[ 'precio' ] ) || !isset( $_POST[ 'categoria' ] ) ) {
    echo '<div class="flex justify-center">
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">No se han recibido los datos necesarios.</span>
      </div>
    </div>';
    header( 'refresh: 5; url=../productos.php' );
    return;
  }

  $id = $_POST[ 'id' ];
  $nombre = $_POST[ 'nombre' ];
  $codigo = $_POST[ 'codigo' ];
  $detalles = $_POST[ 'detalles' ];
  $fecha_adquirido = $_POST[ 'fecha_adquirido' ];
  $cantidad = $_POST[ 'cantidad' ];
  $precio = $_POST[ 'precio' ];
  $categoria = $_POST[ 'categoria' ];

  $producto = new Producto();

  $existeProductoConCodigo = $producto -> obtenerProductoPorCodigo( $codigo );

  if ( isset( $existeProductoConCodigo[ 'id' ] ) && strcmp( $existeProductoConCodigo[ 'id' ], $_POST[ 'id' ] ) != 0 ) {
    echo '<div class="flex justify-center">
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">El producto ya existe.</span>
      </div>
    </div>';
    header( 'refresh: 5; url=../productos.php' );
    return;
  }

  $producto -> actualizarProducto( $_POST[ 'id' ], $nombre, $codigo, $detalles, $fecha_adquirido, $cantidad, $precio, $categoria );

  $productoCreado = $producto -> obtenerProductoPorCodigo( $codigo );

  if ( !isset( $productoCreado[ 'id' ] ) ) {
    echo '<div class="flex justify-center">
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">No se ha podido crear el producto.</span>
      </div>
    </div>';
    header( 'refresh: 5; url=../productos.php' );
    return;
  }
  header( 'Location: ../productos.php' );
?>
