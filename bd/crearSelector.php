<?php
    include_once '../bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

//parámetros recibídos a traves de método POST.
    $selector = (isset($_POST['selector'])) ? $_POST['selector'] : '';

    try{
        
        switch($selector){
            
            case 'usuarios':
                $datosTabla = $conexion->query("SELECT Id_tipo_usuario, Tipo_usuario FROM tipo_usuarios");
            

                echo "<select class='form-control' id='Id_tipo_usuario'>";        
                while($fila = $datosTabla->fetch()){
                echo "<option value='" . $fila['Id_tipo_usuario'] . "'>".$fila  ['Tipo_usuario']."</option>";
                }        
                echo "</select>";

            break;

            case 'departamentos':
                
                $datosTabla = $conexion->query("SELECT Id_departamento, Nombre_departamento FROM departamentos");
                
                echo "<select class='form-control' id='Id_departamento'>";
                while($fila = $datosTabla->fetch()){
                    echo "<option value='" . $fila['Id_departamento'] . "'>".$fila  ['Nombre_departamento']."</option>";
                    }
                echo "</select>";
            
                break;

            default:
                echo null;
            break;
        }

        

    }catch(PDOException $e){
        print "ERROR" . $e->getMessage();

    }

    //cierra la conexión
    $conexion = NULL;

    /*<select class="form-control" id="Id_departamento">
              <option value="1">Desarrollo Tecnológico</option>
              <option value="2">Soporte Tecnológico</option>
              <option value="3">Diseño</option>
              <option value="4">Video</option>
            </select> */
?>