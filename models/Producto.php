<?php
  require_once 'Servidor.php';
  class Producto {
    public $id;
    public $nombre;
    public $codigo;
    public $detalles;
    public $fecha_adquirido;
    public $cantidad;
    public $precio;
    public $categoria_id;
    private $conexion;
    public function __construct ()
    {
      $this -> conexion = new Servidor();
      $this -> id = '';
      $this -> nombre = '';
      $this -> codigo = '';
      $this -> detalles = '';
      $this -> fecha_adquirido = '';
      $this -> cantidad = '';
      $this -> precio = '';
      $this -> categoria_id = '';
    }
    public function obtenerProductos () {
      $sql = 'SELECT * FROM productos';
      $resultado = $this -> conexion -> obtenerConexion() -> query( $sql );
      $productos = [];
      while ( $producto = $resultado -> fetch_assoc() ) {
        $productos[] = $producto;
      }
      return $productos;
    }
    public function obtenerProductosHabilitadas () {
      $sql = 'SELECT * FROM productos WHERE estado = 1';
      $resultado = $this -> conexion -> obtenerConexion() -> query( $sql );
      $productos = [];
      while ( $producto = $resultado -> fetch_assoc() ) {
        $productos[] = $producto;
      }
      return $productos;
    }
    public function obtenerProductosPorNombreOCodigo ( $dato ) {
      $sql = 'SELECT * FROM productos WHERE nombre LIKE ? OR codigo LIKE ? AND estado = 1';
      $sentencia = $this -> conexion -> obtenerConexion() -> prepare( $sql );
      $sentencia -> bind_param( 'ss', $dato, $dato );
      $sentencia -> execute();
      $resultado = $sentencia -> get_result();
      $productos = [];
      while ( $producto = $resultado -> fetch_assoc() ) {
        $productos[] = $producto;
      }
      return $productos;
    }
    public function obtenerProductoPorId ( $id ) {
      $sql = 'SELECT * FROM productos WHERE id = ?';
      $sentencia = $this -> conexion -> obtenerConexion() -> prepare( $sql );
      $sentencia -> bind_param( 'i', $id );
      $sentencia -> execute();
      $resultado = $sentencia -> get_result();
      $producto = $resultado -> fetch_assoc();
      return $producto;
    }
    public function obtenerProductosPorCategoria ( $categoria_id ) {
      $sql = 'SELECT * FROM productos WHERE categoria_id = ? AND estado = 1';
      $sentencia = $this -> conexion -> obtenerConexion() -> prepare( $sql );
      $sentencia -> bind_param( 'i', $categoria_id );
      $sentencia -> execute();
      $resultado = $sentencia -> get_result();
      $productos = [];
      while ( $producto = $resultado -> fetch_assoc() ) {
        $productos[] = $producto;
      }
      return $productos;
    }
    
    public function crearProducto ( $nombre, $codigo, $detalles, $fecha_adquirido, $cantidad, $precio, $categoria_id ) {
      $sql = 'INSERT INTO productos ( nombre, codigo, detalles, fecha_adquirido, cantidad, precio, categoria_id ) VALUES ( ?, ?, ?, ?, ?, ?, ? )';
      $sentencia = $this -> conexion -> obtenerConexion() -> prepare( $sql );
      $sentencia -> bind_param( 'ssssidi', $nombre, $codigo, $detalles, $fecha_adquirido, $cantidad, $precio, $categoria_id );
      $sentencia -> execute();
      $resultado = $sentencia -> affected_rows;
      return $resultado;
    }
    public function actualizarProducto ( $id, $nombre, $codigo, $detalles, $fecha_adquirido, $cantidad, $precio, $categoria_id ) {
      $sql = 'UPDATE productos SET nombre = ?, codigo = ?, detalles = ?, fecha_adquirido = ?, cantidad = ?, precio = ?, categoria_id = ? WHERE id = ?';
      $sentencia = $this -> conexion -> obtenerConexion() -> prepare( $sql );
      $sentencia -> bind_param( 'ssssidii', $nombre, $codigo, $detalles, $fecha_adquirido, $cantidad, $precio, $categoria_id, $id );
      $sentencia -> execute();
      $resultado = $sentencia -> affected_rows;
      return $resultado;
    }
    public function eliminarProducto ( $id ) {
      $sql = 'DELETE FROM productos WHERE id = ?';
      $sentencia = $this -> conexion -> obtenerConexion() -> prepare( $sql );
      $sentencia -> bind_param( 'i', $id );
      $sentencia -> execute();
      $resultado = $sentencia -> affected_rows;
      return $resultado;
    }
?>
