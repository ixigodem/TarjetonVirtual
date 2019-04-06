// alert('esta funcionando el JS');
console.log('esta funcionando el JS');


function cargarInformacion() {
    var respuesta = document.getElementById('respuesta');
    var fechaPatologias = document.querySelector("#formPatologia #fechaPatologias").value;
    var Patologia_ID = document.querySelector("#formPatologia #Patologia_ID").value;
    // var Patologia = document.querySelector("#formPatologia #Patologia_ID :selected").text;

    formulario = new FormData();
    formulario.append('fechaPatologias', document.querySelector("#formPatologia #fechaPatologias").value);
    formulario.append('Patologia_ID', document.querySelector("#formPatologia #Patologia_ID").value);
    // formulario.append('nombre', Patologia);

    console.log('me diste click');
    console.log(fechaPatologias)
    console.log(Patologia_ID)

    $.ajax({
        method: 'post',
        processData: false,
        contentType: false,
        cache: false,
        data: formulario,
        enctype: 'multipart/form-data',
        url: '../controller/crearPatologia.php',
        success: function(response) {
            // console.log('llego bien todo');
            // $(respuesta).html(response);
            for (let d of response) {
                console.log(d)
                respuesta.innerHTML = `
                                <th scope="row">
                                    <td>${d}</td>
                                    <td><a class="btn-floating disabled"><i class="material-icons">remove</i></a></td>
                                </th>
                                `
            }
        }
    });

    // console.log(Patologia)
    /*
        fetch('../controller/crearPatologia.php', {
                method: 'POST',
                body: formulario
            })
            .then(res => res.json())
            .then(data => {
                if (data === 'error') {
                    respuesta.innerHTML = `
                    <div class="alert alert-danger" role="alert" >
                        Llena todos los datos
                    </div>
                    `
                } else {
                    console.log(data)
                    for (let i = 0; i < data.length; i++) {
                        const element = data[i];
                        console.log(element[i])
                    }
                    for (let d of data) {
                        console.log(d)
                        respuesta.innerHTML = `
                                <th scope="row">
                                    <td>${d.value}</td>
                                    <td><a class="btn-floating disabled"><i class="material-icons">remove</i></a></td>
                                </th>
                                `
                    }
                }
            })*/
}