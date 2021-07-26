$(document).ready(function() {

    var Id_usuario, opcion, Status_usuario, formulario, Email_consulta;
    opcion = 4;

    tablaUsuarios = $('#tablaUsuarios').DataTable({
        "ajax": {
            "url": "../../paqueteria-github/bd/abcUsuarios.php",
            "method": 'POST',
            "data": { opcion: opcion },
            "dataSrc": ""

        },


        "columns": [
            // { "data": "Id_usuario" },
            { "data": "Nombre_usuario" },
            { "data": "Apellido_usuario" },
            { "data": "Telefono_usuario" },
            { "data": "Email_usuario" },
            { "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBajas' id='btnBajasId'><i class='material-icons'>person_remove</i></button></div></div>" }
        ],

        //Para cambiar el lenguaje a español
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando...",
        },

        "lengthMenu": [
            [3, 5, 7, 10, 20, 25, 50, -1],
            [3, 5, 7, 10, 20, 25, 50, "Todos"]
        ],
        "iDisplayLength": 7,

        "initComplete": function(settings, json) {

            var option = 7;

            $.ajax({
                url: "../../paqueteria-github/bd/abcUsuarios.php",
                type: "POST",
                dataType: "json",
                data: { opcion: option },
                success: function(data) {

                    var table = new $.fn.dataTable.Api('#tablaUsuarios');

                    table.column(-1).nodes().each(function(cell, i) {

                        data.forEach(function(StatusUsuario, index) {
                            //alert(data[index].Status_usuario);
                            if (data[index].Status_usuario == 1) {

                                if (i == index) {
                                    table.$(cell).find('#btnBajasId').addClass('botonActivos').removeClass('btnBajas');
                                }

                            } else {

                                if (i == index) {
                                    table.$(cell).find('#btnBajasId').addClass('btnBajas').removeClass('botonActivos');
                                }

                            }

                        });

                    });


                }
            });


        },

    });




    //esta variable cambiarla at the beginning
    var fila; //capturar la fila para editar o dar de baja usuario

    //=================aquí empieza la validación del formulario=======================
    //=================aquí empieza la validación del formulario=======================

    //validación de formulario
    $("#formUsuarios").validate({

        rules: {

            Nombre_usuario: "required",
            Apellido_usuario: "required",
            Password: {
                required: true,
                minlength: 8
            },
            Telefono_usuario: {
                required: true,
                digits: true,
                minlength: 10
            },
            Confirma_password: {
                required: true,
                minlength: 8,
                equalTo: "#Password_usuario"
            },
            Email_usuario: {
                required: true,
                email: true,
                remote: {
                    url: "../../paqueteria-github/bd/validarEmail.php",
                    type: "POST",
                    dataType: "json",
                    data: { Email_usuario: function() { return $("#Email_usuario").val(); } }
                }


            }

        },
        messages: {
            Nombre_usuario: "Por favor ingrese su nombre",
            Apellido_usuario: "Por favor ingrese su apellido",
            Password: {
                required: "Por favor ingrese una contraseña",
                minlength: "Debe de tener al menos 8 dígitos"

            },
            Confirma_password: {
                required: "Por favor confirme su contraseña",
                minlength: "Debe de tener al menos 8 dígitos",
                equalTo: "La contraseña no coincide"


            },
            Telefono_usuario: {
                required: "Por favor digite un número",
                digits: "No puede ingresar letras",
                minlength: "Debe de tener al menos 10 dígitos"

            },
            Email_usuario: {
                required: "Por favor ingrese un correo electrónico",
                email: "Debe contener '@' , '.' + dominio",
                remote: $.validator.format("{0} ya está asociado con una cuenta")
            }
        },
        /*errorElement: "em",
        errorPlacement: function(error,element){
            error.addClass("help-block");
            
        }*/
        highlight: function(element, errorClass, validClass) {

            $(element).css("border-color", "red");

            $(element).closest('div').addClass("has-error").removeClass("has-success");


        },
        unhighlight: function(element, errorClass, validClass) {



            $(element).css("border-color", "#ccc");

            $(element).closest('div').addClass("has-success").removeClass("has-error");
        },
        submitHandler: function(form) {



            if (formulario === 'alta') {
                opcion = 1;

            } else if (formulario === 'edicion') {
                opcion = 3;

            }

            /*
            LA IDEA AQUI ES CREAR OTRA CONSULTA AJAX CON LAS VARIABLES NOMBRE, NÚMERO e EMAIL PARA CONFIRMAR QUE EL USUARIO NO SE ENCUENTRA EN LA BD ENTONCES YOU CAN REGISTER THE USER
            
            NEW SUGGESTION:
            YOU SHOULD HAVE SENT JUST THE EMAIL


            */

            Nombre_usuario = $.trim($('#Nombre_usuario').val());
            Apellido_usuario = $.trim($('#Apellido_usuario').val());
            Password_usuario = $.trim($('#Password_usuario').val());
            Telefono_usuario = $.trim($('#Telefono_usuario').val());
            Email_usuario = $.trim($('#Email_usuario').val());
            Id_tipo_usuario = $.trim($('#Id_tipo_usuario').val());
            Id_departamento = $.trim($('#Id_departamento').val());
            Status_usuario = 1;


            $.ajax({
                url: "../../paqueteria-github/bd/abcUsuarios.php",
                type: "POST",
                dataType: "json",
                data: { Nombre_usuario: Nombre_usuario, Apellido_usuario: Apellido_usuario, Password_usuario: Password_usuario, Telefono_usuario: Telefono_usuario, Email_usuario: Email_usuario, Id_tipo_usuario: Id_tipo_usuario, Id_departamento: Id_departamento, opcion: opcion, Email_consulta: Email_consulta, Status_usuario: Status_usuario },
                success: function(data) {


                    if (formulario === 'alta') {
                        Swal.fire(
                            'Completado',
                            'El usuario ha sido añadido',
                            'success'
                        );


                    } else if (formulario === 'edicion') {

                        Swal.fire(
                            'Completado',
                            'El usuario ha sido editado',
                            'success'
                        );

                    }

                    //evi
                    tablaUsuarios.ajax.reload(null, false);
                    //==================================
                    var option = 7;

                    $.ajax({
                        url: "../../paqueteria-github/bd/abcUsuarios.php",
                        type: "POST",
                        dataType: "json",
                        data: { opcion: option },
                        success: function(data) {
                            //alert(data[4].Status_usuario);
                            //data[0];


                            var table = new $.fn.dataTable.Api('#tablaUsuarios');

                            table.column(-1).nodes().each(function(cell, i) {

                                data.forEach(function(StatusUsuario, index) {
                                    //alert(data[index].Status_usuario);
                                    if (data[index].Status_usuario == 1) {

                                        if (i == index) {
                                            table.$(cell).find('#btnBajasId').addClass('botonActivos').removeClass('btnBajas');
                                        }

                                    } else {

                                        if (i == index) {
                                            table.$(cell).find('#btnBajasId').addClass('btnBajas').removeClass('botonActivos');
                                        }

                                    }

                                });

                            });

                        }
                    });
                    //===================================

                }

            });

            //resetear campos input
            var validator = $("#formUsuarios").validate();
            validator.resetForm();
            //validator.destroy();
            //form.submit();
            $("#modalUsuario").modal("hide");
            //form.submit();
        }

    });
    //=================hasta aquí termina la validación del formulario=======================
    //=================hasta aquí termina la validación del formulario=======================



    //AgregarUsuario

    $('#btnAgregarUsuario').click(function(e) {
        //reiniciar valores
        var validator = $("#formUsuarios").validate();
        //validator.destroy();
        validator.resetForm();

        opcion = 1; //alta
        //opción 8 para validar el email en form
        //opcion = 8;
        Id_usuario = null;
        //Email_consulta = '';
        formulario = 'alta';
        $("#formUsuarios").trigger("reset");
        $(".modal-header").css("background-color", "#50575A");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Alta de Usuario");
        $("#lbl-contra").show();
        $("#Password_usuario").show();
        $("#Password_usuario").prop('disabled', false);
        $("#lbl-confirm-contra").show();
        $("#Confirmar_password").show();
        $("#Confirmar_password").prop('disabled', false);
        $('#Email_usuario').prop('disabled', false);
        $("#modalUsuario").modal("show");

    });



    //función Editar Usuario

    $(document).on("click", ".btnEditar", function(e) {
        //reiniciar valores
        var validator = $("#formUsuarios").validate();
        validator.resetForm();


        opcion = 3; //Select para obtener datos de campos
        //opción 8 para validar el email en form
        //opcion = 2;
        formulario = 'edicion';
        fila = $(this).closest("tr");
        //Id_usuario = parseInt(fila.find('td:eq(1)').text());

        Email_consulta = fila.find('td:eq(3)').text();
        //swal.fire(`${Email_consulta}`);
        $.ajax({
            url: "../../paqueteria-github/bd/abcUsuarios.php",
            type: "POST",
            dataType: "json",
            data: { Email_consulta: Email_consulta, Nombre_usuario: "", Apellido_usuario: "", Password_usuario: "", Telefono_usuario: "", Email_usuario: "", Id_tipo_usuario: "", Id_departamento: "", opcion: opcion },
            success: function(data) {

                Nombre = data[0].Nombre_usuario;
                Apellido = data[0].Apellido_usuario;
                Password = data[0].Password_usuario;
                Telefono = data[0].Telefono_usuario;
                //Email = data[0].Email_usuario;
                tipo_usuario = data[0].Id_tipo_usuario;
                departamento = data[0].Id_departamento;
                //Status_usu = data[0].Status_usuario;

                $('#Nombre_usuario').val(Nombre);
                $('#Apellido_usuario').val(Apellido);
                $('#Password_usuario').val(Password);
                $('#Confirmar_password').val(Password);
                $('#Telefono_usuario').val(Telefono);
                $('#Email_usuario').val(Email);
                $('#Id_tipo_usuario').val(tipo_usuario);
                $('#Id_departamento').val(departamento);
                //$('#Status_usuario').val(Status_usu);

            }
        });

        opcion = 2;
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Usuario");

        $("#Password_usuario").prop('disabled', true);
        $("#lbl-contra").hide();
        $("#Password_usuario").hide();

        $("#Confirmar_password").prop('disabled', true);
        $("#lbl-confirm-contra").hide();
        $("#Confirmar_password").hide();
        $("#modalUsuario").modal("show");

        //modificación en input email lo cambiamos a disabled
        $('#Email_usuario').prop('disabled', true);

    });

    //función dar de Baja o Activar Usuario

    $(document).on("click", "#btnBajasId", function() {
        fila = $(this); // obtener el numero de fila
        //Id_usuario = parseInt($(this).closest("tr").find('td:eq(0)').text());

        fila1 = $(this).closest("tr");

        Email_consulta = fila.closest("tr").find('td:eq(3)').text();

        Nombre_usuario_baja = fila.closest("tr").find('td:eq(0)').text();

        //función callback para consultar estado y cambiar estado de usuarios

        ConsultaEstadoUsuario(Email_consulta, function(StatusUsu) {
            var statusTemporal = 0;

            if (StatusUsu == 1) {


                Swal.fire({
                    title: `¿Desea dar de baja el usuario: ${Nombre_usuario_baja}?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    if (result.isConfirmed) {

                        statusTemporal = 0;
                        Swal.fire(
                            'Completado',
                            'El usuario ha sido dado de baja.',
                            'success'
                        )

                        //Cambiamos el color de el botón por verde   
                        CambiarColorBoton(statusTemporal, fila);

                        //cambiamos el status en BD
                        CambiarEstadousuario(Email_consulta, statusTemporal);


                    }
                })


            } else {

                Swal.fire({
                    title: `¿Desea activar el usuario: ${Nombre_usuario_baja}?`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    if (result.isConfirmed) {

                        statusTemporal = 1;
                        Swal.fire(
                            'Completado',
                            'El usuario ha sido reactivado en el sistema.',
                            'success'
                        )

                        //Cambiamos el color de el botón por rojo
                        CambiarColorBoton(statusTemporal, fila);

                        //cambiamos el status en BD
                        CambiarEstadousuario(Email_consulta, statusTemporal);


                    }
                });

            }

        });

    });



    function ConsultaEstadoUsuario(Email_consulta, callback) {

        opcion = 6;
        //se consulta el status actual del usuario
        $.ajax({
            url: "../../paqueteria-github/bd/abcUsuarios.php",
            type: "POST",
            dataType: "json",
            data: { opcion: opcion, Email_consulta: Email_consulta, Status_usuario: Status_usuario },
            success: function(data) {
                callback(data[0].Status_usuario);


            }
        });

    }

    function CambiarEstadousuario(Email_consulta, status) {
        opcion = 5;
        $.ajax({
            url: "../../paqueteria-github/bd/abcUsuarios.php",
            type: "POST",
            dataType: "json",
            data: { Status_usuario: status, opcion: opcion, Email_consulta: Email_consulta },
            success: function() {


            }
        });
        //swal.fire(`entramos a función ${Id_usuario}, ${status}`);
    }

    function CambiarColorBoton(status, fila) {

        if (status == 0) {
            // fila.closest("tr").find('#btnBajasId').css('background-color', '#E62E31');
            // fila.closest("tr").find('#btnBajasId').css('border', '1px solid #E62E31');

            fila.closest("tr").find('#btnBajasId').addClass('btnBajas').removeClass('botonActivos');


        } else {
            // fila.closest("tr").find('#btnBajasId').css('background-color', 'green');
            // fila.closest("tr").find('#btnBajasId').css('border', '1px solid green');

            fila.closest("tr").find('#btnBajasId').addClass('botonActivos').removeClass('btnBajas');

        }

    }

});





//TASKS
//1.pasar la primera estructura donde carga la tabla con los datos...
//2. pasar la validación a otro archivo js



/*
            LA IDEA AQUI ES CREAR OTRA CONSULTA AJAX CON LAS VARIABLES NOMBRE, NÚMERO e EMAIL PARA CONFIRMAR QUE EL USUARIO NO SE ENCUENTRA EN LA BD ENTONCES YOU CAN REGISTER THE USER
        
            */



//MISTAKES
//// and other bug is that when I see the users on the phone doesn't work the active-desactive users.

//in mobile mode I have found many errors, 1- I can not change the status of a user nither can get the information about a user when the edit button is pressed.


//ACHIEVEMENTS
//NOTAS PARA LA PRÓXIMA ENTREGA
//Los usuarios en datatables están ordenados alfabeticamente.

//Agregamos la opción disabled - enable en el form editar
//en el label e input contraseña.
//validar el email para que no se repita en la base de datos....