function actualizarTarjeton(id) {
    var datos = tarjetonGlobal;
    $("#editarTarjeton").modal("show");
    datos.forEach(Element => {
        if(Element['id_Tarjeton'] == id){
            $("#idTarjetonE").val(Element['id_Tarjeton']);
            $("#fechaAtencionE").val(Element['fechaAtencion']);
            $("#idPacienteE").val(Element['id_Paciente']);
            $("#profesionalE").val(Element['id_Profesional']);
            $("#observacionE").val(Element['observacion']);
            $("#pesoE").val(Element['peso']);
            $("#tallaE").val(Element['talla']);
            $("#imcE").val(Element['IMC']);
            $("#diagnosticoNutricionalE").val(Element['dgNutricionalE']);
            $("#paSistolicaE").val(Element['paSistolica']);
            $("#paDistolicaE").val(Element['paDistolica']);
            $("#circunferenciaE").val(Element['circunferenciaCintura']);
            $("#fechaEvPieDiabeticoE").val(Element['fechaEvalPieDiabetico']);
            $("#ptjePieDiabeticoE").val(Element['ptjePieDiabetico']);
            $("#fechaQualidiabE").val(Element['fechaQualidiab']);
            $("#qualidiabE").val(Element['qualidiab']);
            $("#fechaFondoOjoE").val(Element['fechaFondoOjo']);
            $("#resultadoFondoOjoE").val(Element['resultadoFondoOjo']);
            $("#enalaprilE").val(Element['enalapril']);
            $("#losartanE").val(Element['losartan']);
            $("#retinopatiaDiabeticaE").val(Element['retinopatiaDiabetica']);
            $("#amputacionE").val(Element['amputacion']);
            $("#insuficienciaRenalE").val(Element['insuficienciaRenal']);
            $("#iamE").val(Element['IAM']);
            $("#acvE").val(Element['ACV']);
            $("#estatinasE").val(Element['estatinas']);
            $("#aas100E").val(Element['AAS_100']);
            $("#autovalenteE").val(Element['autovalente']);
            $("#autovalenteConRiesgoE").val(Element['autovalenteConRiesgo']);
            $("#riesgoDependenciaE").val(Element['riesgoDependencia']);
            $("#dependenciaE").val(Element['dependencia']);
            
            var idExamen = Element['idExamen'];
            var fechaExamen = Element['fechaExamen'];
            var valorExamen = Element['valor'];
            var nombreExamen = Element['nombreExamen'];

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
            '<td width="100">' + fechaExamen + '</td>'+
            '<td width="30" style="text-align:right">' + idExamen.replace(/\n/g, "<br />") + '</td>'+
            '<td width="200">' + nombreExamen.replace(/\n/g, "<br />") + '</td>'+
            '<td width="30" style="text-align:right">' + valorExamen.replace(/\n/g, "<br />") + '</td>'+
            '</tr>';
          
            $('#respuestaE').html(td);
            calc_imcE();
        }
    });
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