<canvas id="myChart5"></canvas>
<span class="label-text text-light">LEAD II</span>
<script>

    let updateInterval_lead2;
    let myChart_lead2;

    function updateChart_lead2() {
        $.ajax({
            url: '/api/getData.php',
            method: 'POST',
            data:{
                case:'lead2'
            },
            success: function(data) {
                let res = JSON.parse(data)
                // console.log(res.labelloop)
                myChart_lead2.data.labels = res.labelloop;
                myChart_lead2.data.datasets[0].data = res.dataloop;
                myChart_lead2.update();
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
        });
    }

    const ctx5 = document.getElementById('myChart5').getContext('2d');
    myChart_lead2 = new Chart(ctx5, {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                label: 'LEAD II',
                data: [],
                borderWidth: 1,
                borderColor: borLineColor,
                backgroundColor: 'rgba(0, 0, 0, 0.1)',
                tension: 0.2,
                pointRadius: 0
            }]
        },
        options: {
            animation: {
                duration: 0
            },
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

    updateInterval_lead2 = setInterval(updateChart_lead2,250);
</script>