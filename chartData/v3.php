<canvas id="myChart11"></canvas>
<span class="label-text text-light">V3</span>
<script>
    let updateInterval_v3;
    let myChart_v3;

    function updateChart_v3() {
        $.ajax({
            url: '/api/getData.php',
            method: 'POST',
            data:{
                case:'v3'
            },
            success: function(data) {
                let res = JSON.parse(data)
                // console.log(res.labelloop)
                myChart_v3.data.labels = res.labelloop;
                myChart_v3.data.datasets[0].data = res.dataloop;
                myChart_v3.update();
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
        });
    }

     const ctx11 = document.getElementById('myChart11').getContext('2d');
    myChart_v3 =  new Chart(ctx11, {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                label: 'LEAD I',
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

    const updateIntervalSeconds_v3 = 3;
    updateInterval_v3 = setInterval(updateChart_v3, updateIntervalSeconds_v3 * 1000);
</script>
