<?php 
    include "../../clases/Conexion.php";
    include "../../clases/Usuarios.php";
    $con = new Conexion();
    $edad = new Usuarios();
    $conexion = $con->Conectar();
    $sql = "SELECT 
                usuarios.id_usuario AS idUsuario,
                usuarios.usuario AS nombreUsuario,
                roles.nombre AS rol,
                usuarios.id_rol AS idRol,
                usuarios.ubicacion AS ubicacion,
                usuarios.activo AS estatus,
                usuarios.id_persona AS idPersona,
                persona.nombre AS nombrePersona,
                persona.paterno AS paterno,
                persona.materno AS materno,
                persona.fecha_nacimiento AS fechaNacimiento,
                persona.sexo AS sexo,
                persona.correo AS correo,
                persona.telefono AS telefono
            FROM
                t_usuarios AS usuarios
                    INNER JOIN
                t_cat_roles AS roles ON usuarios.id_rol = roles.id_rol
                    INNER JOIN
                t_persona AS persona ON usuarios.id_persona = persona.id_persona";
    $respuesta = mysqli_query($conexion, $sql);
?>

<table class="table table-sm dt-responsive nowrap" style="width: 100%" id="tablaUsuariosDataTable">
    <thead>
        <th class="text-center">Apellido paterno</th>
        <th class="text-center">Apellido materno</th>
        <th class="text-center">Nombre</th>
        <th class="text-center">Edad</th>
        <th class="text-center">Telefono</th>
        <th class="text-center">Correo</th>
        <th class="text-center">Usuario</th>
        <th class="text-center">Ubicacion</th>
        <th class="text-center">Sexo</th>
        <th class="text-center">Reset password</th>
        <th class="text-center">Activar/Desactivar</th>
        <th class="text-center">Editar</th>
        <th class="text-center">Eliminar</th>
    </thead>
    <tbody>
        <?php 
            while ($mostrar = mysqli_fetch_array($respuesta)) {
        ?>
        <tr>
            <td class="text-center"><?php echo $mostrar['paterno'];?></td>
            <td class="text-center"><?php echo $mostrar['materno'];?></td>
            <td class="text-center"><?php echo $mostrar['nombrePersona'];?></td>
            <td class="text-center"><?php echo $edad->calculaEdad($mostrar['fechaNacimiento'], date('Y-m-d'))[0];?></td>
            <td class="text-center"><?php echo $mostrar['telefono'];?></td>
            <td class="text-center"><?php echo $mostrar['correo'];?></td>
            <td class="text-center"><?php echo $mostrar['nombreUsuario'];?></td>
            <td class="text-center"><?php echo $mostrar['ubicacion'];?></td>
            <td class="text-center"><?php echo $mostrar['sexo'];?></td>
            <td class="text-center">
                <button class="btn btn-outline-info btn-sm"
                    data-toggle="modal"
                    data-target="#modalResetPassword"
                    onclick="agregarIdUsuarioReset(<?php echo $mostrar['idUsuario']?>)">
                    <span class="fas fa-redo"></span> Reestablecer password
                </button>
            </td>
            <td class="text-center">
                <?php 
                    if ($mostrar['estatus'] == 1) {        
                ?>
                    <button class="btn btn-outline-secondary btn-sm"
                    onclick="cambioEstatusUsuario(<?php echo $mostrar['idUsuario']?>, <?php echo $mostrar['estatus']?>)">
                        <span class="fas fa-power-off"></span>
                        Desactivar
                    </button>
                <?php 
                    } else if ($mostrar['estatus'] == 0) {
                ?>
                    <button class="btn btn-outline-success btn-sm"
                    onclick="cambioEstatusUsuario(<?php echo $mostrar['idUsuario']?>, <?php echo $mostrar['estatus']?>)">
                        <span class="fas fa-plus"></span>
                        Activar
                    </button>
                <?php        
                    }
                ?>
            </td>
            <td class="text-center">
                <button class="btn btn-outline-warning btn-sm" 
                        data-toggle="modal"
                        data-target="#modalActualizarUsuarios"
                        onclick="obtenerDatosUsuario(<?php echo $mostrar['idUsuario']?>)">
                    <span class="fas fa-user-edit"></span> Editar
                </button>
            </td>
            <td class="text-center">
                <button class="btn btn-outline-danger btn-sm"
                    onclick="eliminarUsuario(<?php echo $mostrar['idUsuario']?>, <?php echo $mostrar['idPersona']?>)">
                    <span class="fas fa-user-slash"></span> Eliminar
                </button>
            </td>
        </tr>
        <?php 
            }
        ?>
    </tbody>
</table>

<script>
    $(document).ready(function(){
        $('#tablaUsuariosDataTable').DataTable({
            language: {
                url: "../public/datatable/es-ES.json"
            }
        });
    });
</script>