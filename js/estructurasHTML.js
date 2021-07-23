$(document).ready(function() {

    function crearSelectorUsuarios() {
        let selector = 'usuarios';
        $.ajax({
            url: "../../paqueteria-github/bd/crearSelector.php",
            type: "POST",
            //dataType: "json",
            data: { selector: selector },
            success: function(data) {
                $('#lugarSelectorUsuarios').html(data);
            }
        });
    }

    function crearSelectorDepartamentos() {
        let selector = 'departamentos';
        $.ajax({
            url: "../../paqueteria-github/bd/crearSelector.php",
            type: "POST",
            //dataType: "json",
            data: { selector: selector },
            success: function(data) {
                $('#lugarSelectorDepartamentos').html(data);
            }
        });
    }

    crearSelectorUsuarios();
    crearSelectorDepartamentos();


});