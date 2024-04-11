<?php
include ('../connect.php') ;

$betweenClaus = 'BETWEEN 0 AND 150' ;

if($_POST['case'] == 'lead1') {
    if($_POST['subCase'] == 'select'){
        $sql = "SELECT time_id,lead_1 FROM data_ecg_6_lead WHERE time_id BETWEEN 0 AND 450";
        $result = $conn->query($sql);
        $id = array();
        $values = array();
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($id, $row['time_id']);
            array_push($values, $row['lead_1']);
        }
        $data = array(
            "labelloop" => $id,
            "dataloop" => $values
        );
    }else{
        $sql = "SELECT time_id,lead_1 FROM data_ecg_6_lead WHERE time_id ".$betweenClaus;
        $result = $conn->query($sql);
        $id = array();
        $values = array();
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($id, $row['time_id']);
            array_push($values, $row['lead_1']);
        }
        $data = array(
            "labelloop" => $id,
            "dataloop" => $values
        );
    }
    echo json_encode($data);
}

if($_POST['case'] == 'avr'){
    $sql = "SELECT time_id,aVR FROM data_ecg_6_lead WHERE time_id ".$betweenClaus;
    $result = $conn->query($sql);
    $id = array() ;
    $values = array() ;
    while ($row = mysqli_fetch_assoc($result)){
        array_push($id,$row['time_id']) ;
        array_push($values,$row['aVR']) ;
    }
    $data = array(
        "labelloop"=>$id,
        "dataloop"=>$values
    );
    echo json_encode($data) ;
}

if($_POST['case'] == 'v1'){
    $sql = "SELECT time_id,aVR FROM data_ecg_6_lead WHERE time_id ".$betweenClaus;
    $result = $conn->query($sql);
    $id = array() ;
    $values = array() ;
    $i = 0 ;
    while ($row = mysqli_fetch_assoc($result)){
        array_push($id,$i) ;
        array_push($values,0) ;
        $i++;
    }
    $data = array(
        "labelloop"=>$id,
        "dataloop"=>$values
    );
    echo json_encode($data) ;
}

if($_POST['case'] == 'v4'){
    $sql = "SELECT time_id,aVR FROM data_ecg_6_lead WHERE time_id ".$betweenClaus;
    $result = $conn->query($sql);
    $id = array() ;
    $values = array() ;
    $i = 0 ;
    while ($row = mysqli_fetch_assoc($result)){
        array_push($id,$i) ;
        array_push($values,0) ;
        $i++;
    }
    $data = array(
        "labelloop"=>$id,
        "dataloop"=>$values
    );
    echo json_encode($data) ;
}

if($_POST['case'] == 'lead2'){
    $sql = "SELECT time_id,lead_2 FROM data_ecg_6_lead WHERE time_id ".$betweenClaus;
    $result = $conn->query($sql);
    $id = array() ;
    $values = array() ;
    while ($row = mysqli_fetch_assoc($result)){
        array_push($id,$row['time_id']) ;
        array_push($values,$row['lead_2']) ;
    }
    $data = array(
        "labelloop"=>$id,
        "dataloop"=>$values
    );
    echo json_encode($data) ;
}

if($_POST['case'] == 'avl'){
    $sql = "SELECT time_id,aVL FROM data_ecg_6_lead WHERE time_id ".$betweenClaus;
    $result = $conn->query($sql);
    $id = array() ;
    $values = array() ;
    while ($row = mysqli_fetch_assoc($result)){
        array_push($id,$row['time_id']) ;
        array_push($values,$row['aVL']) ;
    }
    $data = array(
        "labelloop"=>$id,
        "dataloop"=>$values
    );
    echo json_encode($data) ;
}

