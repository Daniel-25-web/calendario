<?php
include_once '../config/config.php';
include 'paciente.php';

$p = new paciente();
$dp = mysqli_fetch_object($p->getById($_GET['id']));
$date = new DateTime($dp -> fecha);

if (isset($_POST) && !empty($_POST)){
    $_POST['foto'] = $dp->foto;
    if (!empty($_FILES['foto']['name'])) {
        $_POST['foto'] = saveImage($_FILES);
    }
    $update = $p->update($_POST);

    if ($update) {
        echo "<script>
                alert('Cita modificada correctamente');
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
    <title>Editar paciente</title>
    <link rel="stylesheet" href="../css/add.css">
</head>

<body class="container">
    <nav class="navBarContainer">
        <a class="linkNavBar" href="index.php">Calendario</a>
        <a class="linkNavBar" href="add.php">Agregar</a>
    </nav>
    <div class="content">
        <form class="form" action="" method="post" enctype="multipart/form-data">
            <h1 class="title">Editar paciente</h1>
            <input type="hidden" name="id" value="<?php echo $dp->id; ?>">
            <input autocomplete="off" class="inpuntSimple" type="text" name="nombres" id="nombres" placeholder="Nombre" required value="<?php echo $dp->nombres; ?>">
            <input autocomplete="off" class="inpuntSimple" type="number" name="telefono" id="telefono" placeholder="Telefono" required value="<?php echo $dp->telefono; ?>">
            <input autocomplete="off" class="inpuntDate" type="date" name="fecha" id="fecha" placeholder="Fecha" required value="<?php echo $date->format('Y-m-d'); ?>">
            <textarea autocomplete="off" class="texteObser" name="observaciones" id="observaciones" placeholder="Observaciones"><?php echo $dp->observaciones; ?></textarea>
            <input type="file" name="foto" id="foto">
            <label class="btnUpload" for="foto">Subir foto</label>
            <button class="addRegister">Modificar</button>
        </form>
    </div>
</body>
</html>

