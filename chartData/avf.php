<canvas id="myChart10"></canvas>
<span class="label-text text-light">aVF</span>
<script>
    let updateInterval_avf;
    let myChart_avf;

    function updateChart_avf() {
        $.ajax({
            url: '/api/getData.php',
            method: 'POST',
            data:{
                case:'avf'
            },
            success: function(data) {
                let res = JSON.parse(data)
                // console.log(res.labelloop)
                myChart_avf.data.labels = res.labelloop;
                myChart_avf.data.datasets[0].data = res.dataloop;
                myChart_avf.update();
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
        });
    }
    const ctx10 = document.getElementById('myChart10').getContext('2d');
    myChart_avf = new Chart(ctx10, {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                label: 'avf',
                data: [],
                borderWidth: 1,
                borderColor: borLineColor,
                backgroundColor: 'rgba(0, 0, 0, 0.1)',
                tension: 0.2,
                pointRadius: 0
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {

                    ticks: {
                        display: false
                    },
                    border: {
                        dash: [2, 4],
                    },
                    // grid: {
                    //     color: 'white',
                    //     // drawOnChartArea: false,
                    //     lineWidth: 0.1,
                    //     border: {
                    //         dash: [2, 4],
                    //     },
                    // }
                },
                x: {
                    // display: false,
                    ticks: {
                        display: false
                    },
                    border: {
                        dash: [2, 4],
                    },
                    // grid: {
                    //     color: 'white',
                    //     lineWidth: 0.1,
                    //
                    // }
                }
            }
        }
    });

    updateInterval_avf = setInterval(updateChart_avf,  250);
</script>
