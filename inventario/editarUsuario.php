<script src="https://cdn.tailwindcss.com"></script>
<?php
  include_once 'layouts/layout.php';
  if ( !isset( $_GET[ 'id' ] ) ) {
    echo '<div class="w-full h-screen flex justify-center items-center">
      <div class="w-1/2 bg-white rounded-lg shadow-lg p-4">
        <h1 class="text-2xl font-bold text-center">No se ha seleccionado un usuario</h1>
        <a href="usuarios.php" class="block text-center text-blue-500">Volver a usuarios</a>
      </div>
    </div>';
    header( 'Refresh: 3; URL=usuarios.php' );
    return;
  }

  include_once '../models/Usuario.php';
  $id = $_GET[ 'id' ];
  $usuario = new Usuario();

  $usuarioActual = $usuario -> obtenerUsuarioPorId( $id );

  if ( !isset( $usuarioActual[ 'id' ] ) ) {
    echo '<div class="w-full h-screen flex justify-center items-center">
      <div class="w-1/2 bg-white rounded-lg shadow-lg p-4">
        <h1 class="text-2xl font-bold text-center">No se ha encontrado el usuario</h1>
        <a href="usuarios.php" class="block text-center text-blue-500">Volver a usuarios</a>
      </div>
    </div>';
    header( 'Refresh: 3; URL=usuarios.php' );
    return;
  }

  function crearFormulario ( $usuario ) {
    $inputs = '';
    foreach ( $usuario as $key => $value ) {
      if ( strcmp( $key, 'id' ) != 0 && strcmp( $key, 'estado' ) != 0 && strcmp( $key, 'created_at' ) != 0 && strcmp( $key, 'updated_at' ) != 0 ) {
        // if type of value is date input type is date with regex
        $regexIsDate = preg_match( '/\d{4}-\d{2}-\d{2}/', $value );
        if ( $regexIsDate ) {
          $inputs .= '<div class="flex gap-2">
                        <label for="' . $key . '" class="w-1/4 text-right text-gray-700">' . ucfirst( $key ) . '</label>
                        <input type="date" class="form-control" id="' . $key . '" name="' . $key . '" value="' . $value . '" required class="w-3/4 border border-gray-300 rounded-lg p-2">
                      </div>';
        } else {
          $inputs .= '<div class="form-group">
                        <label for="' . $key . '" class="w-1/4 text-right text-gray-700">' . ucfirst( $key ) . '</label>
                        <input type="text" class="form-control" id="' . $key . '" name="' . $key . '" value="' . $value . '" required class="w-3/4 border border-gray-300 rounded-lg p-2">
                      </div>';
        }
      }
    }
    return $inputs;
  }
  function editarUsuario ( $usuarioActual ) {
    return '
      <form action="actions/editarUsuario.php" method="POST" class="w-full bg-white rounded-lg shadow-lg p-4">
        <input type="hidden" name="id" value="' . $usuarioActual[ 'id' ] . '" class="w-3/4 border border-gray-300 rounded-lg p-2">
        ' . crearFormulario( $usuarioActual ) . '
        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg mt-4">Editar</button>
      </form>';
  }
  $editarUsuario = editarUsuario( $usuarioActual );
  echo layout( 'Editar usuario', $editarUsuario );
?>
