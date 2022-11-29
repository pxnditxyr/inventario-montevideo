<?php
  // public $id;
  //   public $nombre;
  //   public $codigo;
  //   public $detalles;
  //   public $fecha_adquirido;
  //   public $cantidad;
  //   public $precio;
  //   public $categoria

  require_once '../../models/Producto.php';
  if ( !isset( $_POST[ 'id' ] ) || !isset( $_POST[ 'nombre' ] ) || !isset( $_POST[ 'codigo' ] ) || !isset( $_POST[ 'detalles' ] ) || !isset( $_POST[ 'fecha_adquirido' ] ) || !isset( $_POST[ 'cantidad' ] ) || !isset( $_POST[ 'precio' ] ) || !isset( $_POST[ 'categoria' ] ) ) {
    echo '<h1> Debe llenar todos los campos </h1>';
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
    echo '<h1> La producto ya existe </h1>';
    header( 'refresh: 5; url=../productos.php' );
    return;
  }

  $producto -> actualizarProducto( $_POST[ 'id' ], $nombre, $codigo, $detalles, $fecha_adquirido, $cantidad, $precio, $categoria );

  $productoCreado = $producto -> obtenerProductoPorCodigo( $codigo );

  if ( !isset( $productoCreado[ 'id' ] ) ) {
    echo '<h1> No se pudo crear la producto </h1>';
    header( 'refresh: 5; url=../productos.php' );
    return;
  }
  header( 'Location: ../productos.php' );
?>
