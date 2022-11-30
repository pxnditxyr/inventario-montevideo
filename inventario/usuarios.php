<?php
  require_once './layouts/layout.php';
  require_once '../models/Usuario.php';

  function crearTabla ( $usuarios ) {
    $tabla = '';
    $i = 1;
    foreach ( $usuarios as $usuario ) {
      $tabla .= '<tr>';
      $tabla .= '<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">' . $i . '</td>';
      $tabla .= '<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">' . $usuario[ 'apellidos' ] . '</td>';
      $tabla .= '<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">' . $usuario[ 'nombres' ] . '</td>';
      $tabla .= '<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">' . $usuario[ 'ci' ] . '</td>';
      $tabla .= '<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">' . $usuario[ 'fecha_nac' ] . '</td>';
      $tabla .= '<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">' . $usuario[ 'email' ] . '</td>';
      $tabla .= '<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">' . $usuario[ 'rol' ] . '</td>';
      $tabla .= '<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">';
      $tabla .= '<a href="editarUsuario.php?id=' . $usuario[ 'id' ] . '" class="text-indigo-600 hover:text-indigo-900">Editar</a>';
      $tabla .= '<a href="actions/eliminarUsuario.php?id=' . $usuario[ 'id' ] . '" class="text-indigo-600 hover:text-indigo-900 ml-4">Eliminar</a>';
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
        <div class="flex flex-col p-5">
          <form action="actions/crearUsuario.php" method="POST" class="flex flex-col gap-4">
            <input type="text" name="apellidos" placeholder="Apellidos" class="border border-gray-400 p-2 rounded">
            <input type="text" name="nombres" placeholder="Nombres" class="border border-gray-400 p-2 rounded">
            <input type="text" name="ci" placeholder="CI" class="border border-gray-400 p-2 rounded">
            <input type="date" name="fecha_nac" placeholder="Fecha de Nacimiento" class="border border-gray-400 p-2 rounded">
            <input type="email" name="email" placeholder="Email" class="border border-gray-400 p-2 rounded">
            <input type="password" name="password" placeholder="Password" class="border border-gray-400 p-2 rounded">
            <button class="bg-blue-500 text-white p-2 rounded">Crear Usuario</button>
          </form>
        </div>
        <div>
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="border-b">
              <tr>
                <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Numero</th>
                <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Apellidos</th>
                <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Nombres</th>
                <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">C.I.</th>
                <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Fecha de Nacimiento</th>
                <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Email</th>
                <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Rol</th>
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
