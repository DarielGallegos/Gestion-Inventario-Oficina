function agregarBoton() {
    let id = $(" ").val();
    let idProducto = $("#listProducto").val();
    let cantidadP = $("#inpCantidad").val();
    let nombre = $("#listProducto").find("option:selected").text();

    let datos = "<tr><td>" + id + "</td><td>" + idProducto + "</td><td>"+ nombre  + "</td><td>" + cantidadP + "</td><td>" + "</td><td><button class='botonElimninar' onclick='eliminar(event);'>Eliminar</button></td></tr>";
    let fila = document.createElement("tr");
    fila.innerHTML = datos;

    $("#tabla").append(fila);

    
    let div_msg_vacio = document.getElementById('div_msg_vacio');
    if(div_msg_vacio)
        div_msg_vacio.remove();
}