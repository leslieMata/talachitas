$(document).ready(function() {
    $('#tablaReportesAdminLoad').load('./reportesAdmin/tablaReportesAdmin.php');
});

function eliminarReporteAdmin(idReporte) {
    Swal.fire({
        title: 'Estas seguro de eliminar este reporte?',
        text: 'Una vez eliminado no podra ser recuperado!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, deseo eliminarlo!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                data: "idReporte=" + idReporte,
                url: "../procesos/reportesCliente/eliminarReporteCliente.php",
                success: function(respuesta) {
                    respuesta = respuesta.trim();
                    if (respuesta == 1) {
                        $('#tablaReportesClienteLoad').load('./reportesCliente/tablaReporteCliente.php');
                        Swal.fire(":)", "Eliminado con exito!", "success");
                    } else {
                        Swal.fire(":(", "Error al eliminar!" + respuesta, "error");
                    }
                }
            });
        }
    });
    return false;
}

function obtenerDatosSolucion(idReporte) {
    $.ajax({
        type: "POST",
        data: "idReporte=" + idReporte,
        url: "../procesos/reportesAdmin/obtenerSolucion.php",
        success: function(respuesta) {
            respuesta = jQuery.parseJSON(respuesta);
            $('#idReporte').val(respuesta['idReporte']);
            $('#solucion').val(respuesta['solucion']);
            $('#estatus').val(respuesta['estatus']);
        }
    });
    return false;
}

function agregarSolucionReporte() {
    $.ajax({
        type: "POST",
        data: $('#frmAgregarSolucionReporte').serialize(),
        url: "../procesos/reportesAdmin/actualizarSolucion.php",
        success: function(respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                Swal.fire(":)", "Actualizado con exito!", "success");
                $('#tablaReportesAdminLoad').load('./reportesAdmin/tablaReportesAdmin.php');
            } else {
                Swal.fire(":(", "Error al actualizar!" + respuesta, "error");
            }
        }
    });
    return false;
}