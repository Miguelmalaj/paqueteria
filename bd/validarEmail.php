


    <?php
    include_once '../bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $Email_usuario = (isset($_POST['Email_usuario'])) ? $_POST['Email_usuario'] : '';
    $response = '';

    $consulta = "SELECT Email_usuario FROM usuarios WHERE Email_usuario='$Email_usuario'";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $filas = $resultado->fetchAll();
    $total_filas = count($filas);
    if($total_filas > 0 ){
        // $data = {"Valid": "true"};
        // return json_encode($data, JSON_UNESCAPED_UNICODE);
        //return false because the email written can not be valided.
         $response = 'false';
        print $response;
    }else{
        // $data = {"Valid": "false"};
        // return json_encode($data, JSON_UNESCAPED_UNICODE);
        //return true because the email written can be processed.
         $response = 'true';
        print $response;
    }


    $conexion = NULL;
    ?>