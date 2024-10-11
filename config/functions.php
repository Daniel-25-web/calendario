<?php

function getFolderProyect(){
    // Verifica si el sistema de archivos utiliza '/' (indicador de que es Unix)
    if ((strpos(__DIR__, '/')) !== false ){
        // Si es Unix, reemplaza la parte '/opt/lampp/htdocs/' con una cadena vacía
        $folder = str_replace('/opt/lampp/htdocs/', '', __DIR__);
    } else {
        // Si es Windows, reemplaza 'C:\\xampp\\htdocs\\' con una cadena vacía
        $folder = str_replace('C:\\xampp\\htdocs\\', '', __DIR__);
    }
    // Elimina la carpeta '/config' del path para obtener la raíz del proyecto
    $folder = str_replace('/config', '', $folder);
    
    return $folder; // Devuelve la ruta relativa del proyecto
}

function saveImage($file){
    // Corrige el nombre del índice del array para que coincida con 'foto'
    $imageName = str_replace(' ', '', $file['foto']['name']);  // Cambia 'image' por 'foto'
    $imgTemp = $file['foto']['tmp_name'];

    // Asegúrate de que la ruta es válida y que la carpeta 'images' existe
    $uploadDir = $_SERVER['DOCUMENT_ROOT'].'/'.getFolderProyect().'/images/';
    
    // Verifica que la carpeta de destino exista, si no, la creas
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0755, true);  // Crea la carpeta con permisos
    }

    // Mueve el archivo a la carpeta 'images'
    if (move_uploaded_file($imgTemp, $uploadDir . $imageName)) {
        return $imageName;  // Retorna el nombre del archivo si se movió correctamente
    } else {
        return false;  // Retorna false si no se pudo mover
    }
}

?>