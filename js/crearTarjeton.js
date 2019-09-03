var cuerpoFormulario = document.getElementById('seccionCreateNewTarjeton');
var btnAgregarExamen = document.getElementById("btnAgregarExamen");
var divRespuesta = document.getElementById("respuesta");
var divRespuestaError = document.getElementById("mensajeError");
var inputJsonExamen = document.getElementById("jsonExamenes");

function newAtencion(id,idTarjeton) {
    if (cuerpoFormulario.style.display == 'none') {
        cuerpoFormulario.style.display = 'block';

        //Creare una lista para el JSON
        listExamen = [];

        btnAgregarExamen.addEventListener('click',function(e){
            e.preventDefault();

            //Rescatando los datos del formulario
            var fechaExamen = document.getElementById('fechaExamen').value;
            var cboExamen = document.getElementById('listadoExamen');
            var valorExamen = document.getElementById('txtValorExamen').value;

            //Obtener el id del comboBox
            var selectedIndex = cboExamen.selectedIndex;

            //Ahora obtengo el nombre del examen
            var idExamen = cboExamen.value;

            if (fechaExamen === "" || cboExamen.value === "Seleccione una opción" || valorExamen === "") {
                divRespuestaError.innerHTML = `
                <th scope="row">
                <div class="alert alert-danger" role="alert">
                Debe ingresar los siguientes datos Fecha, Examen y Valor
                </div>
                </th>
        `
            }else {
                if(!existExamen(idExamen)){
                    //Obtengo el valor elegido en el indice del combobox
                    var nombreExamen = cboExamen.options[selectedIndex].innerHTML;

                    //Creo un objeto Examen en formato JSON
                    var examen = {};
                    examen.fecha = fechaExamen;
                    examen.id = idExamen;
                    examen.nombre = nombreExamen;
                    examen.valor = valorExamen;
                    examen.idPaciente = id;

                    //Ahora agrego en la lista el objeto
                    listExamen.push(examen);

                    mostrarDatosEnForm();

                    console.log(listExamen);
                    inputJsonExamen.value = JSON.stringify(listExamen);
                }else {
                    divRespuestaError.innerHTML = `
                    <div class="alert alert-danger" role="alert">
                    Examen ya ingresado
                    </div>
                    `
                }
            }
        })
    }
}

function mostrarDatosEnForm() {
    divRespuestaError.innerHTML = "";
    divRespuesta.innerHTML = "";
    for (let examen of listExamen) {
        divRespuesta.innerHTML += `
            <div id='fila'>
                <th scope="row">${examen.fecha}</th>
                <th scope="row">${examen.id}</th>
                <th scope="row">${examen.nombre}</th>
                <th scope="row">${examen.valor}</th>
                <span></span>
                <th scope="row">
                    <button type="button" onclick='eliminarExamen(${examen.id})' class="btn btn-danger">-</button>
                </th>
            </div>
        `
    }
}

function eliminarExamen(idExamen) {
    listExamen = listExamen.filter(function(examen, index, arr) {
        return examen.id != idExamen;
    });

    mostrarDatosEnForm();
    inputJsonExamen.value = JSON.stringify(listExamen);
}

function existExamen(idExamen) {
    for (let examen of listExamen) {
        if (examen.id == idExamen) {
            return true;
        }
    }
    return false;
}

function calc_imc() {
    var altura = document.getElementById("altura").value;
    altura = altura.toString().replace(',', '.');
    var alturaMetro = altura / 100;
    var peso = document.getElementById("peso").value;

    if (altura == "") {
        document.getElementById("errorIMC").innerHTML = "Por favor, introduce tu altura.";
    } else if (altura < 0) {
        document.getElementById("errorIMC").innerHTML = "La altura que ingrese debe ser positiva.";
    } else if (altura < 20) {
        document.getElementById("errorIMC").innerHTML = "Ha introducido la altura en metros. Por favor, multipliquela por 100 para introducirla en centimetros";
    } else {
        document.getElementById("errorIMC").innerHTML = "";
        if (peso == "") {
            document.getElementById("errorIMC").innerHTML = "Por favor, introduce tu peso.";
        } else if (peso < 0) {
            document.getElementById("errorIMC").innerHTML = "El peso que ingrese debe ser positivo.";
        } else {
            document.getElementById("errorIMC").innerHTML = "";

            /*CALCULO IMC*/
            var alturaCuadrado = alturaMetro * alturaMetro;
            var imc = peso / alturaCuadrado;
            document.getElementById("IMC").value = Math.round(imc * 100) / 100;
            /*CALCULO DESCRIPCION IMC*/
            if (imc < 16) {
                document.getElementById("dgNutricional").value = "Delgadez Severa";
            } else if (imc < 17) {
                document.getElementById("dgNutricional").value = "Delgadez Moderada";
            } else if (imc < 18.5) {
                document.getElementById("dgNutricional").value = "Delgadez Aceptable";
            } else if (imc < 25) {
                document.getElementById("dgNutricional").value = "Peso Normal";
            } else if (imc < 30) {
                document.getElementById("dgNutricional").value = "Sobrepeso";
            } else if (imc < 35) {
                document.getElementById("dgNutricional").value = "Obeso: Tipo I";
            } else if (imc < 40) {
                document.getElementById("dgNutricional").value = "Obeso: Tipo II";
            } else if (imc >= 40) {
                document.getElementById("dgNutricional").value = "Obeso: Tipo III";
            }
        }
    }
}