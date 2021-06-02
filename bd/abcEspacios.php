<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

//Recepción de los datos enviados mediante el método POST desde el js


$Nombre_espacio = (isset($_POST['Nombre_espacio'])) ? $_POST['Nombre_espacio'] : '';
$Acronimo = (isset($_POST['Acronimo_espacio'])) ? $_POST['Acronimo_espacio'] : '';


$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$Id_espacio = (isset($_POST['Id_espacio'])) ? $_POST['Id_espacio'] : '';

switch($opcion){
    case 1: //Alta de espacio
        $consulta = "INSERT INTO espacios (Nombre_espacio, Acronimo) VALUES('$Nombre_espacio', '$Acronimo')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        
        $consulta = "SELECT Id_espacio, Nombre_espacio, Acronimo FROM espacios ORDER BY Id_espacio DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        
    break;
        
    case 2: //Actualizar datos y solicitd de datos para mod
       
    $consulta = "UPDATE espacios SET Nombre_espacio='$Nombre_espacio', Acronimo='$Acronimo' WHERE Id_espacio ='$Id_espacio'";
    $resultado = $conexion->prepare($consulta); 
    $resultado->execute();
        
    $consulta = "SELECT Id_espacio, Nombre_espacio, Acronimo FROM espacios WHERE Id_espacio='$Id_espacio'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        
    break;
        
    case 3: //Consultar datos para autocompletar campos de formulario cuando editamos
        $consulta = "SELECT Id_espacio, Nombre_espacio, Acronimo FROM espacios WHERE Id_espacio='$Id_espacio'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        
    break;    
        
    case 4:// Obtener usuarios para recargar dataTable
        $consulta = "SELECT Id_espacio, Nombre_espacio, Acronimo FROM espacios";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        
    break;
}



print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
?>