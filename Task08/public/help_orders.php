<?php

require_once 'Events.php';

$path = '../data/ss_new.db';

$pdo = new PDO("sqlite:".$path);

if (strcasecmp($_POST['id_service'],"")!=0):?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
    <?php
    $service = $_POST['id_service'];


    $event = new Events($pdo);
    $name_service = $event->getNameServiceByIdService($service);
    $workers = $event->getWorkersbyService($service);
    $car_category = $event->getCarCategoryIdByServiceId($service);


    ?>

<legend>Услуга:
<?php foreach($name_service as $name_s): ?>
    <?=$name_s->nameOfService;?>
<?php endforeach; ?>
</legend>    

    <form method="post" enctype="application/x-www-form-urlencoded" action="help_help_orders.php">
    
    <fieldset>
            <p><label>Введите номер, который Вы видите справа: <input name="id_service">
            <?=$service?>
            </label></p>
    </fieldset>

    <label>
        <legend> Выбрать мастера </legend>
            <select style="width: 200px;" name="worker">
                <option value=<?= null ?>>

                </option>

                <?php foreach($workers as $worker): ?>
                        <option value=<?= $worker->id_w?>>
                            <?= $worker->id_w.". ".$worker->surname." ".$worker->name." ".$worker->patronymic ?>
                        </option>
                <?php endforeach; ?>

            </select>
    </label>


    <label>
        <legend> Выбрать категорию машины </legend>
            <select style="width: 200px;" name="car_category">
            <option value=<?= null ?>>

            </option>
                <?php foreach($car_category as $car_c): ?>
                        <option value=<?= $car_c->carCategoryId?>>
                            <?= $car_c->carCategoryId.". ".$car_c->carCategoryDescription ?>
                        </option>
                <?php endforeach; ?>

            </select>
    </label>

    <button type="submit">Выбор времени для записи и ввод личных данных</button>
    </form>
    </body>
    </html>

<?php endif;?>