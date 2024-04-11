<canvas id="myChart1"></canvas>
<span class="label-text text-light">LEAD I</span>
<script>
    let updateInterval_lead1;
    let myChart_lead1;
    // Function สำหรับดึงข้อมูลและอัปเดตแผนภูมิ
    function updateChart_lead1() {
        $.ajax({
            url: '/api/getData.php',
            method: 'POST',
            data:{
                case:'lead1',
                subCase: 'noSelect'
            },
            success: function(data) {
                // ปรับปรุงข้อมูลแผนภูมิ
                let res = JSON.parse(data)
                // console.log(res.labelloop)
                myChart_lead1.data.labels = res.labelloop;
                myChart_lead1.data.datasets[0].data = res.dataloop;
                myChart_lead1.update();
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
        });
    }


    const ctx1 = document.getElementById('myChart1').getContext('2d');
    // const borLineColor = '#BD242A'
    myChart_lead1 =  new Chart(ctx1, {
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
                        // dash: [2, 4],
                    },
                    // grid: {
                    //     // color: 'white',
                    //     // drawOnChartArea: false,
                    //     // lineWidth: 0.1,
                    //     border: {
                    //         // dash: [2, 4],
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

    updateInterval_lead1 = setInterval(updateChart_lead1, 250);
</script>
