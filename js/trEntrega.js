var today = new Date();
window.onload = () => {
    document.getElementById("dateEntrega").value = today.getFullYear() +'-'+('0'+(today.getMonth()+1))+'-'+ today.getDate();
}