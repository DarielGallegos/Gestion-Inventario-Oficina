var today = new Date();
window.onload = () => {
    document.getElementById("dateEntrega").value = today.getFullYear() +'-'+('0'+(today.getMonth()+1))+'-'+ today.getDate();
}

function agregarBoton() {
    let nombre = $(" ").val();
    let cantidadP = $("").val();

    let datos = "<tr><td>" + nombre + "</td><td>" + cantidadP+ "</td><td><button class='botonElimninar' onclick='eliminar(event);'>Eliminar</button></td></tr>";
    let fila = document.createElement("tr");
    fila.innerHTML = datos;

    $("#tabla").append(fila);

    
    let div_msg_vacio = document.getElementById('div_msg_vacio');
    if(div_msg_vacio)
        div_msg_vacio.remove();
}