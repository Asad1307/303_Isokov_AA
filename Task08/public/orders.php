<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Запись к мастеру</title>
</head>

<body>

<?php

require_once 'Events.php';

$path = '../data/ss_new.db';

$pdo = new PDO("sqlite:".$path);

$event = new Events($pdo);
$services = $event->getNameServices();

?>

<form method="post" enctype="application/x-www-form-urlencoded" action="help_orders.php">
    <label>
        <legend> Выбрать услугу </legend>
            <select style="width: 200px;" name="id_service">
                <option value=<?= null ?>>

                </option>
                    <?php foreach($services as $service): ?>
                        <option value=<?= $service->idService?>>
                            <?= $service->nameOfService ?>
                        </option>
                <?php endforeach; ?>
            </select>
    </label>

    <button type="submit">Поиск по названию услуги</button>

</form>