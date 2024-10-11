<?php
include '../config/config.php';
include '../config/Database.php';

class paciente{

    public $conexion;

    function __construct(){
        $db = new Database();
        $this->conexion = $db->conectToDatabase();
    }

    function save($params){
        $nombres = $params['nombres'];
        $telefono = $params['telefono'];
        $fecha = $params['fecha'];
        $observaciones = $params['observaciones'];
        $foto = $params['foto'];

        $insert = "INSERT INTO pacientes (nombres, telefono, fecha, observaciones, foto) VALUES ('$nombres', '$telefono', '$fecha', '$observaciones', '$foto')";
        return mysqli_query($this->conexion, $insert);
    }

    function getAll(){
        $query = "SELECT * FROM pacientes ORDER BY fecha ASC";
        $resultado = mysqli_query($this->conexion, $query);
        return $resultado;
    }

    function getById($id){
        $query = "SELECT * FROM pacientes WHERE id=$id";
        $resultado = mysqli_query($this->conexion, $query);
        return $resultado;
    }

    function update($params){
        $id = $params['id'];
        $nombres = $params['nombres'];
        $telefono = $params['telefono'];
        $fecha = $params['fecha'];
        $observaciones = $params['observaciones'];
        $foto = $params['foto'];

        $update = "UPDATE pacientes SET nombres='$nombres', telefono='$telefono', fecha='$fecha', observaciones='$observaciones', foto='$foto' WHERE id=$id";
        return mysqli_query($this->conexion, $update);
    }

    function delete($id){
        $delete = "DELETE FROM pacientes WHERE id=$id";
        return mysqli_query($this->conexion, $delete);
    }
}
?>