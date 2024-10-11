<?php
include_once '../config/config.php';
include 'paciente.php';

if (isset($_POST) && !empty($_POST)){
    $p = new paciente();
    
    if ($_FILES['foto']['name'] !== 0) {
        $_POST['foto'] = saveImage($_FILES);
    }
    $resultado = $p->save($_POST);
    if ($resultado) {
        echo "<script>
                alert('Cita agregada correctamente');
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
    <title>Agregar paciente</title>
    <link rel="stylesheet" href="../css/add.css">
</head>

<body class="container">
    <nav class="navBarContainer">
        <a class="linkNavBar" href="index.php">Calendario</a>
        <a class="linkNavBar" href="add.php">Agregar</a>
    </nav>
    <div class="content">
        <form class="form" action="" method="post" enctype="multipart/form-data">
            <h1 class="title">Agregar paciente</h1>
            <input autocomplete="off" class="inpuntSimple" type="text" name="nombres" id="nombres" placeholder="Nombre" required>
            <input autocomplete="off" class="inpuntSimple" type="number" name="telefono" id="telefono" placeholder="Telefono" required>
            <input autocomplete="off" class="inpuntDate" type="datetime-local" name="fecha" id="fecha" placeholder="Fecha" required>
            <textarea autocomplete="off" class="texteObser" name="observaciones" id="observaciones" placeholder="Observaciones"></textarea>
            <input type="file" name="foto" id="foto">
            <label class="btnUpload" for="foto">Subir foto</label>
            <button class="addRegister">Agregar</button>
    </form>
    </div>
</body>
</html>