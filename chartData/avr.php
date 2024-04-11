<canvas id="myChart2"></canvas>
<span class="label-text text-light">aVR</span>

<script>
    let updateInterval_avr;
    let myChart_avr;
    // Function สำหรับดึงข้อมูลและอัปเดตแผนภูมิ
    function updateChart_avr() {
        $.ajax({
            url: '/api/getData.php',
            method: 'POST',
            data:{
                case:'avr'
            },
            success: function(data) {
                let res = JSON.parse(data)
                // console.log(res.labelloop)
                myChart_avr.data.labels = res.labelloop;
                myChart_avr.data.datasets[0].data = res.dataloop;
                myChart_avr.update();
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
        });
    }
    const ctx2 = document.getElementById('myChart2').getContext('2d');
    myChart_avr =  new Chart(ctx2, {
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

    updateInterval_avr = setInterval(updateChart_avr, 250);
</script>
