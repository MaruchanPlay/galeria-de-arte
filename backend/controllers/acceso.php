<?php
require_once('../models/usuarios.php');
print_r($_REQUEST);

    if(isset($_REQUEST['email']) && isset($_REQUEST['passw'])){
        $usuarios= new usuarios();
        $usuarios->email=$_REQUEST['email'];
        $usuarios->passw=$_REQUEST['passw'];
        $resultado=$usuarios->acceso();
        print_r($resultado);
       
        if(!empty($resultado));
            $usuarios=$resultado[0];
            session_start();
            $_SESSION['id']=$usuarios->id;
            $_SESSION['nombre']=$usuarios->nombre;
            $_SESSION['apellidos']=$usuarios->apellidos;
            $_SESSION['foto']=$usuarios->foto;
            $_SESSION['estatus']=$usuarios->estatus;
            $_SESSION['tipo']=$usuarios->tipo;
            header('Location: ../../../../../../Dasboardd/Galeria/frontend/views/Privado/dashboard/index.php');
        }else{
            session_unset();
            session_destroy();
            header('Location: ../../../../frontend/views/Publico/login.html?mensaje=datos_incorrectos');
        }

    if(isset($_REQUEST['out'])){
        session_unset();
        session_destroy();
        header('Location: ../../../../frontend/views/Publico/login.html');
    }
 
?>