$(document).ready(function() {
    
    var Id_espacio, opcion;
    opcion = 4;

    tablaEspacios = $('#tablaEspacios').DataTable({
        "ajax":{
          "url": "../../paqueteria/bd/abcEspacios.php",
            "method": 'POST',
            "data":{opcion:opcion},
            "dataSrc":""
            
        },        
        
        "columns": [
            {"data":"Id_espacio"},
            {"data":"Nombre_espacio"},
            {"data":"Acronimo"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button></div></div>"}
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
                "iDisplayLength": 3,

    });

    var fila; //capturar la fila para editar o dar de baja usuario
    
    //submit para el Alta y Actualización
    $("#formEspacios").submit(function(e) {
        e.preventDefault();

        Nombre_espacio = $.trim($('#Nombre_espacio').val());
        Acronimo_espacio = $.trim($('#Acronimo_espacio').val());
        
        
        $.ajax({
            url: "../../paqueteria/bd/abcEspacios.php",
            type: "POST",
            dataType: "json",
            data: {Nombre_espacio:Nombre_espacio, Acronimo_espacio:Acronimo_espacio, Id_espacio:Id_espacio, opcion:opcion},
            success: function(data) {
                console.log(data);
                
                tablaEspacios.ajax.reload(null,false);
                
            }

        });
        $("#modalEspacio").modal("hide");

    });
    
    //Limpiar lso datos antes de dar de Alta un usuario
    $('#btnAgregarEspacio').click(function() {
        opcion =1; //alta
        Id_usuario = null;
        $("#formEspacios").trigger("reset");
        $(".modal-header").css("background-color", "#50575A");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Alta de Espacio");
        $("#modalEspacio").modal("show");
        
    });
    
    
    
    
    //boton Editar
    $(document).on("click", ".btnEditar", function(){
        opcion = 3; //Select para obtener datos de campos
        fila = $(this).closest("tr");
        Id_espacio = parseInt(fila.find('td:eq(0)').text());
        
            $.ajax({
            url: "../../paqueteria/bd/abcEspacios.php",
            type: "POST",
            dataType: "json",
            data: {Id_espacio:Id_espacio, Nombre_espacio:"", Acronimo:"",opcion:opcion},
                success: function(data){
                
                    NombreEspacio = data[0].Nombre_espacio;
                    AcronimoEspacio = data[0].Acronimo;
                    
                 $('#Nombre_espacio').val(NombreEspacio);
                    $('#Acronimo_espacio').val(AcronimoEspacio);
                   
                }
            });
        
        opcion = 2;
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Usuario");
        $("#modalEspacio").modal("show");
        
    });
    
   
    

});