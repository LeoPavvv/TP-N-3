<?php

    if (isset($_POST['fecha']) && !empty($_POST['fecha'])) {
        $fecha = $_POST['fecha'];

        if (isset($_POST['asistencia'])) {
            $archivoAlumnos = 'Alumnos.txt';
            $alumnos = file($archivoAlumnos);

            $alumnosDict = [];
            foreach ($alumnos as $alumno) {
                list($id, $nombre, $apellido) = explode(' ', $alumno);
                $alumnosDict[$id] = "$nombre $apellido";
            }


            $nombreArchivo = $fecha . '.txt';
            $archivoAsistencia = fopen($nombreArchivo, 'w');

            foreach ($alumnosDict as $id => $nombreCompleto) {
                if (in_array($id, $_POST['asistencia'])) {
                    fwrite($archivoAsistencia, "$id P\n"); 
                } else {
                    fwrite($archivoAsistencia, "$id A\n"); 
                }
            }

            fclose($archivoAsistencia);
            echo "Asistencia registrada para la fecha: $fecha <br>";
            echo "Archivo generado: $nombreArchivo";
        } else {
            echo "Faltaron todos es un papelon.";
        }
    } else {
        echo "No se selecciono una fecha";
    }

?>