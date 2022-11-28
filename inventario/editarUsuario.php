<?php
  include_once 'layouts/layout.php';
  if ( !isset( $_GET[ 'id' ] ) ) {
    echo '<h1> Ha ocurrido un error </h1>';
    header( 'Refresh: 3; URL=usuarios.php' );
    return;
  }

  include_once '../models/Usuario.php';
  $id = $_GET[ 'id' ];
  $usuario = new Usuario();

  $usuarioActual = $usuario -> obtenerUsuarioPorId( $id );

  if ( !isset( $usuarioActual[ 'id' ] ) ) {
    echo '<h1> Ha ocurrido un error </h1>';
    header( 'Refresh: 3; URL=usuarios.php' );
    return;
  }

  function crearFormulario ( $usuario ) {
    $inputs = '';
    foreach ( $usuario as $key => $value ) {
      if ( strcmp( $key, 'id' ) != 0 && strcmp( $key, 'estado' ) != 0 && strcmp( $key, 'created_at' ) != 0 && strcmp( $key, 'updated_at' ) != 0 ) {
        if ( strcmp( $key, 'fecha_nacimiento' ) == 0 ) {
          $inputs .= '<div class="form-group">
                        <label for="' . $key . '">' . ucfirst( $key ) . '</label>
                        <input type="date" class="form-control" id="' . $key . '" name="' . $key . '" value="' . $value . '">
                      </div>';
        } else {
          $inputs .= '<div class="form-group">
                        <label for="' . $key . '">' . ucfirst( $key ) . '</label>
                        <input type="text" class="form-control" id="' . $key . '" name="' . $key . '" value="' . $value . '">
                      </div>';
        }
      }
    }
    return $inputs;
  }
  function editarUsuario ( $usuarioActual ) {
    return '
      <form action="actions/editarUsuario.php" method="POST">
        <input type="hidden" name="id" value="' . $usuarioActual[ 'id' ] . '">
        ' . crearFormulario( $usuarioActual ) . '
        <button type="submit" class="btn btn-primary">Editar</button>
      </form>';
  }
  $editarUsuario = editarUsuario( $usuarioActual );
  echo layout( 'Editar usuario', $editarUsuario );
?>
