<?php
  require_once '../../models/Usuario.php';
  if ( !isset( $_POST[ 'apellidos' ] ) || !isset( $_POST[ 'nombres' ] ) || !isset( $_POST[ 'ci' ] ) || !isset( $_POST[ 'fecha_nac' ] ) || !isset( $_POST[ 'email' ] ) || !isset( $_POST[ 'password' ] ) ) {
    echo '<div class="flex justify-center">
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">No se han recibido los datos necesarios.</span>
      </div>
    </div>';
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
    echo '<div class="flex justify-center">
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">El usuario ya existe.</span>
      </div>
    </div>';
    header( 'refresh: 5; url=../usuarios.php' );
    return;
  }

  $usuario -> crearUsuario( $apellidos, $nombres, $ci, $fecha_nac, $email, $password );

  $usuarioCreado = $usuario -> existeUsuarioPorEmail( $email );
  if ( !$usuarioCreado ) {
  echo '<div class="flex justify-center">
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">No se ha podido crear el usuario.</span>
      </div>
    </div>';
    header( 'refresh: 5; url=../usuarios.php' );
    return;
  }
  header( 'Location: ../usuarios.php' );
?>
