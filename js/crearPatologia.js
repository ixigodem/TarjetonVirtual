var btnAgregarPatologia = document.getElementById("btnAgregarPatologia");
var divRespuesta = document.getElementById("respuesta");
var divRespuestaError = document.getElementById("mensajeError");
var inputJsonPatologias = document.getElementById("jsonPatologias");

//Lista de patologias
var listaPatologias = [];

btnAgregarPatologia.addEventListener("click", function(e) {
    e.preventDefault();
    //Rescato los valores de los input
    var fechaPatologia = document.getElementById("fechaPatologias").value;
    var cboPatologia = document.getElementById("Patologia_ID");

    //Del idPatologia obtengo el indice
    var selectedIndex = cboPatologia.selectedIndex;
    //Ahora rescato el valor de idPatologia
    var idPatologia = cboPatologia.value;
    if (fechaPatologia === "" || cboPatologia.value === "Seleccione una opción") {
        divRespuestaError.innerHTML = `
        <th scope="row">
        <div class="alert alert-danger" role="alert">
        Debe Elegir Fecha y Patologia
        </div>
        </th>
`
    } else {
        if (!existPatologia(idPatologia)) {
            var nombrePatologia = cboPatologia.options[selectedIndex].innerHTML;

            //Creo el objeto de la patologia (JSON)
            var patologia = {};

            patologia.fecha = fechaPatologia;
            patologia.id = idPatologia;
            patologia.nombre = nombrePatologia;

            //Ahora se agregan a la lista el objeto
            listaPatologias.push(patologia);

            mostrarDatosEnForm();

            console.log(listaPatologias);

            inputJsonPatologias.value = JSON.stringify(listaPatologias);
            console.log(inputJsonPatologias)
        } else {
            divRespuestaError.innerHTML = `
            <div class="alert alert-danger" role="alert">
            Patologia ya ingresada
            </div>
            `
        }
    }
});

function mostrarDatosEnForm() {
    divRespuestaError.innerHTML = "";
    divRespuesta.innerHTML = "";
    for (let patologia of listaPatologias) {
        divRespuesta.innerHTML += `
            <div id='fila'>
                <th scope="row">${patologia.fecha}</th>
                <th scope="row">${patologia.id}</th>
                <th scope="row">${patologia.nombre}</th>
                <span></span>
                <th scope="row">
                <a href='#' onclick='eliminarPatologia(${patologia.id})' class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">remove</i></a>
                </th>
            </div>
        `
    }
}

function eliminarPatologia(idPatologia) {
    listaPatologias = listaPatologias.filter(function(patologia, index, arr) {
        return patologia.id != idPatologia;
    });

    mostrarDatosEnForm();
    inputJsonPatologias.value = JSON.stringify(listaPatologias);
}

function existPatologia(idPatologia) {
    for (let patologia of listaPatologias) {
        if (patologia.id == idPatologia) {
            return true;
        }
    }
    return false;
}