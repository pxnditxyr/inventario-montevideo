<?php
  require_once './layouts/layout.php';
  require_once '../models/Producto.php';
  require_once '../models/Categoria.php';

  function crearTabla ( $productos ) {
    $tabla = '';
    $i = 1;
    $categoria = new Categoria();
    foreach ( $productos as $producto ) {
      $categoriaDeProducto = $categoria -> obtenerCategoriaPorId( $producto[ 'categoria' ] );
      $tabla .= '<tr>';
      $tabla .= '<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">' . $i . '</td>';
      $tabla .= '<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">' . $producto[ 'nombre' ] . '</td>';
      $tabla .= '<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">' . $producto[ 'codigo' ] . '</td>';
      $tabla .= '<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">' . $producto[ 'detalles' ] . '</td>';
      $tabla .= '<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">' . $producto[ 'fecha_adquirido' ] . '</td>';
      $tabla .= '<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">' . $producto[ 'cantidad' ] . '</td>';
      $tabla .= '<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">' . $producto[ 'precio' ] . '</td>';
      $tabla .= '<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">' . $categoriaDeProducto[ 'nombre' ] . '</td>';
      $tabla .= '<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">';
      $tabla .= '<a href="editarProducto.php?id=' . $producto[ 'id' ] . '" class="text-indigo-600 hover:text-indigo-900">Editar</a>';
      $tabla .= '<a href="actions/eliminarProducto.php?id=' . $producto[ 'id' ] . '" class="text-indigo-600 hover:text-indigo-900 ml-4">Eliminar</a>';
      $tabla .= '</td>';
      $tabla .= '</tr>';
      $i++;
    }
    return $tabla;
  }

  function crearOpcionesDeCategorias ( $categorias ) {
    $opciones = '';
    foreach ( $categorias as $categoria ) {
      $opciones .= '<option value="' . $categoria[ 'id' ] . '">' . $categoria[ 'nombre' ] . '</option>';
    }
    return $opciones;
  }

  function productos () {
    $producto = new Producto();
    $productosObtenidos = $producto -> obtenerProductosHabilitados();
    $tabla = crearTabla( $productosObtenidos );
    $categoria = new Categoria();
    $categorias = $categoria -> obtenerCategoriasHabilitadas();
    $opcionesDeCategorias = crearOpcionesDeCategorias( $categorias );

    return '
        <div class="flex flex-col p-5">
          <form action="actions/crearProducto.php" method="POST" class="flex flex-col gap-4">
            <input type="text" name="nombre" placeholder="nombre" class="border border-gray-400 p-2 rounded">
            <input type="text" name="codigo" placeholder="codigo" class="border border-gray-400 p-2 rounded">
            <input type="text" name="detalles" placeholder="detalles" class="border border-gray-400 p-2 rounded">
            <input type="date" name="fecha_adquirido" placeholder="Fecha de adquisicion" value="' . date( 'Y-m-d' ) . '" class="border border-gray-400 p-2 rounded">
            <input type="number" name="cantidad" placeholder="cantidad" class="border border-gray-400 p-2 rounded">
            <input type="number" name="precio" placeholder="Precio" class="border border-gray-400 p-2 rounded">
            <select name="categoria_id" class="border border-gray-400 p-2 rounded">
              ' . $opcionesDeCategorias . '
            </select>
    <button
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
    > Crear Producto </button>
          </form>
        </div>
    <div
      class="flex flex-col p-5 w-full"
    >
          <!-- Searching -->
          <form action="busquedaProductos.php" method="POST" class="w-full flex gap-4">
            <div class="flex flex-row gap-4">
              <label for="search" class="text-xl">Buscar</label>
              <input type="text" name="search" id="search" class="border border-gray-400 p-2 rounded">
            </div>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Buscar</button>
          </form>
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="border-b">
              <tr>
                <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Numero</th>
                <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Nombre</th>
                <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Codigo</th>
                <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Datalles</th>
                <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Fecha Adquirido</th>
                <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Cantidad</th>
                <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Precio</th>
                <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Categoria</th>
              </tr>
            </thead>
            <tbody>
              ' . $tabla . '
            </tbody>
          </table>
        </div>

      ';
  }

  $productos = productos();
  echo layout( 'Productos', $productos );
?>
