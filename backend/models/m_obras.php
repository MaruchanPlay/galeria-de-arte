<?php
require_once 'crud.php';
require_once 'db.php';

class obras implements CRUD
{
    public $id;
    public $nombre;
    public $descripcion;
    public $tipo;
    public $autor;
    public $fecha;
    public $genero;
    public $domicilio;
    public $foto;

    public function create()
    {
        $conexion = new ConfigDB();
        $conexion->conectar();
        $conn = $conexion->get_conn();

        $stmt = $conn->prepare("INSERT INTO obras (nombre, descripcion, tipo, autor, fecha, foto) 
        VALUES (:nombre, :descripcion, :tipo, :autor, :fecha, :foto)");
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':descripcion', $this->descripcion);
        $stmt->bindParam(':tipo', $this->tipo);
        $stmt->bindParam(':autor', $this->autor);
        $stmt->bindParam(':fecha', $this->fecha);
        $stmt->bindParam(':foto', $this->foto);

        $result = $stmt->execute();

        $conexion->desconectar();

        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }
    public function read()
    {
    }

    public function update()
    {
        $conexion = new ConfigDB();
        $conexion->conectar();
        $conn = $conexion->get_conn();

        $stmt = $conn->prepare("UPDATE obras SET nombre = :nombre, descripcion = :descripcion, tipo = :tipo, autor = :autor, fecha = :fecha, foto = :foto  
                                WHERE id = :id");
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':descripcion', $this->descripcion);
        $stmt->bindParam(':tipo', $this->tipo);
        $stmt->bindParam(':autor', $this->autor);
        $stmt->bindParam(':fecha', $this->fecha);
        $stmt->bindParam(':foto', $this->foto);
        $stmt->bindParam(':id', $this->id);

        $result = $stmt->execute();

        $conexion->desconectar();

        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }
    public function delete()
    {
        $conexion = new ConfigDB();
        $conexion->conectar();
        $conn = $conexion->get_conn();

        $stmt = $conn->prepare("DELETE from obras where id = :id");
        $stmt->bindParam(':id', $this->id);

        $result = $stmt->execute();

        $conexion->desconectar();

        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }
    public function read_by_id()
    {
        $conexion = new ConfigDB();
        $conexion->conectar();
        $conn = $conexion->get_conn();
        //preparar con bindParam la sentencia 
        $stmt = $conn->prepare("SELECT * FROM obras WHERE id =:id");
        $stmt->bindParam(':id', $this->id);

        $stmt->setFetchMode(PDO::FETCH_OBJ);

        $stmt->execute();

        $conexion->desconectar();

        return $stmt->fetchAll();
    }
    public function read_all()
    {
        $conexion = new ConfigDB();
        $conexion->conectar();
        $conn = $conexion->get_conn();

        $stmt = $conn->prepare("SELECT * FROM obras");

        $stmt->setFetchMode(PDO::FETCH_OBJ);

        $stmt->execute();

        $conexion->desconectar();

        return $stmt->fetchAll();
    }
    public function read_by_column()
    {
    }
}