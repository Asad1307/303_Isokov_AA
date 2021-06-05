<?php

$path = '../data/ss_new.db';

$pdo = new PDO("sqlite:".$path);


if (strcasecmp($_POST['id_w'],"")!=0 and strcasecmp($_POST['date1'],"")!=0 and strcasecmp($_POST['time1_start'],"")!=0 and strcasecmp($_POST['time1_end'],"")!=0){
    $query = "INSERT INTO 'busyness'('data','work_hours_start','work_hours_end') VALUES ("."'".$_POST['date1']."','".$_POST['time1_start']."','".$_POST['time1_end']."');";
    $statement = $pdo->query($query);
    $last_row_id_b = $pdo->lastInsertID();
    $query = "INSERT INTO 'workers_busyness'('worker_id','busyness_id') VALUES (".$_POST['id_w'].",".$last_row_id_b.");";
    $statement = $pdo->query($query);
}

if (strcasecmp($_POST['id_w'],"")!=0 and strcasecmp($_POST['date2'],"")!=0 and strcasecmp($_POST['time2_start'],"")!=0 and strcasecmp($_POST['time2_end'],"")!=0){
    $query = "INSERT INTO 'busyness'('data','work_hours_start','work_hours_end') VALUES ("."'".$_POST['date2']."','".$_POST['time2_start']."','".$_POST['time2_end']."');";
    $statement = $pdo->query($query);
    $last_row_id_b = $pdo->lastInsertID();
    $query = "INSERT INTO 'workers_busyness'('worker_id','busyness_id') VALUES (".$_POST['id_w'].",".$last_row_id_b.");";
    $statement = $pdo->query($query);
}

if (strcasecmp($_POST['id_w'],"")!=0 and strcasecmp($_POST['date3'],"")!=0 and strcasecmp($_POST['time3_start'],"")!=0 and strcasecmp($_POST['time3_end'],"")!=0){
    $query = "INSERT INTO 'busyness'('data','work_hours_start','work_hours_end') VALUES ("."'".$_POST['date3']."','".$_POST['time3_start']."','".$_POST['time3_end']."');";
    $statement = $pdo->query($query);
    $last_row_id_b = $pdo->lastInsertID();
    $query = "INSERT INTO 'workers_busyness'('worker_id','busyness_id') VALUES (".$_POST['id_w'].",".$last_row_id_b.");";
    $statement = $pdo->query($query);
}

if (strcasecmp($_POST['id_w'],"")!=0 and strcasecmp($_POST['date4'],"")!=0 and strcasecmp($_POST['time4_start'],"")!=0 and strcasecmp($_POST['time4_end'],"")!=0){
    $query = "INSERT INTO 'busyness'('data','work_hours_start','work_hours_end') VALUES ("."'".$_POST['date4']."','".$_POST['time4_start']."','".$_POST['time4_end']."');";
    $statement = $pdo->query($query);
    $last_row_id_b = $pdo->lastInsertID();
    $query = "INSERT INTO 'workers_busyness'('worker_id','busyness_id') VALUES (".$_POST['id_w'].",".$last_row_id_b.");";
    $statement = $pdo->query($query);
}

if (strcasecmp($_POST['id_w'],"")!=0 and strcasecmp($_POST['date5'],"")!=0 and strcasecmp($_POST['time5_start'],"")!=0 and strcasecmp($_POST['time5_end'],"")!=0){
    $query = "INSERT INTO 'busyness'('data','work_hours_start','work_hours_end') VALUES ("."'".$_POST['date5']."','".$_POST['time5_start']."','".$_POST['time5_end']."');";
    $statement = $pdo->query($query);
    $last_row_id_b = $pdo->lastInsertID();
    $query = "INSERT INTO 'workers_busyness'('worker_id','busyness_id') VALUES (".$_POST['id_w'].",".$last_row_id_b.");";
    $statement = $pdo->query($query);
}

if (strcasecmp($_POST['id_w'],"")!=0 and strcasecmp($_POST['date6'],"")!=0 and strcasecmp($_POST['time6_start'],"")!=0 and strcasecmp($_POST['time6_end'],"")!=0){
    $query = "INSERT INTO 'busyness'('data','work_hours_start','work_hours_end') VALUES ("."'".$_POST['date6']."','".$_POST['time6_start']."','".$_POST['time6_end']."');";
    $statement = $pdo->query($query);
    $last_row_id_b = $pdo->lastInsertID();
    $query = "INSERT INTO 'workers_busyness'('worker_id','busyness_id') VALUES (".$_POST['id_w'].",".$last_row_id_b.");";
    $statement = $pdo->query($query);
}

if (strcasecmp($_POST['id_w'],"")!=0 and strcasecmp($_POST['date7'],"")!=0 and strcasecmp($_POST['time7_start'],"")!=0 and strcasecmp($_POST['time7_end'],"")!=0){
    $query = "INSERT INTO 'busyness'('data','work_hours_start','work_hours_end') VALUES ("."'".$_POST['date7']."','".$_POST['time7_start']."','".$_POST['time7_end']."');";
    $statement = $pdo->query($query);
    $last_row_id_b = $pdo->lastInsertID();
    $query = "INSERT INTO 'workers_busyness'('worker_id','busyness_id') VALUES (".$_POST['id_w'].",".$last_row_id_b.");";
    $statement = $pdo->query($query);
}

?>

<!DOCTYPE html>
<html lang="en">


<body>
<form method="post" enctype="application/x-www-form-urlencoded" action="schedule.php">

<p><button>Вернуться к вводу информации о графике работы мастеров</button></p>
</form>

<form method="post" enctype="application/x-www-form-urlencoded" action="index.php">
 
<p><button>Вернуться к выбору формы для ввода</button></p>
</form>

</body>

</html>