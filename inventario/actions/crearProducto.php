<script src="https://cdn.tailwindcss.com"></script>
<?php
  require_once '../../models/Producto.php';
  if ( !isset( $_POST[ 'nombre' ] ) || !isset( $_POST[ 'codigo' ] ) || !isset( $_POST[ 'detalles' ] ) || !isset( $_POST['fecha_adquirido'] ) || !isset( $_POST['cantidad'] ) || !isset( $_POST['precio'] ) || !isset( $_POST['categoria_id'] ) ) {
    echo json_encode( $_POST );

    echo '<div class="flex justify-center">
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">No se han recibido los datos necesarios.</span>
      </div>
    </div>';
    header( 'refresh: 5; url=../productos.php' );
    return;
  }
  $nombre = $_POST[ 'nombre' ];
  $codigo = $_POST[ 'codigo' ];
  $detalles = $_POST[ 'detalles' ];
  $fecha_adquirido = $_POST[ 'fecha_adquirido' ];
  $cantidad = $_POST[ 'cantidad' ];
  $precio = $_POST[ 'precio' ];
  $categoria_id = $_POST[ 'categoria_id' ];

  $producto = new Producto();

  $existeProducto = $producto -> obtenerProductoPorCodigo( $codigo );

  if ( isset( $existeProducto[ 'id' ] ) ) {
    echo '<div class="flex justify-center">
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">El producto ya existe.</span>
      </div>
    </div>';
    header( 'refresh: 5; url=../productos.php' );
    return;
  }

  $producto -> crearProducto( $nombre, $codigo, $detalles, $fecha_adquirido, $cantidad, $precio, $categoria_id );


  $productoCreado = $producto -> obtenerProductoPorCodigo( $codigo );
  if ( !$productoCreado ) {
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
