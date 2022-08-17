<?php
include('../../backend/models/m_artista.php');


echo "POST<br>";
print_r($_REQUEST);
echo "FILES<br>";
print_r($_FILES);

if (isset($_REQUEST['opcion'])) {
    $opcion = $_REQUEST['opcion'];
    switch ($opcion) {
        case 1: //create
            if (isset($_REQUEST['nombre']) and isset($_REQUEST['apellidos']) and isset($_REQUEST['nacimiento']) and isset($_REQUEST['correo']) and isset($_REQUEST['telefono']) and isset($_REQUEST['genero']) and isset($_FILES['foto'])) {
                $artista = new artista();
                $artista->nombre = $_REQUEST['nombre'];
                $artista->apellidos = $_REQUEST['apellidos'];
                $artista->nacimiento = $_REQUEST['nacimiento'];
                $artista->correo = $_REQUEST['correo'];
                $artista->telefono = $_REQUEST['telefono'];
                $artista->genero = $_REQUEST['genero'];
                $artista->foto = $_FILES['foto']['name'];
                $resultado = $artista->create();
                if ($resultado == 1) {
                    include_once('file_uploada.php');
                    header('Location: ../../../../frontend/views/view_artista/index.php?estatus=registrado');
                } else {
                    header('Location: ../../../../frontend/views/view_artista/index.php?estatus=error');
                }
            } else {
                echo "Falta un dato";
            }
            break;

            case 2: //update
                if (isset($_REQUEST['nombre']) and isset($_REQUEST['apellidos']) and isset($_REQUEST['nacimiento']) and isset($_REQUEST['correo']) and isset($_REQUEST['telefono']) and isset($_REQUEST['genero']) and isset($_REQUEST['id']) || isset($_FILES['foto'])) {
                    $artista = new artista();
                    $artista->nombre = $_REQUEST['nombre'];
                    $artista->apellidos = $_REQUEST['apellidos'];
                    $artista->nacimiento = $_REQUEST['nacimiento'];
                    $artista->correo = $_REQUEST['correo'];
                    $artista->telefono = $_REQUEST['telefono'];
                    $artista->genero = $_REQUEST['genero'];
                    $artista->id = $_REQUEST['id'];
                    
                    if($_FILES['foto']['error']==0){
                        $artista->foto = $_FILES['foto']['name'];
                    }else{
                        $artista->foto = $_FILES['foto_actual'];
                    }
                    $artista->id = $_REQUEST['id'];
    
                    $resultado=$artista->update();
                    echo $resultado;
    
                    if ($resultado == 1) {
                        include_once"file_uploada.php";
                        //header('Location: ../../../../frontend/views/view_artista/index.php?estatus=Actualizado');
                    } else {
                        //header('Location: ../../../../frontend/views/view_artista/index.php?estatus=noActualizado');
                    }
                } else {
                    echo "Falta un dato";
                }
                break;
    
            case 3: //delete
                if (isset($_REQUEST['id'])) {
                    $artista = new artista ();
                    $artista->id = $_REQUEST['id'];
    
                    $resultado = $artista->delete();
                echo $resultado;
                if ($resultado == 1) {
                    include_once('file_uploada.php');
                    header('Location: ../../../../frontend/views/view_artista/index.php?estatus=borrado');
                } else {
                    header('Location: ../../../../frontend/views/view_artista/index.php?estatus=er');
                }
            } else {
                echo "Falta un dato";
            }
            break;
        }
    } else {
        echo "No se ha seleccionado ninguna opción";
    }
    