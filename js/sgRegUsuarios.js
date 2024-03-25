function agregarBoton() {

    let id = $(" ").val();
    let nombre = $(" ").val();
    let usuario = $("#inpuser").val();
    let departamento = $("").val();

    let datos = "<tr><td>" + id + "</td><td>" + nombre + "</td><td>" + usuario+ "</td><td>" + departamento+"</td><td><button class='botonElimninar' onclick='eliminar(event);'>Eliminar</button></td></tr>";
    let fila = document.createElement("tr");
    fila.innerHTML = datos;

    $("#tabla").append(fila);

    
    let div_msg_vacio = document.getElementById('div_msg_vacio');
    if(div_msg_vacio)
        div_msg_vacio.remove();
}