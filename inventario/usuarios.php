<?php
  require_once './layouts/layout.php';
  require_once '../models/Usuario.php';

  function crearTabla ( $usuarios ) {
    $tabla = '';
    $i = 1;
    foreach ( $usuarios as $usuario ) {
      $tabla .= '<tr>';
      $tabla .= '<td>' . $i . '</td>';
      $tabla .= '<td>' . $usuario[ 'apellidos' ] . '</td>';
      $tabla .= '<td>' . $usuario[ 'nombres' ] . '</td>';
      $tabla .= '<td>' . $usuario[ 'ci' ] . '</td>';
      $tabla .= '<td>' . $usuario[ 'fecha_nac' ] . '</td>';
      $tabla .= '<td>' . $usuario[ 'email' ] . '</td>';
      $tabla .= '<td>' . $usuario[ 'rol' ] . '</td>';
      $tabla .= '<td>';
      $tabla .= '<a href="editarUsuario.php?id=' . $usuario[ 'id' ] . '" class="btn btn-warning">Editar</a>';
      $tabla .= '<a href="actions/eliminarUsuario.php?id=' . $usuario[ 'id' ] . '" class="btn btn-danger">Eliminar</a>';
      $tabla .= '</td>';
      $tabla .= '</tr>';
      $i++;
    }
    return $tabla;
  }

  function usuarios () {
    $usuario = new Usuario();
    $usuariosObtenidas = $usuario -> obtenerUsuariosHabilitados();
    $tabla = crearTabla( $usuariosObtenidas );

    return '
        <div>
          <form action="actions/crearUsuario.php" method="POST">
            <input type="text" name="apellidos" placeholder="Apellidos">
            <input type="text" name="nombres" placeholder="Nombres">
            <input type="text" name="ci" placeholder="CI">
            <input type="date" name="fecha_nac" placeholder="Fecha de Nacimiento">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <button> Crear Usuario </button>
          </form>
        </div>
        <div>
          <table>
            <thead>
              <tr>
                <th>Numero</th>
                <th>Apellidos</th>
                <th>Nombres</th>
                <th>C.I.</th>
                <th>Fecha de Nacimiento</th>
                <th>Email</th>
                <th>Rol</th>
              </tr>
            </thead>
            <tbody>
              ' . $tabla . '
            </tbody>
          </table>
        </div>

      ';
  }

  $usuarios = usuarios();
  echo layout( 'Usuarios', $usuarios );
?>
