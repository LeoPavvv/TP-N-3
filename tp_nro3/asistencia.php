<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Asistencia</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        input[type="submit"], input[type="date"] {
            padding: 10px;
            margin: 10px 0;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Formulario de Asistencia</h2>

    <form action="GenerarArchivo.php" method="POST">
        <label for="fecha">Fecha de la Asistencia:</label><br>
        <input type="date" id="fecha" name="fecha" required><br><br>

        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Asistencia</th>
            </tr>

            <?php

            $archivoAlumnos = 'Alumnos.txt';

            if (file_exists($archivoAlumnos)) {
                $alumnos = file($archivoAlumnos);


                foreach ($alumnos as $alumno) {
                    list($id, $nombre, $apellido) = explode(' ', $alumno);

                    echo "<tr>";
                    echo "<td>" . $id . "</td>";
                    echo "<td>" . $nombre . "</td>";
                    echo "<td>" . $apellido . "</td>";
                    echo "<td><input type='checkbox' name='asistencia[]' value='$id'></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No se  encontro el archivo de alumnos</td></tr>";
            }
            ?>

        </table>

        <input type="submit" value="Enviar Asistencia">
    </form>
</body>
</html>