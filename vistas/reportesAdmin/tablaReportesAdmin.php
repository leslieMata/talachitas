<?php
    session_start();
    include "../../clases/Conexion.php";
    $con = new Conexion();
    $conexion = $con->Conectar();
    $idUsuario = $_SESSION['usuario']['id'];
    $contador = 1;
    $sql = "SELECT 
                reporte.id_reporte AS idReporte,
                reporte.id_usuario AS idUsuario,
                CONCAT(persona.paterno,
                        ' ',
                        persona.materno,
                        ' ',
                        persona.nombre) AS nombrePersona,
                equipo.id_equipo AS idEquipo,
                equipo.nombre AS nombreEquipo,
                reporte.descripcion_problema AS problema,
                reporte.estatus AS estatus,
                reporte.solucion_problema AS solucion,
                reporte.fecha AS fecha
            FROM
                t_reportes AS reporte
                    INNER JOIN
                t_usuarios AS usuario ON reporte.id_usuario = usuario.id_usuario
                    INNER JOIN
                t_persona AS persona ON usuario.id_persona = persona.id_persona
                    INNER JOIN
                t_cat_equipos AS equipo ON reporte.id_equipo = equipo.id_equipo
                ORDER BY reporte.fecha DESC";
    $respuesta = mysqli_query($conexion, $sql);
?>

<table class="table table-sm table-bordered dt-responsive nowrap" 
        style="width: 100%" id="tablaReportesAdminDataTable">
    <thead>
        <th class="text-center">#</th>
        <th class="text-center">Persona</th>
        <th class="text-center">Dispositivo</th>
        <th class="text-center">Fecha</th>
        <th class="text-center">Descripcion</th>
        <th class="text-center">Estatus</th>
        <th class="text-center">Solucion</th>
        <th class="text-center">Eliminar</th>
    </thead>
    <tbody>
        <?php while ($mostrar = mysqli_fetch_array($respuesta)) {
            
        ?>
        <tr>
            <td class="text-center"><?php echo $contador++;?></td>
            <td class="text-center"><?php echo $mostrar['nombrePersona'];?></td>
            <td class="text-center"><?php echo $mostrar['nombreEquipo'];?></td>
            <td class="text-center"><?php echo $mostrar['fecha'];?></td>
            <td class="text-center"><?php echo $mostrar['problema'];?></td>
            <td class="text-center"><?php 
                    $estatus = $mostrar['estatus'];
                    $cadenaEstatus = '<span class="badge badge-danger">Abierto</span>';
                    if($estatus == 0) {
                    $cadenaEstatus = '<span class="badge badge-success">Cerrado</span>';
                    }
                    echo $cadenaEstatus;
                ?>
            </td>
            <td class="text-center">
                <button class="btn btn-outline-info btn-sm"
                        onclick="obtenerDatosSolucion('<?php echo $mostrar['idReporte'];?>')"
                        data-toggle="modal" data-target="#modalAgregarSolucionReporte">
                    <span class="fas fa-check"></span>
                </button>
                <?php echo $mostrar['solucion'];?>
            </td>
            <td class="text-center">
                <?php 
                    if ($mostrar['solucion'] == "") {
                        
                ?>
                    <button class="btn btn-outline-danger btn-sm" onclick="eliminarReporteAdmin(<?php echo $mostrar['idReporte']?>)">
                        <span class="fas fa-trash-alt"></span>
                    </button>
                <?php 
                    }
                ?>
            </td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>
<script>
    $(document).ready(function(){
        $('#tablaReportesAdminDataTable').DataTable({
            language: {
                url: "../public/datatable/es-ES.json"
            },
            dom: 'Bfrtip',
            buttons: {
                buttons: [
                    {
                        extend: 'copy',
                        className: 'btn btn-outline-info',
                        text: '<i class="fas fa-copy"></i> Copiar'
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-outline-primary',
                        text: '<li class="fas fa-file-csv"></li> CSV'
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-outline-success',
                        text: '<i class="fas fa-file-excel"></i> XLS'
                    },
                    {
                        extend: 'pdf',
                        className: 'btn btn-outline-danger',
                        text: '<i class="fas fa-file-pdf"></i> PDF'
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-outline-secondary',
                        text: '<i class="fas fa-print"></i> Imprimir'
                    },
                ],
                dom: {
                    button: {
                        className: 'btn'
                    }
                }
            }
        });
    })
</script>