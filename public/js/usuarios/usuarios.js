$(document).ready(function() {
    $('#tablaUsuariosLoad').load("./usuarios/tablaUsuarios.php");
})

function agregarNuevoUsuario() {
    $.ajax({
        type: "POST",
        data: $('#frmAgregarUsuario').serialize(),
        url: "../procesos/usuarios/crud/agregarNuevoUsuario.php",
        success: function(respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#tablaUsuariosLoad').load("./usuarios/tablaUsuarios.php");
                $('#frmAgregarUsuario')[0].reset();
                Swal.fire(":)", "Agregado con exito!", "success");
            } else {
                Swal.fire(":(", "Error al agregar" + respuesta, "error");
            }
        }
    });
    return false;
}

function obtenerDatosUsuario(idUsuario) {
    $.ajax({
        type: "POST",
        data: "idUsuario=" + idUsuario,
        url: "../procesos/usuarios/crud/obtenerDatosUsuario.php",
        success: function(respuesta) {
            respuesta = jQuery.parseJSON(respuesta);
            $('#idUsuario').val(respuesta['idUsuario']);
            $('#paternou').val(respuesta['paterno']);
            $('#maternou').val(respuesta['materno']);
            $('#nombreu').val(respuesta['nombrePersona']);
            $('#fecha_nacimientou').val(respuesta['fechaNacimiento']);
            $('#sexou').val(respuesta['sexo']);
            $('#telefonou').val(respuesta['telefono']);
            $('#correou').val(respuesta['correo']);
            $('#usuariou').val(respuesta['nombreUsuario']);
            $('#idRolu').val(respuesta['idRol']);
            $('#ubicacionu').val(respuesta['ubicacion']);
        }
    });
}

function actualizarUsuario() {
    $.ajax({
        type: "POST",
        data: $('#frmActualizarUsuario').serialize(),
        url: "../procesos/usuarios/crud/actualizarUsuario.php",
        success: function(respuesta) {
            console.log(respuesta);
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#tablaUsuariosLoad').load("./usuarios/tablaUsuarios.php");
                $('#modalActualizarUsuarios').modal('hide');
                Swal.fire(":)", "Actualizado con exito!", "success");
            } else {
                Swal.fire(":(", "Error al actualizar" + respuesta, "error");
            }
        }
    });
    return false;
}

function agregarIdUsuarioReset(idUsuario) {
    $('#idUsuarioReset').val(idUsuario);
}

function resetPassword() {
    $.ajax({
        type: "POST",
        data: $('#frmResetearPassword').serialize(),
        url: "../procesos/usuarios/extras/resetPassword.php",
        success: function(respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#modalResetPassword').modal('hide');
                Swal.fire(":)", "Cambio de password con exito!", "success");
            } else {
                Swal.fire(":(", "Error al actualizar el password" + respuesta, "error");
            }
        }
    });
    return false;
}

function cambioEstatusUsuario(idUsuario, estatus) {
    $.ajax({
        type: "POST",
        data: "idUsuario=" + idUsuario + "&estatus=" + estatus,
        url: "../procesos/usuarios/extras/cambioEstatus.php",
        success: function(respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#tablaUsuariosLoad').load("./usuarios/tablaUsuarios.php");
                Swal.fire(":)", "Cambio de estatus con exito!", "success");
            } else {
                Swal.fire(":(", "Error al cambiar el estatus" + respuesta, "error");
            }
        }
    });
}

function eliminarUsuario(idUsuario, idPersona) {
    Swal.fire({
        title: 'Estas seguro de eliminar este usuario?',
        text: 'Una vez eliminado no podra ser recuperado!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, deseo eliminarlo!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                data: "idUsuario=" + idUsuario + "&idPersona=" + idPersona,
                url: "../procesos/usuarios/crud/eliminarUsuario.php",
                success: function(respuesta) {
                    respuesta = respuesta.trim();
                    if (respuesta == 1) {
                        $('#tablaUsuariosLoad').load("./usuarios/tablaUsuarios.php");
                        Swal.fire(":)", "Usuario eliminado con exito!", "warning");
                    } else {
                        Swal.fire(":(", "Error al tratar de eliminar al usuario!" + respuesta, "error");
                    }
                }
            });
        }
    });
    return false;
}