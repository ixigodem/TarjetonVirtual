var btnAgregarComplicacion = document.getElementById("btnAgregarComplicacion");
var divRespuestaComplicacion = document.getElementById("respuestaComplicacion");
var divRespuestaErrorComplicacion = document.getElementById("mensajeErrorComplicacion");
var inputJsonComplicacion = document.getElementById("jsonPatologias");

//Lista de patologias
var listaComplicacion = [];

btnAgregarComplicacion.addEventListener("click", function(e) {
    e.preventDefault();
    //Rescato los valores de los input
    var fechaComplicacion = document.getElementById("fechaComplicacion").value;
    var cboComplicacion = document.getElementById("complicacion_ID");

    //Del idComplicacion obtengo el indice
    var selectedIndex = cboComplicacion.selectedIndex;
    //Ahora rescato el valor de idComplicacion
    var idComplicacion = cboComplicacion.value;
    if (fechaComplicacion === "" || cboComplicacion.value === "Seleccione una opción") {
        divRespuestaErrorComplicacion.innerHTML = `
        <th scope="row">
        <div class="alert alert-danger" role="alert">
        Debe Elegir Fecha y Complicacion
        </div>
        </th>
`
    } else {
        if (!existComplicacion(idComplicacion)) {
            var nombreComplicacion = cboComplicacion.options[selectedIndex].innerHTML;

            //Creo el objeto de la complicacion (JSON)
            var complicacion = {};

            complicacion.fecha = fechaComplicacion;
            complicacion.id = idComplicacion;
            complicacion.nombre = nombreComplicacion;

            //Ahora se agregan a la lista el objeto
            listaComplicacion.push(complicacion);

            mostrarDatosEnFormComplicacion();

            console.log(listaComplicacion);

            inputJsonComplicacion.value = JSON.stringify(listaComplicacion);
        } else {
            divRespuestaErrorComplicacion.innerHTML = `
            <div class="alert alert-danger" role="alert">
            Patologia ya ingresada
            </div>
            `
        }
    }
});

function mostrarDatosEnFormComplicacion() {
    divRespuestaErrorComplicacion.innerHTML = "";
    divRespuestaComplicacion.innerHTML = "";
    for (let complicacion of listaComplicacion) {
        divRespuestaComplicacion.innerHTML += `
            <div id='fila'>
                <th scope="row">${complicacion.fecha}</th>
                <th scope="row">${complicacion.id}</th>
                <th scope="row">${complicacion.nombre}</th>
                <span></span>
                <th scope="row">
                    <button type="button" onclick='eliminarComplicacion(${complicacion.id})' class="btn btn-danger">-</button>
                </th>
            </div>
        `
    }
}

function eliminarComplicacion(idComplicacion) {
    listaComplicacion = listaComplicacion.filter(function(complicacion, index, arr) {
        return complicacion.id != idComplicacion;
    });

    mostrarDatosEnFormComplicacion();
    inputJsonComplicacion.value = JSON.stringify(listaComplicacion);
}

function existComplicacion(idComplicacion) {
    for (let complicacion of listaComplicacion) {
        if (complicacion.id == idComplicacion) {
            return true;
        }
    }
    return false;
}