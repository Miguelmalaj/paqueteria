<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no initial-scale=1, maximum-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="#" />
    <title>Paquetería</title>


    <!--BOOTSTRAP 4-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--PLUGIN SWEET ALERT-->
    <link rel="stylesheet" href="plugins/sweet-alert/sweetalert2.min.css">
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

      <!--JQUERY-->
    <script src="js/jquery.min.js"></script>

      <script type="text/javascript" src="js/estructurasHTML.js"></script>  
</head>

<body>


    <!-- Modal -->
    <div class="modal fade" id="modalUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formUsuarios" autocomplete="off">
      
      <div class="modal-body">
          
          <div class="form-row">
           <div class="form-group col-md-6">
            <label for="nombre-u" class="form-label" id="lbl_nombre">Nombre</label>
            <input type="text" class="form-control" id="Nombre_usuario" name="Nombre_usuario">
            
          </div>
          
          <div class="form-group col-md-6">
            <label for="apellido-u">Apellido</label>
            <input type="text" class="form-control" id="Apellido_usuario" name="Apellido_usuario">
            
            
          </div>
          </div>
          
          <div class="form-row">
           <div class="form-group col-md-6">
            <label id="lbl-contra" for="contra-u">Contraseña</label>
            <input type="password" name="Password" class="form-control" id="Password_usuario"  placeholder="8 o más dígitos">
            
          </div>         
          
         
          <div class="form-group col-md-6">
            <label id="lbl-confirm-contra" for="ccontra-u">Confirmar contraseña</label>
            <input type="password" id="Confirmar_password" name="Confirma_password" class="form-control">
            
          </div>
          </div>
          
          <hr>
          
          <div class="form-row">
          
           <div class="form-group col-md-6">
            <label for="email-u">Email</label>
            <input type="email" class="form-control" id="Email_usuario" placeholder="ejemplo@correo.com" name="Email_usuario">
            
          </div>
          
         
          <div class="form-group col-md-6">
            <label for="telefono-u">Teléfono</label>
            <input type="tel" class="form-control" id="Telefono_usuario" placeholder="10 dígitos" name="Telefono_usuario">
          </div>        
          </div>
          
          <hr>

          <div class="form-row">
          
          <div class="form-group col-md-6">
          <label for="exampleFormControlSelect1">Tipo Usuario</label>
            <span id="lugarSelectorUsuarios" ></span>  
                     
            <!-- <select class="form-control" id="Id_tipo_usuario">
              <option value="1">Administrador</option>
              <option value="2">Director</option>
              <option value="3">Coordinador</option>
              <option value="4">Recepcionista</option>              
            </select> -->
            
          </div>
          
          
          <div class="form-group col-md-6">
          <label for="exampleFormControlSelect1">Departamento</label>
          <span id="lugarSelectorDepartamentos" ></span>
             <!-- <select class="form-control" id="Id_departamento">
              <option value="1">Desarrollo Tecnológico</option>
              <option value="2">Soporte Tecnológico</option>
              <option value="3">Diseño</option>
              <option value="4">Video</option>
            </select> -->
             
          </div>
          
          
          
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" id="btnGuardar" class="btn btn-primary">Registrar</button>
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
                    <a href="#tbl3"><i class="fas fa-users mr-2 ml-3 lead"></i>Usuarios</a>
                </li>
                <li>
                    <a href="#tbl4"><i class="fas fa-building mr-3 ml-3 lead"></i>Espacios</a>
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
                                <button id="btnAgregarUsuario" class="btn btn-info align-self-center" data-toggle="modal"><i class="material-icons">library_add</i></button>
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
                            <table id="tablaUsuarios" class="table table-bordered display responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <!-- <th>Id</th> -->
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Telefono</th>
                                        <th>Email</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyTable">
                                
                                </tbody>
                            </table>

                        </div>
                    </div>
                </section>

            </div>
        </div>

    </div>




    <!---------------------------------------------------------------------------------------------------->
    
    <!--POOPER-->
    <scrpt src="js/popper.min.js"></scrpt>
    <!--BOOTSTRAP JS-->
    <script src="js/bootstrap.min.js"></script>
    <!----datatables js---->
    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <!---RESPONSIVE---->
    <script type="text/javascript" src="js/dataTables.responsive.min.js"></script>
    <!---PLUGIN SWEET ALERT---->
    <script type="text/javascript" src="plugins/sweet-alert/sweetalert2.all.min.js"></script>

    
    
    <script type="text/javascript" src="js/mainUsuarios.js"></script>

    <script type="text/javascript" src="js/contenido.js"></script>
    
    <script type="text/javascript" src="js/jquery.validate.js"></script>

</body>

</html>
