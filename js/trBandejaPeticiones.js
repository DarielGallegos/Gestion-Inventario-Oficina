function ventanaFormaPeticion(prm_id) {
    console.log(prm_id)
    let ventana = document.getElementById('ventana_forma_id');
    ventana.classList.remove('oculto');
}

function cerrarVentanaPeticion(e){
    e.preventDefault();
    let ventana = document.getElementById('ventana_forma_id');
    ventana.classList.add('oculto');
}