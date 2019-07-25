var tituloTablaPaciente = document.getElementById('tituloTablaPaciente');
var cuerpoTablaPaciente = document.getElementById('cuerpoTablaPaciente');
var tituloTablaTarjeton = document.getElementById('tituloTablaTarjeton');
var cuerpoTablaTarjeton = document.getElementById('cuerpoTablaTarjeton');
var formGetPaciente = document.getElementById('formGetPaciente');

formGetPaciente.addEventListener('submit', function(e) {
    e.preventDefault();
    var formDataPaciente = new FormData(formGetPaciente);
    var run = formDataPaciente.get('txtRun');
    var boton = formDataPaciente.get('btnBuscarPaciente');

    fetch('../controller/getPaciente.php?run=' + run, {
            method: 'GET'
        })
        .then(res => res.json())
        .then(result => {
            if (run === "") {
                run.focus();
            } else { crearTablaPaciente(result); }
        }).catch(err => console.log(err));
})

function crearTablaPaciente(resultado) {
    tituloTablaPaciente.innerHTML = "";
    cuerpoTablaPaciente.innerHTML = "";
    tituloTablaPaciente.innerHTML =
        `
    <tr>
        <th scope="col"></th>
        <th scope="col">N° de INSCRIPCIÓN</th>
        <th scope="col">RUN PACIENTE</th>
        <th scope="col">NOMBRES</th>
        <th scope="col">APELLIDO PATERNO</th>
        <th scope="col">APELLIDO MATERNO</th>
        <th scope="col">FECHA DE NACIMIENTO</th>
        <th scope="col">SEXO</th>
        <th scope="col">PARTICIPACIÓN SOCIAL</th>
        <th scope="col">ESTUDIOS</th>
        <th scope="col">ACTIVIDAD LABORAL</th>
        <th scope="col">DIRECCIÓN</th>
        <th scope="col">SECTOR</th>
        <th scope="col">TELEFONO</th>
        <th scope="col">ESTADO CIVIL</th>
        <th scope="col">COMUNA</th>
        <th scope="col">ESTADO</th>
    </tr>
    `
    for (const r of resultado) {
        cuerpoTablaPaciente.innerHTML +=
            `
            <tr>
            <td>
            <button type="button" class="btn btn-outline-success" onclick="getTarjeton(${r.id_Paciente})">
            <img src="../img/baseline_done_black_18dp.png" class="rounded" alt="...">
            </button>
            </td>
            <td class="table-light">${r.id_Paciente}</td>
            <td class="table-light">${r.run_Paciente}</td>
            <td class="table-light">${r.nombres}</td>
            <td class="table-light">${r.apellidoPaterno}</td>
            <td class="table-light">${r.apellidoMaterno}</td>
            <td class="table-light">${r.fechaNacimiento}</td>
            <td class="table-light">${r.sexo}</td>
            <td class="table-light">${r.participacionSocial}</td>
            <td class="table-light">${r.estudio}</td>
            <td class="table-light">${r.actividadLaboral}</td>
            <td class="table-light">${r.direccionParticular}</td>
            <td class="table-light">${r.sector}</td>
            <td class="table-light">${r.fono}</td>
            <td class="table-light">${r.estadoCivil}</td>
            <td class="table-light">${r.comuna}</td>
            </tr>
`
    }
}

function getTarjeton(id) {
    fetch('../controller/getTarjeton.php?id=' + id, {
            method: 'GET'
        })
        .then(res => res.json())
        .then(result => {
            mostrarTarjeton(result);
            console.log(result);
        }).catch(err => console.log(err));
}

