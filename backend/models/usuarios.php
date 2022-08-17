<?php
require_once 'crud.php';
require_once 'db.php';

class usuarios implements CRUD
{
    public $id;
    public $nombre;
    public $apellidos;
    public $email;
    public $foto;
    public $passw;
    public $estatus;
    public $tipo;

    public function create()
    {
        $conexion = new ConfigDB();
        $conexion->conectar();
        $conn = $conexion->get_conn();

        $stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellidos, email, foto, passw, estatus, tipo) 
        VALUES (:nombre, :apellidos, :email, :foto, :passw, :estatus, :tipo)");
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':apellidos', $this->apellidos);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':foto', $this->foto);
        $stmt->bindParam(':passw', $this->passw);
        $stmt->bindParam(':estatus', $this->estatus);
        $stmt->bindParam(':tipo', $this->tipo);

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

        $stmt = $conn->prepare("UPDATE usuarios SET nombre = :nombre, apellidos = :apellidos, email = :email, foto = :foto, passw = :passw, estatus = :estatus, tipo = :tipo  
                                 WHERE id = :id");
            $stmt->bindParam(':nombre', $this->nombre);
            $stmt->bindParam(':apellidos', $this->apellidos);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':foto', $this->foto);
            $stmt->bindParam(':passw', $this->passw);
            $stmt->bindParam(':estatus', $this->estatus);
            $stmt->bindParam(':tipo', $this->tipo);
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

        $stmt = $conn->prepare("DELETE from usuarios where id = :id");
        $stmt->bindParam(':id', $this->id);

        $result = $stmt->execute();

        $conexion->desconectar();

        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }
    //Devuelve todos los registros
    public function read_by_id(){

        $conexion = new ConfigDB();
        $conexion->conectar();
        $conn = $conexion->get_conn();
        //preparar con bindParam la sentencia 
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE id =:id");
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

        $stmt = $conn->prepare("SELECT * FROM usuarios");

        $stmt->setFetchMode(PDO::FETCH_OBJ);

        $stmt->execute();

        $conexion->desconectar();

        return $stmt->fetchAll();
    }
    //Devuelve varios registros
    public function read_by_column(){

    }

    public function acceso(){
        $conexion = new ConfigDB();
        $conexion->conectar();
        $conn = $conexion->get_conn();
        //preparar con bindParam la sentencia 
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email= :email AND passw= :passw
        AND estatus='activo' ");
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':passw', $this->passw);
        $stmt->setFetchMode(PDO::FETCH_OBJ);

        $stmt->execute();

        $conexion->desconectar();

        return $stmt->fetchAll();
    }
}