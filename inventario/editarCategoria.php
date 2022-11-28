<?php
  include_once 'layouts/layout.php'
  if ( !isset( $_GET[ 'id' ] ) ) {
    echo '<h1> Ha ocurrido un error </h1>'
    header( 'Refresh: 3; URL=categorias.php' );
    return;
  }
  
  include_once '../models/Categoria.php';
  $id = $_GET[ 'id' ];
  $categoria = new Categoria();
  
  $categoriaActual = $categoria -> obtenerCategoriaPorId( $id );

  if ( !isset( $categoriaActual[ 'id' ] ) ) {
    echo '<h1> Ha ocurrido un error </h1>'
    header( 'Refresh: 3; URL=categorias.php' );
    return;
  }

  function crearFormulario ( $categoria ) {
    $inputs = '';
    foreach ( $categoria as $key => $value ) {
      $inputs .= '<div class="form-group">
        <label for="' . $key . '">' . $key . '</label>
        <input type="text" class="form-control" id="' . $key . '" name="' . $key . '" value="' . $value . '">
      </div>';
    }
    return $inputs;
  }
  function editarCategoria () {
    return '
      <form action="actions/editarCategoria.php" method="POST">
        <input type="hidden" name="id" value="' . $categoriaActual[ 'id' ] . '">
        ' . crearFormulario( $categoriaActual ) . '
        <button type="submit" class="btn btn-primary">Editar</button>
      </form>';
  }
  $editarCategoria = editarCategoria();
  echo layout( 'Editar categoria', $editarCategoria );
?>