function mostrarTarjeton(datos) {
    tituloTablaTarjeton.innerHTML = "";
    cuerpoTablaTarjeton.innerHTML = "";
    tituloTablaTarjeton.innerHTML +=
        `
            <tr>
                <button type="button" id="btnNewTarjeton" class="btn btn-lg btn-outline-info" onclick="getParametros()">Agregar</button>
            </tr>
            <tr>
                <th scope="col">Fecha Atención</th>
                <th scope="col">Nombre profesional</th>
                <th scope="col">Observación</th>
                  
                <th scope="col">Peso Paciente</th>
                <th scope="col">Altura/Talla</th>
                <th scope="col">Indice de Masa Corporal</th>
                <th scope="col">Diagnostico Nutricional</th>
                <th scope="col">PA Sistolica</th>
                <th scope="col">PA Distolica</th>
                <th scope="col">Circunferencia Cintura</th>

                <th scope="col">Fecha de Examen</th>
                <th scope="col">Examen</th>
                <th scope="col">Valor de Examen</th>
                
                <th scope="col">Fecha Evaluación Pie Diabetico</th>
                <th scope="col">Puntaje Pie Diabetico</th>
                <th scope="col">Fecha Qualidiab</th>
                <th scope="col">Qualidiab</th>
                <th scope="col">Fecha Fondo de Ojo</th>
                <th scope="col">Resultado de Fondo de Ojo</th>
                
                <th scope="col">Enalapril</th>
                <th scope="col">Losartan</th>
                <th scope="col">Retinopatia Diabetica</th>
                <th scope="col">Amputación</th>
                <th scope="col">Insuficiencia Renal</th>
                <th scope="col">IAM</th>
                <th scope="col">ACV</th>
                
                <th scope="col">Estatinas</th>
                <th scope="col">AAS_100</th>

                <th scope="col">Autovalente</th>
                <th scope="col">Autovalente con Riesgo</th>
                <th scope="col">Riesgo de Dependencia</th>
                <th scope="col">Dependencia</th>
            </tr>
                
    `

    for (let d of datos) {
        cuerpoTablaTarjeton.innerHTML +=
            `
                <tr>
                    <th scope="row">${d.fechaAtencion}</th>
                    <td>${d.nombreProfesional}</td>
                    <td>${d.observacion}</td>
                    <td>${d.peso}</td>
                    <td>${d.talla}</td>
                    <td>${d.IMC}</td>
                    <td>${d.diagnosticoNutricional}</td>
                    <td>${d.paSistolica}</td>
                    <td>${d.paDistolica}</td>
                    <td>${d.circunferenciaCintura}</td>
                    <td>${d.fechaExamen}</td>
                    <td>${d.nombreExamen}</td>
                    <td>${d.valor}</td>
                    <td>${d.fechaEvalPieDiabetico}</td>
                    <td>${d.ptjePieDiabetico}</td>
                    <td>${d.fechaQualidiab}</td>
                    <td>${d.qualidiab}</td>
                    <td>${d.fechaFondoOjo}</td>
                    <td>${d.resultadoFondoOjo}</td>
                    <td>${d.enalapril}</td>
                    <td>${d.losartan}</td>
                    <td>${d.retinopatiaDiabetica}</td>
                    <td>${d.amputacion}</td>
                    <td>${d.insuficienciaRenal}</td>
                    <td>${d.IAM}</td>
                    <td>${d.ACV}</td>
                    <td>${d.estatinas}</td>
                    <td>${d.AAS_100}</td>
                    <td>${d.autovalente}</td>
                    <td>${d.autovalenteConRiesgo}</td>
                    <td>${d.riesgoDependencia}</td>
                    <td>${d.dependencia}</td>
                </tr>
`
    }
}

function getParametros() {
    Promise.all([
            fetch('../controller/getProfesional.php', {
                method: "GET"
            }),
            fetch('../controller/getListadoExamenes.php', {
                method: "GET"
            })
        ]).then(res => res.json())
        .then(results => {
            /*Esto en results lo manejo dejandolo en constantes o variables dependiendo de lo que necesite sera
            el array resultante del fetch obtenido*/
            const profesional = results[0];
            const listExamenes = results[1];

            nuevoTarjeton(profesional, listExamenes)
        }).catch(err => console.log(err));
}

