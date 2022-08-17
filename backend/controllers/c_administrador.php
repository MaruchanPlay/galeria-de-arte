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
                $administrador = new administrador();
                $administrador->nombre = $_REQUEST['nombre'];
                $administrador->apellidos = $_REQUEST['apellidos'];
                $administrador->nacimiento = $_REQUEST['nacimiento'];
                $administrador->correo = $_REQUEST['correo'];
                $administrador->telefono = $_REQUEST['telefono'];
                $administrador->genero = $_REQUEST['genero'];
                $administrador->domicilio = $_REQUEST['domicilio'];
                $administrador->foto = $_FILES['foto']['name'];
                $resultado = $administrador->create();
                if ($resultado == 1) {
                    include_once('file_uploadaa.php');
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
                    $administrador = new administrador ();
                    $administrador->nombre = $_REQUEST['nombre'];
                    $administrador->apellidos = $_REQUEST['apellidos'];
                    $administrador->nacimiento = $_REQUEST['nacimiento'];
                    $administrador->correo = $_REQUEST['correo'];
                    $administrador->telefono = $_REQUEST['telefono'];
                    $administrador->genero = $_REQUEST['genero'];
                    $administrador->domicilio = $_REQUEST['domicilio'];
                    $administrador->id = $_REQUEST['id'];
                    
                    if($_FILES['foto']['error']==0){
                        $administrador->foto = $_FILES['foto']['name'];
                    }else{
                        $administrador->foto = $_FILES['foto_actual'];
                    }
                    $administrador->id = $_REQUEST['id'];
    
                    $resultado=$administrador->update();
                    echo $resultado;
    
                    if ($resultado == 1) {
                        include_once"file_uploadaa.php";
                        //header('Location: ../../../../frontend/views/view_administrador/index.php?estatus=Actualizado');
                    } else {
                        //header('Location: ../../../../frontend/views/view_administrador/index.php?estatus=noActualizado');
                    }
                } else {
                    echo "Falta un dato";
                }
                break;
    
            case 3: //delete
                if (isset($_REQUEST['id'])) {
                    $administrador = new administrador();
                    $administrador->id = $_REQUEST['id'];
    
                    $resultado = $administrador->delete();
                echo $resultado;
                if ($resultado == 1) {
                    include_once('file_uploadaa.php');
                    header('Location: ../../../../frontend/views/view_administrador/index.php?estatus=borrado');
                } else {
                    header('Location: ../../../../frontend/views/view_administrador/index.php?estatus=er');
                }
            } else {
                echo "Falta un dato";
            }
            break;
        }
    } else {
        echo "No se ha seleccionado ninguna opción";
    }
    
