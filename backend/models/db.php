<?php

class ConfigDB
{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "galeria de arte";
    private $conn;

    public function conectar()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db, $this->user, $this->pass);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }
        return $this->conn;
    }

    public function desconectar()
    {
        $this->conn = null;
    }

    public function get_conn()
    {
        return $this->conn;
    }
}
