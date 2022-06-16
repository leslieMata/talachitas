<?php 
    include "../../clases/Conexion.php";
    $con = new Conexion();
    $conexion = $con->Conectar();
    $sql = "SELECT 
                persona.id_persona AS idPersona,
                CONCAT(persona.paterno,
                        ' ',
                        persona.materno,
                        ' ',
                        persona.nombre) AS nombrePersona,
                equipo.id_equipo AS idEquipo,
                equipo.nombre AS nombreEquipo,
                asignacion.id_asignar AS idAsignacion,
                asignacion.marca AS marca,
                asignacion.modelo AS modelo,
                asignacion.color AS color,
                asignacion.descripcion AS descripcion,
                asignacion.memoria AS memoria,
                asignacion.disco_duro AS discoDuro,
                asignacion.procesador AS procesador
            FROM
                t_asignar AS asignacion
                    INNER JOIN
                t_persona AS persona ON asignacion.id_persona = persona.id_persona
                    INNER JOIN
                t_cat_equipos AS equipo ON asignacion.id_equipo = equipo.id_equipo";
    $respuesta = mysqli_query($conexion, $sql);
?>

<table class="table table-sm dt-responsive nowrap" 
        style="width: 100%" id="tablaAsignacionDataTable">
    <thead>
        <th class="text-center">Persona</th>
        <th class="text-center">Equipo</th>
        <th class="text-center">Marca</th>
        <th class="text-center">Modelo</th>
        <th class="text-center">Color</th>
        <th class="text-center">Descripcion</th>
        <th class="text-center">Memoria</th>
        <th class="text-center">Disco Duro</th>
        <th class="text-center">Procesador</th>
        <th class="text-center">Eliminar</th>
    </thead>
    <tbody>
    <?php while ($mostrar = mysqli_fetch_array($respuesta)) {
    ?>
        <tr>
            <td class="text-center"><?php echo $mostrar['nombrePersona'];?></td>
            <td class="text-center"><?php echo $mostrar['nombreEquipo']?></td>
            <td class="text-center"><?php echo $mostrar['marca']?></td>
            <td class="text-center"><?php echo $mostrar['modelo']?></td>
            <td class="text-center"><?php echo $mostrar['color']?></td>
            <td class="text-center"><?php echo $mostrar['descripcion']?></td>
            <td class="text-center"><?php echo $mostrar['memoria']?></td>
            <td class="text-center"><?php echo $mostrar['discoDuro']?></td>
            <td class="text-center"><?php echo $mostrar['procesador']?></td>
            <td class="text-center">
                <button class="btn btn-outline-danger btn-sm"
                    onclick="eliminarAsignacion(<?php echo $mostrar['idAsignacion'];?>)">
                    <span class="fas fa-trash-alt"></span>
                </button>
            </td>
        </tr>
    <?php 
        }
    ?>
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $('#tablaAsignacionDataTable').DataTable({
            language: {
                url: "../public/datatable/es-ES.json"
            }
        });
    })
</script>