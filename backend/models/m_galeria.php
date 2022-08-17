<?php
require_once 'crud.php';
require_once 'db.php';

class galeria implements CRUD
{
    public $id;
    public $nombre;
    public $horarioG;
    public $correo;
    public $telefono;
    public $fecha;
    public $domicilio;
    public $fotogaleria;

    public function create()
    {
        $conexion = new ConfigDB();
        $conexion->conectar();
        $conn = $conexion->get_conn();

        $stmt = $conn->prepare("INSERT INTO galeria (nombre, horarioG, correo, telefono, fecha, domicilio, fotogaleria) 
        VALUES (:nombre, :horarioG, :correo, :telefono, :fecha, :domicilio, :fotogaleria)");
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':horarioG', $this->horarioG);
        $stmt->bindParam(':correo', $this->correo);
        $stmt->bindParam(':telefono', $this->telefono);
        $stmt->bindParam(':fecha', $this->fecha);
        $stmt->bindParam(':domicilio', $this->domicilio);
        $stmt->bindParam(':fotogaleria', $this->fotogaleria);

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
    }
    public function delete()
    {
    }
    public function read_by_id()
    {
    }
    public function read_all()
    {
        $conexion = new ConfigDB();
        $conexion->conectar();
        $conn = $conexion->get_conn();

        $stmt = $conn->prepare("SELECT * FROM usuario");

        $stmt->setFetchMode(PDO::FETCH_OBJ);

        $stmt->execute();

        $conexion->desconectar();

        return $stmt->fetchAll();
    }
    public function read_by_column()
    {
    }
}
