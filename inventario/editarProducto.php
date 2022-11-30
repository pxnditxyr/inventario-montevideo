<script src="https://cdn.tailwindcss.com"></script>
<?php
  include_once 'layouts/layout.php';
  include_once '../models/Categoria.php';
  if ( !isset( $_GET[ 'id' ] ) ) {
    echo '<div class="w-full h-screen flex justify-center items-center">
      <div class="w-1/2 bg-white rounded-lg shadow-lg p-4">
        <h1 class="text-2xl font-bold text-center">No se ha seleccionado una categoría</h1>
        <a href="categorias.php" class="block text-center text-blue-500">Volver a categorías</a>
      </div>
    </div>';
    header( 'Refresh: 3; URL=productos.php' );
    return;
  }

  include_once '../models/Producto.php';
  $id = $_GET[ 'id' ];
  $producto = new Producto();

  $productoActual = $producto -> obtenerProductoPorId( $id );

  if ( !isset( $productoActual[ 'id' ] ) ) {
    echo '<div class="w-full h-screen flex justify-center items-center">
      <div class="w-1/2 bg-white rounded-lg shadow-lg p-4">
        <h1 class="text-2xl font-bold text-center">No se ha encontrado el producto</h1>
        <a href="productos.php" class="block text-center text-blue-500">Volver a productos</a>
      </div>
    </div>';
    header( 'Refresh: 3; URL=productos.php' );
    return;
  }

  function crearFormulario ( $producto ) {
    $inputs = '';
    foreach ( $producto as $key => $value ) {
      if ( strcmp( $key, 'categoria' ) == 0 ) {
        $categoria = new Categoria();
        $categorias = $categoria -> obtenerCategoriasHabilitadas();
        $options = '';
        foreach ( $categorias as $categoria ) {
          if ( strcmp( $value, $categoria[ 'id' ] ) == 0 ) {
            $options .= '<option value="' . $categoria[ 'id' ] . '" selected="selected">' . $categoria[ 'nombre' ] . '</option>';
          } else {
            $options .= '<option value="' . $categoria[ 'id' ] . '">' . $categoria[ 'nombre' ] . '</option>';
          }
        }
        $inputs .= '<div class="flex gap-2">
                      <label for="categoria" class="w-1/4 text-right text-gray-700">Categoría</label>
                      <select name="categoria" id="categoria" class="w-3/4 border border-gray-300 rounded-lg p-2">
                        ' . $options . '
                      </select>
                    </div>';

      } else {

        if ( strcmp( $key, 'id' ) != 0 && strcmp( $key, 'estado' ) != 0 && strcmp( $key, 'created_at' ) != 0 && strcmp( $key, 'updated_at' ) != 0 ) {
          $regexIsDate = preg_match( '/\d{4}-\d{2}-\d{2}/', $value );
          if ( $regexIsDate ) {
            $inputs .= '<div class="flex gap-2">
                          <label for="' . $key . '" class="w-1/4 text-right text-gray-700">' . ucfirst( $key ) . '</label>
                          <input type="date" class="w-3/4 border border-gray-300 rounded-lg p-2" id="' . $key . '" name="' . $key . '" value="' . $value . '" required>
                        </div>';
          } else {
            $inputs .= '<div class="flex gap-2">
                        <label for="' . $key . '" class="w-1/4 text-right text-gray-700">' . ucfirst( $key ) . '</label>
                        <input type="text" id="' . $key . '" name="' . $key . '" value="' . $value . '" required class="w-3/4 border border-gray-300 rounded-lg p-2">
                      </div>';
          }
        }
      }
    }
    return $inputs;
  }
  function editarProducto ( $productoActual ) {
    return '
      <form action="actions/editarProducto.php" method="POST" class="w-full bg-white rounded-lg shadow-lg p-4">
        <input type="hidden" name="id" value="' . $productoActual[ 'id' ] . '" class="w-3/4 border border-gray-300 rounded-lg p-2">
        ' . crearFormulario( $productoActual ) . '
        <button class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg mt-4">Editar producto</button>
      </form>';
  }
  $editarProducto = editarProducto( $productoActual );
  echo layout( 'Editar producto', $editarProducto );
?>
