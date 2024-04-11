<canvas id="myChart9"></canvas>
<span class="label-text text-light">LEAD III</span>
<script>
    let updateInterval_lead3;
    let myChart_lead3;

    function updateChart_lead3() {
        $.ajax({
            url: '/api/getData.php',
            method: 'POST',
            data:{
                case:'lead3'
            },
            success: function(data) {
                let res = JSON.parse(data)
                // console.log(res.labelloop)
                myChart_lead3.data.labels = res.labelloop;
                myChart_lead3.data.datasets[0].data = res.dataloop;
                myChart_lead3.update();
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
        });
    }
    const ctx9 = document.getElementById('myChart9').getContext('2d');
    myChart_lead3 = new Chart(ctx9, {
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

    updateInterval_lead3 = setInterval(updateChart_lead3, 250);
</script>
