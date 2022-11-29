<?php
  require_once '../../models/Producto.php';
  if ( !isset( $_GET[ 'id' ] ) ) {
    echo '<h1> Ha ocurrido un error </h1>';
    header( 'Refresh: 3; URL=productos.php' );
    return;
  }

  $id = $_GET[ 'id' ];

  $producto = new Producto();
  $existeProducto = $producto -> obtenerProductoPorId( $id );

  if ( !isset( $existeProducto[ 'id' ] ) ) {
    echo '<h1> La producto no existe </h1>';
    header( 'refresh: 5; url=../productos.php' );
    return;
  }

  $producto -> eliminarProducto( $id );
  $existeProducto = $producto -> obtenerProductoPorId( $id );
  if ( isset( $existeProducto[ 'id' ] ) ) {
    echo '<h1> Ha ocurrido un error </h1>';
    header( 'refresh: 5; url=../productos.php' );
    return;
  }
  header( 'Location: ../productos.php' );
?>
