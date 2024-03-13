var today = new Date();
window.onload = () => {
    document.getElementById("dateEntrega").value = today.getFullYear() +'-'+('0'+(today.getMonth()+1))+'-'+ today.getDate();
}

function agregarBoton() {
    let produc = $("#listProducto").val();
    let cantidadP = $("#inpCantidad").val();
    let nombreEmp = $("#NomEmpleado").val();

    let datos = "<tr><td>" + produc + "</td><td>" + cantidadP + "</td><td>" + nombreEmp + "</td><td>" + "</td><td><button class='botonElimninar' onclick='eliminar(event);'>Eliminar</button></td></tr>";
    let fila = document.createElement("tr");
    fila.innerHTML = datos;

    $("#tabla").append(fila);
}

function eliminar(event) {
    let fila = event.target.parentNode.parentNode;
    fila.remove();
}