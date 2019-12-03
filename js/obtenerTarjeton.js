var tituloTablaPaciente = document.getElementById('tituloTablaPaciente');
var cuerpoTablaPaciente = document.getElementById('cuerpoTablaPaciente');
var tituloTablaTarjeton = document.getElementById('tituloTablaTarjeton');
var cuerpoTablaTarjeton = document.getElementById('cuerpoTablaTarjeton');
var formGetPaciente = document.getElementById('formGetPaciente');

function clearForm() {
    tituloTablaTarjeton.innerHTML = "";
    tituloTablaPaciente.innerHTML = "";
    cuerpoTablaPaciente.innerHTML = "";
    cuerpoTablaTarjeton.innerHTML = "";
    formGetPaciente.reset();
}

formGetPaciente.addEventListener('submit', function(e) {
    e.preventDefault();
    var formDataPaciente = new FormData(formGetPaciente);
    var run = formDataPaciente.get('txtRun');

    fetch('../controller/getPaciente.php?run=' + run, {
            method: 'GET'
        })
        .then(res => res.json())
        .then(paciente => {
            if (run === "") {
                alert("Sección run esta vacia, debe ingresar algún dato");
            } else { 
                crearTablaPaciente(paciente); 
            }
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
            <td class="table-light">${r.sexo ? "MUJER" : "HOMBRE"}</td>
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
<<<<<<< HEAD
var tarjetonGlobal = "";
=======

var json = [];
>>>>>>> f708cda4d2de057f6026de6ae620e52afd7b0cca
function getTarjeton(id) {
    fetch('../controller/getTarjeton.php?id=' + id, {
            method: 'GET'
        })
        .then(res => res.json())
<<<<<<< HEAD
        .then(tarjeton => {
            if (tarjeton == "") {
=======
        .then(result => {
        json = result;
            if (result == "") {
>>>>>>> f708cda4d2de057f6026de6ae620e52afd7b0cca
                tituloTablaTarjeton.innerHTML = "";
                tituloTablaTarjeton.innerHTML +=
                `
                <tr>
                    <button type="button" id="btnNewTarjeton" 
                    class="btn btn-lg btn-outline-info"
                    data-toggle="modal" data-target="#exampleModalLong"
                    onclick="newAtencion(${id})">
                    Nuevo
                    </button>
                </tr>
                `
                cuerpoTablaTarjeton.innerHTML = "";
            } else {
<<<<<<< HEAD
                tarjetonGlobal = tarjeton;
                mostrarTarjeton(tarjeton,id);
                console.log(tarjeton);
=======
                mostrarTarjeton(result,id);
                // console.log(result);
>>>>>>> f708cda4d2de057f6026de6ae620e52afd7b0cca
            }
        }).catch(err => console.log(err));
}

function mostrarTarjeton(datos,id) {
    tituloTablaTarjeton.innerHTML = "";
    cuerpoTablaTarjeton.innerHTML = "";
     tituloTablaTarjeton.innerHTML +=
         `
         <tr>
             <button type="button" id="btnNewTarjeton" 
             class="btn btn-lg btn-outline-info"
             data-toggle="modal" data-target="#exampleModalLong"
             onclick="newAtencion(${id})">
             Nuevo
             </button>
         </tr>
         <tr>
             <th scope="col">ID</th>
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
             <th scope="col">Fecha Examen</th>
             <th scope="col">Nombre Examen</th>
             <th scope="col">Valor Examen</th>
      
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
             <th scope="col">Estado</th>
             <th scope="col">Editar</th>
             <th scope="col">Eliminar</th>
         </tr>
     `
     
    for (let d of datos) {
        var dgNutricional = d.diagnosticoNutricional;
        var dgNutricionalValor;
        if (dgNutricional == 1) {
            dgNutricionalValor = "Delgadez Severa";
        } else if (dgNutricional == 2) {
            dgNutricionalValor = "Delgadez Moderada";
        } else if (dgNutricional == 3) {
            dgNutricionalValor = "Delgadez Aceptable";
        } else if (dgNutricional == 4) {
            dgNutricionalValor = "Peso Normal";
        } else if (dgNutricional == 5) {
            dgNutricionalValor = "Sobrepeso";
        } else if (dgNutricional == 6) {
            dgNutricionalValor = "Obeso: Tipo I";
        } else if (dgNutricional == 7) {
            dgNutricionalValor = "Obeso: Tipo II";
        } else if (dgNutricional == 8) {
            dgNutricionalValor = "Obeso: Tipo III";
        }

        cuerpoTablaTarjeton.innerHTML +=
            `
            <tr>
                <td scope="row">${d.id_Tarjeton}</td>
                <td>${d.fechaAtencion}</td>
                <td>${d.nombre}</td>
                <td>${d.observacion}</td>
                <td>${d.peso}</td>
                <td>${d.talla}</td>
                <td>${d.IMC}</td>
                <td>${dgNutricionalValor}</td>
                <td>${d.paSistolica}</td>
                <td>${d.paDistolica}</td>
                <td>${d.circunferenciaCintura}</td>
                <td>${d.fechaExamen}</td>
                <td>${d.nombreExamen}</td>
                <td>${d.valor}</td>
                <td>${d.fechaEvalPieDiabetico}</td>
                <td>${d.ptjePieDiabetico}</td>
                <td>${d.fechaQualidiab}</td>
                <td>${d.qualidiab ? "SI" : "NO"}</td>
                <td>${d.fechaFondoOjo}</td>
                <td>${d.resultadoFondoOjo ? "SI" : "NO"}</td>
                <td>${d.enalapril ? "SI" : "NO"}</td>
                <td>${d.losartan ? "SI" : "NO"}</td>
                <td>${d.retinopatiaDiabetica ? "SI" : "NO"}</td>
                <td>${d.amputacion ? "SI" : "NO"}</td>
                <td>${d.insuficienciaRenal ? "SI" : "NO"}</td>
                <td>${d.IAM ? "SI" : "NO"}</td>
                <td>${d.ACV ? "SI" : "NO"}</td>
                <td>${d.estatinas ? "SI" : "NO"}</td>
                <td>${d.AAS_100 ? "SI" : "NO"}</td>
                <td>${d.autovalente ? "SI" : "NO"}</td>
                <td>${d.autovalenteConRiesgo ? "SI" : "NO"}</td>
                <td>${d.riesgoDependencia ? "SI" : "NO"}</td>
                <td>${d.dependencia ? "SI" : "NO"}</td>
                <td>${d.id_Estado ? "Activo" : "Eliminado"}</td>

<<<<<<< HEAD
                <td><button type="button" class="btn btn-outline-warning"                
                onclick="actualizarTarjeton(${d.id_Tarjeton});">
=======
                <td><button type="button" class="btn btn-outline-warning" data-toggle="modal" 
                data-target=".bd-example-modal-xl"
                onclick="actualizarTarjeton(${json})">
>>>>>>> f708cda4d2de057f6026de6ae620e52afd7b0cca
                Editar
                </button></td>
                
                <td><a href="../controller/deleteAtencion.php?id=${d.id_Tarjeton}" class="btn btn-outline-danger" role="button" aria-pressed="true">
                Eliminar
                </a></td>
            </tr>
        `
    }
}