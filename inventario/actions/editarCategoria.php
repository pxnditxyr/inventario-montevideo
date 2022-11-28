<?php
  require_once '../../models/Categoria.php';
  if ( !isset( $_POST[ 'nombre' ] ) || !isset( $_POST[ 'descripcion' ] ) || !isset( $_POST[ 'detalles' ] ) ) {
    echo '<h1> Debe llenar todos los campos </h1>';
    header( 'refresh: 5; url=../categorias.php' );
    return;
  }
  $nombre = $_POST[ 'nombre' ];
  $descripcion = $_POST[ 'descripcion' ];
  $detalles = $_POST[ 'detalles' ];

  $categoria = new Categoria();

  $existeCategoria = $categoria -> existeCategoria( $nombre );

  if ( strcmp( $existeCategoria[ 'id' ], $_POST[ 'id' ] ) != 0 ) {
    echo '<h1> La categoria ya existe </h1>';
    header( 'refresh: 5; url=../categorias.php' );
    return;
  }

  $categoria -> actualizarCategoria( $nombre, $descripcion, $detalles );

  $categoriaCreada = $categoria -> obtenerCategoriaPorNombre( $nombre );
  if ( !isset( $categoriaCreada[ 'id' ] ) ) {
    echo '<h1> No se pudo crear la categoria </h1>';
    header( 'refresh: 5; url=../categorias.php' );
    return;
  }
  header( 'Location: ../categorias.php' );
?>