
function agregarBoton() {
    let id = $(" ").val();
    let nombre = $("#nombre").val();
    let descripcion= $("#descripcion").val();
    let categoria = $("#categoria").find("option:selected").text();

    let datos = "<tr><td>" + id + "</td><td>" + nombre + "</td><td>" + descripcion + "</td><td>" + categoria + "</td><td> <button class='botonElimninar' onclick='eliminar(event);'>Eliminar</button></td></tr>";
    let fila = document.createElement("tr");
    fila.innerHTML = datos;

    $("#tabla").append(fila);

    let div_msg_vacio = document.getElementById('div_msg_vacio');
    if(div_msg_vacio)
        div_msg_vacio.remove();
}