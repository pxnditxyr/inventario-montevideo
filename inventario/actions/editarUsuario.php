<?php
  require_once '../../models/Usuario.php';
  if ( !isset( $_POST[ 'id' ] ) || !isset( $_POST[ 'apellidos' ] ) || !isset( $_POST[ 'nombres' ] ) || !isset( $_POST[ 'ci' ] ) || !isset( $_POST[ 'fecha_nac' ] ) || !isset( $_POST[ 'email' ] ) || !isset( $_POST[ 'password' ] ) || !isset( $_POST[ 'rol' ] ) ) {
    echo '<h1> Debe llenar todos los campos </h1>';
    header( 'refresh: 5; url=../usuarios.php' );
    return;
  }
  $id = $_POST[ 'id' ];
  $apellidos = $_POST[ 'apellidos' ];
  $nombres = $_POST[ 'nombres' ];
  $ci = $_POST[ 'ci' ];
  $fecha_nac = $_POST[ 'fecha_nac' ];
  $email = $_POST[ 'email' ];
  $password = $_POST[ 'password' ];
  $rol = $_POST[ 'rol' ];
  $usuario = new Usuario();

  $usuarioACrear = $usuario -> obtenerUsuarioPorEmail( $email );

  if ( isset( $usuarioACrear[ 'id' ] ) && $usuarioACrear[ 'id' ] != $id ) {
    echo '<h1> La usuario ya existe </h1>';
    header( 'refresh: 20; url=../usuarios.php' );
    return;
  }

  $usuario -> actualizarUsuario( $id, $apellidos, $nombres, $ci, $fecha_nac, $email, $password, $rol );

  $usuarioCreada = $usuario -> obtenerUsuarioPorEmail( $email );

  if ( !isset( $usuarioCreada[ 'id' ] ) ) {
    echo '<h1> No se pudo crear la usuario </h1>';
    header( 'refresh: 5; url=../usuarios.php' );
    return;
  }
  header( 'Location: ../usuarios.php' );
?>
