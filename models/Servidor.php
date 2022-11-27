<?php
  class Servidor {
    private $DB_HOST, $DB_PASS, $DB_NAME, $DB_USER, $mysqli;
    public function __construct()
    {
      $this -> DB_HOST = '127.0.0.1';
      $this -> DB_USER = 'root';
      $this -> DB_PASS = '';
      $this -> DB_NAME = 'inventario_montevideo';

      $this -> mysqli = new mysqli ( $this -> DB_HOST, $this -> DB_USER, $this -> DB_PASS, $this -> DB_NAME );
    }
    public function obtenerConexion () {
      return $this -> mysqli;
    }
  }
?>
