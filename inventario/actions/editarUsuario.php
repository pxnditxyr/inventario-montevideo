<script src="https://cdn.tailwindcss.com"></script>
<?php
  require_once '../../models/Usuario.php';
  if ( !isset( $_POST[ 'id' ] ) || !isset( $_POST[ 'apellidos' ] ) || !isset( $_POST[ 'nombres' ] ) || !isset( $_POST[ 'ci' ] ) || !isset( $_POST[ 'fecha_nac' ] ) || !isset( $_POST[ 'email' ] ) || !isset( $_POST[ 'password' ] ) || !isset( $_POST[ 'rol' ] ) ) {
    echo '<div class="flex justify-center">
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">No se han recibido los datos necesarios.</span>
      </div>
    </div>';
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
    echo '<div class="flex justify-center">
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">El usuario ya existe.</span>
      </div>
    </div>';
    header( 'refresh: 5; url=../usuarios.php' );
    return;
  }

  $usuario -> actualizarUsuario( $id, $apellidos, $nombres, $ci, $fecha_nac, $email, $password, $rol );

  $usuarioCreada = $usuario -> obtenerUsuarioPorEmail( $email );

  if ( !isset( $usuarioCreada[ 'id' ] ) ) {
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
