<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

//Recepción de los datos enviados mediante el método POST desde el js

$Nombre_usuario = (isset($_POST['Nombre_usuario'])) ? $_POST['Nombre_usuario'] : '';
$Apellido_usuario = (isset($_POST['Apellido_usuario'])) ? $_POST['Apellido_usuario'] : '';
$Password_usuario = (isset($_POST['Password_usuario'])) ? $_POST['Password_usuario'] : '';

$pass_ecrypt = password_hash($Password_usuario, PASSWORD_DEFAULT);

$Telefono_usuario = (isset($_POST['Telefono_usuario'])) ? $_POST['Telefono_usuario'] : '';
$Email_usuario = (isset($_POST['Email_usuario'])) ? $_POST['Email_usuario'] : '';
$Id_tipo_usuario = (isset($_POST['Id_tipo_usuario'])) ? $_POST['Id_tipo_usuario'] : '';
$Id_departamento = (isset($_POST['Id_departamento'])) ? $_POST['Id_departamento'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$Id_usuario = (isset($_POST['Id_usuario'])) ? $_POST['Id_usuario'] : '';

$Email_consulta = (isset($_POST['Email_consulta'])) ? $_POST['Email_consulta'] : '';

$Status_usuario = (isset($_POST['Status_usuario'])) ? $_POST['Status_usuario'] : '';

$response = 'false';
/*if($opcion != 5){
    $Status_usuario = 1; //activo
} else {    
    $Status_usuario = 0; //inactivo
}*/

switch($opcion){
    case 1:// Alta de usuario
        $consulta = "INSERT INTO usuarios (Nombre_usuario, Apellido_usuario, Password_usuario, Id_tipo_usuario, Telefono_usuario, Id_departamento, Email_usuario, Status_usuario) VALUES('$Nombre_usuario', '$Apellido_usuario','$pass_ecrypt','$Id_tipo_usuario','$Telefono_usuario', '$Id_departamento', '$Email_usuario','$Status_usuario')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $consulta = "SELECT Nombre_usuario, Apellido_usuario, Password_usuario, Id_tipo_usuario, Telefono_usuario, Id_departamento, Email_usuario FROM usuarios ORDER BY Id_usuario DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    
    case 2: //Actualizar datos y solicitud de datos para modificar
        
        //Remover el password para que no se actualice desde aquí. !!Fixed

        $consulta = "UPDATE usuarios SET Nombre_usuario='$Nombre_usuario', Apellido_usuario='$Apellido_usuario', Id_tipo_usuario='$Id_tipo_usuario', Telefono_usuario='$Telefono_usuario', Id_departamento='$Id_departamento', Email_usuario='$Email_usuario' WHERE Email_usuario='$Email_consulta'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        
        $consulta = "SELECT Nombre_usuario, Apellido_usuario, Password_usuario, Id_tipo_usuario, Telefono_usuario, Id_departamento, Email_usuario FROM usuarios WHERE Email_usuario='$Email_consulta'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        
        break;
    
    
    case 3:// consultar datos para autocompletar campos de form editar 
        
        $consulta = "SELECT Nombre_usuario, Apellido_usuario, Password_usuario, Id_tipo_usuario, Telefono_usuario, Id_departamento, Email_usuario FROM usuarios WHERE Email_usuario='$Email_consulta'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        
        break;
        
    case 4:// Obtener usuarios para recargar dataTable
        $consulta = "SELECT Nombre_usuario, Apellido_usuario, Telefono_usuario, Email_usuario FROM usuarios ORDER BY Id_usuario ASC";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        
    break;
        
    case 5: //dar de baja un usuario, cambiar status a 0
        $consulta = "UPDATE usuarios SET Status_usuario='$Status_usuario' WHERE Email_usuario='$Email_consulta'";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
    break;
        
    case 6: //obtener el status de usuario por su email
        $consulta = "SELECT Status_usuario FROM usuarios WHERE Email_usuario='$Email_consulta'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        
        
    break;

    case 7: //obtener el status de usuario con option
        $consulta = "SELECT Status_usuario FROM usuarios ORDER BY Nombre_usuario";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        
        
    break;

    case 8:
        
        $consulta = "SELECT Email_usuario FROM usuarios WHERE Email_usuario='$Email_usuario'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $filas = $resultado->fetchAll();
        $total_filas = count($filas);
        if($total_filas > 0 ){
            $response = 'false';
        }else{
            $response = 'true';
        }

    break;
}

if($opcion == 8){
    print $response;

}else{
    print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS

}


$conexion = NULL;
?>