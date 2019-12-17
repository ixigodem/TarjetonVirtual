function cerrarSesion() {
    $("#modalCerrarSesion").modal("show");
    envioSolicitud();
}

function envioSolicitud() {
    $("#btnCerrarSesion").click(function() {
        fetch('../controller/Salir.php',{
            method: 'POST'  
        }).catch(err => console.log(err));

        $("#modalCerrarSesion").removeClass("modal-open");
        window.location.href="../Index.php";
    })
}