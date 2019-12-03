function actualizarTarjeton(id) {
    var datos = tarjetonGlobal;
    $("#editarTarjeton").modal("show");
    console.log(datos);
    datos.forEach(element => {
        if(element['id_Tarjeton'] == id){
            $("#fechaAtencionE").val(element['fechaAtencion']);
            $("#profesionalE").val(element['id_Profesional']);
            $("#profesionalE").val(element['id_Profesional']);
            $("#profesionalE").val(element['id_Profesional']);
            $("#profesionalE").val(element['id_Profesional']);

        
        }
    });
}