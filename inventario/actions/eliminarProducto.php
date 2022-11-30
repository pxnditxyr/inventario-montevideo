<script src="https://cdn.tailwindcss.com"></script>
<?php
  require_once '../../models/Producto.php';
  if ( !isset( $_GET[ 'id' ] ) ) {
    echo '<div class="flex justify-center">
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">No se han recibido los datos necesarios.</span>
      </div>
    </div>';

    header( 'Refresh: 3; URL=productos.php' );
    return;
  }

  $id = $_GET[ 'id' ];

  $producto = new Producto();
  $existeProducto = $producto -> obtenerProductoPorId( $id );

  if ( !isset( $existeProducto[ 'id' ] ) ) {
    echo '<div class="flex justify-center">
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">El producto no existe.</span>
      </div>
    </div>';
    header( 'refresh: 5; url=../productos.php' );
    return;
  }

  $producto -> eliminarProducto( $id );
  $existeProducto = $producto -> obtenerProductoPorId( $id );
  if ( isset( $existeProducto[ 'id' ] ) ) {
    echo '<div class="flex justify-center">
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">No se ha podido eliminar el producto.</span>
      </div>
    </div>';
    header( 'refresh: 5; url=../productos.php' );
    return;
  }
  header( 'Location: ../productos.php' );
?>
