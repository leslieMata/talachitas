function datosPersonalesInicio(idUsuario) {
    $.ajax({
        type: "POST",
        data: "idUsuario=" + idUsuario,
        url: "../procesos/usuarios/crud/obtenerDatosUsuario.php",
        success: function(respuesta) {
            respuesta = jQuery.parseJSON(respuesta);
            $('#paterno').text(respuesta['paterno']);
            $('#materno').text(respuesta['materno']);
            $('#nombre').text(respuesta['nombrePersona']);
            $('#telefono').text(respuesta['telefono']);
            $('#correo').text(respuesta['correo']);
            $('#edad').text(calculaEdad(respuesta['fechaNacimiento']));
        }
    });
    return false;
}

function calculaEdad(dateString) {
    let hoy = new Date();
    let fechaNacimiento = new Date(dateString);
    let edad = hoy.getFullYear() - fechaNacimiento.getFullYear();
    let diferenciasMeses = hoy.getMonth() - fechaNacimiento.getMonth();
    if (diferenciasMeses < 0 || (diferenciasMeses === 0 && hoy.getDate() < fechaNacimiento.getDate())) {
        edad--;
    }
    return edad;
}