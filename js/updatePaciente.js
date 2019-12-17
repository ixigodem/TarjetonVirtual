function actualizarPaciente(id) {
    // Obtener el paciente seleccionado
    fetch('../controller/getPaciente.php?id= ' + id, {
        method: 'GET'
    })
    .then(res => res.json())
    .then(paciente => {
        abrirModalEditarPaciente(paciente);
    }).catch(err => console.log(err));
    // Fin de Obtención de los datos del paciente
    // Una vez que tengo el Json, Abrir el Modal
}

function abrirModalEditarPaciente(paciente){
    // Acá abres modal
    $("#editarPaciente").modal("show");
    for (const p of paciente) {
        $("#idPaciente").val(p['id_Paciente']);
        $("#runE").val(p['run_Paciente']);
        $("#nombresE").val(p['nombres']);
        $("#apellidoPaternoE").val(p['apellidoPaterno']);
        $("#apellidoMaternoE").val(p['apellidoMaterno']);
        $("#fechaNacimientoE").val(p['fecha']);
        $('input[name="sexoE"][value="' + p["sexo"] + '"]').prop('checked', true);
        $("#participacionSocialE").val(p['participacionSocial']);
        $("#estudioE").val(p['estudio']);
        $("#telefonoE").val(p['fono']);
        $("#actividadLaboralE").val(p['actividadLaboral']);
        $("#direccionParticularE").val(p['direccionParticular']);
        $("#sectorE").val(p['sector']);
        $("#estadoCivilE").val(p['id_EstadoCivil']);
        $("#comunaE").val(p['id_Comuna']);
        $("#estadoE").val(p['id_Estado']);
    }
    // y llenas los datos del html que està dentro del modal
    // recuerda crear un input hidden que se llame idPacienteEditado
    // al cual debes poner el id del paciente en cuestiòn
}