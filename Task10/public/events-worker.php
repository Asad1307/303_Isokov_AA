<?php
require_once '../DataAccess/EventsRepository.php';
require_once '../DataAccess/WorkersRepository.php';
require_once '../DataAccess/ScheduleRepository.php';
require_once '../Utils/PdoFactory.php';
require_once '../vendor/autoload.php';
class_alias('\RedBeanPHP\R', '\R');
R::setup('sqlite:../data/car_service.db');

$eventRepository = new EventsRepository();
$workerId = (int)$_GET['id'];
$services = $eventRepository->getByWorker($workerId);

?>
<table class="workers-table">
    <tr class="table-header">
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Patronymic</th>
        <th>Service name</th>
        <th>Status</th>
        <th>Ended at</th>
        <th>Price</th>
    </tr>
    <?php foreach($services as $service): ?>
        <tr>
            <td><?= $service['id'] ?></td>
            <td><?= $service['firstName'] ?></td>
            <td><?= $service['lastName'] ?></td>
            <td><?= $service['patronymic'] ?></td>
            <td><?= $service['serviceName'] ?></td>
            <td><?= $service['status'] ?></td>
            <td><?= $service['endedAt'] ?? 'Not ended yet' ?></td>
            <td><?= $service['price'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>