function nuevoTarjeton(profesional, listExamenes) {
    var nuevoTarjeton = document.getElementById('seccionCreateNewTarjeton');

    var idProfesional;
    var nombreProfesional;
    for (const pro of profesional) {
        idProfesional = pro.id_Profesional;
        nombreProfesional = pro.nombre;
    }

    var idExamen;
    var nombreExamen;
    for (const l of listExamenes) {
        idExamen = l.nombre;
        nombreExamen = pro.nombre;
    }
    nuevoTarjeton.innerHTML = "";
    nuevoTarjeton.innerHTML +=
        `
        <tr>
            <form method="POST" action="../controller/createTarjeton.php">
            <td><input type="date" class="form-control" name="fechaAtencion" required></td>
            <td>
                <select id="inputState" class="form-control" name="profesional" required>
                    <option selected disabled>Seleccione una opción</option>
                    <option value='${idProfesional}'>${nombreProfesional}</option>
            </td>
            <td><input type="text" class="form-control" name="txtObservacion" placeholder="Observación" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required></td>
            <td><input type="number" class="form-control" name="txtPeso" id="peso" placeholder="Ej: 80" required></td>
            <td><input type="number" class="form-control" name="txtTalla" id="altura" onkeyup="calc_imc()" placeholder="Ej: 1,70" required></td>
            <td><input type="number" class="form-control" name="txtIMC" id="IMC" placeholder="Ej: 11,70"></td>
            <td><input type="text" class="form-control" name="diagnosticoNutricional" id="dgNutricional"><div id="errorIMC"></div></td>
            <td><input type="number" class="form-control" name="txtPaSistolica" placeholder="Ej: 130" required></td>
            <td><input type="number" class="form-control" name="txtPaDistolica" placeholder="Ej: 64" required></td>
            <td><input type="number" class="form-control" name="txtCircunferencia" placeholder="Ej: 102" required></td>
            <td>
                <select id="inputState" class="form-control" name="patologia" required>
                    <option selected disabled>Seleccione una opción</option>
                    <option>SI</option>
                    <option>NO</option>
                </select>
            </td>
            <td><input type="date" class="form-control" name="fechaExamen" required></td>
            <td>
                <select id="inputState" class="form-control" name="examen" required>
                    <option selected disabled>Seleccione una opción</option>   
                    <option value='${idExamen}'>${nombreExamen}</option>
                </select>
            </td>
            <td><input type="number" class="form-control" name="txtValorExamen" placeholder="Ej: 102" required></td>
            <td><input type="date" class="form-control" name="fechaEvPieDiabetico" required></td>
            <td><input type="number" class="form-control" name="txtPjPieDiabetico" placeholder="Ej: 102" required></td>
            <td><input type="date" class="form-control" name="fechaQualidiab" required></td>
            <td><input type="number" class="form-control" name="txtQualidiab" placeholder="Ej: 102" required></td>
            <td><input type="date" class="form-control" name="fechaFondoOjo" required></td>
            <td>
                <select id="inputState" class="form-control" name="resultadoFondoOjo" required>
                    <option selected disabled>Seleccione una opción</option>
                    <option>NORMAL</option>
                    <option>ALTERADO</option>
                </select>
            </td>
            <td>
                <select id="inputState" class="form-control" name="enalapril" required>
                    <option selected disabled>Seleccione una opción</option>
                    <option>SI</option>
                    <option>NO</option>
                </select>
            </td>
            <td>
                <select id="inputState" class="form-control" name="losartan" required>
                    <option selected disabled>Seleccione una opción</option>
                    <option>SI</option>
                    <option>NO</option>
                </select>
            </td>
            <td>
                <select id="inputState" class="form-control" name="retinopatiaDiabetica" required>
                    <option selected disabled>Seleccione una opción</option>
                    <option>SI</option>
                    <option>NO</option>
                </select>
            </td>
            <td>
                <select id="inputState" class="form-control" name="amputacion" required>
                    <option selected disabled>Seleccione una opción</option>
                    <option>SI</option>
                    <option>NO</option>
                </select>
            </td>
            <td>
                <select id="inputState" class="form-control" name="insuficienciaRenal" required>
                    <option selected disabled>Seleccione una opción</option>
                    <option>SI</option>
                    <option>NO</option>
                </select>
            </td>
            <td>
                <select id="inputState" class="form-control" name="iam" required>
                    <option selected disabled>Seleccione una opción</option>
                    <option>SI</option>
                    <option>NO</option>
                </select>
            </td>
            <td>
                <select id="inputState" class="form-control" name="acv" required>
                    <option selected disabled>Seleccione una opción</option>
                    <option>SI</option>
                    <option>NO</option>
                </select>
            </td>
            <td>
                <select id="inputState" class="form-control" name="estatinas" required>
                    <option selected disabled>Seleccione una opción</option>
                    <option>SI</option>
                    <option>NO</option>
                </select>
            </td>
            <td>
                <select id="inputState" class="form-control" name="aas100" required>
                    <option selected disabled>Seleccione una opción</option>
                    <option>SI</option>
                    <option>NO</option>
                </select>
            </td>
            <td>
                <select id="inputState" class="form-control" name="autovalente" required>
                    <option selected disabled>Seleccione una opción</option>
                    <option>SI</option>
                    <option>NO</option>
                </select>
            </td>
            <td>
                <select id="inputState" class="form-control" name="autovalenteConRiesgo" required>
                    <option selected disabled>Seleccione una opción</option>
                    <option>SI</option>
                    <option>NO</option>
                </select>
            </td>
            <td>
                <select id="inputState" class="form-control" name="riesgoDependencia" required>
                    <option selected disabled>Seleccione una opción</option>
                    <option>SI</option>
                    <option>NO</option>
                </select>
            </td>
            <td>
                <select id="inputState" class="form-control" name="dependencia" required>
                    <option selected disabled>Seleccione una opción</option>
                    <option>SI</option>
                    <option>NO</option>
                </select>
            </td>
            <td>
                <button type="button" class="btn btn-outline-primary">Enviar</button>
            </td>
            </form>
        </tr>
    `
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