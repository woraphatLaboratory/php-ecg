<?php
include ('../connect.php') ;

for($i=1;$i<400;$i++){
    $sql = "INSERT INTO data_ecg_6_lead SELECT * FROM data_test WHERE time_id = ".$i;
    $result = $conn->query($sql);
    sleep(0.25);
}
