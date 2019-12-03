<<<<<<< HEAD
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
=======
function actualizarTarjeton(datos) {
    console.log(datos);
>>>>>>> f708cda4d2de057f6026de6ae620e52afd7b0cca
}