<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>График мастера</title>
</head>
<body>

<?php

require_once 'Events.php';

$path = '../data/ss_new.db';

$pdo = new PDO("sqlite:".$path);

$event = new Events($pdo);
$busyness = $event->getBusynessByWorkerId($_GET['id_w']);

?>

<form method="post" enctype="application/x-www-form-urlencoded" action="">

<input type="hidden" name="id_w" value=<?= $_GET['id_w'] ?>>

<table class="busyness-table">
    <tr class="table-header">
        <th>Id рабочего времени</th>
        <th>Дата</th>
        <th>Время начала</th>
        <th>Время окончания</th>
        <th>Ссылка на редактирование</th>
        <th>Ссылка на удаление</th>
    </tr>
    <?php
    $label=0; foreach($busyness as $b):
        $label+=1;?>
        <tr>
            
            <td name="busyness_id"><?= $b->busyness_id ?></td>
            <td name="data"><?= $b->data ?></td>
            <td name="work_hours_start"><?= $b->work_hours_start ?></td>
            <td name="work_hours_end"><?= $b->work_hours_end ?></td>

            <td><div><a href="update_schedule.php?id_w=<?= $_GET['id_w'] ?>&busyness_id=<?=  $b->busyness_id  ?>&data=<?=  $b->data  ?>&work_hours_start=<?=  $b->work_hours_start  ?>&work_hours_end=<?=  $b->work_hours_end  ?>&is_actual=<?=  $b->is_actual  ?>">Обновить</a></div></td>
            <td><div><a href="delete_schedule.php?id_w=<?= $_GET['id_w'] ?>&busyness_id=<?=  $b->busyness_id  ?>">Удалить</a></div></td>

        </tr>

    <?php endforeach; ?>

</table>

<div><a href="create_schedule.php?id_w=<?= $_GET['id_w'] ?>">Создать новую запись</a></div>

</form>

<form method="post" enctype="application/x-www-form-urlencoded" action="index.php">
 
<p><button>Вернуться к главному меню</button></p>
</form>

</body>