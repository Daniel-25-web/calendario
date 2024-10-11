<?php

include_once '../config/config.php';
include 'paciente.php';

$p = new paciente();
$resultado = $p->getAll();

if($_GET['id'] && $_GET['id'] != ''){
    $delete = $p->delete($_GET['id']);
    if ($delete) {
        echo "<script>
                alert('Cita eliminada correctamente');
                window.location.href = 'index.php';
              </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
    <link rel="stylesheet" href="../css/indexpaciente.css">
</head>
<body class="container">
    <nav class="navBarContainer">
        <a class="linkNavBar" href="index.php">Calendario</a>
        <a class="linkNavBar" href="add.php">Agregar</a>
    </nav>
    <div>
        <div class="tittle">
            <h1>Calendario de citas</h1>
        </div>
        <div>
            <div class="card-container">
                <?php
                    while($row = mysqli_fetch_array($resultado)){
                        echo "<div class='card'>
                                <img src='".ROOT."/images/".$row['foto']."' alt='foto'>
                                <div class='card-body'>
                                    <h5 class='card-title'>".$row['nombres']."</h5>
                                    <p class='card-text'><strong>Teléfono:</strong> ".$row['telefono']."</p>
                                    <p class='card-text'><strong>Fecha:</strong> ".$row['fecha']."</p>
                                    <p class='card-text'><strong>Observaciones:</strong> ".$row['observaciones']."</p>
                                    <div class='card-buttons'>
                                        <a href='".ROOT."/paciente/update.php?id=".$row['id']."'><button class='btn btn-edit'>Editar</button></a>
                                        <a href='".ROOT."/paciente/index.php?id=".$row['id']."'><button class='btn btn-delete'>Eliminar</button></a>
                                    </div>
                                </div>
                            </div>";
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>