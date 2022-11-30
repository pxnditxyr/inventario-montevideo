<?php
  require_once '../../models/Usuario.php';
  if ( !isset( $_GET[ 'id' ] ) ) {
    echo '<div class="flex justify-center">
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">No se han recibido los datos necesarios.</span>
      </div>
    </div>';
    header( 'Refresh: 3; URL=usuarios.php' );
    return;
  }

  $id = $_GET[ 'id' ];

  $usuario = new Usuario();
  $existeUsuario = $usuario -> obtenerUsuarioPorId( $id );

  if ( !isset( $existeUsuario[ 'id' ] ) ) {
    echo '<div class="flex justify-center">
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">El usuario no existe.</span>
      </div>
    </div>';
    header( 'refresh: 5; url=../usuarios.php' );
    return;
  }

  $usuario -> eliminarUsuario( $id );
  $usuarioEncontrado = $usuario -> obtenerUsuarioPorId( $id );
  if ( isset( $usuarioEncontrado[ 'id' ] ) && $usuarioEncontrado[ 'estado' ] == 1 ) {
    echo '<div class="flex justify-center">
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">No se ha podido eliminar el usuario.</span>
      </div>
    </div>';
    header( 'refresh: 5; url=../usuarios.php' );
    return;
  }
  echo '<div class="flex justify-center">
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
      <strong class="font-bold">Éxito!</strong>
      <span class="block sm:inline">El usuario se ha eliminado correctamente.</span>
    </div>
  </div>';
  header( 'Location: ../usuarios.php' );
?>
