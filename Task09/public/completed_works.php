<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список выполненных работ мастера</title>
</head>
<body>

<?php

require_once 'Events.php';

$path = '../data/ss_new.db';

$pdo = new PDO("sqlite:".$path);

$event = new Events($pdo);
$busyness = $event->getCompletedWorksByWorkerId($_GET['id_w']);


?>

<form method="post" enctype="application/x-www-form-urlencoded" action="">

<table class="completed_works-table">
    <tr class="table-header">
        <th>Id мастера</th>
        <th>Id выполненной услуги</th>
        <th>Название услуги</th>
        <th>Дата оказания услуги (начало выполнения)</th>
        <th>Продолжительность выполнения услуги (в часах)</th>
        <th>Цена услуги (в рублях)</th>
    </tr>
    <?php foreach($busyness as $b):
        ?>
        <tr>
            <td name="worker_id"><?= $b->id_w ?></td>
            <td name="order_id"><?= $b->order_id ?></td>
            <td name="name_of_service"><?= $b->name_of_service ?></td>
            <td name="service_execution_time"><?= $b->service_execution_time ?></td>
            <td name="duration_in_hours"><?= $b->duration_in_hours ?></td>
            <td name="price"><?= $b->price ?></td>

        </tr>


    <?php endforeach; ?>
</table>

</form>

<form method="post" enctype="application/x-www-form-urlencoded" action="index.php">
 
<p><button>Вернуться к главному меню</button></p>
</form>

</body>
