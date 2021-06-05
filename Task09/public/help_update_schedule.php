<?php

$path = '../data/ss_new.db';

$pdo = new PDO("sqlite:".$path);

//  Данные обновляем только в таблице busyness

if (strcasecmp($_POST['busyness_id'],"")!=0){
    if (strcasecmp($_POST['date_busyness'],"")!=0){
        if (strcasecmp($_POST['busyness_time_start'],"")!=0){
            if (strcasecmp($_POST['busyness_time_end'],"")!=0){
                $query = "UPDATE 'busyness' SET 'data'="."'".$_POST['date_busyness']."'".", 'work_hours_start'="."'".$_POST['busyness_time_start']."'".", 'work_hours_end'="."'".$_POST['busyness_time_end']."'"." WHERE busyness.id=".$_POST['busyness_id'].";";
            }
            else{
                $query = "UPDATE 'busyness' SET 'data'="."'".$_POST['date_busyness']."'".", 'work_hours_start'="."'".$_POST['busyness_time_start']."'".", 'work_hours_end'="."'".$_POST['work_hours_end_old']."'"." WHERE busyness.id=".$_POST['busyness_id'].";";
            }
        }
        else{
            if (strcasecmp($_POST['busyness_time_end'],"")!=0){
                $query = "UPDATE 'busyness' SET 'data'="."'".$_POST['date_busyness']."'".", 'work_hours_start'="."'".$_POST['work_hours_start_old']."'".", 'work_hours_end'="."'".$_POST['busyness_time_end']."'"." WHERE busyness.id=".$_POST['busyness_id'].";";
            }
            else{
                $query = "UPDATE 'busyness' SET 'data'="."'".$_POST['date_busyness']."'".", 'work_hours_start'="."'".$_POST['work_hours_start_old']."'".", 'work_hours_end'="."'".$_POST['work_hours_end_old']."'"." WHERE busyness.id=".$_POST['busyness_id'].";";
            }
        }
    }
    else{
        if (strcasecmp($_POST['busyness_time_start'],"")!=0){
            if (strcasecmp($_POST['busyness_time_end'],"")!=0){
                $query = "UPDATE 'busyness' SET 'data'="."'".$_POST['data_old']."'".", 'work_hours_start'="."'".$_POST['busyness_time_start']."'".", 'work_hours_end'="."'".$_POST['busyness_time_end']."'"." WHERE busyness.id=".$_POST['busyness_id'].";";
            }
            else{
                $query = "UPDATE 'busyness' SET 'data'="."'".$_POST['data_old']."'".", 'work_hours_start'="."'".$_POST['busyness_time_start']."'".", 'work_hours_end'="."'".$_POST['work_hours_end_old']."'"." WHERE busyness.id=".$_POST['busyness_id'].";";
            }
        }
        else{
            if (strcasecmp($_POST['busyness_time_end'],"")!=0){
                $query = "UPDATE 'busyness' SET 'data'="."'".$_POST['data_old']."'".", 'work_hours_start'="."'".$_POST['work_hours_start_old']."'".", 'work_hours_end'="."'".$_POST['busyness_time_end']."'"." WHERE busyness.id=".$_POST['busyness_id'].";";
            }
            else{
                $query = "UPDATE 'busyness' SET 'data'="."'".$_POST['data_old']."'".", 'work_hours_start'="."'".$_POST['work_hours_start_old']."'".", 'work_hours_end'="."'".$_POST['work_hours_end_old']."'"." WHERE busyness.id=".$_POST['busyness_id'].";";
            }
        }
    }
}

$statement = $pdo->query($query);

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