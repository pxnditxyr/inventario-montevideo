<?php
  require_once 'Servidor.php';
  class Usuario {
    public $id;
    public $apellidos;
    public $nombres;
    public $ci;
    public $fecha_nac;
    public $email;
    public $rol;
    private $password;
    private $conexion;
    public function __construct ()
    {
      $this -> conexion = new Servidor();
      $this -> id = '';
      $this -> apellidos = '';
      $this -> nombres = '';
      $this -> ci = '';
      $this -> fecha_nac = '';
      $this -> email = '';
      $this -> rol = '';
    }
    public function existeUsuarioPorEmail ( $email ) {
      $sql = 'SELECT * FROM usuarios WHERE email = ? AND estado = 1';
      $sentencia = $this -> conexion -> obtenerConexion() -> prepare( $sql );
      $sentencia -> bind_param( 's', $email );
      $sentencia -> execute();
      $resultado = $sentencia -> get_result();
      $usuario = $resultado -> fetch_assoc();
      return isset( $usuario[ 'email' ] );
    }

    public function obtenerUsuarioPorEmail ( $email ) {
      $sql = 'SELECT * FROM usuarios WHERE email = ? AND estado = 1';
      $sentencia = $this -> conexion -> obtenerConexion() -> prepare( $sql );
      $sentencia -> bind_param( 's', $email );
      $sentencia -> execute();
      $resultado = $sentencia -> get_result();
      $usuario = $resultado -> fetch_assoc();
      return $usuario;
    }

    public function obtenerUsuarioPorEmailYPassword ( $email, $password ) {
      $sql = 'SELECT * FROM usuarios WHERE email = ? AND password = ? AND estado = 1';
      $sentencia = $this -> conexion -> obtenerConexion() -> prepare( $sql );
      $sentencia -> bind_param( 'ss', $email, $password );
      $sentencia -> execute();
      $resultado = $sentencia -> get_result();
      $usuario = $resultado -> fetch_assoc();
      $this -> id = $usuario[ 'id' ];
      $this -> apellidos = $usuario[ 'apellidos' ];
      $this -> nombres = $usuario[ 'nombres' ];
      $this -> ci = $usuario[ 'ci' ];
      $this -> fecha_nac = $usuario[ 'fecha_nac' ];
      $this -> email = $usuario[ 'email' ];
      $this -> rol = $usuario[ 'rol' ];
      return $usuario;
    }

    public function crearUsuario ( $apellidos, $nombres, $ci, $fecha_nac, $email, $password, $rol = 'usuario' ) {
      $sql = "INSERT INTO usuarios ( id, apellidos, nombres, fecha_nac, ci, email, password, rol, estado, created_at, updated_at )
              VALUES ( 'NULL', ?, ?, ?, ?, ?, ?, ?, 1, '" . date( 'Y-m-d h:i:s' ) .  "', '" . date( 'Y-m-d h:i:s' ) . "' );";
      $sentencia = $this -> conexion -> obtenerConexion() -> prepare( $sql );

      $sentencia -> bind_param( 'sssssss', $apellidos, $nombres, $fecha_nac, $ci, $email, $password, $rol );

      $sentencia -> execute();
      $resultado = $sentencia -> get_result();
      $this -> obtenerUsuarioPorEmailYPassword( $email, $password );
      return $resultado;
    }
    public function actualizarUsuario ( $id, $apellidos, $nombres, $ci, $fecha_nac, $email, $password, $rol = 'usuario' ) {
      $sql = "UPDATE usuarios SET apellidos = ?, nombres = ?, fecha_nac = ?, ci = ?, email = ?, password = ?, rol = ?, updated_at = '" . date( 'Y-m-d h:i:s' ) . "' WHERE id = ?;";
      $sentencia = $this -> conexion -> obtenerConexion() -> prepare( $sql );
      $sentencia -> bind_param( 'ssssssss', $apellidos, $nombres, $fecha_nac, $ci, $email, $password, $rol, $id );
      $sentencia -> execute();
      $resultado = $sentencia -> get_result();
      $this -> obtenerUsuarioPorEmailYPassword( $email, $password );
      return $resultado;
    }
    public function eliminarUsuario ( $id ) {
      $sql = "UPDATE usuarios SET estado = 0, updated_at = '" . date( 'Y-m-d h:i:s' ) . "' WHERE id = ?;";
      $sentencia = $this -> conexion -> obtenerConexion() -> prepare( $sql );
      $sentencia -> bind_param( 's', $id );
      $sentencia -> execute();
      $resultado = $sentencia -> get_result();
      return $resultado;
    }

    public function obtenerTodosLosUsuarios () {
      $sql = 'SELECT * FROM usuarios';
      $usuarios = [];
      $resultado = $this -> conexion -> obtenerConexion() -> query( $sql );
      while ( $usuario = $resultado -> fetch_assoc() ) {
        $usuarios[] = $usuario;
      }
      return $usuarios;
    }

    public function obtenerUsuariosHabilitados () {
      $sql = 'SELECT * FROM usuarios WHERE estado = 1';
      $usuarios = [];
      $resultado = $this -> conexion -> obtenerConexion() -> query( $sql );
      while ( $usuario = $resultado -> fetch_assoc() ) {
        $usuarios[] = $usuario;
      }
      return $usuarios;
    }
    public function obtenerUsuarioPorId ( $id ) {
      $sql = 'SELECT * FROM usuarios WHERE id = ?';
      $sentencia = $this -> conexion -> obtenerConexion() -> prepare( $sql );
      $sentencia -> bind_param( 's', $id );
      $sentencia -> execute();
      $resultado = $sentencia -> get_result();
      $usuario = $resultado -> fetch_assoc();
      $this -> id = $usuario[ 'id' ];
      $this -> apellidos = $usuario[ 'apellidos' ];
      $this -> nombres = $usuario[ 'nombres' ];
      $this -> ci = $usuario[ 'ci' ];
      $this -> fecha_nac = $usuario[ 'fecha_nac' ];
      $this -> email = $usuario[ 'email' ];
      $this -> rol = $usuario[ 'rol' ];
      return $usuario;
    }
  }
?>
