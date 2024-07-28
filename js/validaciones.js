function validarVuelo() {
    let origen = document.getElementById('origen').value;
    let destino = document.getElementById('destino').value;
    let fecha = document.getElementById('fecha').value;
    let plazas = document.getElementById('plazas_disponibles').value;
    let precio = document.getElementById('precio').value;

    if (origen === "" || destino === "" || fecha === "" || plazas === "" || precio === "") {
        alert("Todos los campos son obligatorios.");
        return false;
    }
    return true;
}

function validarHotel() {
    let nombre = document.getElementById('nombre').value;
    let ubicacion = document.getElementById('ubicacion').value;
    let habitaciones = document.getElementById('habitaciones_disponibles').value;
    let tarifa = document.getElementById('tarifa_noche').value;

    if (nombre === "" || ubicacion === "" || habitaciones === "" || tarifa === "") {
        alert("Todos los campos son obligatorios.");
        return false;
    }
    return true;
}
