<form id="frmActualizarUsuario" method="POST" onsubmit="return actualizarUsuario()">
    <!-- Modal -->
    <div class="modal fade" id="modalActualizarUsuarios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" id="idUsuario" name="idUsuario" hidden>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="paternou">Apellido paterno</label>
                            <input type="text" class="form-control" id="paternou" name="paternou" required>
                        </div>
                        <div class="col-sm-4">
                            <label for="maternou">Apellido materno</label>
                            <input type="text" class="form-control" id="maternou" name="maternou" required>
                        </div>
                        <div class="col-sm-4">
                            <label for="nombreu">Nombre(s)</label>
                            <input type="text" class="form-control" id="nombreu" name="nombreu" required>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="fecha_nacimientou">Fecha de nacimiento</label>
                            <input type="date" class="form-control" id="fecha_nacimientou" name="fecha_nacimientou" required>
                        </div>
                        <div class="col-sm-4">
                            <label for="sexou">Sexo</label>
                            <select name="sexou" id="sexou" class="form-control" required>
                            <option value="">Selecciona tú sexo</option>
                                <option value="F">Femenino</option>
                                <option value="M">Masculino</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="telefonou">Telefono</label>
                            <input type="text" class="form-control" id="telefonou" name="telefonou" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="correou">Correo</label>
                            <input type="mail" class="form-control" id="correou" name="correou" required>
                        </div>
                        <div class="col-sm-4">
                            <label for="usuariou">Usuario</label>
                            <input type="text" class="form-control" id="usuariou" name="usuariou" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="idRolu">Rol de usuario</label>
                            <select name="idRolu" id="idRolu" class="form-control" required>
                                <option value="">Selecciona un rol</option>
                                <option value="1">Cliente</option>
                                <option value="2">Adminstrador</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="ubicacionu">Ubicacion</label>
                            <textarea name="ubicacionu" id="ubicacionu" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-warning">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
</form>