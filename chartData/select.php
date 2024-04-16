<div style="height: 150px;width: 940px;">
    <canvas id="myChart13" style="height: 150px;width: 940px"></canvas>
</div>

<span class="label-text text-light"><?php echo $_POST['case']; ?></span>
<input class="selectData" id="selectData" name="selectData" value="<?php echo $_POST['case']; ?>" hidden >
<script>

     selectData = $('#selectData').val()
    // alert(selectData)
    function updateChart_select() {
        $.ajax({
            url: '/api/getData.php',
            method: 'POST',
            data:{
                case:selectData,
                subCase:'select'
            },
            success: function(data) {
                let res = JSON.parse(data)
                // console.log(res.labelloop)
                myChart_select.data.labels = res.labelloop;
                myChart_select.data.datasets[0].data = res.dataloop;
                myChart_select.update();
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
        });
    }
     ctx13 = document.getElementById('myChart13').getContext('2d');
     var minSet
     var maxSet
     var stepSet
     if(selectData === 'lead3'){
          minSet = -1000000
          maxSet = 2500000
          stepSet = 1000000
     }else if(selectData === 'avr'){
             minSet = -14500000
              maxSet = -11000000
              stepSet =1000000
     }else if(selectData === 'avl'){
             minSet = 5000000
              maxSet = 8500000
              stepSet =1000000
     }else if(selectData === 'avf'){
             minSet = 4500000
              maxSet = 8000000
              stepSet =1000000
     }else{
          minSet = 11000000
          maxSet = 14500000
          stepSet = 1000000
     }
         myChart_select = new Chart(ctx13, {
             type: 'line',
             data: {
                 // labels:[1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1],
                 labels:[],
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
                         min: minSet, // ค่าต่ำสุดของแกน Y
                         max: maxSet, // ค่าสูงสุดของแกน Y

                         ticks: {
                             display: false,
                             stepSize: stepSet
                         },
                         border: {
                             // dash: [2, 4],
                         },
                         grid: {
                             color: 'white',
                             // drawOnChartArea: false,
                             lineWidth: 0.1,
                             // border: {
                             //     dash: [2, 4],
                             // },
                         }
                     },
                     x: {
                         // display: false,
                         ticks: {
                             display: false
                         },
                         border: {
                             // dash: [2, 4],
                         },
                         grid: {
                             color: function(context) {
                                 console.log(context.tick)
                                 // var min = 58;
                                 var min = 7;
                                 var max = 449;
                                 var step = 17;

                                 if (context.tick.value >= min && context.tick.value <= max && (context.tick.value - min) % step === 0) {
                                     return 'white';
                                 } else {
                                     return '';
                                 }
                                 // if ([58, 75, 92, 109, 126, 143, 228, 313, 398].includes(context.tick.value)) {
                                 //     return 'white';
                                 // } else {
                                 //     return '';
                                 // }


                             },
                             lineWidth: 0.1,
                         }
                     }
                 }
             }
         });




    updateInterval_select = setInterval(updateChart_select, 250);
</script>
