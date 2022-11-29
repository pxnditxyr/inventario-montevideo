<?php
  require_once '../../models/Producto.php';
  if ( !isset( $_POST[ 'nombre' ] ) || !isset( $_POST[ 'codigo' ] ) || !isset( $_POST[ 'detalles' ] ) || !isset( $_POST['fecha_adquirido'] ) || !isset( $_POST['cantidad'] ) || !isset( $_POST['precio'] ) || !isset( $_POST['categoria_id'] ) ) {
    echo json_encode( $_POST );

    echo '<h1> Debe llenar todos los campos </h1>';
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

  $producto -> crearProducto( $nombre, $codigo, $detalles, $fecha_adquirido, $cantidad, $precio, $categoria_id );

  $productoCreado = $producto -> obtenerProductoPorCodigo( $codigo );
  if ( !$productoCreado ) {
    echo '<h1> No se pudo crear el producto </h1>';
    header( 'refresh: 5; url=../productos.php' );
    return;
  }
  header( 'Location: ../productos.php' );
?>
