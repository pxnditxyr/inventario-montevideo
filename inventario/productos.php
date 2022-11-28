<?php
  require_once './layouts/layout.php';
  require_once '../models/Producto.php';
  require_once '../models/Categoria.php';

  function crearTabla ( $productos ) {
    $tabla = '';
    $i = 1;

    foreach ( $productos as $producto ) {
      $tabla .= '<tr>';
      $tabla .= '<td>' . $i . '</td>';
      $tabla .= '<td>' . $producto[ 'nombre' ] . '</td>';
      $tabla .= '<td>' . $producto[ 'codigo' ] . '</td>';
      $tabla .= '<td>' . $producto[ 'detalles' ] . '</td>';
      $tabla .= '<td>' . $producto[ 'fecha_adiquirido' ] . '</td>';
      $tabla .= '<td>' . $producto[ 'cantidad' ] . '</td>';
      $tabla .= '<td>' . $producto[ 'precio' ] . '</td>';
      $tabla .= '<td>' . $producto[ 'categoria_id' ] . '</td>';
      $tabla .= '<td>';
      $tabla .= '<a href="editarProducto.php?id=' . $producto[ 'id' ] . '" class="btn btn-warning">Editar</a>';
      $tabla .= '<a href="actions/eliminarProducto.php?id=' . $producto[ 'id' ] . '" class="btn btn-danger">Eliminar</a>';
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
    $productosObtenidas = $producto -> obtenerProductosHabilitados();
    $tabla = crearTabla( $productosObtenidas );
    $categoria = new Categoria();
    $categorias = $categoria -> obtenerCategoriasHabilitadas();
    $opcionesDeCategorias = crearOpcionesDeCategorias( $categorias );

    return '
        <div>
          <form action="actions/crearProducto.php" method="POST">
            <input type="text" name="nombre" placeholder="nombre">
            <input type="text" name="codigo" placeholder="codigo">
            <input type="text" name="detalles" placeholder="detalles">
            <input type="date" name="fecha_adiquirido" placeholder="Fecha de adquisicion" value="' . date( 'Y-m-d' ) . '">
            <input type="number" name="cantidad" placeholder="cantidad">
            <input type="number" name="precio" placeholder="Precio">
            <select name="categoria_id">
              ' . $opcionesDeCategorias . '
            </select>
            <button> Crear Producto </button>
          </form>
        </div>
        <div>
          <table>
            <thead>
              <tr>
                <th>Numero</th>
                <th>Nombre</th>
                <th>Codigo</th>
                <th>Datalles</th>
                <th>Fecha Adquirido</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Categoria</th>
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
