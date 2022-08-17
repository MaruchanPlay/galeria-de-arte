<?php
include('../../backend/models/m_obras.php');


// echo "POST<br>";
// print_r($_REQUEST);
// echo "FILES<br>";
// print_r($_FILES);

if (isset($_REQUEST['opcion'])) {
    $opcion = $_REQUEST['opcion'];
    switch ($opcion) {
        case 1: //create
            if (isset($_REQUEST['nombre']) and isset($_REQUEST['descripcion']) and isset($_REQUEST['tipo']) and isset($_REQUEST['autor']) and isset($_REQUEST['fecha']) and isset($_FILES['foto'])) {
                $obras = new obras();
                $obras->nombre = $_REQUEST['nombre'];
                $obras->descripcion = $_REQUEST['descripcion'];
                $obras->tipo = $_REQUEST['tipo'];
                $obras->autor = $_REQUEST['autor'];
                $obras->fecha = $_REQUEST['fecha'];
                $obras->foto = $_FILES['foto']['name'];
                $resultado = $obras->create();
                if ($resultado == 1) {
                    include_once('file_uploado.php');
                    header('Location: ../../../../frontend/views/view_obras/index.php?estatus=registrado');
                } else {
                    header('Location: ../../../../frontend/views/view_obras/index.php?estatus=error');
                }
            } else {
                echo "Falta un dato";
            }
            break;

            case 2: //update
                if (isset($_REQUEST['nombre']) and isset($_REQUEST['descripcion']) and isset($_REQUEST['tipo']) and isset($_REQUEST['autor']) and isset($_REQUEST['fecha']) and isset($_REQUEST['id']) || isset($_FILES['foto'])) {
                    $obras = new obras();
                    $obras->nombre = $_REQUEST['nombre'];
                    $obras->descripcion = $_REQUEST['descripcion'];
                    $obras->tipo = $_REQUEST['tipo'];
                    $obras->autor = $_REQUEST['autor'];
                    $obras->fecha = $_REQUEST['fecha'];
                    $obras->id = $_REQUEST['id'];
                    
                    if($_FILES['foto']['error']==0){
                        $obras->foto = $_FILES['foto']['name'];
                    }else{
                        $obras->foto = $_FILES['foto_actual'];
                    }
                    $obras->id = $_REQUEST['id'];
    
                    $resultado=$obras->update();
                    echo $resultado;
    
                    if ($resultado == 1) {
                        include_once"file_uploado.php";
                        //header('Location: ../../../../frontend/views/view_obras/index.php?estatus=Actualizado');
                    } else {
                        //header('Location: ../../../../frontend/views/view_obras/index.php?estatus=noActualizado');
                    }
                } else {
                    echo "Falta un dato";
                }
                break;
    
            case 3: //delete
                if (isset($_REQUEST['id'])) {
                    $obras = new obras();
                    $obras->id = $_REQUEST['id'];
    
                    $resultado = $obras->delete();
                echo $resultado;
                if ($resultado == 1) {
                    include_once('file_uploado.php');
                    header('Location: ../../../../frontend/views/view_obras/index.php?estatus=borrado');
                } else {
                    header('Location: ../../../../frontend/views/view_obras/index.php?estatus=er');
                }
            } else {
                echo "Falta un dato";
            }
            break;
        }
    } else {
        echo "No se ha seleccionado ninguna opción";
    }
    