if($_POST['case'] == 'v2'){
    $sql = "SELECT time_id,aVL FROM data_ecg_6_lead WHERE time_id ".$betweenClaus;
    $result = $conn->query($sql);
    $id = array() ;
    $values = array() ;
    while ($row = mysqli_fetch_assoc($result)){
        array_push($id,0) ;
        array_push($values,0) ;
    }
    $data = array(
        "labelloop"=>$id,
        "dataloop"=>$values
    );
    echo json_encode($data) ;
}

if($_POST['case'] == 'v5'){
    $sql = "SELECT time_id,aVL FROM data_ecg_6_lead WHERE time_id ".$betweenClaus;
    $result = $conn->query($sql);
    $id = array() ;
    $values = array() ;
    while ($row = mysqli_fetch_assoc($result)){
        array_push($id,0) ;
        array_push($values,0) ;
    }
    $data = array(
        "labelloop"=>$id,
        "dataloop"=>$values
    );
    echo json_encode($data) ;
}

if($_POST['case'] == 'lead3'){
    $sql = "SELECT time_id,lead_3 FROM data_ecg_6_lead WHERE time_id ".$betweenClaus;
    $result = $conn->query($sql);
    $id = array() ;
    $values = array() ;
    while ($row = mysqli_fetch_assoc($result)){
        array_push($id,$row['time_id']) ;
        array_push($values,$row['lead_3']) ;
    }
    $data = array(
        "labelloop"=>$id,
        "dataloop"=>$values
    );
    echo json_encode($data) ;
}


if($_POST['case'] == 'avf'){
    $sql = "SELECT time_id,aVF FROM data_ecg_6_lead WHERE time_id ".$betweenClaus;
    $result = $conn->query($sql);
    $id = array() ;
    $values = array() ;
    while ($row = mysqli_fetch_assoc($result)){
        array_push($id,$row['time_id']) ;
        array_push($values,$row['aVF']) ;
    }
    $data = array(
        "labelloop"=>$id,
        "dataloop"=>$values
    );
    echo json_encode($data) ;
}

if($_POST['case'] == 'v3'){
    $sql = "SELECT time_id,aVL FROM data_ecg_6_lead WHERE time_id BETWEEN 300 AND 450";
    $result = $conn->query($sql);
    $id = array() ;
    $values = array() ;
    while ($row = mysqli_fetch_assoc($result)){
        array_push($id,0) ;
        array_push($values,0) ;
    }
    $data = array(
        "labelloop"=>$id,
        "dataloop"=>$values
    );
    echo json_encode($data) ;
}

if($_POST['case'] == 'v6'){
    $sql = "SELECT time_id,aVL FROM data_ecg_6_lead WHERE time_id BETWEEN 300 AND 450";
    $result = $conn->query($sql);
    $id = array() ;
    $values = array() ;
    while ($row = mysqli_fetch_assoc($result)){
        array_push($id,0) ;
        array_push($values,0) ;
    }
    $data = array(
        "labelloop"=>$id,
        "dataloop"=>$values
    );
    echo json_encode($data) ;
}

if($_POST['case'] == 'select'){
    $sql = "SELECT time_id,aVL FROM data_ecg_6_lead WHERE time_id BETWEEN 1 AND 450";
    $result = $conn->query($sql);
    $id = array() ;
    $values = array() ;
    while ($row = mysqli_fetch_assoc($result)){
        array_push($id,$row['time_id']) ;
        array_push($values,$row['aVL']) ;
    }
    $data = array(
        "labelloop"=>$id,
        "dataloop"=>$values
    );
    echo json_encode($data) ;
}

if($_POST['case'] == '11'){
    $sql = "SELECT time_id,aVL FROM data_ecg_6_lead WHERE time_id BETWEEN 1 AND 450";
    $result = $conn->query($sql);
    $id = array() ;
    $values = array() ;
    while ($row = mysqli_fetch_assoc($result)){
        array_push($id,0) ;
        array_push($values,0) ;
    }
    $data = array(
        "labelloop"=>$id,
        "dataloop"=>$values
    );
    echo json_encode($data) ;
}
?>