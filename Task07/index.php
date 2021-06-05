<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Станция технического обслуживания</title>
</head>
<body>
<?php

require_once 'Events.php';
require_once 'ParametersValidator.php';
require_once 'db_configuration.php';

const INIT_COMMAND = 'init';
const CURRENCY = ' руб';

shell_exec(INIT_COMMAND);

$pdo =  new PDO(
    'sqlite:' . DB_NAME,
    '',
    '',
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
);

$event = new Events($pdo);
$services = $event->getAll();
$workersIds = $event->getWorkersIds();

?>
<h1>Выбрать Id работника</h1>
<form action="" method="POST">
    <label>
        <select style="width: 200px;" name="id_w">
            <option value=<?= null ?>>

            </option>
            <?php foreach($workersIds as $key => $idObject): ?>
                <option value=<?= $idObject->id_w ?>>
                    <?= $idObject->id_w ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>
    <button type="submit">Поиск по Id</button>
</form>
<?php
$validator = new ParametersValidator();
$id_w = null;
if(isset($_POST['id_w'])){
    $id_w = (int)$_POST['id_w'];
    $validationResult = $validator->validate($id_w);
}

$services = $id_w === null || $id_w === 0 ?
    $event->getAll() :
    $event->getByWorker($id_w);

?>
<table class="workers-table">
    <tr class="table-header">
        <th>Id</th>
        <th>Фамилия</th>
        <th>Имя</th>
        <th>Отчество</th>
        <th>Время выполнения заявки</th>
        <th>Название услуги</th>
        <th>Цена</th>
    </tr>
    <?php foreach($services as $service): ?>
        <tr>
            <td><?= $service->id ?></td>
            <td><?= $service->surname ?></td>
            <td><?= $service->name ?></td>
            <td><?= $service->patronymic ?></td>
            <td><?= $service->serviceExecutionTime ?></td>
            <td><?= $service->nameOfService ?></td>
            <td><?= $service->price . CURRENCY ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html> 