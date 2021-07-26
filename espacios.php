<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no initial-scale=1, maximum-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="#" />
    <title>Espacios</title>


    <!--BOOTSTRAP 4-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--ARCHIVO CSS personalizado-->
    <link rel="stylesheet" href="css/estilo.css">
    <!-----DATATABLES css-->
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <!---RESPONSIVE--->
    <link rel="stylesheet" href="css/responsive.dataTables.min.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

</head>

<body>

 

    <!-- Modal -->
    <div class="modal fade" id="modalEspacio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formEspacios" autocomplete="off">
      <div class="modal-body">
          
          <div class="form-row">
           <div class="form-group col-md-12">
            <label for="nombre-e">Nombre Espacio</label>
            <input type="text" class="form-control" id="Nombre_espacio">
            
          </div>
          </div>
           <hr>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="acronimo-e">Acrónimo</label>
            <input type="text" class="form-control" id="Acronimo_espacio">
            
          </div>
          </div>
          
         
          
         
          

         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" id="btnGuardar" class="btn btn-primary">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>   

    <div class="wrapper">
        <!---sidebar-->
        <nav id="sidebar">
            <div class="sidebar-header">
                <img src="img/Logo_IMCA.png">
            </div>

            <ul class="list-unstyled components">

                <li>
                    <a href="#tbl1"><i class="fas fa-home mr-2 ml-3 lead"></i>Inicio</a>
                </li>
                <li>
                    <a href="#tbl2"><i class="fas fa-box-open mr-2 ml-3 lead"></i>Registros</a>
                </li>
                <li>
                    <a href="usuarios.php"><i class="fas fa-users mr-2 ml-3 lead"></i>Usuarios</a>
                </li>
                <li>
                    <a href="espacios.php"><i class="fas fa-building mr-3 ml-3 lead"></i>Espacios</a>
                </li>

                <li class="active">
                    <a href="#CatSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle ml-3">Catálogos</a>
                    <ul class="collapse list-unstyled" id="CatSubmenu">
                        <li>
                            <a href="#"><i class="fas fa-user-edit ml-1 mr-2"></i>Empleados</a>
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-people-carry ml-1 mr-2"></i>Tipo de Paquetes</a>
                        </li>

                    </ul>
                </li>

            </ul>



        </nav>

        <!---PÁGINA CONTENIDO-->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-secondary">
                        <i class="fas fa-align-left"></i>
                        
                    </button>

                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Usuario</a>
                            </li>
                            <!--<li class="nav-item">
                                <a class="nav-link" href="#">Actualizar</a>
                            </li>-->
                            <li class="nav-item">
                                <a class="nav-link" href="#">Cerrar Sesión</a>
                            </li>

                        </ul>

                    </div>

                </div>

            </nav>
            <div class="container">

                <section class="py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9 pl-0">
                                <!--data-target="#addpack"-->
                                <button id="btnAgregarEspacio" class="btn btn-info align-self-center" data-toggle="modal"><i class="material-icons">library_add</i></button>
                            </div>

                            <div class="col-lg-3 pl-5">

                            </div>
                        </div>
                    </div>
                </section>

                <section id="tbl1">

                    <div class="row">
                        <div class="col-lg-12">
                            <!--lg-12-->
                            <table id="tablaEspacios" class="table table-bordered display responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Espacio</th>
                                        <th>Acrónimo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                </tbody>
                            </table>

                        </div>
                    </div>
                </section>

            </div>
        </div>

    </div>




    <!---------------------------------------------------------------------------------------------------->
    <!--JQUERY-->
    <script src="js/jquery.min.js"></script>
    <!--POOPER-->
    <scrpt src="js/popper.min.js"></scrpt>
    <!--BOOTSTRAP JS-->
    <script src="js/bootstrap.min.js"></script>
    <!----datatables js---->
    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <!---RESPONSIVE---->
    <script type="text/javascript" src="js/dataTables.responsive.min.js"></script>

    <script type="text/javascript" src="js/contenido.js"></script>
    
    <script type="text/javascript" src="js/mainEspacios.js"></script>

</body>

</html>