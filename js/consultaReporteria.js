function mostrar() {

    document.getElementById('tablaE').style.display = 'block';
    document.getElementById('grafico').style.display = 'none';

}

google.charts.load('current', {
    'packages': ['corechart']
});
google.charts.setOnLoadCallback(dibujarGrafico);

function dibujarGrafico() {

    var data = google.visualization.arrayToDataTable([
        ['Inventario', 'Productos'],
        ['resma papel', 11],
        ['Marcadores', 2],
        ['Grapadora', 5]

    ]);

    var options = {
        title: 'Stock de Productos',
        pieHole: 0.4,
        width: 650,
        height: 500
    };

    var chart = new google.visualization.PieChart(document.getElementById('grafico'));
    chart.draw(data, options);
}
<script src=".././js/bootstrap.bundle.min.js"></script>