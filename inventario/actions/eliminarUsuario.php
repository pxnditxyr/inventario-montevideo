<?php
  require_once '../../models/Usuario.php';
  if ( !isset( $_GET[ 'id' ] ) ) {
    echo '<h1> Ha ocurrido un error </h1>';
    header( 'Refresh: 3; URL=usuarios.php' );
    return;
  }

  $id = $_GET[ 'id' ];

  $usuario = new Usuario();
  $existeUsuario = $usuario -> obtenerUsuarioPorId( $id );

  if ( !isset( $existeUsuario[ 'id' ] ) ) {
    echo '<h1> La usuario ya existe </h1>';
    header( 'refresh: 5; url=../usuarios.php' );
    return;
  }

  $usuario -> eliminarUsuario( $id );
  $existeUsuario = $usuario -> obtenerUsuarioPorId( $id );
  if ( isset( $existeUsuario[ 'id' ] ) ) {
    echo '<h1> Ha ocurrido un error </h1>';
    header( 'refresh: 5; url=../usuarios.php' );
    return;
  }
  echo '<h1> Usuario eliminada </h1>';
  header( 'Location: ../usuarios.php' );
?>
