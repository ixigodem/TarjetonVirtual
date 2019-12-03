var formGetPatologia = document.getElementById("formGetPatologia");
var tituloTablaGestion = document.getElementById("tituloTablaGestion");
var cuerpoTablaGestion = document.getElementById("cuerpoTablaGestion");

function clearForm() {
    tituloTablaGestion.innerHTML = "";
    cuerpoTablaGestion.innerHTML = "";
    formGetPatologia.reset();
}

formGetPatologia.addEventListener("submit", function(e){
    e.preventDefault();

    var formDataPatologia = new FormData(formGetPatologia);
    var patologia = formDataPatologia.get('cboPatologia');

    console.log(patologia);

    fetch('../controller/getCantidadPorPatologia.php?patologia=' + patologia, {
        method: 'GET'
    })
    .then(res => res.json())
    .then(result => {
        if (patologia === "Seleccione una opción") {
            clearForm();
            alert("¡¡Patologia no seleccionada, debe elegir una!!");
        }else{
            crearTabla(patologia,result)
            console.log(result);
        }
    }).catch(err => console.log(err));
})

function crearTabla(patologia,resultado){
    tituloTablaGestion.innerHTML = "";
    cuerpoTablaGestion.innerHTML = "";
    tituloTablaGestion.innerHTML = `
    <tr>
    <h3>Cantidad de pacientes por patología</h3>
    </tr>
    <tr>
        <th scope="col">PATOLOGIA</th>
        <th scope="col">0 - 4</th>
        <th scope="col">5 - 9</th>
        <th scope="col">10 - 19</th>
        <th scope="col">20 - 29</th>
        <th scope="col">30 - 39</th>
        <th scope="col">40 - 49</th>
        <th scope="col">50 - 59</th>
        <th scope="col">60 - 69</th>
        <th scope="col">70 - 79</th>
        <th scope="col">80 y mas</th>
    </tr>
    `;

    for (const r of resultado) {
        console.log(r);
        cuerpoTablaGestion.innerHTML = `
            <td class="table-light">${patologia}</td>
            <td class="table-light">${r.cero}</td>
            <td class="table-light">${r.cinco}</td>
            <td class="table-light">${r.diez}</td>
            <td class="table-light">${r.veinte}</td>
            <td class="table-light">${r.treinta}</td>
            <td class="table-light">${r.cuarenta}</td>
            <td class="table-light">${r.cincuenta}</td>
            <td class="table-light">${r.sesenta}</td>
            <td class="table-light">${r.setenta}</td>
            <td class="table-light">${r.ochenta}</td>
        `
    }
}