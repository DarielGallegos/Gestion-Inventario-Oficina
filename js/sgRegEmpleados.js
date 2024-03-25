
function agregarBoton() {
    let dni = $("#dni").val();
    let nombre = $("#inpnombre").val();
    let apellido = $("#inpapellidos").val();
    let genero = $("#listGenero").val();
    let edad = $("#inpfechaN").val();
    let telefono = $("#inptelefono").val();
    let correo = $("#inpcorreo").val();

    let datos = "<tr><td>" + dni + "</td><td>" + nombre + "</td><td>" + apellido + "</td><td>" + genero + "</td><td>" + edad+ "</td><td>" + telefono + "</td><td>" + correo + "</td><td>" +"</td><td><button class='botonElimninar' onclick='eliminar(event);'>Eliminar</button></td></tr>";
    let fila = document.createElement("tr");
    fila.innerHTML = datos;

    $("#tabla").append(fila);

    
    let div_msg_vacio = document.getElementById('div_msg_vacio');
    if(div_msg_vacio)
        div_msg_vacio.remove();
}