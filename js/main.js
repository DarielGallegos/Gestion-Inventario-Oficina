window.onload = () => {
    //Dough Chart
    const chartDoug = document.getElementById('chart');
    $.post('.././controllers/ctrlMain.php',{
        peticion: 'getData',
        param: 1
    }).done((response) => {
        const data = {
            labels: response.data.map(row => row['Insumo']+"  "+"N°"+row['Serial Insumo'] + "-" + row['INSUMO CATALOGO']),
            datasets: [{
                label: 'Salida Total ',
                data: response.data.map(row => row['Salida']),
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
            }]
        }
        const config = {
            type: 'doughnut',
            data: data,
            options: {
                rotation: 270,
                circumference: 180,
                plugins: {
                    title: {
                       display: true,
                       text: "Insumos con más Salidas",
                       padding: {
                            top: 10,
                            bottom: 30
                       },
                       align : 'center',
                       font: {
                            weight: 'bold',
                            size: 25,
                            family: 'Poppins',
                       }
                    }
                }
            },
        }
        new Chart(chartDoug, config);
    });
    //Fin Dough Chart

    //Chart Bar
    const chartBar = document.getElementById("chartBar");
    $.post('.././controllers/ctrlMain.php', {
        peticion: 'getData',
        param: 2
    }).done((response) => {
        const dataBar = {
            labels: response.data.map(row => row['nombre']+"  "+"N°"+row['Serial Insumo'] + "-" + row['INSUMO CATALOGO']),
            datasets: [{
                type: 'bar',
                label: 'Pedido Total ',
                data: response.data.map(row => row['Pedido']),
                borderColor: 'rgb(255, 99, 132)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)'
            }]
        };
        const configBar = {
            type: 'scatter',
            data: dataBar,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    title: {
                       display: true,
                       text: "Insumos más Solicitados",
                       padding: {
                            top: 10,
                            bottom: 30
                       },
                       align : 'center',
                       font: {
                            weight: 'bold',
                            size: 25,
                            family: 'Poppins',
                       }
                    }
                }
            }
        };
        new Chart(chartBar, configBar);
    
    })
    //Fin Chart Bar

    //Polar Chart
    const chartPolar = document.getElementById("chartPolar");
    $.post('.././controllers/ctrlMain.php', {
        peticion: 'getData',
        param: 3
    }).done((response) => {
        const data = {
            labels: response.data.map(row => row['Departamento']),
            datasets: [{
              label: 'Total de Pedidos',
              data: response.data.map(row => row['Total de Pedidos']),
              backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(75, 192, 192)',
                'rgb(255, 205, 86)',
                'rgb(201, 203, 207)',
                'rgb(54, 162, 235)'
              ]
            }]
          };
        const config = {
           type: 'polarArea',
           data: data,
           options: {
            plugins: {
                title: {
                   display: true,
                   text: "Total de Pedidos Por Departamento",
                   padding: {
                        top: 10,
                        bottom: 30
                   },
                   align : 'center',
                   font: {
                        weight: 'bold',
                        size: 25,
                        family: 'Poppins',
                   }
                }
            }
           }
        };
        new Chart(chartPolar, config);
    })
    //Fin Polar Chart
};