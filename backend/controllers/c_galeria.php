<?php
include('../models/m_galeria.php');
if (isset($_GET['opcion'])) {
    $opcion = $_GET['opcion'];
    switch ($opcion) {
        case 1: //create
            if (isset($_REQUEST['nombre']) and isset($_REQUEST['horarioG']) and isset($_REQUEST['correo']) and isset($_REQUEST['telefono']) and isset($_REQUEST['fecha']) and isset($_REQUEST['domicilio']) and isset($_REQUEST['fotogaleria'])) {
                $galeria = new galeria();
                $galeria->nombre = $_REQUEST['nombre'];
                $galeria->horarioG = $_REQUEST['horarioG'];
                $galeria->correo = $_REQUEST['correo'];
                $galeria->telefono = $_REQUEST['telefono'];
                $galeria->fecha = $_REQUEST['fecha'];
                $galeria->domicilio = $_REQUEST['domicilio'];
                $galeria->foto = $_REQUEST['fotogaleria'];

                $resultado = $galeria->create();
                echo $resultado;
                if ($resultado == 1) {
                    header('Location: ../../../Galeria/frontend/views/view_galeria?estatus=registrado');
                } else {
                    header('Location: ../../../Galeria/frontend/views/view_galeria?estatus=error');
                }
            } else {
                echo "Falta un dato";
            }
            break;

        case 2: //update
            break;

        case 3: //delete
            break;
    }
} else {
    echo "No se ha seleccionado ninguna opción";
}
