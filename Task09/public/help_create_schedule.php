<?php

$path = '../data/ss_new.db';

$pdo = new PDO("sqlite:".$path);

if (strcasecmp($_POST['id_w'],"")!=0 and strcasecmp($_POST['date_busyness'],"")!=0 and strcasecmp($_POST['busyness_time_start'],"")!=0 and strcasecmp($_POST['busyness_time_end'],"")!=0){
    $query = "INSERT INTO 'busyness'('data','work_hours_start','work_hours_end', 'is_actual') VALUES ('".$_POST['date_busyness']."', '".$_POST['busyness_time_start']."', '".$_POST['busyness_time_end']."', ". "'да"."');";
    $statement = $pdo->query($query);
    $last_row_id_busyness = $pdo->lastInsertID();
    $query = "INSERT INTO 'workers_busyness'('worker_id','busyness_id') VALUES (".$_POST['id_w'].", ".$last_row_id_busyness.");";
    $statement = $pdo->query($query);
}

?>

<!DOCTYPE html>
<html lang="en">

<body>

<div><a href="schedule.php?id_w=<?= $_POST['id_w'] ?>">Вернуться к расписанию выбранного мастера</a></div>

<form method="post" enctype="application/x-www-form-urlencoded" action="index.php">
 
<p><button>Вернуться к главному меню</button></p>
</form>

</body>

</html>