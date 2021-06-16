<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php

require_once '../DataAccess/EventsRepository.php';
require_once '../DataAccess/WorkersRepository.php';
require_once '../vendor/autoload.php';
class_alias('\RedBeanPHP\R', '\R');
R::setup('sqlite:../data/car_service.db');
if(!R::testConnection()) die('No DB connection!');

$workerRepository = new WorkersRepository();
$workers = $workerRepository->getAll();

?>
<h1>Workers</h1>
<table class="workers-table">
    <tr class="table-header">
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Patronymic</th>
        <th>Service name</th>
    </tr>
    <?php foreach($workers as $key => $worker): ?>
        <tr>
            <td><?= $worker['id'] ?></td>
            <td><?= $worker['firstName'] ?></td>
            <td><?= $worker['lastName'] ?></td>
            <td><?= $worker['patronymic'] ?></td>
            <td><?= $worker['specialty'] ?></td>
            <td><a href="schedule.show.php?id=<?= $worker['id'] ?>">Schedule</a></td>
            <td><a href="update-worker.php?id=<?= $worker['id'] ?>">Edit</a></td>
            <td><a href="delete-worker.php?id=<?= $worker['id'] ?>">Delete</a></td>
            <td><a href="events-worker.php?id=<?= $worker['id'] ?>">Completed works</a></td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="add-worker.php">Add new worker</a>

</body>
</html>