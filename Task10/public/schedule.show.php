<?php

require_once '../DataAccess/ScheduleRepository.php';
require_once '../Utils/PdoFactory.php';
require_once '../vendor/autoload.php';
class_alias('\RedBeanPHP\R', '\R');
R::setup('sqlite:../data/car_service.db');
$workerId = (int)$_GET['id'];
$schedulerRepository = new ScheduleRepository();
$schedule = $schedulerRepository->getById($workerId);

?>

<h1>Schedule</h1>

<a href="schedule.update.php?id=<?= $workerId ?>">Edit</a><br>

<table class="workers-schedule">
    <tr class="table-header">
        <th>Master id</th>
        <th>Monday</th>
        <th>Tuesday</th>
        <th>Wednesday</th>
        <th>Thursday </th>
        <th>Friday </th>
        <th>Saturday </th>
        <th>Sunday</th>
    </tr>
    <?php foreach($schedule as $key => $item): ?>
        <tr>
            <td><?= $item['master_id']?></td>
            <td><?= $item['mon_start'].' - '.$item['mon_end'] ?></td>
            <td><?= $item['tue_start'].' - '.$item['tue_end'] ?></td>
            <td><?= $item['wed_start'].' - '.$item['wed_end'] ?></td>
            <td><?= $item['thu_start'].' - '.$item['thu_end'] ?></td>
            <td><?= $item['fri_start'].' - '.$item['fri_end'] ?></td>
            <td><?= $item['sat_start'].' - '.$item['sat_end'] ?></td>
            <td><?= $item['sun_start'].' - '.$item['sun_end'] ?></td>
        </tr>
    <?php endforeach; ?>

</table><br><br>
<a href="schedule.create.php?id=<?= $workerId ?>"> Create new</a><br>