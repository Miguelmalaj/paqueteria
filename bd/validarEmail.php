


    <?php
    include_once '../bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $Email_usuario = (isset($_POST['Email_usuario'])) ? $_POST['Email_usuario'] : '';
    
    $consulta = "SELECT Email_usuario FROM usuarios WHERE Email_usuario='$Email_usuario'";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $filas = $resultado->fetchAll();
    $total_filas = count($filas);
    if($total_filas > 0 ){
        $data = {$Email_usuario: "true"};
        print json_encode($data, JSON_UNESCAPED_UNICODE);;
    }else{
        $data = {$Email_usuario: "false"};
        print json_encode($data, JSON_UNESCAPED_UNICODE);;
    }


    $conexion = NULL;
    ?>