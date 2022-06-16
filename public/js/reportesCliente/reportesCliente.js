$(document).ready(function() {
    $('#tablaReportesClienteLoad').load('./reportesCliente/tablaReporteCliente.php');
});

function agregarNuevoReporte() {
    $.ajax({
        type: "POST",
        data: $('#frmNuevoReporte').serialize(),
        url: "../procesos/reportesCliente/agregarNuevoReporte.php",
        success: function(respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#tablaReportesClienteLoad').load('./reportesCliente/tablaReporteCliente.php');
                $('#frmNuevoReporte')[0].reset();
                $('#modalActualizarUsuarios').modal('hide');
                Swal.fire(":)", "Agregado con exito!", "success");
            } else {
                Swal.fire(":(", "Error al agregar!" + respuesta, "error");
            }
        }
    })
    return false;
}

function eliminarReporteCliente(idReporte) {
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