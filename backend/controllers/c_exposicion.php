<?php
include('../../backend/models/m_administrador.php');


echo "POST<br>";
print_r($_REQUEST);
echo "FILES<br>";
print_r($_FILES);

if (isset($_REQUEST['opcion'])) {
    $opcion = $_REQUEST['opcion'];
    switch ($opcion) {
        case 1: //create
            if (isset($_REQUEST['nombre']) and isset($_REQUEST['apellidos']) and isset($_REQUEST['nacimiento']) and isset($_REQUEST['correo']) and isset($_REQUEST['telefono']) and isset($_REQUEST['genero']) and isset($_REQUEST['domicilio']) and isset($_FILES['foto'])) {
                $usuario = new Usuario();
                $usuario->nombre = $_REQUEST['nombre'];
                $usuario->apellidos = $_REQUEST['apellidos'];
                $usuario->nacimiento = $_REQUEST['nacimiento'];
                $usuario->correo = $_REQUEST['correo'];
                $usuario->telefono = $_REQUEST['telefono'];
                $usuario->genero = $_REQUEST['genero'];
                $usuario->domicilio = $_REQUEST['domicilio'];
                $usuario->foto = $_FILES['foto']['name'];
                $resultado = $usuario->create();
                if ($resultado == 1) {
                    include_once('file_upload.php');
                    header('Location: ../../../../frontend/views/view_administrador/index.php?estatus=registrado');
                } else {
                    header('Location: ../../../../frontend/views/view_administrador/index.php?estatus=error');
                }
            } else {
                echo "Falta un dato";
            }
            break;

            case 2: //update
                if (isset($_REQUEST['nombre']) and isset($_REQUEST['apellidos']) and isset($_REQUEST['nacimiento']) and isset($_REQUEST['correo']) and isset($_REQUEST['telefono']) and isset($_REQUEST['genero']) and isset($_REQUEST['domicilio'])  and isset($_REQUEST['id']) || isset($_FILES['foto'])) {
                    $usuario = new Usuario();
                    $usuario->nombre = $_REQUEST['nombre'];
                    $usuario->apellidos = $_REQUEST['apellidos'];
                    $usuario->nacimiento = $_REQUEST['nacimiento'];
                    $usuario->correo = $_REQUEST['correo'];
                    $usuario->telefono = $_REQUEST['telefono'];
                    $usuario->genero = $_REQUEST['genero'];
                    $usuario->domicilio = $_REQUEST['domicilio'];
                    $usuario->id = $_REQUEST['id'];
                    
                    if($_FILES['foto']['error']==0){
                        $usuario->foto = $_FILES['foto']['name'];
                    }else{
                        $usuario->foto = $_FILES['foto_actual'];
                    }
                    $usuario->id = $_REQUEST['id'];
    
                    $resultado=$usuario->update();
                    echo $resultado;
    
                    if ($resultado == 1) {
                        include_once"file_upload.php";
                        //header('Location: ../../../../frontend/views/view_usuario/index.php?estatus=Actualizado');
                    } else {
                        //header('Location: ../../../../frontend/views/view_usuario/index.php?estatus=noActualizado');
                    }
                } else {
                    echo "Falta un dato";
                }
                break;
    
            case 3: //delete
                if (isset($_REQUEST['id'])) {
                    $usuario = new Usuario();
                    $usuario->id = $_REQUEST['id'];
    
                    $resultado = $usuario->delete();
                echo $resultado;
                if ($resultado == 1) {
                    include_once('file_upload.php');
                    header('Location: ../../../../frontend/views/view_usuario/index.php?estatus=borrado');
                } else {
                    header('Location: ../../../../frontend/views/view_usuario/index.php?estatus=er');
                }
            } else {
                echo "Falta un dato";
            }
            break;
        }
    } else {
        echo "No se ha seleccionado ninguna opción";
    }
    
