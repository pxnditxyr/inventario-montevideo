<?php
  require_once 'Servidor.php';
  class Categoria {
    public $id;
    public $nombre;
    public $detalles;
    public $descripcion;
    private $conexion;
    public function __construct ()
    {
      $this -> conexion = new Servidor();
      $this -> id = '';
      $this -> nombre = '';
      $this -> detalles = '';
      $this -> descripcion = '';
    }
    public function obtenerCategorias () {
      $sql = 'SELECT * FROM categorias';
      $resultado = $this -> conexion -> obtenerConexion() -> query( $sql );
      $categorias = [];
      while ( $categoria = $resultado -> fetch_assoc() ) {
        $categorias[] = $categoria;
      }
      return $categorias;
    }
    public function obtenerCategoriasHabilitadas () {
      $sql = 'SELECT * FROM categorias WHERE estado = 1';
      $resultado = $this -> conexion -> obtenerConexion() -> query( $sql );
      $categorias = [];
      while ( $categoria = $resultado -> fetch_assoc() ) {
        $categorias[] = $categoria;
      }
    }
    public function obtenerCategoriaPorNombre ( $nombre ) {
      $sql = 'SELECT * FROM categorias WHERE nombre = ? AND estado = 1';
      $sentencia = $this -> conexion -> obtenerConexion() -> prepare( $sql );
      $sentencia -> bind_param( 's', $nombre );
      $sentencia -> execute();
      $resultado = $sentencia -> get_result();
      $categoria = $resultado -> fetch_assoc();
      return $categoria;
    }

    public function existeCategoria ( $nombre ) {
      $sql = 'SELECT * FROM categorias WHERE nombre = ? AND estado = 1';
      $sentencia = $this -> conexion -> obtenerConexion() -> prepare( $sql );
      $sentencia -> bind_param( 's', $nombre );
      $sentencia -> execute();
      $resultado = $sentencia -> get_result();
      $categoria = $resultado -> fetch_assoc();
      return $categoria;
    }
    public function obtenerCategoriaPorId ( $id ) {
      $sql = 'SELECT * FROM categorias WHERE id = ? AND estado = 1';
      $sentencia = $this -> conexion -> obtenerConexion() -> prepare( $sql );
      $sentencia -> bind_param( 'i', $id );
      $sentencia -> execute();
      $resultado = $sentencia -> get_result();
      $categoria = $resultado -> fetch_assoc();
      return $categoria;
    }

    public function crearCategoria ( $nombre, $detalles, $descripcion ) {
      $sql = "INSERT INTO categorias ( id, nombre, detalles, descripcion, estado, created_at, updated_at )
              VALUES ( 'NULL', ?, ?, ?, 1, '" . date( 'Y-m-d h:i:s' ) .  "', '" . date( 'Y-m-d h:i:s' ) . "' );";
      $sentencia = $this -> conexion -> obtenerConexion() -> prepare( $sql );
      $sentencia -> bind_param( 'sss', $nombre, $detalles, $descripcion );
      $sentencia -> execute();
      $resultado = $sentencia -> get_result();
      return $resultado;
    }
    public function actualizarCategoria ( $id, $nombre, $detalles, $descripcion ) {
      $sql = "UPDATE categorias SET nombre = ?, detalles = ?, descripcion = ?, updated_at = '" . date( 'Y-m-d h:i:s' ) . "' WHERE id = ?";
      $sentencia = $this -> conexion -> obtenerConexion() -> prepare( $sql );
      $sentencia -> bind_param( 'sssi', $nombre, $detalles, $descripcion, $id );
      $sentencia -> execute();
      $resultado = $sentencia -> get_result();
      return $resultado;
    }
    public function eliminarCategoria ( $id ) {
      $sql = "UPDATE categorias SET estado = 0, updated_at = '" . date( 'Y-m-d h:i:s' ) . "' WHERE id = ?";
      $sentencia = $this -> conexion -> obtenerConexion() -> prepare( $sql );
      $sentencia -> bind_param( 's', $id );
      $sentencia -> execute();
      $resultado = $sentencia -> get_result();
      return $resultado;
    }
  }
?>
