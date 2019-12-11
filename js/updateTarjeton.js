function actualizarTarjeton(id) {
    var datos = tarjetonGlobal;
    $("#editarTarjeton").modal("show");
    datos.forEach(element => {
        if(element['id_Tarjeton'] == id){
            $("#idTarjetonE").val(element['id_Tarjeton']);
            $("#fechaAtencionE").val(element['fechaAtencion']);
            $("#idPacienteE").val(element['id_Paciente']);
            $("#profesionalE").val(element['id_Profesional']);
            $("#observacionE").val(element['observacion']);
            $("#pesoE").val(element['peso']);
            $("#tallaE").val(element['talla']);
            $("#imcE").val(element['IMC']);
            $("#diagnosticoNutricionalE").val(element['dgNutricionalE']);
            $("#paSistolicaE").val(element['paSistolica']);
            $("#paDistolicaE").val(element['paDistolica']);
            $("#circunferenciaE").val(element['circunferenciaCintura']);
            $("#fechaEvPieDiabeticoE").val(element['fechaEvalPieDiabetico']);
            $("#ptjePieDiabeticoE").val(element['ptjePieDiabetico']);
            $("#fechaQualidiabE").val(element['fechaQualidiab']);
            $("#qualidiabE").val(element['qualidiab']);
            $("#fechaFondoOjoE").val(element['fechaFondoOjo']);
            $("#resultadoFondoOjoE").val(element['resultadoFondoOjo']);
            $("#enalaprilE").val(element['enalapril']);
            $("#losartanE").val(element['losartan']);
            $("#retinopatiaDiabeticaE").val(element['retinopatiaDiabetica']);
            $("#amputacionE").val(element['amputacion']);
            $("#insuficienciaRenalE").val(element['insuficienciaRenal']);
            $("#iamE").val(element['IAM']);
            $("#acvE").val(element['ACV']);
            $("#estatinasE").val(element['estatinas']);
            $("#aas100E").val(element['AAS_100']);
            $("#autovalenteE").val(element['autovalente']);
            $("#autovalenteConRiesgoE").val(element['autovalenteConRiesgo']);
            $("#riesgoDependenciaE").val(element['riesgoDependencia']);
            $("#dependenciaE").val(element['dependencia']);
            
            var idExamen = element['idExamen'];
            var fechaExamen = element['fechaExamen'];
            var valorExamen = element['valor'];
            var nombreExamen = element['nombreExamen'];

            var examen = {};
            examen.id = idExamen;
            examen.fecha = fechaExamen;
            examen.valor = valorExamen;
            examen.nombre = nombreExamen;

            var listaExamen = [];
            listaExamen.push(examen);

            inputJson = document.getElementById("jsonExamenesE");
            inputJson.value = JSON.stringify(listaExamen);

            var td = '<tr>'+
            '<td width="15%">' + fechaExamen + '</td>'+
            '<td width="2">' + idExamen + '</td>'+
            '<td width="18%">' + nombreExamen + '</td>'+
            '<td width="2%">' + valorExamen + '</td>'+
            '</tr>';
          
            $('#respE tbody').append(td);
            calc_imcE();
        }
    })
}

function calc_imcE() {
    var altura = document.getElementById("tallaE").value;
    altura = altura.toString().replace(',', '.');
    var alturaMetro = altura / 100;
    var peso = document.getElementById("pesoE").value;

    if (altura == "") {
        document.getElementById("errorIMCE").innerHTML = "Por favor, introduce tu altura.";
    } else if (altura < 0) {
        document.getElementById("errorIMCE").innerHTML = "La altura que ingrese debe ser positiva.";
    } else if (altura < 20) {
        document.getElementById("errorIMCE").innerHTML = "Ha introducido la altura en metros. Por favor, multipliquela por 100 para introducirla en centimetros";
    } else {
        document.getElementById("errorIMCE").innerHTML = "";
        if (peso == "") {
            document.getElementById("errorIMCE").innerHTML = "Por favor, introduce tu peso.";
        } else if (peso < 0) {
            document.getElementById("errorIMCE").innerHTML = "El peso que ingrese debe ser positivo.";
        } else {
            document.getElementById("errorIMCE").innerHTML = "";

            /*CALCULO IMC*/
            var alturaCuadrado = alturaMetro * alturaMetro;
            var imc = peso / alturaCuadrado;
            document.getElementById("imcE").value = Math.round(imc * 100) / 100;
            /*CALCULO DESCRIPCION IMC*/
            if (imc < 16) {
                document.getElementById("dgNutricionalE").value = "Delgadez Severa";
            } else if (imc < 17) {
                document.getElementById("dgNutricionalE").value = "Delgadez Moderada";
            } else if (imc < 18.5) {
                document.getElementById("dgNutricionalE").value = "Delgadez Aceptable";
            } else if (imc < 25) {
                document.getElementById("dgNutricionalE").value = "Peso Normal";
            } else if (imc < 30) {
                document.getElementById("dgNutricionalE").value = "Sobrepeso";
            } else if (imc < 35) {
                document.getElementById("dgNutricionalE").value = "Obeso: Tipo I";
            } else if (imc < 40) {
                document.getElementById("dgNutricionalE").value = "Obeso: Tipo II";
            } else if (imc >= 40) {
                document.getElementById("dgNutricionalE").value = "Obeso: Tipo III";
            }
        }
    }
}