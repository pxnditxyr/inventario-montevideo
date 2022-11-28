<?php
  require_once '../../models/Usuario.php';
  if ( !isset( $_POST[ 'apellidos' ] ) || !isset( $_POST[ 'nombres' ] ) || !isset( $_POST[ 'ci' ] ) || !isset( $_POST[ 'fecha_nac' ] ) || !isset( $_POST[ 'email' ] ) || !isset( $_POST[ 'password' ] ) ) {
    echo '<h1> Debe llenar todos los campos </h1>';
    header( 'refresh: 5; url=../usuarios.php' );
    return;
  }
  $apellidos = $_POST[ 'apellidos' ];
  $nombres = $_POST[ 'nombres' ];
  $ci = $_POST[ 'ci' ];
  $fecha_nac = $_POST[ 'fecha_nac' ];
  $email = $_POST[ 'email' ];
  $password = $_POST[ 'password' ];

  $usuario = new Usuario();

  $existeUsuario = $usuario -> existeUsuarioPorEmail( $email );
  if ( $existeUsuario ) {
    echo '<h1> La usuario ya existe </h1>';
    header( 'refresh: 5; url=../usuarios.php' );
    return;
  }

  $usuario -> crearUsuario( $apellidos, $nombres, $ci, $fecha_nac, $email, $password );

  $usuarioCreado = $usuario -> existeUsuarioPorEmail( $email );
  if ( !$usuarioCreado ) {
    echo '<h1> No se pudo crear el usuario </h1>';
    header( 'refresh: 5; url=../usuarios.php' );
    return;
  }
  header( 'Location: ../usuarios.php' );
?>
