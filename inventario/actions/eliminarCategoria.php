
<?php
  require_once '../../models/Categoria.php';
  if ( !isset( $_GET[ 'id' ] ) ) {
    echo '<h1> Ha ocurrido un error </h1>';
    header( 'Refresh: 3; URL=categorias.php' );
    return;
  }

  $id = $_GET[ 'id' ];

  $categoria = new Categoria();
  $existeCategoria = $categoria -> obtenerCategoriaPorId( $id );

  if ( !isset( $existeCategoria[ 'id' ] ) ) {
    echo '<h1> La categoria no existe </h1>';
    header( 'refresh: 5; url=../categorias.php' );
    return;
  }

  $categoria -> eliminarCategoria( $id );
  $existeCategoria = $categoria -> obtenerCategoriaPorId( $id );
  if ( isset( $existeCategoria[ 'id' ] ) ) {
    echo '<h1> Ha ocurrido un error </h1>';
    header( 'refresh: 5; url=../categorias.php' );
    return;
  }
  header( 'Location: ../categorias.php' );
?>
