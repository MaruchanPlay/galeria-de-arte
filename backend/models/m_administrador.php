<?php
require_once 'crud.php';
require_once 'db.php';

class administrador implements CRUD
{
    public $id;
    public $nombre;
    public $apellidos;
    public $nacimiento;
    public $correo;
    public $telefono;
    public $genero;
    public $domicilio;
    public $foto;

    public function create()
    {
        $conexion = new ConfigDB();
        $conexion->conectar();
        $conn = $conexion->get_conn();

        $stmt = $conn->prepare("INSERT INTO administrador (nombre, apellidos, nacimiento, correo, telefono, genero, domicilio, foto) 
        VALUES (:nombre, :apellidos, :nacimiento, :correo, :telefono, :genero, :domicilio, :foto)");
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':apellidos', $this->apellidos);
        $stmt->bindParam(':nacimiento', $this->nacimiento);
        $stmt->bindParam(':correo', $this->correo);
        $stmt->bindParam(':telefono', $this->telefono);
        $stmt->bindParam(':genero', $this->genero);
        $stmt->bindParam(':domicilio', $this->domicilio);
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

        $stmt = $conn->prepare("UPDATE administrador SET nombre = :nombre, apellidos = :apellidos, nacimiento = :nacimiento, correo = :correo, telefono = :telefono, genero = :genero, domicilio = :domicilio,  foto = :foto  
                                WHERE id = :id");
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':apellidos', $this->apellidos);
        $stmt->bindParam(':nacimiento', $this->nacimiento);
        $stmt->bindParam(':correo', $this->correo);
        $stmt->bindParam(':telefono', $this->telefono);
        $stmt->bindParam(':genero', $this->genero);
        $stmt->bindParam(':domicilio', $this->domicilio);
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

        $stmt = $conn->prepare("DELETE from administrador where id = :id");
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
        $stmt = $conn->prepare("SELECT * FROM administrador WHERE id =:id");
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

        $stmt = $conn->prepare("SELECT * FROM administrador");

        $stmt->setFetchMode(PDO::FETCH_OBJ);

        $stmt->execute();

        $conexion->desconectar();

        return $stmt->fetchAll();
    }
    public function read_by_column()
    {
    }
}